<?php

namespace App\Models;

use Guysolamour\Administrable\Models\BaseModel;
use Guysolamour\Administrable\Traits\ModelTrait;
use Guysolamour\Administrable\Traits\DraftableTrait;
use Guysolamour\Administrable\Traits\HasUuid;

class Question extends BaseModel
{
    use ModelTrait;
    use DraftableTrait;
    use HasUuid;



    // The attributes that are mass assignable.
    public $fillable = ['title', 'uuid', 'answer', 'online'];

    // The attributes that should be cast to native types.
    protected $casts = [
        'online' => 'boolean',
    ];








    // add relation methods below



}
