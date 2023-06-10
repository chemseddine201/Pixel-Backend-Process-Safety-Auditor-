<?php
        namespace App\Services\WorkSector\InventoryModule\Products;

        use App\Services\WorkSector\WorkSectorUpdatingService;

        class ProductsUpdatingService extends WorkSectorUpdatingService
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
        