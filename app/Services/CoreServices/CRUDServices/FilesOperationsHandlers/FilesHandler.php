<?php

namespace App\Services\CoreServices\CRUDServices\FilesOperationsHandlers;

use App\Services\CoreServices\CRUDServices\Interfaces\MustUploadModelFiles;
use Illuminate\Database\Eloquent\Model;

abstract class FilesHandler
{

    protected function __construct(){ }
    abstract  static public function singleton() : FilesHandler;

    static public function MustUploadModelFiles(Model $model) : bool
    {
        return $model instanceof MustUploadModelFiles;
    }
}
