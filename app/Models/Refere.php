<?php

namespace App\Models;

use Guysolamour\Administrable\Models\BaseModel;
use Guysolamour\Administrable\Traits\HasUuid;
use Guysolamour\Administrable\Traits\ModelTrait;
use Spatie\MediaLibrary\HasMedia;
use Guysolamour\Administrable\Traits\MediaableTrait;

class Refere extends BaseModel implements HasMedia
{
    use ModelTrait;
    use MediaableTrait;
    use HasUuid;


    // The attributes that are mass assignable.
    public $fillable = ['name', 'uuid', 'email', 'phone_number', 'job', 'about'];










    // add relation methods below



}
