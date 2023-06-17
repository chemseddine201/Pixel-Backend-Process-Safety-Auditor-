<?php

namespace App\Models\WorkSector\SystemConfigurationModels;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Services\CoreServices\CRUDServices\Interfaces\OwnsRelationships;

class ReportName extends Model implements OwnsRelationships

{
    use HasFactory;
    protected $fillable = [
        "name",
        "status",
    ];
    public function reportQuestions()
    {
        return $this->hasMany(reportQuestion::class);
    }
    public function getOwnedRelationshipNames(): array
    {
        return ["reportQuestions"];
    }
}
