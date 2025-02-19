<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicationJob extends Model
{
    protected $guarded = ['id'];

    public function jobPosting() {
        return $this->belongsTo(CompanyJob::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
