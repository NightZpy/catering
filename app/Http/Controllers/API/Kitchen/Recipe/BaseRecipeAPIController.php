<?php

namespace App\Http\Controllers\API\Kitchen\Recipe;

use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use App\Http\Requests\API\Kitchen\Recipe\CreateBaseRecipeAPIRequest;
use App\Http\Requests\API\Kitchen\Recipe\UpdateBaseRecipeAPIRequest;
use App\Models\Kitchen\recipe\BaseRecipe;
use App\Repositories\Kitchen\ItemRepository;
use App\Repositories\Kitchen\UtensilRepository;
use App\Repositories\Kitchen\Recipe\BaseRecipeRepository;
use Illuminate\Http\Request;
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
    private $utensilRepository;

    public function __construct(BaseRecipeRepository $baseRecipeRepo, 
                                ItemRepository $itemRepository,
                                UtensilRepository $utensilRepository)
    {
        $this->repository = $baseRecipeRepo;
        $this->itemRepository = $itemRepository;
        $this->utensilRepository = $utensilRepository;
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
            $value = "%{$request->filter}%";
            $query->where(function($q) use($value) {
                $q->where("name", "like", $value);
            });
            //$query->search($request->filter);
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
        unset($attributes['pivot_item']['total_quantity']);
        unset($attributes['pivot_item']['total_quantity_format']);
        unset($attributes['pivot_item']['cost']);
        unset($attributes['pivot_item']['cost_format']);
        if (isset($attributes['pivot_item']['base']))
            unset($attributes['pivot_item']['base']);
        $attributes['pivot'] = $attributes['pivot_item'];
        unset($attributes['pivot_item']);
        
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
        //\Debugbar::info($baseRecipe->items->first()->pivot->toArray());
        if (empty($baseRecipe->items)) {
            //Flash::error('Base Recipe not found');
            return Response::json(ResponseUtil::makeError('Not Providers for Base Recipe'), 400);
        }         

        $query = $baseRecipe->items();
        if ($request->exists('filter')) {
            $value = "%{$request->filter}%";
            $query->where(function($q) use($value) {
                $q->orWhere("name", "like", $value);
            });
            //$query = $baseRecipe->items()->search($value);
        }

        if (request()->has('sort')) {
            list($sortCol, $sortDir) = explode('|', request()->sort);
            $query = $query->orderBy($sortCol, $sortDir);
        } else {
            $query = $query->orderBy('created_at', 'asc');
        }

        $perPage = request()->has('per_page') ? (int) request()->per_page : null;
        return response()->json($query->paginate($perPage));
    }    

    public function item(Request $request, $id = null, $itemId = null) {
        $item = $this->repository->findWithoutFail($id)->items()->whereItemId($itemId)->first();
        $baseRecipe = $this->repository->findWithoutFail($id)->toArray();        
        $data = $baseRecipe;
        $item = $item->toArray();        
        $data['pivot_item'] = $item['pivot'];
        unset($item['pivot']);        
        $data['item'] = $item;
        return $this->sendResponse($data, 'Item associated to Item successfully retrieve');
    }

    public function availableItems(Request $request, $id = null)
    {
        //$items = $this->repository->availableItems($id)->pluck('name', 'id')->toArray();
        //$items = $this->repository->all()->toArray();
        $items = $this->itemRepository->all()->toArray();
        $items = array_map(function ($item) {
            return [
                'id' => $item['id'], 
                'name' => $item['name'], 
                'presentation' => $item['presentation_name']
                ];
        }, $items);

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

    public function deleteItem(Request $request, $id = null, $itemId = null)
    {
        $baseRecipe = $this->repository->findWithoutFail($id);
        if (empty($baseRecipe))
            return Response::json(ResponseUtil::makeError('BaseRecipe not found'), 400); 
        
        $item = $baseRecipe->items()->whereItemId($itemId)->count();
        if ($item) {
            $baseRecipe->items()->detach($itemId);
            //$baseRecipe = $baseRecipe->toArray();
            //$baseRecipe['item'] = $item;
            return $this->sendResponse($request->all(), 'Item successfully detached from BaseRecipe');
        }
        return Response::json(ResponseUtil::makeError('Item could not be detached from baseRecipe'), 400);
    }    

    public function storeUtensil(Request $request, $id = null, $utensilId = null)
    {
        $baseRecipe = $this->repository->findWithoutFail($id);

        if (empty($baseRecipe)) {
            return Response::json(ResponseUtil::makeError('Base Recipe not found'), 400);
        }

        if ($utensilId) {
            $utensil = $this->utensilRepository->findWithoutFail($utensilId);
            if (empty($utensil)) {
                return Response::json(ResponseUtil::makeError('Utensil not found'), 400);
            }            
        }

        $attributes = $request->all();
        $attributes['pivot'] = $attributes['pivot_utensil'];
        unset($attributes['pivot_utensil']);

        $exists = $this->repository
             ->findWithoutFail($id)
             ->utensils()
             ->whereUtensilId($utensilId)->count();

        if ($exists) {
          $baseRecipe->utensils()->updateExistingPivot($utensilId, $attributes['pivot']);
        } else {
          $this->repository->createPivot($baseRecipe, 'pivot', $attributes, 'utensils', 'utensil');
        } 

        return $this->sendResponse($request->all(), 'Utensil associated to Base Recipe successfully');
    }    

    public function utensils(Request $request, $id = null)
    {
        $baseRecipe = $this->repository->findWithoutFail($id);        

        if (empty($baseRecipe)) {
            //Flash::error('Base Recipe not found');
            return Response::json(ResponseUtil::makeError('Base Recipe not found'), 400);
        }
        //\Debugbar::info($baseRecipe->utensils->first()->pivot->toArray());
        if (empty($baseRecipe->utensils)) {
            //Flash::error('Base Recipe not found');
            return Response::json(ResponseUtil::makeError('Not Utensils for Base Recipe'), 400);
        }         

        $query = $baseRecipe->utensils();
        if ($request->exists('filter') && !empty($request->filter)) {
            $value = "%{$request->filter}%";
            $query->where(function($q) use($value) {
                //$q->where("code", "like", $value)
                $q->where("name", "like", $value);
            });
            //$query = $baseRecipe->utensils()->search($value);
        }

        if (request()->has('sort')) {
            list($sortCol, $sortDir) = explode('|', request()->sort);
            $query = $query->orderBy($sortCol, $sortDir);
        } else {
            $query = $query->orderBy('created_at', 'asc');
        }


        $perPage = request()->has('per_page') ? (int) request()->per_page : null;
        return response()->json($query->paginate($perPage));
    }    

    public function utensil(Request $request, $id = null, $utensilId = null) {
        $utensil = $this->repository->findWithoutFail($id)->utensils()->whereUtensilId($utensilId)->first();
        $baseRecipe = $this->repository->findWithoutFail($id)->toArray();        
        $data = $baseRecipe;
        $utensil = $utensil->toArray();        
        $data['pivot_utensil'] = $utensil['pivot'];
        unset($utensil['pivot']);        
        $data['utensil'] = $utensil;
        return $this->sendResponse($data, 'Utensil associated to BaseRecipe successfully retrieve');
    }

    public function availableUtensils(Request $request, $id = null)
    {
        $utensils = $this->repository->availableUtensils($id)->pluck('name', 'id')->toArray();
        //$utensils = $this->repository->all()->pluck('name', 'id')->toArray();
        if (empty($utensils))
            return Response::json(ResponseUtil::makeError('Utensils not found'), 400);        
        return $this->sendResponse($utensils, 'Utensil retrieve successfully');
    }

    public function hasAvailableUtensils(Request $request, $id = null)
    {
        $utensils = $this->repository->availableUtensils($id)->toArray();
        if (empty($utensils))
            return Response::json(ResponseUtil::makeError('Utensils not found'), 400);        
        return $this->sendResponse(True, 'Utensil retrieve successfully');        
    }    

    public function deleteUtensil(Request $request, $id = null, $utensilId = null)
    {
        $baseRecipe = $this->repository->findWithoutFail($id);
        if (empty($baseRecipe))
            return Response::json(ResponseUtil::makeError('BaseRecipe not found'), 400); 
        
        $utensil = $baseRecipe->utensils()->whereUtensilId($utensilId)->count();
        if ($utensil) {
            $baseRecipe->utensils()->detach($utensilId);
            //$baseRecipe = $baseRecipe->toArray();
            //$baseRecipe['utensil'] = $utensil;
            return $this->sendResponse($request->all(), 'Utensil successfully detached from BaseRecipe');
        }
        return Response::json(ResponseUtil::makeError('Utensil could not be detached from baseRecipe'), 400);
    }      
}
