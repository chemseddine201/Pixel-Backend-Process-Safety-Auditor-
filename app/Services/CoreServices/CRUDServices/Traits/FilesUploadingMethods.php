<?php

namespace App\Services\CoreServices\CRUDServices\Traits;

use App\Exceptions\JsonException;
use App\Services\CoreServices\CRUDServices\FilesOperationsHandlers\FilesUploadingHandler;
use Exception;
use Illuminate\Database\Eloquent\Model;

trait FilesUploadingMethods
{
    /**
     * @return FilesUploadingHandler|null
     */
    public function getFilesUploadingHandler(): ?FilesUploadingHandler
    {
        return $this->filesUploadingHandler;
    }

    protected function initFilesUploadingHandler() : FilesUploadingHandler | null
    {
        if(!$this->filesUploadingHandler){$this->filesUploadingHandler = FilesUploadingHandler::singleton();}
        return $this->filesUploadingHandler;
    }

    /**
     * @param array $dataRow
     * @param  Model $model
     * @return array
     * @throws Exception
     */
    public function MakeModelFilesReadyToUpload(array $dataRow ,  Model $model ) : array
    {
        if(!FilesUploadingHandler::MustUploadModelFiles($model)){return $dataRow;}
        return $this->initFilesUploadingHandler()->MakeModelFilesReadyToUpload($dataRow, $model);
    }

    /**
     * @throws JsonException
     */
    protected function uploadFiles() : bool
    {
        if($this->filesUploadingHandler)
        {
            return $this->filesUploadingHandler->uploadFiles();
        }
        if($this->relationshipsHandler)
        {
            return $this->relationshipsHandler->uploadRelationshipsFiles();
        }
        return true;
    }

}
