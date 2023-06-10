<?php
        namespace App\Services\WorkSector\HRModule\EmployeesExpenses;

        use App\Services\WorkSector\WorkSectorUpdatingService;

        class EmployeesExpensesUpdatingService extends WorkSectorUpdatingService
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
        