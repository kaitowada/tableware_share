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
        return $this->belongsTo('App\Models\Commodity');
    }

    public function chat_logs() {
        return $this->hasMany('App\Models\ChatLog');
    }

    protected $table = 'dealings';
    protected $dates = ['deleted_at'];
}
