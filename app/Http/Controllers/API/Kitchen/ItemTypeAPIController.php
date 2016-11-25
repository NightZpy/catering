<?php

namespace App\Http\Controllers\API\Kitchen;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\AppBaseController as InfyOmBaseController;


use App\Http\Controllers\API\DataFormat;


class ItemTypeAPIController extends InfyOmBaseController
{
	use DataFormat;    

    public function index()
    {
    	return "ItemTypeAPIController";
    }
}
