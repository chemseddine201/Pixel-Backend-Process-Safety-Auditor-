<?php

namespace App\Services\CoreServices\CRUDServices\CRUDServiceTypes\StoringServices;

use App\Services\CoreServices\CRUDServices\DataWriterCRUDService;
use Exception;

abstract class SingleRowStoringService extends StoringService
{
    /**
     * @return DataWriterCRUDService
     * @throws Exception
     */
    protected function createConveniently(): DataWriterCRUDService
    {
        /**
         * Make Files Ready To Upload And Setting Files Names Into Data Array To Storing It In Database
         * During The Model Creation's Operation
         */
        $this->data = $this->MakeModelFilesReadyToUpload($this->data , new $this->definitionModelClass());

        $model = $this->createDefinitionModel($this->data);
        return $this->HandleModelRelationships($this->data, $model);
    }
}
