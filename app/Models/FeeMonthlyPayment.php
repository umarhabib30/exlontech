<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FeeMonthlyPayment extends Model
{
    protected $fillable = ['billing_month', 'amount_due', 'amount_paid', 'paid_at'];

    protected $casts = [
        'billing_month' => 'date', 'paid_at' => 'date',
        'amount_due' => 'decimal:2', 'amount_paid' => 'decimal:2',
    ];

    public function feeRecord(): BelongsTo { return $this->belongsTo(FeeRecord::class); }
}
