<?php
        namespace App\Services\WorkSector\FinancesModule\TaxesAndInsurances\InsuranceExpense;

        use App\Services\CoreServices\CRUDServices\CRUDServiceTypes\UpdatingServices\UpdatingService;

        class InsuranceExpenseUpdatingService extends UpdatingService
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
        