<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FreelancerService extends Model
{
    protected $guarded = ['id'];

    public function general() {
        return $this->belongsTo(General::class);
    }
}
