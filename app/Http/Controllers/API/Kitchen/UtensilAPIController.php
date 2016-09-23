<?php

namespace App\Http\Controllers\API\Kitchen;

use App\Http\Requests\API\Kitchen\CreateUtensilAPIRequest;
use App\Http\Requests\API\Kitchen\UpdateUtensilAPIRequest;
use App\Models\Kitchen\Utensil;
use App\Repositories\Kitchen\UtensilRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class UtensilController
 * @package App\Http\Controllers\API\Kitchen
 */

class UtensilAPIController extends InfyOmBaseController
{
    /** @var  UtensilRepository */
    private $utensilRepository;

    public function __construct(UtensilRepository $utensilRepo)
    {
        $this->utensilRepository = $utensilRepo;
    }

    /**
     * Display a listing of the Utensil.
     * GET|HEAD /utensils
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if (request()->has('sort')) {
            list($sortCol, $sortDir) = explode('|', request()->sort);
            if ( \Schema::hasColumn('utensils', $sortCol) ) 
              $query = Utensil::orderBy($sortCol, $sortDir);
            else
              $query = Utensil::sortBy($sortCol, $sortDir);
        } else {
            $query = Utensil::orderBy('created_at', 'asc');
        }

        if ($request->exists('filter')) {
            $query->search("{$request->filter}");
        }

        $perPage = request()->has('per_page') ? (int) request()->per_page : null;
        return response()->json($query->paginate($perPage));    
    }

    /**
     * Store a newly created Utensil in storage.
     * POST /utensils
     *
     * @param CreateUtensilAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateUtensilAPIRequest $request)
    {
        $input = $request->all();

        $utensils = $this->utensilRepository->create($input);

        return $this->sendResponse($utensils->toArray(), 'Utensil saved successfully');
    }

    /**
     * Display the specified Utensil.
     * GET|HEAD /utensils/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Utensil $utensil */
        $utensil = $this->utensilRepository->find($id);

        if (empty($utensil)) {
            return Response::json(ResponseUtil::makeError('Utensil not found'), 400);
        }

        return $this->sendResponse($utensil->toArray(), 'Utensil retrieved successfully');
    }

    /**
     * Update the specified Utensil in storage.
     * PUT/PATCH /utensils/{id}
     *
     * @param  int $id
     * @param UpdateUtensilAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUtensilAPIRequest $request)
    {
        $input = $request->all();

        /** @var Utensil $utensil */
        $utensil = $this->utensilRepository->find($id);

        if (empty($utensil)) {
            return Response::json(ResponseUtil::makeError('Utensil not found'), 400);
        }

        $utensil = $this->utensilRepository->update($input, $id);

        return $this->sendResponse($utensil->toArray(), 'Utensil updated successfully');
    }

    /**
     * Remove the specified Utensil from storage.
     * DELETE /utensils/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Utensil $utensil */
        $utensil = $this->utensilRepository->find($id);

        if (empty($utensil)) {
            return Response::json(ResponseUtil::makeError('Utensil not found'), 400);
        }

        $utensil->delete();

        return $this->sendResponse($id, 'Utensil deleted successfully');
    }
}
