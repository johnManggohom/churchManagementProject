<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{

    protected $table = 'attendance';
    use HasFactory;

        protected $fillable = [
        'user_id',
        'activity_id',
        'attendence_date',
        'attendence_status',
        'employee_id'
    ];


    public function activity(){
        return $this->belongsTo(Activity::class);
    }
     public function user(){
        return $this->belongsTo(User::class);
    }

    public function employee(){
        return $this->belongsTo(User::class);
    }


    



        public static function scopeSearch($query, $term){

        $term= "%$term%";

        $query->where(function ($query) use ($term){
           $query->orWhereHas('user', function($query) use($term) { $query->where('name','LIKE',$term)->orWhere('middle_name','LIKE',$term)->orWhere('last_name','LIKE',$term);
  });
        });



    }
}


