<?php

namespace App\Services\CoreServices\CRUDServices\FilesOperationsHandlers;

use App\CustomLibs\CustomFileSystem\CustomFileUploader;
use App\CustomLibs\CustomFileSystem\S3CustomFileSystem\CustomFileUploader\S3CustomFileUploader;
use App\Exceptions\JsonException;
use App\Interfaces\HasStorageFolder;
use App\Services\CoreServices\CRUDServices\Interfaces\MustUploadModelFiles;
use Exception;
use Illuminate\Database\Eloquent\Model;

class FilesUploadingHandler extends FilesHandler
{
    protected ?CustomFileUploader $customFileUploader = null;

    static protected ?FilesUploadingHandler $instance = null ;

    static public function singleton() : FilesHandler
    {
        if(!static::$instance){static::$instance = new static();}
        return static::$instance;
    }

    protected function initCustomFileUploader() : CustomFileUploader
    {
        if(!$this->customFileUploader){$this->customFileUploader = new S3CustomFileUploader();}
        return $this->customFileUploader;
    }

    protected function isFileInfoValidArray(array $fileInfoArray) : bool
    {
        if(!array_key_exists("RequestKeyName" , $fileInfoArray) || $fileInfoArray["RequestKeyName"] == ""){return false;}
        return true;
    }

    protected function checkMultiUploadingStatus(array $fileInfoArray) : array
    {
        if(!array_key_exists("multipleUploading" , $fileInfoArray) || !is_bool($fileInfoArray["multipleUploading"]) )
        {
            $fileInfoArray["multipleUploading"] = false;
        }
        return $fileInfoArray;
    }

    protected function getFileInfoValidArray(array $arrayToCheck) : array
    {
        $filesInfoArray = [];
        foreach( $arrayToCheck as $fileInfoArray)
        {
            if($this->isFileInfoValidArray($fileInfoArray))
            {
                $filesInfoArray[] = $this->checkMultiUploadingStatus($fileInfoArray);;
            }
        }
        return $filesInfoArray;
    }

    protected function getFilePath(?Model $model  , string $column  ) : string
    {
        if($model) { return $model->{$column} ?? ""; }
        return "";
    }

    protected function checkFilePathInfo(array $fileInfo, ?Model $model = null ) : array | null
    {
        if(array_key_exists("ModelPathPropName" , $fileInfo) && $fileInfo["ModelPathPropName"] !== "")
        {
            $filePath = $this->getFilePath($model , $fileInfo["ModelPathPropName"] );
            if($filePath !== "")
            {
                $fileInfo["filePath"] = $filePath;
                $fileInfo["FolderName"] = "/";
                return $fileInfo;
            }
        }
        $fileInfo["filePath"] = "";
        if($model instanceof HasStorageFolder){$fileInfo["FolderName"] = $model->getDocumentsStorageFolderName();}
        return (array_key_exists("FolderName" , $fileInfo) && $fileInfo["FolderName"] !== "") ? $fileInfo : null;
    }

    /**
     * @throws Exception
     */
    protected function MakeFilesReadyToUpload(array $dataRow , array $fileInfo  , ?Model $model = null ) : array
    {
        $fileInfo = $this->checkFilePathInfo($fileInfo , $model);

        /** If There is No Path Info (Folder Name Or File Old Path From File Column's Value In Database )
         * Or
         * File Is Not Found In Data array ( To Avoid Getting An Exception in Updating Operation) .... Nothing Can Be uploaded
         */
        if(!$fileInfo || !array_key_exists($fileInfo["RequestKeyName"] , $dataRow)){return $dataRow;}
        $this->initCustomFileUploader();
        if($fileInfo["multipleUploading"])
        {
            return $this->customFileUploader->processMultiUploadedFile(
                        $dataRow , $fileInfo["RequestKeyName"], $fileInfo["FolderName"] , $fileInfo["filePath"] , true
                    );
        }
        return $this->customFileUploader->processFile($dataRow , $fileInfo["RequestKeyName"], $fileInfo["FolderName"] ,  $fileInfo["filePath"]);
    }

    public function getModelFileInfoArray(Model $model) : array
    {
        if(!$this::MustUploadModelFiles($model)){return [];}

        /** @var MustUploadModelFiles $model */
        return $this->getFileInfoValidArray( $model->getModelFileInfoArray() );
    }

    /**
     * @throws Exception
     */
    public function MakeModelFilesReadyToUpload(array $dataRow ,  Model $model ) : array
    {
        foreach ( $this->getModelFileInfoArray($model) as $fileInfo)
        {
            $dataRow = $this->MakeFilesReadyToUpload(  $dataRow , $fileInfo ,  $model );
        }
        return $dataRow;
    }

    /**
     * @return bool
     * @throws JsonException
     */
    public function uploadFiles() : bool
    {
        /** If No CustomFileHandler Is Set .... No File Added To Be Ready To Upload*/
        if(!$this->customFileUploader){return false;}

        return $this->customFileUploader->uploadFiles();
    }
}
