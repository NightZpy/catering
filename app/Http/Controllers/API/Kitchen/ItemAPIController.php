<?php

namespace App\Http\Controllers\API\Kitchen;

use App\Http\Requests\API\Kitchen\CreateItemAPIRequest;
use App\Http\Requests\API\Kitchen\UpdateItemAPIRequest;
use App\Models\Kitchen\Item;
use App\Repositories\Kitchen\ItemRepository;
use App\Repositories\Kitchen\ProviderRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Http\Controllers\API\DataFormat;

/**
 * Class ItemController
 * @package App\Http\Controllers\API\Kitchen
 */

class ItemAPIController extends InfyOmBaseController
{
    use DataFormat;

    /** @var  ItemRepository */
    private $repository;
    private $providerRepository;

    public function __construct(ItemRepository $itemRepository, ProviderRepository $providerRepository)
    {
        $this->repository = $itemRepository;
        $this->providerRepository = $providerRepository;
    }

    /**
     * Display a listing of the Item.
     * GET|HEAD /items
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if (request()->has('sort')) {
            list($sortCol, $sortDir) = explode('|', request()->sort);
            $query = Item::orderBy($sortCol, $sortDir);
        } else {
            $query = Item::orderBy('created_at', 'asc');
        }

        if ($request->exists('filter')) {
            $query->where(function($q) use($request) {
                $value = "%{$request->filter}%";
                $q->orWhere("name", "like", $value)
                  ->orWhere("auto_provider", "like", $value)
                  ->orWhere("type", "like", $value)
                  ->orWhere("perishable", "like", $value)
                  ->orWhere("currency", "like", $value);
                  
                  $q->orWhereHas('subFamily', function($q) use ($value){
                    $q->orWhere("sub_families.name", "like", $value);
                  });

                  $q->orWhereHas('presentation', function($q) use ($value){
                    $q->orWhere("presentations.name", "like", $value);
                  });

                  $q->orWhereHas('family', function($q) use ($value){
                    $q->orWhere("families.name", "like", $value);
                  });
            });                      
        }

        $perPage = request()->has('per_page') ? (int) request()->per_page : null;
        return response()->json($query->paginate($perPage));    
    }

    /**
     * Store a newly created Item in storage.
     * POST /items
     *
     * @param CreateItemAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateItemAPIRequest $request)
    {
        $input = $request->all();

        $items = $this->repository->create($input);

        return $this->sendResponse($items->toArray(), 'Item saved successfully');
    }

    /**
     * Display the specified Item.
     * GET|HEAD /items/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Item $item */
        $item = $this->repository->find($id);

        if (empty($item)) {
            return Response::json(ResponseUtil::makeError('Item not found'), 400);
        }

