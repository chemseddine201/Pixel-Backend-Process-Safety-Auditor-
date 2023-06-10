<?php
        namespace App\Services\WorkSector\HRModule\TiemsheetDiscussion;

        use App\Services\CoreServices\CRUDServices\CRUDServiceTypes\StoringServices\SingleRowStoringService;
        // use App\Http\Requests\WorkSector\HRModule\TiemsheetDiscussion\TiemsheetDiscussionRequest;
        use App\Models\WorkSector\HRModule\TiemsheetDiscussion\TiemsheetDiscussion;
        class TiemsheetDiscussionStoringService extends SingleRowStoringService
        {

            protected function getDefinitionCreatingFailingErrorMessage(): string
            {
                return 'Failed To Create The Given TiemsheetDiscussion !';
            }

            protected function getDefinitionCreatingSuccessMessage(): string
            {
                return 'The TiemsheetDiscussion Has Been Created Successfully !';
            }

            protected function getDefinitionModelClass(): string
            {
                return TiemsheetDiscussion::class;
            }

            protected function getRequestClass(): string
            {
                return TiemsheetDiscussionRequest::class;
            }

        }

        