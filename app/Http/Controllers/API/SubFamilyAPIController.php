<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSubFamilyAPIRequest;
use App\Http\Requests\API\UpdateSubFamilyAPIRequest;
use App\Models\SubFamily;
use App\Repositories\SubFamilyRepository;
use App\Repositories\FamilyRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class SubFamilyController
 * @package App\Http\Controllers\API
 */

class SubFamilyAPIController extends InfyOmBaseController
{
    /** @var  SubFamilyRepository */
    private $subFamilyRepository;

    public function __construct(SubFamilyRepository $subFamilyRepo, FamilyRepository $familyRepo)
    {
        $this->subFamilyRepository = $subFamilyRepo;
        $this->familyRepository = $familyRepo;
    }

    /**
     * Display a listing of the SubFamily.
     * GET|HEAD /subFamilies
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if (request()->has('sort')) {
            list($sortCol, $sortDir) = explode('|', request()->sort);
            $query = SubFamily::orderBy($sortCol, $sortDir);
        } else {
            $query = SubFamily::orderBy('created_at', 'asc');
        }

        if ($request->exists('filter')) {
            $value = "%{$request->filter}%";

            $query->where(function($q) use($value) {
                $q->where("name", "like", $value);
                
                $q->orWhereHas('family', function($q) use ($value){
                    $q->where('families.name', "like", $value);      
                });              
            });                      
        }

        $perPage = request()->has('per_page') ? (int) request()->per_page : null;
        return response()->json($query->paginate($perPage));    
    }

    /**
     * Store a newly created SubFamily in storage.
     * POST /subFamilies
     *
     * @param CreateSubFamilyAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSubFamilyAPIRequest $request)
    {
        $input = $request->all();

        $subFamilies = $this->subFamilyRepository->create($input);

        \Debugbar::info($subFamilies);

        return $this->sendResponse($subFamilies->toArray(), 'SubFamily saved successfully');
    }

    /**
     * Display the specified SubFamily.
     * GET|HEAD /subFamilies/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var SubFamily $subFamily */
        $subFamily = $this->subFamilyRepository->find($id);

        if (empty($subFamily)) {
            return Response::json(ResponseUtil::makeError('SubFamily not found'), 400);
        }

        return $this->sendResponse($subFamily->toArray(), 'SubFamily retrieved successfully');
    }

    /**
     * Update the specified SubFamily in storage.
     * PUT/PATCH /subFamilies/{id}
     *
     * @param  int $id
     * @param UpdateSubFamilyAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSubFamilyAPIRequest $request)
    {
        $input = $request->all();

        /** @var SubFamily $subFamily */
        $subFamily = $this->subFamilyRepository->find($id);

        if (empty($subFamily)) {
            return Response::json(ResponseUtil::makeError('SubFamily not found'), 400);
        }

        $subFamily = $this->subFamilyRepository->update($input, $id);

        return $this->sendResponse($subFamily->toArray(), 'SubFamily updated successfully');
    }

    /**
     * Remove the specified SubFamily from storage.
     * DELETE /subFamilies/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var SubFamily $subFamily */
        $subFamily = $this->subFamilyRepository->find($id);

        if (empty($subFamily)) {
            return Response::json(ResponseUtil::makeError('SubFamily not found'), 400);
        }

        $subFamily->delete();

        return $this->sendResponse($id, 'SubFamily deleted successfully');
    }

    public function byFamily(Request $request, $familyId = null)
    {
        if(!$familyId) 
            return $this->index($request);

        $family = $this->familyRepository->find($familyId);

        if (empty($family))
            return Response::json(ResponseUtil::makeError('Family not found'), 400);

        if (empty($family->subFamilies))
            return Response::json(ResponseUtil::makeError('Subfamilies not found'), 400);

        return $this->sendResponse($family->subFamilies->toArray(), 'Subfamilies retrieved successfully');
    }
}
