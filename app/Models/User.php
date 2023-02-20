<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Admin\Schedule;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'middle_name',
        'last_name',
         'phone_number',
         'birth_date',
         'age',
        'email',
        'role_id',
        'isRoleAccepted',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

      public function appointment(){
        return $this->HasOne(Appointment::class);
    }

        public function schedule(){
        return $this->HasOne(Schedule::class);
    }

public function organization() {
    
        return $this->belongsToMany(Organization::class , 'organization_user', 'user_id', 'organization_id')->withPivot("isAccepted");
    }


    public function post(){
        return $this->hasMany(Post::class);
    }


     public function attendance(){
        return $this->HasOne(Attendance::class);
    }

    public static function scopeSearch($query, $term){

        $term= "%$term%";

        $query->where(function ($query) use ($term){
            $query->where('name', 'like', $term )->orwhere('email', 'like', $term )->orwhere('middle_name', 'like', $term )->orwhere('last_name', 'like', $term );
        });

    }

      public function organization_leader()
    {
        return $this->hasOne(OrganizationLeader::class);
    }

    
      public function organization_user()
    {
        return $this->hasOne(OrganizationUser::class);
    }

    
}
