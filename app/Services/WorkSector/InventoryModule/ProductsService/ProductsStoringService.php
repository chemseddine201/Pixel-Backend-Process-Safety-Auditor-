<?php
        namespace App\Services\WorkSector\InventoryModule\Products;

        use App\Services\CoreServices\CRUDServices\CRUDServiceTypes\StoringServices\SingleRowStoringService;
        // use App\Http\Requests\WorkSector\InventoryModule\Products\ProductsRequest;
        use App\Models\WorkSector\InventoryModule\Products\Products;
        class ProductsStoringService extends SingleRowStoringService
        {

            protected function getDefinitionCreatingFailingErrorMessage(): string
            {
                return 'Failed To Create The Given Products !';
            }

            protected function getDefinitionCreatingSuccessMessage(): string
            {
                return 'The Products Has Been Created Successfully !';
            }

            protected function getDefinitionModelClass(): string
            {
                return Products::class;
            }

            protected function getRequestClass(): string
            {
                return ProductsRequest::class;
            }

        }

        