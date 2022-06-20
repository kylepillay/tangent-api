<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SeniorityRating extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['title'];

    /**
     * Get employee this skill belongs to.
     */
    public function skill(): BelongsTo
    {
        return $this->belongsTo(Skill::class);
    }
}
