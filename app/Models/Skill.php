<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Skill extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['skill', 'years_experience', 'seniority_rating_id', 'employee_id'];

    /**
     * Get employee this skill belongs to.
     */
    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    /**
     * Get Seniority Rating of this skill.
     */
    public function seniority_rating(): BelongsTo
    {
        return $this->belongsTo(SeniorityRating::class);
    }
}
