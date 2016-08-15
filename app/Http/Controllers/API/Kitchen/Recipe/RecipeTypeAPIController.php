<?php

namespace App\Http\Controllers\API\Kitchen\Recipe;

use App\Http\Requests\API\Kitchen\Recipe\CreateRecipeTypeAPIRequest;
use App\Http\Requests\API\Kitchen\Recipe\UpdateRecipeTypeAPIRequest;
use App\Models\Kitchen\Recipe\RecipeType;
use App\Repositories\Kitchen\Recipe\RecipeTypeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Http\Controllers\API\DataFormat;

/**
 * Class RecipeTypeController
 * @package App\Http\Controllers\API\Kitchen\recipe
 */

class RecipeTypeAPIController extends InfyOmBaseController
{
    use DataFormat;

    /** @var  RecipeTypeRepository */
    private $repository;

    public function __construct(RecipeTypeRepository $recipeTypeRepo)
    {
        $this->repository = $recipeTypeRepo;
    }

    /**
     * Display a listing of the RecipeType.
     * GET|HEAD /recipeTypes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if (request()->has('sort')) {
            list($sortCol, $sortDir) = explode('|', request()->sort);
            $query = RecipeType::orderBy($sortCol, $sortDir);
        } else {
            $query = RecipeType::orderBy('created_at', 'asc');
        }

        if ($request->exists('filter')) {
            $query->where(function($q) use($request) {
                $value = "%{$request->filter}%";
                $q->where("name", "like", $value);
            });
        }

        $perPage = request()->has('per_page') ? (int) request()->per_page : null;
        return response()->json($query->paginate($perPage));    
    }

    /**
     * Store a newly created RecipeType in storage.
     * POST /recipeTypes
     *
     * @param CreateRecipeTypeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateRecipeTypeAPIRequest $request)
    {
        $input = $request->all();

        $recipeTypes = $this->repository->create($input);

        return $this->sendResponse($recipeTypes->toArray(), 'RecipeType saved successfully');
    }

    /**
     * Display the specified RecipeType.
     * GET|HEAD /recipeTypes/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var RecipeType $recipeType */
        $recipeType = $this->repository->find($id);

        if (empty($recipeType)) {
            return Response::json(ResponseUtil::makeError('RecipeType not found'), 400);
        }

        return $this->sendResponse($recipeType->toArray(), 'RecipeType retrieved successfully');
    }

    /**
     * Update the specified RecipeType in storage.
     * PUT/PATCH /recipeTypes/{id}
     *
     * @param  int $id
     * @param UpdateRecipeTypeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRecipeTypeAPIRequest $request)
    {
        $input = $request->all();

        /** @var RecipeType $recipeType */
        $recipeType = $this->repository->find($id);

        if (empty($recipeType)) {
            return Response::json(ResponseUtil::makeError('RecipeType not found'), 400);
        }

        $recipeType = $this->repository->update($input, $id);

        return $this->sendResponse($recipeType->toArray(), 'RecipeType updated successfully');
    }

    /**
     * Remove the specified RecipeType from storage.
     * DELETE /recipeTypes/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var RecipeType $recipeType */
        $recipeType = $this->repository->find($id);

        if (empty($recipeType)) {
            return Response::json(ResponseUtil::makeError('RecipeType not found'), 400);
        }

        $recipeType->delete();

        return $this->sendResponse($id, 'RecipeType deleted successfully');
    }
}
