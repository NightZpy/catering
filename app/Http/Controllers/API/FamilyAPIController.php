<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateFamilyAPIRequest;
use App\Http\Requests\API\UpdateFamilyAPIRequest;
use App\Models\Family;
use App\Repositories\FamilyRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Http\Controllers\API\DataFormat;

/**
 * Class FamilyController
 * @package App\Http\Controllers\API
 */

class FamilyAPIController extends InfyOmBaseController
{
    use DataFormat;

    /** @var  FamilyRepository */
    private $repository;

    public function __construct(FamilyRepository $familyRepo)
    {
        $this->repository = $familyRepo;
    }

    /**
     * Display a listing of the Family.
     * GET|HEAD /families
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if (request()->has('sort')) {
            list($sortCol, $sortDir) = explode('|', request()->sort);
            $query = Family::orderBy($sortCol, $sortDir);
        } else {
            $query = Family::orderBy('created_at', 'asc');
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
     * Store a newly created Family in storage.
     * POST /families
     *
     * @param CreateFamilyAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateFamilyAPIRequest $request)
    {
        $input = $request->all();

        $families = $this->repository->create($input);

        return $this->sendResponse($families->toArray(), 'Family saved successfully');
    }

    /**
     * Display the specified Family.
     * GET|HEAD /families/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Family $family */
        $family = $this->repository->find($id);

        if (empty($family)) {
            return Response::json(ResponseUtil::makeError('Family not found'), 400);
        }

        return $this->sendResponse($family->toArray(), 'Family retrieved successfully');
    }

    /**
     * Update the specified Family in storage.
     * PUT/PATCH /families/{id}
     *
     * @param  int $id
     * @param UpdateFamilyAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFamilyAPIRequest $request)
    {
        $input = $request->all();

        /** @var Family $family */
        $family = $this->repository->find($id);

        if (empty($family)) {
            return Response::json(ResponseUtil::makeError('Family not found'), 400);
        }

        $family = $this->repository->update($input, $id);

        return $this->sendResponse($family->toArray(), 'Family updated successfully');
    }

    /**
     * Remove the specified Family from storage.
     * DELETE /families/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Family $family */
        $family = $this->repository->find($id);

        if (empty($family)) {
            return Response::json(ResponseUtil::makeError('Family not found'), 400);
        }

        $family->delete();

        return $this->sendResponse($id, 'Family deleted successfully');
    }

    public function checkUnique($field, $value = null)
    {
        return Response::json(['success' => true, 'unique' => false]);
    }
}
