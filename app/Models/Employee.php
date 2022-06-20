<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['employee_id', 'first_name', 'last_name', 'contact_number', 'email_address', 'date_of_birth', 'street_address', 'city', 'postal_code', 'country'];
}
