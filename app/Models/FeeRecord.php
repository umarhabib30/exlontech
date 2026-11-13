<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FeeRecord extends Model
{
    protected $fillable = [
        'student_name', 'contact_number', 'id_card_number', 'father_name',
        'father_contact_number', 'address', 'date_of_birth', 'degree',
        'date_of_admission', 'course_duration', 'course_id', 'instructor_id',
        'total_fee', 'amount_paid',
    ];

    protected $casts = [
        'date_of_birth' => 'date', 'date_of_admission' => 'date',
        'total_fee' => 'decimal:2', 'amount_paid' => 'decimal:2',
    ];

    public function course(): BelongsTo { return $this->belongsTo(Course::class); }
    public function instructor(): BelongsTo { return $this->belongsTo(Instructor::class); }
    public function monthlyPayments(): HasMany { return $this->hasMany(FeeMonthlyPayment::class); }
}
