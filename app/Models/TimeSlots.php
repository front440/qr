<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeSlots extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'id_slot',
        'id_group',
        'id_school_year',
        'id_subject',
        'id_teacher',
        'updated_at',
        'created_at',
    ];
}
