<?php
        namespace App\Services\WorkSector\HRModule\EmployeesTimesheet;

        use App\Services\WorkSector\WorkSectorUpdatingService;

        class EmployeesTimesheetUpdatingService extends WorkSectorUpdatingService
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
        