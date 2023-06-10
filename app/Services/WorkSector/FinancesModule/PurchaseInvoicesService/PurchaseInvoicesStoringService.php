<?php

namespace App\Services\WorkSector\FinancesModule\PurchaseInvoices;

use App\Services\CoreServices\CRUDServices\CRUDServiceTypes\StoringServices\SingleRowStoringService;
// use App\Http\Requests\WorkSector\FinancesModule\PurchaseInvoices\PurchaseInvoicesRequest;
use App\Models\WorkSector\FinanceModule\PurchaseInvoices\PurchaseInvoice;

class PurchaseInvoicesStoringService extends SingleRowStoringService
{

    protected function getDefinitionCreatingFailingErrorMessage(): string
    {
        return 'Failed To Create The Given PurchaseInvoices !';
    }

    protected function getDefinitionCreatingSuccessMessage(): string
    {
        return 'The PurchaseInvoices Has Been Created Successfully !';
    }

    protected function getDefinitionModelClass(): string
    {
        return PurchaseInvoice::class;
    }

    protected function getRequestClass(): string
    {
        return PurchaseInvoicesRequest::class;
    }
}
