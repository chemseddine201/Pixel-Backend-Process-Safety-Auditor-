<?php

namespace App\Services\CoreServices\CRUDServices\CRUDServiceTypes\StoringServices\Traits;

trait DataArrayProcessorMethods
{

    protected function getRowFillableValues(array $sourceDataRow): array
    {
        $fillableValues = [];
        foreach ($this->fillableColumns as $column) {
            if (isset($sourceDataRow[$column])) {
                $fillableValues[$column] = $sourceDataRow[$column];
            }
        }
        return $fillableValues;
    }

}
