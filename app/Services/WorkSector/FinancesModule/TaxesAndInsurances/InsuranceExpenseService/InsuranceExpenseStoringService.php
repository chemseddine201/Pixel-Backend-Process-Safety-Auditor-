<?php
        namespace App\Services\WorkSector\FinancesModule\TaxesAndInsurances\InsuranceExpense;

        use App\Services\CoreServices\CRUDServices\CRUDServiceTypes\StoringServices\SingleRowStoringService;
        // use App\Http\Requests\WorkSector\FinancesModule\TaxesAndInsurances\InsuranceExpense\InsuranceExpenseRequest;
        use App\Models\WorkSector\FinancesModule\TaxesAndInsurances\InsuranceExpense\InsuranceExpense;
        class InsuranceExpenseStoringService extends SingleRowStoringService
        {

            protected function getDefinitionCreatingFailingErrorMessage(): string
            {
                return 'Failed To Create The Given InsuranceExpense !';
            }

            protected function getDefinitionCreatingSuccessMessage(): string
            {
                return 'The InsuranceExpense Has Been Created Successfully !';
            }

            protected function getDefinitionModelClass(): string
            {
                return InsuranceExpense::class;
            }

            protected function getRequestClass(): string
            {
                return InsuranceExpenseRequest::class;
            }

        }

        