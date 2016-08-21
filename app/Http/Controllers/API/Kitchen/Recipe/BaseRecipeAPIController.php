<?php

namespace App\Http\Controllers\API\Kitchen\Recipe;

use App\Http\Requests\API\Kitchen\Recipe\CreateBaseRecipeAPIRequest;
use App\Http\Requests\API\Kitchen\Recipe\UpdateBaseRecipeAPIRequest;
use App\Models\Kitchen\recipe\BaseRecipe;
use App\Repositories\Kitchen\Recipe\BaseRecipeRepository;
use App\Repositories\Kitchen\ItemRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class BaseRecipeController
 * @package App\Http\Controllers\API\Kitchen\recipe
 */

class BaseRecipeAPIController extends InfyOmBaseController
{
    /** @var  BaseRecipeRepository */
    private $repository;

    private $itemRepository;

    public function __construct(BaseRecipeRepository $baseRecipeRepo, ItemRepository $itemRepository)
    {
        $this->repository = $baseRecipeRepo;
        $this->itemRepository = $itemRepository;
    }

    /**
     * Display a listing of the BaseRecipe.
     * GET|HEAD /baseRecipes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if (request()->has('sort')) {
            list($sortCol, $sortDir) = explode('|', request()->sort);
            $query = BaseRecipe::orderBy($sortCol, $sortDir);
        } else {
            $query = BaseRecipe::orderBy('created_at', 'asc');
        }

        if ($request->exists('filter')) {
            $query->where(function($q) use($request) {
                $value = "%{$request->filter}%";
                $q->where("name", "like", $value)
                  ->orWhere("quantity", "like", $value);
            });
        }

        $perPage = request()->has('per_page') ? (int) request()->per_page : null;
        return response()->json($query->paginate($perPage));    
    }

    /**
     * Store a newly created BaseRecipe in storage.
     * POST /baseRecipes
     *
     * @param CreateBaseRecipeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBaseRecipeAPIRequest $request)
    {
        $input = $request->all();

        $baseRecipes = $this->repository->create($input);

        return $this->sendResponse($baseRecipes->toArray(), 'BaseRecipe saved successfully');
    }

    /**
     * Display the specified BaseRecipe.
     * GET|HEAD /baseRecipes/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var BaseRecipe $baseRecipe */
        $baseRecipe = $this->repository->find($id);

        if (empty($baseRecipe)) {
            return Response::json(ResponseUtil::makeError('BaseRecipe not found'), 400);
        }

        return $this->sendResponse($baseRecipe->toArray(), 'BaseRecipe retrieved successfully');
    }

    /**
     * Update the specified BaseRecipe in storage.
     * PUT/PATCH /baseRecipes/{id}
     *
     * @param  int $id
     * @param UpdateBaseRecipeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBaseRecipeAPIRequest $request)
    {
        $input = $request->all();

        /** @var BaseRecipe $baseRecipe */
        $baseRecipe = $this->repository->find($id);

        if (empty($baseRecipe)) {
            return Response::json(ResponseUtil::makeError('BaseRecipe not found'), 400);
        }

        $baseRecipe = $this->repository->update($input, $id);

        return $this->sendResponse($baseRecipe->toArray(), 'BaseRecipe updated successfully');
    }

    /**
     * Remove the specified BaseRecipe from storage.
     * DELETE /baseRecipes/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var BaseRecipe $baseRecipe */
        $baseRecipe = $this->repository->find($id);

        if (empty($baseRecipe)) {
            return Response::json(ResponseUtil::makeError('BaseRecipe not found'), 400);
        }

        $baseRecipe->delete();

        return $this->sendResponse($id, 'BaseRecipe deleted successfully');
    }

    public function storeItem(Request $request, $id = null, $itemId = null)
    {
        $baseRecipe = $this->repository->findWithoutFail($id);

        if (empty($baseRecipe)) {
            return Response::json(ResponseUtil::makeError('Base Recipe not found'), 400);
        }

        if ($itemId) {
            $item = $this->itemRepository->findWithoutFail($itemId);
            if (empty($item)) {
                return Response::json(ResponseUtil::makeError('Provider not found'), 400);
            }            
        }

        $attributes = $request->all();
        if ($itemId)
            $attributes['pivot']['item_id'] = $item->id;     

        $exists = $this->repository
             ->findWithoutFail($id)
             ->items()
             ->whereItemId($itemId)->count();

        if ($exists) {
          $baseRecipe->items()->updateExistingPivot($itemId, $attributes['pivot']);
        } else {
          $this->repository->createPivot($baseRecipe, 'pivot', $attributes, 'items', 'item');
        } 

        return $this->sendResponse($request->all(), 'Item associated to Base Recipe successfully');
    }    

    public function items(Request $request, $id = null)
    {
        $baseRecipe = $this->repository->findWithoutFail($id);

        if (empty($baseRecipe)) {
            //Flash::error('Base Recipe not found');
            return Response::json(ResponseUtil::makeError('Base Recipe not found'), 400);
        }

        if (empty($baseRecipe->items)) {
            //Flash::error('Base Recipe not found');
            return Response::json(ResponseUtil::makeError('Not Providers for Base Recipe'), 400);
        }         

        $query = $baseRecipe->items();
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
                  ->orWhere("name", "like", $value);
            });
        }

        $perPage = request()->has('per_page') ? (int) request()->per_page : null;
        return response()->json($query->paginate($perPage));
    }    

    public function availableItems(Request $request, $id = null)
    {
        $items = $this->repository->availableItems($id)->toArray();
        if (empty($items))
            return Response::json(ResponseUtil::makeError('Items not found'), 400);        
        return $this->sendResponse($items, 'Item retrieve successfully');
    }

    public function hasAvailableItems(Request $request, $id = null)
    {
        $items = $this->repository->availableItems($id)->toArray();
        if (empty($items))
            return Response::json(ResponseUtil::makeError('Items not found'), 400);        
        return $this->sendResponse(True, 'Item retrieve successfully');        
    }    
}
