<?php

namespace App\Models;

use App\Models\Admin\Schedule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{

    protected $table = 'appointments';

    protected $fillable = ['user_id', 'start_time','endTime', 'status', 'ocassion_id', 'message', 'isFollow', 'follow_number', 'previous'];
    use HasFactory;

      public function user(){
        return $this->belongsTo(User::class);
    }

        public function ocassion(){
        return $this->belongsTo(Ocassion::class);
    }

            public function schedule(){
        return $this->hasOne(Schedule::class);
    }



        public static function scopeSearch($query, $term){

        $term= "%$term%";

        $query->where(function ($query) use ($term){
           $query->orWhereHas('user', function($query) use($term) { $query->where('name','LIKE',$term)->orWhere('middle_name','LIKE',$term)->orWhere('last_name','LIKE',$term);
  });
        });



    }
}
