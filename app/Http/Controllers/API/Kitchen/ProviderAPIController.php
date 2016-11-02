<?php

namespace App\Http\Controllers\API\Kitchen;

use App\Http\Requests\API\Kitchen\CreateProviderAPIRequest;
use App\Http\Requests\API\Kitchen\UpdateProviderAPIRequest;
use App\Models\Kitchen\Provider;
use App\Repositories\Kitchen\ProviderRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ProviderController
 * @package App\Http\Controllers\API\Kitchen
 */

class ProviderAPIController extends InfyOmBaseController
{
    /** @var  ProviderRepository */
    private $providerRepository;

    public function __construct(ProviderRepository $providerRepo)
    {
        $this->providerRepository = $providerRepo;
    }

    /**
     * Display a listing of the Provider.
     * GET|HEAD /providers
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if (request()->has('sort')) {
            list($sortCol, $sortDir) = explode('|', request()->sort);
            if ( \Schema::hasColumn('providers', $sortCol) ) 
              $query = Provider::orderBy($sortCol, $sortDir);
            else
              $query = Provider::sortBy($sortCol, $sortDir);
        } else {
            $query = Provider::orderBy('created_at', 'asc');
        }

        if ($request->exists('filter')) {
            $query->search("{$request->filter}");
        }

        $perPage = request()->has('per_page') ? (int) request()->per_page : null;
        return response()->json($query->paginate($perPage));    
    }

    /**
     * Store a newly created Provider in storage.
     * POST /providers
     *
     * @param CreateProviderAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateProviderAPIRequest $request)
    {
        $input = $request->all();

        $providers = $this->providerRepository->create($input);

        return $this->sendResponse($providers->toArray(), 'Provider saved successfully');
    }

    /**
     * Display the specified Provider.
     * GET|HEAD /providers/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Provider $provider */
        $provider = $this->providerRepository->find($id);

        if (empty($provider)) {
            return Response::json(ResponseUtil::makeError('Provider not found'), 400);
        }

        return $this->sendResponse($provider->toArray(), 'Provider retrieved successfully');
    }

    /**
     * Update the specified Provider in storage.
     * PUT/PATCH /providers/{id}
     *
     * @param  int $id
     * @param UpdateProviderAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProviderAPIRequest $request)
    {
        $input = $request->all();

        /** @var Provider $provider */
        $provider = $this->providerRepository->find($id);

        if (empty($provider)) {
            return Response::json(ResponseUtil::makeError('Provider not found'), 400);
        }

        $provider = $this->providerRepository->update($input, $id);

        return $this->sendResponse($provider->toArray(), 'Provider updated successfully');
    }

    /**
     * Remove the specified Provider from storage.
     * DELETE /providers/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Provider $provider */
        $provider = $this->providerRepository->find($id);

        if (empty($provider)) {
            return Response::json(ResponseUtil::makeError('Provider not found'), 400);
        }

        $provider->delete();

        return $this->sendResponse($id, 'Provider deleted successfully');
    }

    public function availableItems(Request $request, $id = null)
    {
        $items = $this->providerRepository->availableItems($id)->toArray();
        if (empty($items))
            return Response::json(ResponseUtil::makeError('Items not found'), 400);        
        return $this->sendResponse($items, 'Provider retrieve successfully');
    }
}
