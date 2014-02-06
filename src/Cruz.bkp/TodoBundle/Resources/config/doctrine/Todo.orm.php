<?php

use Doctrine\ORM\Mapping\ClassMetadataInfo;

$metadata->setInheritanceType(ClassMetadataInfo::INHERITANCE_TYPE_NONE);
$metadata->setChangeTrackingPolicy(ClassMetadataInfo::CHANGETRACKING_DEFERRED_IMPLICIT);
$metadata->mapField(array(
   'fieldName' => 'id',
   'type' => 'integer',
   'id' => true,
   'columnName' => 'id',
  ));
$metadata->mapField(array(
   'columnName' => 'text',
   'fieldName' => 'text',
   'type' => 'text',
  ));
$metadata->mapField(array(
   'columnName' => 'added',
   'fieldName' => 'added',
   'type' => 'datetime',
  ));
$metadata->mapField(array(
   'columnName' => 'completed',
   'fieldName' => 'completed',
   'type' => 'boolean',
  ));
$metadata->setIdGeneratorType(ClassMetadataInfo::GENERATOR_TYPE_AUTO);