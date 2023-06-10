<?php
        namespace App\Services\WorkSector\FinancesModule\TaxesAndInsurances\TaxExpense;

        use App\Services\CoreServices\CRUDServices\CRUDServiceTypes\UpdatingServices\UpdatingService;

        class TaxExpenseUpdatingService extends UpdatingService
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
        