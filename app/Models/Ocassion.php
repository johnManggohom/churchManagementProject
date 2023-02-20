<?php

namespace App\Models;

use App\Models\Admin\Schedule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ocassion extends Model
{

    protected $table = 'ocassion';
     protected $fillable = ['name'];
    use HasFactory;

      public function appointment(){
        return $this->hasOne(Appointment::class);
    }
        public function schedule(){
        return $this->hasOne(Schedule::class);
    }

    public static function scopeSearch($query, $term){

        $term= "%$term%";

        $query->where(function ($query) use ($term){
            $query->where('name', 'like', $term );
        });



    }
}
