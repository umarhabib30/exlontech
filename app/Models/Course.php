<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    protected $fillable = ['name', 'duration', 'fee_amount', 'description'];
    protected $casts = ['fee_amount' => 'decimal:2'];

    public function feeRecords(): HasMany { return $this->hasMany(FeeRecord::class); }
}
