<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationUser extends Model
{
    use HasFactory;
    protected $table = 'organization_user';

        public function user()
    {
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
