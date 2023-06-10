<?php

namespace App\Services\CoreServices\CRUDServices\CRUDServiceTypes\UpdatingServices\Traits;

use App\Services\CoreServices\CRUDServices\RelationshipsHandlers\RelationshipsHandler;
use App\Services\CoreServices\CRUDServices\RelationshipsHandlers\RelationshipsHandlerTypes\RelationshipsUpdatingHandler;
use Illuminate\Database\Eloquent\Model;

trait RelationshipsUpdatingMethods
{

    protected function initRelationshipsHandler(): RelationshipsHandler
    {
        if(!$this->relationshipsHandler){$this->relationshipsHandler = new RelationshipsUpdatingHandler();}
        return $this->relationshipsHandler;
    }

    protected function UpdateModelRelationships(array $dataRow , Model $model) : self
    {
        if($this->DoesItOwnRelationships() || $this->DoesItParticipateToRelationships())
        {
            $this->relationshipsHandler->UpdateModelRelationships( $dataRow ,  $model);
        }
        return $this;
    }

}
