<?php

namespace App\CustomLibs\ReportingAndBackupSystem\DataFilesInfoManagers;


use Illuminate\Support\Facades\File;

abstract class DataFilesInfoManager
{

    protected string $DataFilesInfoJSONPath ;
    protected array $DataFilesInfoContent = [];
    protected array $InfoData = [];
    public const ValidityIntervalDayCount  = 3;

    abstract protected function getInfoArrayKey() : string;

    public function __construct()
    {
        $this->setDataFilesInfoPath()->openJSONFileToUpdate();
    }

    /**
     * @return $this
     */
    protected function setDataFilesInfoPath(): self
    {
        $this->DataFilesInfoJSONPath = __DIR__ . "/DataFilesInfo.json";
        return $this;
    }

    /**
     * @return $this
     */
    protected function setJSONFileContent() : self
    {
        $this->DataFilesInfoContent = json_decode(File::get($this->DataFilesInfoJSONPath) , true) ?? [];
        return $this;
    }

    protected function openJSONFileToUpdate() : self
    {
        $this->setJSONFileContent();
        $this->InfoData = $this->DataFilesInfoContent[$this->getInfoArrayKey()] ?? [];
        return $this;
    }


    protected function IsFileExpired(int $fileExpirationTimestamp) : bool
    {
        return time() >= $fileExpirationTimestamp;
    }

    public function getExpiredFileNames(): array
    {
        $fileNames = [];
        foreach ($this->InfoData as $fileName => $fileInfo)
        {
            if($this->IsFileExpired($fileInfo["timestamp_expiration"]))
            {
                $fileNames[] = $fileName;
            }
        }
        return $fileNames;
    }

    /**
     * @param string $fileName
     * @return $this
     */
    public function removeFileInfo(string $fileName) : self
    {
        if( isset( $this->InfoData[$fileName]) )
        {
            unset($this->InfoData[$fileName]);
        }
        return $this;
    }


    public function removeExpiredFilesInfo(array $fileNamesArray = []) : self
    {
        if(empty($fileNamesArray)){$fileNamesArray = $this->getExpiredFileNames();}

        foreach ($fileNamesArray as $fileName)
        {
            if( isset( $this->InfoData[$fileName]) )
            {
                unset($this->InfoData[$fileName]);
            }
        }
        return $this;
    }

    protected function restartData() : void
    {
        $this->InfoData = [];
        $this->DataFilesInfoContent = [];
    }

    public function SaveJSONFileChanges() : bool
    {
         $this->setJSONFileContent();
        /**Setting Data After Updating */
        $this->DataFilesInfoContent[$this->getInfoArrayKey()] = $this->InfoData;

        $fileContent = json_encode($this->DataFilesInfoContent , JSON_PRETTY_PRINT);
        $this->restartData();

        return File::put($this->DataFilesInfoJSONPath , $fileContent);
    }

}
