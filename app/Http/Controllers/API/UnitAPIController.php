<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateUnitAPIRequest;
use App\Http\Requests\API\UpdateUnitAPIRequest;
use App\Models\Unit;
use App\Repositories\UnitRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Http\Controllers\API\DataFormat;

/**
 * Class UnitController
 * @package App\Http\Controllers\API
 */

class UnitAPIController extends InfyOmBaseController
{
    use DataFormat;

    /** @var  UnitRepository */
    private $repository;

    public function __construct(UnitRepository $unitRepo)
    {
        $this->repository = $unitRepo;
    }

    /**
     * Display a listing of the Unit.
     * GET|HEAD /units
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if (request()->has('sort')) {
            list($sortCol, $sortDir) = explode('|', request()->sort);
            if ( \Schema::hasColumn('units', $sortCol) ) 
              $query = Unit::orderBy($sortCol, $sortDir);
            else
              $query = Unit::sortBy($sortCol, $sortDir);
        } else {
            $query = Unit::orderBy('created_at', 'asc');
        }

        if ($request->exists('filter')) {
            $query->search("{$request->filter}");
        }

        $perPage = request()->has('per_page') ? (int) request()->per_page : null;
        return response()->json($query->paginate($perPage));    
    }

    /**
     * Store a newly created Unit in storage.
     * POST /units
     *
     * @param CreateUnitAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateUnitAPIRequest $request)
    {
        $input = $request->all();

        $units = $this->repository->create($input);

        return $this->sendResponse($units->toArray(), 'Unit saved successfully');
    }

    /**
     * Display the specified Unit.
     * GET|HEAD /units/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Unit $unit */
        $unit = $this->repository->find($id);

        if (empty($unit)) {
            return Response::json(ResponseUtil::makeError('Unit not found'), 400);
        }

        return $this->sendResponse($unit->toArray(), 'Unit retrieved successfully');
    }

    /**
     * Update the specified Unit in storage.
     * PUT/PATCH /units/{id}
     *
     * @param  int $id
     * @param UpdateUnitAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUnitAPIRequest $request)
    {
        $input = $request->all();

        /** @var Unit $unit */
        $unit = $this->repository->find($id);

        if (empty($unit)) {
            return Response::json(ResponseUtil::makeError('Unit not found'), 400);
        }

        $unit = $this->repository->update($input, $id);

        return $this->sendResponse($unit->toArray(), 'Unit updated successfully');
    }

    /**
     * Remove the specified Unit from storage.
     * DELETE /units/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Unit $unit */
        $unit = $this->repository->find($id);

        if (empty($unit)) {
            return Response::json(ResponseUtil::makeError('Unit not found'), 400);
        }

        $unit->delete();

        return $this->sendResponse($id, 'Unit deleted successfully');
    }
}
