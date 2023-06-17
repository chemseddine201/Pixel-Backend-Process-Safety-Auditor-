<?php

namespace App\Http\Requests\WorkSector\SystemConfigurations\ReportName;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\WorkSector\SystemConfigurations\StoringRequest;

class StoringReportNameRequest extends StoringRequest
{
    protected function getTableName(): string
    {
        return "report_names";
    }

    public function messages()
    {
        return array_merge(
            parent::messages(),
            [
                "items.*.name.required" => "Report Name's Name Has Not Been Sent !",
                "items.*.name.string" => "Report Name's Name Must Be String !",
                "items.*.name.max" => "Report Name's Name Must Not Be Greater THan 255 Character !",
                "items.*.status.boolean" => "Report Name's Status  Must Be Boolean",

                //single Validation Error Messages
                "name.unique" => "Report Name's Name  Is Already Stored In Our Database !"
            ]
        );
    }
}
