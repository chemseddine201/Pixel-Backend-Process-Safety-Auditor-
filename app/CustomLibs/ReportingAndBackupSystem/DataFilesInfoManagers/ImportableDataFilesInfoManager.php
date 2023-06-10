<?php

namespace App\CustomLibs\ReportingAndBackupSystem\DataFilesInfoManagers;

class ImportableDataFilesInfoManager extends DataFilesInfoManager
{

    public const ValidityIntervalDayCount  = 30;


    protected function getInfoArrayKey(): string
    {
        return  "ImportableDataFilesInfo";
    }

    /**
     * @param string $fileName
     * @param string $filePassword
     * @param int $timestamp_expiration
     * @return $this
     */
    public function addNewFileInfo(string $fileName, string $filePassword , int $timestamp_expiration = -1): self
    {
        if($timestamp_expiration < 0){$timestamp_expiration = now()->addDays($this::ValidityIntervalDayCount)->getTimestamp() ;}
        $this->InfoData[$fileName] = [
            "filePassword" => $filePassword ,
            "timestamp_expiration" => $timestamp_expiration
        ];
        return $this;
    }

    public function getFilePassword(string $fileName) : string
    {
        return isset($this->InfoData[$fileName]) ? $this->InfoData[$fileName]["filePassword"] : "";
    }

}
