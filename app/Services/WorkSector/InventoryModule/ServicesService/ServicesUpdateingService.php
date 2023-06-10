<?php
        namespace App\Services\WorkSector\InventoryModule\Services;

        use App\Services\WorkSector\WorkSectorUpdatingService;

        class ServicesUpdatingService extends WorkSectorUpdatingService
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
        