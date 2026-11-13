<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Instructor extends Model
{
    protected $fillable = ['name', 'contact_number', 'email', 'specialization', 'address'];

    public function feeRecords(): HasMany { return $this->hasMany(FeeRecord::class); }
}
