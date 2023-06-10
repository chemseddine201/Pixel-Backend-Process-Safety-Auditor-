<?php
        namespace App\Services\WorkSector\FinancesModule\PurchaseInvoices;

        use App\Services\CoreServices\CRUDServices\CRUDServiceTypes\UpdatingServices\UpdatingService;

        class PurchaseInvoicesUpdatingService extends UpdatingService
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
        