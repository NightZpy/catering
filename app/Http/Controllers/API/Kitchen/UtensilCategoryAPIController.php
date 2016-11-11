<?php

namespace App\Http\Controllers\API\Kitchen;

use App\Http\Requests\API\Kitchen\CreateUtensilCategoryAPIRequest;
use App\Http\Requests\API\Kitchen\UpdateUtensilCategoryAPIRequest;
use App\Models\Kitchen\UtensilCategory;
use App\Repositories\Kitchen\UtensilCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Http\Controllers\API\DataFormat;

/**
 * Class UtensilCategoryController
 * @package App\Http\Controllers\API\Kitchen
 */

class UtensilCategoryAPIController extends InfyOmBaseController
{    
    use DataFormat;

    /** @var  UtensilCategoryRepository */
    private $repository;

    public function __construct(UtensilCategoryRepository $utensilCategoryRepo)
    {
        $this->repository = $utensilCategoryRepo;
    }

    /**
     * Display a listing of the UtensilCategory.
     * GET|HEAD /utensilCategories
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if (request()->has('sort')) {
            list($sortCol, $sortDir) = explode('|', request()->sort);
            if ( \Schema::hasColumn('utensil_categories', $sortCol) ) 
              $query = UtensilCategory::orderBy($sortCol, $sortDir);
            else
              $query = UtensilCategory::sortBy($sortCol, $sortDir);
        } else {
            $query = UtensilCategory::orderBy('created_at', 'asc');
        }

        if ($request->exists('filter')) {
            $query->search("{$request->filter}");
        }

        $perPage = request()->has('per_page') ? (int) request()->per_page : null;
        return response()->json($query->paginate($perPage));    
    }

    /**
     * Store a newly created UtensilCategory in storage.
     * POST /utensilCategories
     *
     * @param CreateUtensilCategoryAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateUtensilCategoryAPIRequest $request)
    {
        $input = $request->all();

        $utensilCategories = $this->repository->create($input);

        return $this->sendResponse($utensilCategories->toArray(), trans('utensilsCategory.index.messages.saved'));
    }

    /**
     * Display the specified UtensilCategory.
     * GET|HEAD /utensilCategories/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var UtensilCategory $utensilCategory */
        $utensilCategory = $this->repository->find($id);

        if (empty($utensilCategory)) {
            return Response::json(ResponseUtil::makeError(trans('utensilsCategory.index.messages.failed')), 400);
        }

        return $this->sendResponse($utensilCategory->toArray(), trans('utensilsCategory.index.messages.success'));
    }

    /**
     * Update the specified UtensilCategory in storage.
     * PUT/PATCH /utensilCategories/{id}
     *
     * @param  int $id
     * @param UpdateUtensilCategoryAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUtensilCategoryAPIRequest $request)
    {
        $input = $request->all();

        /** @var UtensilCategory $utensilCategory */
        $utensilCategory = $this->repository->find($id);

        if (empty($utensilCategory)) {
            return Response::json(ResponseUtil::makeError(trans('utensilsCategory.index.messages.failed')), 400);
        }

        $utensilCategory = $this->repository->update($input, $id);

        return $this->sendResponse($utensilCategory->toArray(), trans('utensilsCategory.index.messages.updated'));
    }

    /**
     * Remove the specified UtensilCategory from storage.
     * DELETE /utensilCategories/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var UtensilCategory $utensilCategory */
        $utensilCategory = $this->repository->find($id);

        if (empty($utensilCategory)) {
            return Response::json(ResponseUtil::makeError(trans('utensilsCategory.index.messages.failed')), 400);
        }

        $utensilCategory->delete();

        return $this->sendResponse($id, trans('utensilsCategory.index.messages.destroy'));
    }
}
