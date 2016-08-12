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

/**
 * Class UtensilCategoryController
 * @package App\Http\Controllers\API\Kitchen
 */

class UtensilCategoryAPIController extends InfyOmBaseController
{
    /** @var  UtensilCategoryRepository */
    private $utensilCategoryRepository;

    public function __construct(UtensilCategoryRepository $utensilCategoryRepo)
    {
        $this->utensilCategoryRepository = $utensilCategoryRepo;
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
            $query = UtensilCategory::orderBy($sortCol, $sortDir);
        } else {
            $query = UtensilCategory::orderBy('created_at', 'asc');
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

        $utensilCategories = $this->utensilCategoryRepository->create($input);

        return $this->sendResponse($utensilCategories->toArray(), 'UtensilCategory saved successfully');
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
        $utensilCategory = $this->utensilCategoryRepository->find($id);

        if (empty($utensilCategory)) {
            return Response::json(ResponseUtil::makeError('UtensilCategory not found'), 400);
        }

        return $this->sendResponse($utensilCategory->toArray(), 'UtensilCategory retrieved successfully');
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
        $utensilCategory = $this->utensilCategoryRepository->find($id);

        if (empty($utensilCategory)) {
            return Response::json(ResponseUtil::makeError('UtensilCategory not found'), 400);
        }

        $utensilCategory = $this->utensilCategoryRepository->update($input, $id);

        return $this->sendResponse($utensilCategory->toArray(), 'UtensilCategory updated successfully');
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
        $utensilCategory = $this->utensilCategoryRepository->find($id);

        if (empty($utensilCategory)) {
            return Response::json(ResponseUtil::makeError('UtensilCategory not found'), 400);
        }

        $utensilCategory->delete();

        return $this->sendResponse($id, 'UtensilCategory deleted successfully');
    }
}
