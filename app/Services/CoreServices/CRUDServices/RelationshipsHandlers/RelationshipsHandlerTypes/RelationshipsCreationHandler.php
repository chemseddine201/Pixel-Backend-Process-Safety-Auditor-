<?php

namespace App\Services\CoreServices\CRUDServices\RelationshipsHandlers\RelationshipsHandlerTypes;

use App\Services\CoreServices\CRUDServices\RelationshipsHandlers\RelationshipsHandler;
use Exception;
use Illuminate\Database\Eloquent\Model;

class RelationshipsCreationHandler extends RelationshipsHandler
{
    /**
     * @throws Exception
     */
    protected function OwnedRelationshipRowsChildClassHandling(Model $model , string $relationship , array $relationshipMultipleRows , string $primaryKeyName = ""): bool
    {
        foreach ($relationshipMultipleRows as $row)
        {
            $ModelRelationshipRelatedModel = $this->getModelRelationshipRelatedModel($model , $relationship);
            $row = $this->ModelFilesHandling($ModelRelationshipRelatedModel , $row);
            if(empty($row)){ continue; }
            $model = $model->{$relationship}()->create($row);
            $this->HandleModelOwnedRelationships(  $row ,  $model);
        }
        return true;
    }

    protected function ParticipatingRelationshipRowsChildClassHandling(Model $model , string $relationshipName ,array $ParticipatingRelationshipMultipleRows ): bool
    {
        $model->{$relationshipName}()->attach( $ParticipatingRelationshipMultipleRows );
        return true;
    }
}
