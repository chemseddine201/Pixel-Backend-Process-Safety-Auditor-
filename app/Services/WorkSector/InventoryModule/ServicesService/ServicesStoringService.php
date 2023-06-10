<?php
        namespace App\Services\WorkSector\InventoryModule\Services;

        use App\Services\CoreServices\CRUDServices\CRUDServiceTypes\StoringServices\SingleRowStoringService;
        // use App\Http\Requests\WorkSector\InventoryModule\Services\ServicesRequest;
        use App\Models\WorkSector\InventoryModule\Services\Services;
        class ServicesStoringService extends SingleRowStoringService
        {

            protected function getDefinitionCreatingFailingErrorMessage(): string
            {
                return 'Failed To Create The Given Services !';
            }

            protected function getDefinitionCreatingSuccessMessage(): string
            {
                return 'The Services Has Been Created Successfully !';
            }

            protected function getDefinitionModelClass(): string
            {
                return Services::class;
            }

            protected function getRequestClass(): string
            {
                return ServicesRequest::class;
            }

        }

        