<?php

namespace App\Http\Controllers\API\Kitchen;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\AppBaseController as InfyOmBaseController;

use App\Http\Controllers\API\DataFormat;

use App\Repositories\Kitchen\ItemTypeRepository;


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
}
