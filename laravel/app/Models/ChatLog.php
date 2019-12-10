<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChatLog extends Model
{
    public function dealing() {
        return $this->belongsTo('App\Models\dealing');
    }

    protected $table = 'chat_logs';
    protected $dates = ['deleted_at'];

}
