<?php

namespace App\Services\CoreServices\CRUDServices\RelationshipsHandlers;


use App\Models\WorkSector\ClientsModule\ClientAttachment;
use App\Services\CoreServices\CRUDServices\FilesOperationsHandlers\FilesUploadingHandler;
use App\Services\CoreServices\CRUDServices\Interfaces\OwnsRelationships;
use App\Services\CoreServices\CRUDServices\Interfaces\ParticipatesToRelationships;
use App\Services\CoreServices\CRUDServices\RelationshipsHandlers\Traits\OwnedRelationshipMethods;
use App\Services\CoreServices\CRUDServices\RelationshipsHandlers\Traits\ParticipatingRelationshipMethods;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Arr;

abstract class RelationshipsHandler
{
    use OwnedRelationshipMethods , ParticipatingRelationshipMethods;


    protected function isItMultiRowedArray(mixed $array): bool
    {
        return Arr::isList($array) && is_array(Arr::first($array));
    }

    protected function getRelationshipRequestDataArray(array $dataRow ,string $relationship ) : array | null
    {
        if(array_key_exists($relationship , $dataRow) && is_array($dataRow[$relationship]) )
        {
            return $dataRow[$relationship];
        }
        return null;
    }

    protected function getModelRelationshipRelatedModel(Model $model , string $relationship) : Model
    {
        /**@var Relation $relationOb*/
        $relationOb = $model->{$relationship}();
        return $relationOb->getRelated();
    }

    protected function getRelationshipFillables(array $dataRow,  Model $model , string $relationship) : array | null
    {
        $fillables = [];
        $model = $this->getModelRelationshipRelatedModel($model , $relationship);
        foreach ($model->getFillable() as $column)
        {
            if(array_key_exists($column , $dataRow))
            {
                $fillables[$column] = $dataRow[$column] ;
            }
        }
        return empty($fillables) ? null : [ $fillables ];
    }
    protected function getRelationshipRequestData(array $dataRow, string $relationship , Model $model) : array | null
    {
        $RelationshipRequestDataArray = $this->getRelationshipRequestDataArray($dataRow, $relationship);

        if(!$RelationshipRequestDataArray)
        {
            /**
             * If There Is No Relationship key is set ... The Relationship Model Fillables 's Columns Will Be Got
             * Or
             * Null Be Returned Because We Don't Have Anything To Create
             */
            return $this->getRelationshipFillables($dataRow , $model , $relationship);
        }
        return $this->isItMultiRowedArray($RelationshipRequestDataArray) ? $RelationshipRequestDataArray : [$RelationshipRequestDataArray];
    }


    /**
     * @param Model|null $model
     * @param string $NestedRelationshipName
     * @return Relation|null
     *
     * This Is Needed For Creating Operation
     */
//    protected function getModelNestedRelationshipRelationObject(?Model $model , string $NestedRelationshipName ) : Relation | null
//    {
//        $relationshipSeriesArray = $this->getNestedRelationshipSeriesArray($NestedRelationshipName);
//        if(!$relationshipSeriesArray){return null;}
//
//        foreach ($relationshipSeriesArray as $relationship)
//        {
//            if(!$model){return null;}
//            if($model->{$relationship})
//            {
//                $model = $model->{$relationship}();
//                continue;
//            }
//            return $model;
//        }
//        /** $model Value Will Be one of types : Relation | Collection | Model | null */
//        return $model;
//    }

//    protected function getModelNestedRelationshipObject(?Model $model , string $NestedRelationshipName ) : Collection | Model | null
//    {
//        $relationshipSeriesArray = $this->getNestedRelationshipSeriesArray($NestedRelationshipName);
//        if(!$relationshipSeriesArray){return null;}
//
//        foreach ($relationshipSeriesArray as $relationship)
//        {
//            if(!$model){return null;}
//            $model = $model->{$relationship};
//        }
//        /** $model Value Will Be one of types : Relation | Collection | Model | null */
//        return $model;
//    }


    static public function DoesItOwnRelationships(Model $model): bool
    {
        return $model instanceof OwnsRelationships;
    }
    static public function DoesItParticipateToRelationships(Model $model): bool
    {
        return $model instanceof ParticipatesToRelationships;
    }

    /**
     * @param array $dataRow
     * @param  Model $model
     * @return RelationshipsHandler
     *
     * Note : There Is No Validation Operation Will Be Done For Relationships
     * All Relationship Validation Operations is Done When THe Model Had Been Validated
     * So If The Relationship Storing Operation Is Multi Creation Operation and you need to check if any
     * of values is exists or unique in Database ... you need to separate Relationship's validation Operation
     * from Model's Validation Operation
     */
    public function HandleModelRelationships(array $dataRow , Model $model ): RelationshipsHandler
    {
        return $this->HandleModelOwnedRelationships( $dataRow ,  $model)
                    ->HandleModelParticipatingRelationships( $dataRow ,  $model);
    }
}
