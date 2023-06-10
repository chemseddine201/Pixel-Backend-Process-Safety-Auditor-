<?php
        namespace App\Services\WorkSector\HRModule\EmployeesExpenses;

        use App\Services\CoreServices\CRUDServices\CRUDServiceTypes\StoringServices\SingleRowStoringService;
        // use App\Http\Requests\WorkSector\HRModule\EmployeesExpenses\EmployeesExpensesRequest;
        use App\Models\WorkSector\HRModule\EmployeesExpenses\EmployeesExpenses;
        class EmployeesExpensesStoringService extends SingleRowStoringService
        {

            protected function getDefinitionCreatingFailingErrorMessage(): string
            {
                return 'Failed To Create The Given EmployeesExpenses !';
            }

            protected function getDefinitionCreatingSuccessMessage(): string
            {
                return 'The EmployeesExpenses Has Been Created Successfully !';
            }

            protected function getDefinitionModelClass(): string
            {
                return EmployeesExpenses::class;
            }

            protected function getRequestClass(): string
            {
                return EmployeesExpensesRequest::class;
            }

        }

        