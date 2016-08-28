<?php

namespace App\Http\Controllers\API\Kitchen\Recipe;

use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use App\Http\Requests\API\Kitchen\Recipe\CreateRecipeAPIRequest;
use App\Http\Requests\API\Kitchen\Recipe\UpdateRecipeAPIRequest;
use App\Models\Kitchen\Recipe\Recipe;
use App\Repositories\Kitchen\Recipe\RecipeRepository;
use App\Repositories\Kitchen\UtensilRepository;
use Illuminate\Http\Request;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class RecipeController
 * @package App\Http\Controllers\API\Kitchen\Recipe
 */

class RecipeAPIController extends InfyOmBaseController
{
    /** @var  RecipeRepository */
    private $repository;

    public function __construct(RecipeRepository $recipeRepo, UtensilRepository $utensilRepository)
    {
        $this->repository = $recipeRepo;
        $this->utensilRepository = $utensilRepository;
    }

    /**
     * Display a listing of the Recipe.
     * GET|HEAD /recipes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if (request()->has('sort')) {
            list($sortCol, $sortDir) = explode('|', request()->sort);
            $query = Recipe::orderBy($sortCol, $sortDir);
        } else {
            $query = Recipe::orderBy('created_at', 'asc');
        }

        if ($request->exists('filter')) {
            $query->where(function($q) use($request) {
                $value = "%{$request->filter}%";
                $q->where("name", "like", $value)
                  ->orWhere("servings_quantity", "like", $value)
                  ->orWhere("type_id", "like", $value);
            });
        }

        $perPage = request()->has('per_page') ? (int) request()->per_page : null;
        return response()->json($query->paginate($perPage));    
    }

    /**
     * Store a newly created Recipe in storage.
     * POST /recipes
     *
     * @param CreateRecipeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateRecipeAPIRequest $request)
    {
        $input = $request->all();

        $recipes = $this->repository->create($input);

        return $this->sendResponse($recipes->toArray(), 'Recipe saved successfully');
    }

    /**
     * Display the specified Recipe.
     * GET|HEAD /recipes/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Recipe $recipe */
        $recipe = $this->repository->find($id);

        if (empty($recipe)) {
            return Response::json(ResponseUtil::makeError('Recipe not found'), 400);
        }

        return $this->sendResponse($recipe->toArray(), 'Recipe retrieved successfully');
    }

    /**
     * Update the specified Recipe in storage.
     * PUT/PATCH /recipes/{id}
     *
     * @param  int $id
     * @param UpdateRecipeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRecipeAPIRequest $request)
    {
        $input = $request->all();

        /** @var Recipe $recipe */
        $recipe = $this->repository->find($id);

        if (empty($recipe)) {
            return Response::json(ResponseUtil::makeError('Recipe not found'), 400);
        }

        $recipe = $this->repository->update($input, $id);

        return $this->sendResponse($recipe->toArray(), 'Recipe updated successfully');
    }

    /**
     * Remove the specified Recipe from storage.
     * DELETE /recipes/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Recipe $recipe */
        $recipe = $this->repository->find($id);

        if (empty($recipe)) {
            return Response::json(ResponseUtil::makeError('Recipe not found'), 400);
        }

        $recipe->delete();

        return $this->sendResponse($id, 'Recipe deleted successfully');
    }

    public function storeUtensil(Request $request, $id = null, $utensilId = null)
    {
        $recipe = $this->repository->findWithoutFail($id);

        if (empty($recipe)) {
            return Response::json(ResponseUtil::makeError('Recipe not found'), 400);
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
          $recipe->utensils()->updateExistingPivot($utensilId, $attributes['pivot']);
        } else {
          $this->repository->createPivot($recipe, 'pivot', $attributes, 'utensils', 'utensil');
        } 

        return $this->sendResponse($request->all(), 'Utensil associated to Recipe successfully');
    }    

    public function utensils(Request $request, $id = null)
    {
        $recipe = $this->repository->findWithoutFail($id);        

        if (empty($recipe)) {
            //Flash::error('Recipe not found');
            return Response::json(ResponseUtil::makeError('Recipe not found'), 400);
        }
        
        if (empty($recipe->utensils)) {
            //Flash::error('Recipe not found');
            return Response::json(ResponseUtil::makeError('Not Providers for Recipe'), 400);
        }         

        $query = $recipe->utensils();
        if ($request->exists('filter') && !empty($request->filter)) {
            $value = "%{$request->filter}%";
            $query->where(function($q) use($value) {
                //$q->where("code", "like", $value)
                $q->where("name", "like", $value);
            });
            //$query = $recipe->utensils()->search($value);
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
        $recipe = $this->repository->findWithoutFail($id)->toArray();        
        $data = $recipe;
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
        $recipe = $this->repository->findWithoutFail($id);
        if (empty($recipe))
            return Response::json(ResponseUtil::makeError('Recipe not found'), 400); 
        
        $utensil = $recipe->utensils()->whereUtensilId($utensilId)->count();
        if ($utensil) {
            $recipe->utensils()->detach($utensilId);
            //$recipe = $recipe->toArray();
            //$recipe['utensil'] = $utensil;
            return $this->sendResponse($request->all(), 'Utensil successfully detached from Recipe');
        }
        return Response::json(ResponseUtil::makeError('Utensil could not be detached from recipe'), 400);
    }    
}
