<?php

namespace App\Services\CoreServices\CRUDServices\Interfaces;

interface MustUploadModelFiles
{

    /**
     * Must Return An Array Like :
     * [
     *   [ "RequestKeyName" => "" ,  "FolderName" => "" , "ModelPathPropName" => "" , "multipleUploading" => false]
     * ]
     * @return array
     */
    public function getModelFileInfoArray() : array;

}
