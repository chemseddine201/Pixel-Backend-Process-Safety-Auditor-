<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProcessSaftyElementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('process_safty_elements')->insert([
            [
                'name' => 'process_safety_culture',
            ],
            [
                'name' => 'compliance_with_standards',
            ],
            [
                'name' => 'process_safety_competency',
            ],
            [
                'name' => 'involvement_of_employees_and_contractors',
            ],
            [
                'name' => 'consideration_of_stakeholders_needs',
            ],
            [
                'name' => 'process_knowledge',
            ],
            [
                'name' => 'hazard_identification_and_risk_assessment',
            ],
            [
                'name' => 'operating_manuals',
            ],
            [
                'name' => 'working_practices_and_work_permits',
            ],
            [
                'name' => 'inspections_and_maintenance',
            ],
            [
                'name' => 'contractor_management',
            ],
            [
                'name' => 'training',
            ],
            [
                'name' => 'management_of_change',
            ],
            [
                'name' => 'pre_startup_safety_review',
            ],
            [
                'name' => 'operation',
            ],
            [
                'name' => 'emergency_management',
            ],
            [
                'name' => 'investigation',
            ],
            [
                'name' => 'indicators',
            ],
            [
                'name' => 'auditing',
            ],
            [
                'name' => 'management_review',
            ]
        ]);
    }
}
