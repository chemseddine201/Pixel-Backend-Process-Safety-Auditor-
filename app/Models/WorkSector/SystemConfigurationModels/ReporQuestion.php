<?php

namespace App\Models\WorkSector\SystemConfigurationModels;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\WorkSector\SystemConfigurationModels\ReportName;

class ReporQuestion extends Model
{
    use HasFactory;
    protected $fillable = [
        'report_name_id',
        'question_id',
        'evidence',
        'evidence_attachment',
        'finding',
        'finding_attachment',
        'score',
        'conformity_level',
        'recommendations',
        'recommendations_attachment',
        'process_saftey_element'
    ];


    public function reportName()
    {
        return $this->belongsTo(ReportName::class);
    }
}
