<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTypeAPIRequest;
use App\Http\Requests\API\UpdateTypeAPIRequest;
use App\Models\Type;
use App\Repositories\TypeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TypeController
 * @package App\Http\Controllers\API
 */

class TypeAPIController extends InfyOmBaseController
{
    /** @var  TypeRepository */
    private $typeRepository;

    public function __construct(TypeRepository $typeRepo)
    {
        $this->typeRepository = $typeRepo;
    }

    /**
     * Display a listing of the Type.
     * GET|HEAD /types
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if (request()->has('sort')) {
            list($sortCol, $sortDir) = explode('|', request()->sort);
            $query = Type::orderBy($sortCol, $sortDir);
        } else {
            $query = Type::orderBy('created_at', 'asc');
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
     * Store a newly created Type in storage.
     * POST /types
     *
     * @param CreateTypeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTypeAPIRequest $request)
    {
        $input = $request->all();

        $types = $this->typeRepository->create($input);

        return $this->sendResponse($types->toArray(), 'Type saved successfully');
    }

    /**
     * Display the specified Type.
     * GET|HEAD /types/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Type $type */
        $type = $this->typeRepository->find($id);

        if (empty($type)) {
            return Response::json(ResponseUtil::makeError('Type not found'), 400);
        }

        return $this->sendResponse($type->toArray(), 'Type retrieved successfully');
    }

    /**
     * Update the specified Type in storage.
     * PUT/PATCH /types/{id}
     *
     * @param  int $id
     * @param UpdateTypeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTypeAPIRequest $request)
    {
        $input = $request->all();

        /** @var Type $type */
        $type = $this->typeRepository->find($id);

        if (empty($type)) {
            return Response::json(ResponseUtil::makeError('Type not found'), 400);
        }

        $type = $this->typeRepository->update($input, $id);

        return $this->sendResponse($type->toArray(), 'Type updated successfully');
    }

    /**
     * Remove the specified Type from storage.
     * DELETE /types/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Type $type */
        $type = $this->typeRepository->find($id);

        if (empty($type)) {
            return Response::json(ResponseUtil::makeError('Type not found'), 400);
        }

        $type->delete();

        return $this->sendResponse($id, 'Type deleted successfully');
    }
}
