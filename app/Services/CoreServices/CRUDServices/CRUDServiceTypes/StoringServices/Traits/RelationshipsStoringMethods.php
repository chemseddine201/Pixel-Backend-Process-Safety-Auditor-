<?php

namespace App\Services\CoreServices\CRUDServices\CRUDServiceTypes\StoringServices\Traits;

use App\Services\CoreServices\CRUDServices\RelationshipsHandlers\RelationshipsHandler;
use App\Services\CoreServices\CRUDServices\RelationshipsHandlers\RelationshipsHandlerTypes\RelationshipsCreationHandler;

trait RelationshipsStoringMethods
{

    protected function initRelationshipsHandler(): RelationshipsHandler
    {
        if(!$this->relationshipsHandler){$this->relationshipsHandler = new RelationshipsCreationHandler();}
        return $this->relationshipsHandler;
    }

    protected function CreateModelRelationships(array $dataRow) : self
    {
        if($this->DoesItOwnRelationships() || $this->DoesItParticipateToRelationships())
        {
            $this->relationshipsHandler->CreateModelRelationships( $dataRow );
        }
        return $this;
    }
}
