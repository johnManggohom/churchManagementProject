<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecificAttendance extends Model
{
    protected $table = 'specific_attendance';
    public $fillable = ['activity_id', 'attendance_day'];
    use HasFactory;
}
