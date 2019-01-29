<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chart extends Model
{

    protected $table = 'chart';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'account', 'name', 'type', 'parent_id', 'has_child'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
