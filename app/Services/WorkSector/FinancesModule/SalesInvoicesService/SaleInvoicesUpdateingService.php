<?php
        namespace App\Services\WorkSector\FinancesModule\SalesInvoices;

        use App\Services\CoreServices\CRUDServices\CRUDServiceTypes\UpdatingServices\UpdatingService;

        class SaleInvoicesUpdatingService extends UpdatingService
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
        