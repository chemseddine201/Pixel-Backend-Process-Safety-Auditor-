<?php
        namespace App\Services\WorkSector\HRModule\EmployeesTimesheet;

        use App\Services\CoreServices\CRUDServices\CRUDServiceTypes\StoringServices\SingleRowStoringService;
        // use App\Http\Requests\WorkSector\HRModule\EmployeesTimesheet\EmployeesTimesheetRequest;
        use App\Models\WorkSector\HRModule\EmployeesTimesheet\EmployeesTimesheet;
        class EmployeesTimesheetStoringService extends SingleRowStoringService
        {

            protected function getDefinitionCreatingFailingErrorMessage(): string
            {
                return 'Failed To Create The Given EmployeesTimesheet !';
            }

            protected function getDefinitionCreatingSuccessMessage(): string
            {
                return 'The EmployeesTimesheet Has Been Created Successfully !';
            }

            protected function getDefinitionModelClass(): string
            {
                return EmployeesTimesheet::class;
            }

            protected function getRequestClass(): string
            {
                return EmployeesTimesheetRequest::class;
            }

        }

        