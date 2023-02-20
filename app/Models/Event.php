<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
      protected $table = 'events';
  protected $fillable = ['EventName', 'EventDateFrom', 'EventDateTo', 'Details', 'Picture', 'Attendance', 'Post'];


      public static function scopeSearch($query, $term){

        $term= "%$term%";

        $query->where(function ($query) use ($term){
            $query->where('EventName', 'like', $term );
        });



    }

}
