<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChatLog extends Model
{
    use SoftDeletes;

    public function dealing() {
        return $this->belongsTo('App\Models\dealing');
    }
    protected $table = 'chat_logs';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'dealing_id', 'user_id', 'text',
    ];

}
