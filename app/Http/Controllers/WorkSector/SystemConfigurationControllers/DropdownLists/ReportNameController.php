<?php

namespace App\Http\Controllers\WorkSector\SystemConfigurationControllers\DropdownLists;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\WorkSector\SystemConfigurationResources\DropdownLists\ReportNameResource;
use App\Models\WorkSector\SystemConfigurationModels\ReportName;
use Spatie\QueryBuilder\QueryBuilder;
use App\Services\WorkSector\SystemConfigurationServices\DropdownLists\ReportNameService\ReportNameStoringService;

class ReportNameController extends Controller
{
    function store(Request $request)
    {
        return (new ReportNameStoringService)->create($request);
    }
    function list(Request $request)
    {
        $data = QueryBuilder::for(ReportName::class)
            ->allowedFilters(['name'])
            ->customOrdering('created_at', 'desc')
            ->select('id', 'name')->get();
        return ReportNameResource::collection($data);
    }
}
