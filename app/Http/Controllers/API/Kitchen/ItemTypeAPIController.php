<?php

namespace App\Http\Controllers\API\Kitchen;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\AppBaseController as InfyOmBaseController;

use App\Http\Controllers\API\DataFormat;

use App\Repositories\Kitchen\ItemTypeRepository;

use App\Http\Requests\API\Kitchen\CreateItemTypeAPIRequest;

class ItemTypeAPIController extends InfyOmBaseController
{
	use DataFormat;

	private $repository;

	public function __construct(ItemTypeRepository $itemTypeRepository)
	{
		$this->repository = $itemTypeRepository;
	}

    public function index()
    {
    	return "ItemTypeAPIController";
    }

    /**
     * Store a newly created Family in storage.
     * POST /families
     *
     * @param CreateFamilyAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateItemTypeAPIRequest $request)
    {
        $input = $request->all();

        $itemType = $this->repository->create($input);

        return $this->sendResponse($itemType->toArray(), 'Tipo de item agregado correctamente');
    }

}
