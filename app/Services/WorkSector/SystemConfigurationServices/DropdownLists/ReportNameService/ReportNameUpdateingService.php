<?php

namespace App\Services\WorkSector\SystemConfigurationServices\DropdownLists\ReportName;

use App\Services\WorkSector\WorkSectorUpdatingService;

class ReportNameUpdatingService extends WorkSectorUpdatingService
{

    protected function getDefinitionUpdatingFailingErrorMessage(): string
    {
        return '';
    }

    protected function getDefinitionUpdatingSuccessMessage(): string
    {
        return '';
    }

    protected function getRequestClass(): string
    {
        return '';
    }
}
