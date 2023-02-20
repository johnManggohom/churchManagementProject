<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{

    protected $table = 'organizations';

    protected $fillable = ['name'];
    use HasFactory;

        public static function scopeSearch($query, $term){

        $term= "%$term%";

        $query->where(function ($query) use ($term){
            $query->where('name', 'like', $term );
        });



    }


       public function user(){
return $this->belongstoMany(User::class, 'organization_user', 'organization_id', 'user_id');
    }

          public function organization_leader()
    {
        return $this->hasOne(OrganizationLeader::class);
    }
}
