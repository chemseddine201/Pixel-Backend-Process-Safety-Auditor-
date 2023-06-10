<?php
        namespace App\Services\WorkSector\FinancesModule\SalesInvoices;

        use App\Services\CoreServices\CRUDServices\CRUDServiceTypes\StoringServices\SingleRowStoringService;
        // use App\Http\Requests\WorkSector\FinancesModule\SalesInvoices\SaleInvoicesRequest;
        use App\Models\WorkSector\FinancesModule\SalesInvoices\SaleInvoices;
        class SaleInvoicesStoringService extends SingleRowStoringService
        {

            protected function getDefinitionCreatingFailingErrorMessage(): string
            {
                return 'Failed To Create The Given SaleInvoices !';
            }

            protected function getDefinitionCreatingSuccessMessage(): string
            {
                return 'The SaleInvoices Has Been Created Successfully !';
            }

            protected function getDefinitionModelClass(): string
            {
                return SaleInvoices::class;
            }

            protected function getRequestClass(): string
            {
                return SaleInvoicesRequest::class;
            }

        }

        