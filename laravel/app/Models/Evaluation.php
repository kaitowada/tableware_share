<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evaluation extends Model
{
    use SoftDeletes;

    public function evaluation() {
        return $this->belongsTo('App\Models\evaluation');
    }

    protected $table = 'evaluations';
    protected $dates = ['deleted_at'];
}
