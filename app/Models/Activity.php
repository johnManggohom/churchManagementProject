<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    protected $table = 'activities';
    protected $fillable = ['name', 'description', 'start_time', 'end_time', 'hasAttendance'];

            public static function scopeSearch($query, $term){

        $term= "%$term%";

        $query->where(function ($query) use ($term){
            $query->where('name', 'like', $term );
        });



      
    }


      public function attendance(){
            return $this->hasMany(Attendance::class);
        }

}
