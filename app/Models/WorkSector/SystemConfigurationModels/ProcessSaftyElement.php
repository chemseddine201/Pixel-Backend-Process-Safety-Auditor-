<?php

namespace App\Models\WorkSector\SystemConfigurationModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcessSaftyElement extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
    ];
}
