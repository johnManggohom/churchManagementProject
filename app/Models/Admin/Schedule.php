<?php

namespace App\Models\Admin;

use App\Models\Appointment;
use App\Models\Ocassion;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $table = 'schedules';

    protected $fillable = ['user_id', 'appointment_id', 'start_time',  'endTime', 'status', 'message','ocassion_id'];


       public function appointment(){
        return $this->belongsTo(Appointment::class);
    }

       public function user(){
        return $this->belongsTo(User::class);
    }
          public function ocassion(){
        return $this->belongsTo(Ocassion::class);
    }

        public static function scopeSearch($query, $term){

        $term= "%$term%";

        $query->where(function ($query) use ($term){
           $query->orWhereHas('user', function($query) use($term) { $query->where('name','LIKE',$term)->orWhere('middle_name','LIKE',$term)->orWhere('last_name','LIKE',$term);
  });
        });



    }
}
