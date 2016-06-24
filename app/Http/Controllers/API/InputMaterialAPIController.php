<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateInputMaterialAPIRequest;
use App\Http\Requests\API\UpdateInputMaterialAPIRequest;
use App\Models\InputMaterial;
use App\Repositories\InputMaterialRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class InputMaterialController
 * @package App\Http\Controllers\API
 */

class InputMaterialAPIController extends InfyOmBaseController
{
    /** @var  InputMaterialRepository */
    private $inputMaterialRepository;

    public function __construct(InputMaterialRepository $inputMaterialRepo)
    {
        $this->inputMaterialRepository = $inputMaterialRepo;
    }

    /**
     * Display a listing of the InputMaterial.
     * GET|HEAD /inputMaterials
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if (request()->has('sort')) {
            list($sortCol, $sortDir) = explode('|', request()->sort);
            $query = InputMaterial::orderBy($sortCol, $sortDir);
        } else {
            $query = InputMaterial::orderBy('created_at', 'asc');
        }

        if ($request->exists('filter')) {
            $query->where(function($q) use($request) {
                $value = "%{$request->filter}%";
                $q->where("name", "like", $value)
                  ->orWhere("code", "like", $value);
            });
        }

        $perPage = request()->has('per_page') ? (int) request()->per_page : null;
        return response()->json($query->paginate($perPage));    
    }

    /**
     * Store a newly created InputMaterial in storage.
     * POST /inputMaterials
     *
     * @param CreateInputMaterialAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateInputMaterialAPIRequest $request)
    {
        $input = $request->all();

        $inputMaterials = $this->inputMaterialRepository->create($input);

        return $this->sendResponse($inputMaterials->toArray(), 'InputMaterial saved successfully');
    }

    /**
     * Display the specified InputMaterial.
     * GET|HEAD /inputMaterials/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var InputMaterial $inputMaterial */
        $inputMaterial = $this->inputMaterialRepository->find($id);

        if (empty($inputMaterial)) {
            return Response::json(ResponseUtil::makeError('InputMaterial not found'), 400);
        }

        return $this->sendResponse($inputMaterial->toArray(), 'InputMaterial retrieved successfully');
    }

    /**
     * Update the specified InputMaterial in storage.
     * PUT/PATCH /inputMaterials/{id}
     *
     * @param  int $id
     * @param UpdateInputMaterialAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInputMaterialAPIRequest $request)
    {
        $input = $request->all();

        /** @var InputMaterial $inputMaterial */
        $inputMaterial = $this->inputMaterialRepository->find($id);

        if (empty($inputMaterial)) {
            return Response::json(ResponseUtil::makeError('InputMaterial not found'), 400);
        }

        $inputMaterial = $this->inputMaterialRepository->update($input, $id);

        return $this->sendResponse($inputMaterial->toArray(), 'InputMaterial updated successfully');
    }

    /**
     * Remove the specified InputMaterial from storage.
     * DELETE /inputMaterials/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var InputMaterial $inputMaterial */
        $inputMaterial = $this->inputMaterialRepository->find($id);

        if (empty($inputMaterial)) {
            return Response::json(ResponseUtil::makeError('InputMaterial not found'), 400);
        }

        $inputMaterial->delete();

        return $this->sendResponse($id, 'InputMaterial deleted successfully');
    }

    /**
     * Display a listing of the InputMaterial.
     * GET|HEAD /inputMaterials
     *
     * @param Request $request
     * @return Response
     */
    public function basic(Request $request)
    {
        /** @var InputMaterial $inputMaterial */
        $inputMaterials = $this->inputMaterialRepository->all()->pluck('name', 'id');

        if (empty($inputMaterials)) {
            return Response::json(ResponseUtil::makeError('InputMaterial not found'), 400);
        }

        return Response::json($inputMaterials);    
    }
}
