<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePresentationAPIRequest;
use App\Http\Requests\API\UpdatePresentationAPIRequest;
use App\Models\Presentation;
use App\Repositories\PresentationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Http\Controllers\API\DataFormat;

/**
 * Class PresentationController
 * @package App\Http\Controllers\API
 */

class PresentationAPIController extends InfyOmBaseController
{
    use DataFormat;

    /** @var  PresentationRepository */
    private $repository;

    public function __construct(PresentationRepository $presentationRepo)
    {
        $this->repository = $presentationRepo;
    }

    /**
     * Display a listing of the Presentation.
     * GET|HEAD /presentations
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if (request()->has('sort')) {
            list($sortCol, $sortDir) = explode('|', request()->sort);
            $query = Presentation::orderBy($sortCol, $sortDir);
        } else {
            $query = Presentation::orderBy('created_at', 'asc');
        }

        if ($request->exists('filter')) {
            $query->search("{$request->filter}");
        }

        $perPage = request()->has('per_page') ? (int) request()->per_page : null;
        return response()->json($query->paginate($perPage));    
    }

    /**
     * Store a newly created Presentation in storage.
     * POST /presentations
     *
     * @param CreatePresentationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePresentationAPIRequest $request)
    {
        $input = $request->all();

        $presentations = $this->repository->create($input);

        return $this->sendResponse($presentations->toArray(), 'Presentation saved successfully');
    }

    /**
     * Display the specified Presentation.
     * GET|HEAD /presentations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Presentation $presentation */
        $presentation = $this->repository->find($id);

        if (empty($presentation)) {
            return Response::json(ResponseUtil::makeError('Presentation not found'), 400);
        }

        return $this->sendResponse($presentation->toArray(), 'Presentation retrieved successfully');
    }

    /**
     * Update the specified Presentation in storage.
     * PUT/PATCH /presentations/{id}
     *
     * @param  int $id
     * @param UpdatePresentationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePresentationAPIRequest $request)
    {
        $input = $request->all();

        /** @var Presentation $presentation */
        $presentation = $this->repository->find($id);

        if (empty($presentation)) {
            return Response::json(ResponseUtil::makeError('Presentation not found'), 400);
        }

        $presentation = $this->repository->update($input, $id);

        return $this->sendResponse($presentation->toArray(), 'Presentation updated successfully');
    }

    /**
     * Remove the specified Presentation from storage.
     * DELETE /presentations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Presentation $presentation */
        $presentation = $this->repository->find($id);

        if (empty($presentation)) {
            return Response::json(ResponseUtil::makeError('Presentation not found'), 400);
        }

        $presentation->delete();

        return $this->sendResponse($id, 'Presentation deleted successfully');
    }
}
