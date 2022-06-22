<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Employee extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['employee_id', 'first_name', 'last_name', 'contact_number', 'email_address', 'date_of_birth', 'street_address', 'city', 'postal_code', 'country'];

    /**
     * Get the skills for this employee.
     */
    public function skills(): HasMany
    {
        return $this->hasMany(Skill::class);
    }

    protected static function boot() {
        parent::boot();

        static::creating(function ($employee) {
            $employee->employee_id = Str::random(2).random_int(1000, 9999);
        });
    }
}

