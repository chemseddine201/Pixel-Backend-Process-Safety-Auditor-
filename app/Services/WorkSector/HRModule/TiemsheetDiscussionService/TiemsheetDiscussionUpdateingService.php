<?php
        namespace App\Services\WorkSector\HRModule\TiemsheetDiscussion;

        use App\Services\WorkSector\WorkSectorUpdatingService;

        class TiemsheetDiscussionUpdatingService extends WorkSectorUpdatingService
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
        