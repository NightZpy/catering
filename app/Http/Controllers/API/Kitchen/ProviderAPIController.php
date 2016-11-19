<?php

namespace App\Http\Controllers\API\Kitchen;

use App\Http\Requests\API\Kitchen\CreateProviderAPIRequest;
use App\Http\Requests\API\Kitchen\UpdateProviderAPIRequest;
use App\Models\Kitchen\Provider;
use App\Repositories\Kitchen\ProviderRepository;
use App\Repositories\Kitchen\ItemRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ProviderController
 * @package App\Http\Controllers\API\Kitchen
 */

class ProviderAPIController extends InfyOmBaseController
{
    /** @var  ProviderRepository */
    private $providerRepository;
    private $itemRepository;
    public function __construct(ProviderRepository $providerRepo, ItemRepository $itemRepository)
    {
        $this->providerRepository = $providerRepo;
        $this->itemRepository = $itemRepository;
    }

    /**
     * Display a listing of the Provider.
     * GET|HEAD /providers
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if (request()->has('sort')) {
            list($sortCol, $sortDir) = explode('|', request()->sort);
            if ( \Schema::hasColumn('providers', $sortCol) ) 
              $query = Provider::orderBy($sortCol, $sortDir);
            else
              $query = Provider::sortBy($sortCol, $sortDir);
        } else {
            $query = Provider::orderBy('created_at', 'asc');
        }

        if ($request->exists('filter')) {
            $query->search("{$request->filter}");
        }

        $perPage = request()->has('per_page') ? (int) request()->per_page : null;
        return response()->json($query->paginate($perPage));    
    }

    /**
     * Store a newly created Provider in storage.
     * POST /providers
     *
     * @param CreateProviderAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateProviderAPIRequest $request)
    {
        $input = $request->all();

        $providers = $this->providerRepository->create($input);

        return $this->sendResponse($providers->toArray(), trans('providers.index.messages.saved'));
    }

    /**
     * Display the specified Provider.
     * GET|HEAD /providers/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Provider $provider */
        $provider = $this->providerRepository->find($id);

        if (empty($provider)) {
            return Response::json(ResponseUtil::makeError(trans('providers.index.messages.failed')), 400);
        }

        return $this->sendResponse($provider->toArray(), trans('providers.index.messages.success'));
    }

    /**
     * Update the specified Provider in storage.
     * PUT/PATCH /providers/{id}
     *
     * @param  int $id
     * @param UpdateProviderAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProviderAPIRequest $request)
    {
        $input = $request->all();

        /** @var Provider $provider */
        $provider = $this->providerRepository->find($id);

        if (empty($provider)) {
            return Response::json(ResponseUtil::makeError(trans('providers.index.messages.failed')), 400);
        }

        $provider = $this->providerRepository->update($input, $id);

        return $this->sendResponse($provider->toArray(), trans('providers.index.messages.updated'));
    }

    /**
     * Remove the specified Provider from storage.
     * DELETE /providers/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Provider $provider */
        $provider = $this->providerRepository->find($id);

        if (empty($provider)) {
            return Response::json(ResponseUtil::makeError(trans('providers.index.messages.failed')), 400);
        }

        $provider->delete();

        return $this->sendResponse($id, trans('providers.index.messages.deleted'));
    }

    public function availableItems(Request $request, $id = null)
    {
        $items = $this->providerRepository->availableItems($id)->toArray();
        if (empty($items))
            return Response::json(ResponseUtil::makeError(trans('providers.index.messages.item-not-found')), 400);        
        return $this->sendResponse($items, trans('providers.index.messages.success'));
    }

    public function hasAvailableItems(Request $request, $id = null)
    {
        $items = $this->providerRepository->availableItems($id)->toArray();
        if (empty($items))
            return Response::json(ResponseUtil::makeError(trans('providers.index.messages.item-not-found')), 400);        
        return $this->sendResponse(True, trans('providers.index.messages.item-retrieve'));        
    }

    public function storeItem(Request $request, $id = null, $itemId = null)
    {

        $provider = $this->providerRepository->findWithoutFail($id);

        if (empty($provider)) {
            return Response::json(ResponseUtil::makeError(trans('providers.index.messages.failed')), 400);
        }

        if ($itemId) {
            $item = $this->itemRepository->findWithoutFail($itemId);
            if (empty($item)) {
                return Response::json(ResponseUtil::makeError(trans('providers.index.messages.item-not-found')), 400);
            }            
        }

        $data = $request->all();
        $item_id = $data['pivot_item']['id'];
        unset($data['pivot_item']['id']);
        $attributes['pivot'] = $data['pivot_item'];
        $attributes['pivot']['item_id'] = $item_id;
        unset($data['pivot_item']);

        if (isset($attributes['pivot']['selected']) && $attributes['pivot']['selected'] && !$item->auto_provider)
            $attributes['pivot']['selected'] = True;   

        $exists = $this->providerRepository
             ->findWithoutFail($id)
             ->items()
             ->whereItemId($itemId)->count();
        
        if ($exists) {
          $provider->items()->updateExistingPivot($itemId, $attributes['pivot']);
        } else {
          $this->providerRepository->createPivot($provider, 'pivot', $attributes, 'items', 'item');
        } 

        return $this->sendResponse($request->all(), trans('providers.index.messages.item-associated'));
    }

    public function items(Request $request, $id = null)
    {
        $provider = $this->providerRepository->findWithoutFail($id);

        if (empty($provider)) {
            //Flash::error('Item not found');
            return Response::json(ResponseUtil::makeError(trans('providers.index.messages.failed')), 400);
        }

        if (empty($provider->items)) {
            //Flash::error('Item not found');
            return Response::json(ResponseUtil::makeError(trans('providers.index.messages.not-item')), 400);
        }         

        $query = $provider->items();
        if (request()->has('sort')) {
            list($sortCol, $sortDir) = explode('|', request()->sort);
            $query = $query->orderBy($sortCol, $sortDir);
        } else {
            $query = $query->orderBy('created_at', 'asc');
        }

        if ($request->exists('filter')) {
          $query->search("{$request->filter}");                     
        }

        $perPage = request()->has('per_page') ? (int) request()->per_page : null;
        return response()->json($query->paginate($perPage));
    }

    public function item(Request $request, $id = null, $itemId = null)
    {
        $item = $this->providerRepository->findWithoutFail($id)->items()->whereItemId($itemId)
        ->first();

        $provider = $this->providerRepository->findWithoutFail($id)->toArray();
        $data = $provider;
        $item = $item->toArray();    
        $data['pivot_item'] = $item['pivot'];
        unset($item['pivot']);
        $data['item'] = $item;
        return $this->sendResponse($data, trans('providers.index.messages.item-associated'));
    }

    public function deleteItem(Request $request, $id = null, $itemId = null)
    {
        $provider = $this->providerRepository->findWithoutFail($id);

        if (empty($provider)){
            return Response::json(ResponseUtil::makeError(trans('providers.index.messages.failed')), 400); 
        }

        $item = $provider->items()->whereItemId($itemId)->count();
        if ($item) {
            $provider->items()->detach($itemId);
            return $this->sendResponse($request->all(), trans('providers.index.messages.item-detached'));
        }
        return Response::json(ResponseUtil::makeError(trans('providers.index.messages.item-not-detached')), 400);
    }
}
