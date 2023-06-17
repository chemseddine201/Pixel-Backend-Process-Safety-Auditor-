<?php

namespace App\Services\WorkSector\SystemConfigurationServices\DropdownLists\ReportNameService;

use App\Models\WorkSector\SystemConfigurationModels\ReportName;
use App\Http\Requests\WorkSector\SystemConfigurations\ReportName\StoringReportNameRequest;
use App\Services\CoreServices\CRUDServices\CRUDServiceTypes\StoringServices\SingleRowStoringService;

class ReportNameStoringService extends SingleRowStoringService
{

    protected function getDefinitionCreatingFailingErrorMessage(): string
    {
        return 'Failed To Create The Given ReportName !';
    }

    protected function getDefinitionCreatingSuccessMessage(): string
    {
        return 'The ReportName Has Been Created Successfully !';
    }

    protected function getDefinitionModelClass(): string
    {
        return ReportName::class;
    }

    protected function getRequestClass(): string
    {
        return StoringReportNameRequest::class;
    }
}
