<?php

namespace App\Http\Requests\WorkSector\AuditTypeModule;

use App\Http\Requests\BaseFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class StoringReporQuestionRequest extends BaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }


    protected function getTableName(): string
    {
        return "report_questions";
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'report_name_id' => 'required|integer|exists:report_names,id',
            'question_id' => 'required|integer',
            'evidence' => 'required|string',
            'evidence_attachment' => 'nullable|string',
            'finding' => 'required|string',
            'finding_attachment' => 'nullable|string',
            'score' => 'required|numeric',
            'conformity_level' => 'required|string',
            'recommendations' => 'nullable|string',
            'recommendations_attachment' => 'nullable|string',
            'process_saftey_element' => 'nullable|string',
        ];
    }
}
