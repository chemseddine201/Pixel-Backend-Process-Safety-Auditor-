<?php

namespace App\Models\WorkSector\ClientsModule;

use App\Interfaces\HasStorageFolder;
use App\Services\CoreServices\CRUDServices\Interfaces\MustUploadModelFiles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClientAttachment extends Model implements HasStorageFolder , MustUploadModelFiles
{
    use HasFactory;
    protected $fillable = [
        'type',
        'path',
        'attach_number',
        'client_id'
    ];

    public function client() : BelongsTo
    {
        return $this->belongsTo(Client::class,"client_id");
    }

    public function getModelFileInfoArray(): array
    {
        return  [
                  [ "RequestKeyName" => "path" ]
                ];
    }

    public function getDocumentsStorageFolderName(): string
    {
        return "ClientsAttachment";
        return  $this->client?->getDocumentsStorageFolderName() . "/" . $this->type;
    }
}
