<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Dealing extends Model
{
    use SoftDeletes;

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function commodity() {
        return $this->hasOne('App\Models\Commodity');
    }

    protected $table = 'evaluations';
    protected $dates = ['deleted_at'];
}
