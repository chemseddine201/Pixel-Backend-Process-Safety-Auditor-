<?php
        namespace App\Services\WorkSector\FinancesModule\TaxesAndInsurances\TaxExpense;

        use App\Services\CoreServices\CRUDServices\CRUDServiceTypes\StoringServices\SingleRowStoringService;
        // use App\Http\Requests\WorkSector\FinancesModule\TaxesAndInsurances\TaxExpense\TaxExpenseRequest;
        use App\Models\WorkSector\FinancesModule\TaxesAndInsurances\TaxExpense\TaxExpense;
        class TaxExpenseStoringService extends SingleRowStoringService
        {

            protected function getDefinitionCreatingFailingErrorMessage(): string
            {
                return 'Failed To Create The Given TaxExpense !';
            }

            protected function getDefinitionCreatingSuccessMessage(): string
            {
                return 'The TaxExpense Has Been Created Successfully !';
            }

            protected function getDefinitionModelClass(): string
            {
                return TaxExpense::class;
            }

            protected function getRequestClass(): string
            {
                return TaxExpenseRequest::class;
            }

        }

        