<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Commodity extends Model
{
    use SoftDeletes;

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function dealings() {
        return $this->hasOne('App\Models\Dealing');
    }

    protected $fillable = [
        'user_id', 'name', 'price', 'image_path', 'description', 'is_dealings',
    ];

    protected $table = 'commodities';
    protected $dates = ['deleted_at'];
}
