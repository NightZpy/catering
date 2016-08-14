<?php
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

trait DataFormat {
    public function selectList(Request $request) {
        return $this->sendResponse($this->repository->selectList()->toArray(), 'Data successfully retrieve');
    }	
}