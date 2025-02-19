<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyJob extends Model
{
    protected $guarded = ['id'];

    public function company() {
        return $this->belongsTo(Company::class);
    }

    public function applicationJob() {
        return $this->hasMany(ApplicationJob::class);
    }
}
