<?php

namespace App\Http\Controllers\API\Kitchen\Recipe;

use App\Http\Requests\API\Kitchen\Recipe\CreateRecipeAPIRequest;
use App\Http\Requests\API\Kitchen\Recipe\UpdateRecipeAPIRequest;
use App\Models\Kitchen\Recipe\Recipe;
use App\Repositories\Kitchen\Recipe\RecipeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
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
    private $recipeRepository;

    public function __construct(RecipeRepository $recipeRepo)
    {
        $this->recipeRepository = $recipeRepo;
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

        $recipes = $this->recipeRepository->create($input);

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
        $recipe = $this->recipeRepository->find($id);

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
        $recipe = $this->recipeRepository->find($id);

        if (empty($recipe)) {
            return Response::json(ResponseUtil::makeError('Recipe not found'), 400);
        }

        $recipe = $this->recipeRepository->update($input, $id);

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
        $recipe = $this->recipeRepository->find($id);

        if (empty($recipe)) {
            return Response::json(ResponseUtil::makeError('Recipe not found'), 400);
        }

        $recipe->delete();

        return $this->sendResponse($id, 'Recipe deleted successfully');
    }
}
