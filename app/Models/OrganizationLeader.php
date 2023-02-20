<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationLeader extends Model
{
    use HasFactory;

    protected $table = 'organization_leader';

    protected $fillable = ['user_id', 'organization_id', 'is_leader'];

     public function user()
    {
        return $this->belongsTo(User::class);
    }

        public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}
