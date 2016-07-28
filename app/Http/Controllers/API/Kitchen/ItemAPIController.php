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

/**
 * Class ItemController
 * @package App\Http\Controllers\API\Kitchen
 */

class ItemAPIController extends InfyOmBaseController
{
    /** @var  ItemRepository */
    private $repository;
    private $providerRepository;

    public function __construct(ItemRepository $itemREpository, ProviderRepository $providerRepository)
    {
        $this->repository = $itemREpository;
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
                $q->where("code", "like", $value)
                  ->orWhere("name", "like", $value)
                  ->orWhere("auto_provider", "like", $value)
                  ->orWhere("perishable", "like", $value)
                  ->orWhere("currency", "like", $value)
                  ->orWhere("unit_id", "like", $value)
                  ->orWhere("presentation_id", "like", $value)
                  ->orWhere("type_id", "like", $value)
                  ->orWhere("sub_family_id", "like", $value);
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
            //Flash::error('Item not found');
            return Response::json(ResponseUtil::makeError('Item not found'), 400);
        }

        $provider = $this->providerRepository->findWithoutFail($providerId);

        if (empty($provider)) {
            //Flash::error('Provider not found');
            return Response::json(ResponseUtil::makeError('Provider not found'), 400);
        }

        $attributes = $request->all();
        //$selected   = False;
        if ($request->get('selected') && !$item->auto_provider)
            $attributes['selected'] = True;        
        //$attributes['selected'] => $selected;
        //$provider->items()->updateExistingPivot($itemId, compact('price', 'selected'));    
        //$item->providers()->updateExistingPivot($providerId, compact('price', 'selected'));    
        $this->repository->createPivot($item, 'provider', $request->all(), 'providers'); 

        //Flash::success('¡Información de ' . $item->name . ' guardada exitosamente!');
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

    public function provider(Request $request, $id = null, $providerId = null) {
        $provider = $this->repository->findWithoutFail($id)->providers()->whereProviderId($providerId)->first();

        return $this->sendResponse($provider->toArray(), 'Provider associated to Item successfully retrieve');
    }
}
