<?php

namespace App\Http\Controllers\WorkSector\SystemConfigurationControllers\DropdownLists;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\WorkSector\SystemConfigurationResources\DropdownLists\ProcessSaftyElementResource;
use App\Models\WorkSector\SystemConfigurationModels\ProcessSaftyElement;
use Spatie\QueryBuilder\QueryBuilder;

class ProcessSaftyElementController extends Controller
{
    function list(Request $request)
    {
        $data = QueryBuilder::for(ProcessSaftyElement::class)
            ->allowedFilters(['name'])
            ->customOrdering('created_at', 'desc')
            ->select('id', 'name')->get();
        return ProcessSaftyElementResource::collection($data);
    }
}