        return $this->sendResponse($item->toArray(), 'Item retrieved successfully');
    }

    /**
     * Update the specified Item in storage.
     * PUT/PATCH /items/{id}
     *
     * @param  int $id
     * @param UpdateItemAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateItemAPIRequest $request)
    {
        $input = $request->all();

        /** @var Item $item */
        $item = $this->repository->find($id);

        if (empty($item)) {
            return Response::json(ResponseUtil::makeError('Item not found'), 400);
        }

        $item = $this->repository->update($input, $id);

        return $this->sendResponse($item->toArray(), 'Item updated successfully');
    }

    /**
     * Remove the specified Item from storage.
     * DELETE /items/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Item $item */
        $item = $this->repository->find($id);

        if (empty($item)) {
            return Response::json(ResponseUtil::makeError('Item not found'), 400);
        }

        $item->delete();

        return $this->sendResponse($id, 'Item deleted successfully');
    }

    public function storeProvider(Request $request, $id = null, $providerId = null)
    {
        $item = $this->repository->findWithoutFail($id);

        if (empty($item)) {
            return Response::json(ResponseUtil::makeError('Item not found'), 400);
        }

        if ($providerId) {
            $provider = $this->providerRepository->findWithoutFail($providerId);
            if (empty($provider)) {
                return Response::json(ResponseUtil::makeError('Provider not found'), 400);
            }            
        }

        $attributes = $request->all();
        $attributes['pivot'] = $attributes['pivot_provider'];
        unset($attributes['pivot_provider']);

        if (isset($attributes['pivot']['selected']) && $attributes['pivot']['selected'] && !$item->auto_provider)
            $attributes['pivot']['selected'] = True;   

        $exists = $this->repository
             ->findWithoutFail($id)
             ->providers()
             ->whereProviderId($providerId)->count();

        if ($exists) {
          $item->providers()->updateExistingPivot($providerId, $attributes['pivot']);
        } else {
          $this->repository->createPivot($item, 'pivot', $attributes, 'providers', 'provider');
        } 

        return $this->sendResponse($request->all(), 'Provider associated to Item successfully');
    }

    public function providers(Request $request, $id = null)
    {
        $item = $this->repository->findWithoutFail($id);

        if (empty($item)) {
            //Flash::error('Item not found');
            return Response::json(ResponseUtil::makeError('Item not found'), 400);
        }

        if (empty($item->providers)) {
            //Flash::error('Item not found');
            return Response::json(ResponseUtil::makeError('Not Providers for Item'), 400);
        }         

        $query = $item->providers();
        if (request()->has('sort')) {
            list($sortCol, $sortDir) = explode('|', request()->sort);
            $query = $query->orderBy($sortCol, $sortDir);
        } else {
            $query = $query->orderBy('created_at', 'asc');
        }

        if ($request->exists('filter')) {
            $query->where(function($q) use($request) {
                $value = "%{$request->filter}%";
                $q->where("code", "like", $value)
                  ->orWhere("name", "like", $value)
                  ->orWhere("specialty", "like", $value)
                  ->orWhere("district", "like", $value)
                  ->orWhere("contact", "like", $value)
                  ->orWhere("email", "like", $value);
            });
        }

        $perPage = request()->has('per_page') ? (int) request()->per_page : null;
        return response()->json($query->paginate($perPage));
    }

    public function availableProviders(Request $request, $id = null)
    {
        $providers = $this->repository->availableProviders($id)->toArray();
        if (empty($providers))
            return Response::json(ResponseUtil::makeError('Providers not found'), 400);        
        return $this->sendResponse($providers, 'Provider retrieve successfully');
    }

    public function hasAvailableProviders(Request $request, $id = null)
    {
        $providers = $this->repository->availableProviders($id)->toArray();
        if (empty($providers))
            return Response::json(ResponseUtil::makeError('Providers not found'), 400);        
        return $this->sendResponse(True, 'Provider retrieve successfully');        
    }


    public function provider(Request $request, $id = null, $providerId = null) {
        $provider = $this->repository->findWithoutFail($id)->providers()->whereProviderId($providerId)->first();

        $item = $this->repository->findWithoutFail($id)->toArray();
        $data = $item;
        $provider = $provider->toArray();    
        $data['pivot_provider'] = $provider['pivot'];
        unset($provider['pivot']);
        $data['provider'] = $provider;
        return $this->sendResponse($data, 'Provider associated to Item successfully retrieve');
    }

    public function alreadyAssociate(Request $request, $id = null, $providerId = null)
    {
        $item = $this->repository->findWithoutFail($id);
        if (empty($item))
            return Response::json(ResponseUtil::makeError('Item not found'), 400);

        if ($item->providers()->whereProviderId($providerId)->count()) 
            return $this->sendResponse([True], 'Provider already associate to item');
        return $this->sendResponse([False], 'Provider not associate yet to item');   
    }

    public function deleteProvider(Request $request, $id = null, $providerId = null)
    {
        $item = $this->repository->findWithoutFail($id);
        if (empty($item))
            return Response::json(ResponseUtil::makeError('Item not found'), 400); 

        $provider = $item->providers()->whereProviderId($providerId)->count();
        if ($provider) {
            $item->providers()->detach($providerId);
            //$item = $item->toArray();
            //$item['provider'] = $provider;
            return $this->sendResponse($request->all(), 'Provider successfully detached from item');
        }
        return Response::json(ResponseUtil::makeError('Provider could not be detached from item'), 400);
    }
}
