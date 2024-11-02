<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\PersonMdl;
use App\Models\CompanyMdl;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_name',
        'phone',
        'profile_pic',
    ];

    protected $data = ['deleted_at'];

    //protected $guard_name = 'web';

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
        'password' => 'hashed',
    ];

    /*
    =========================
    RELATIONS
    =========================
    */
    public function company_user(){
    return $this->hasOne(CompanyMdl::class, 'user_id');
    }
    /*
    =========================
    = PERSON
    =========================
    */
    public function person_user(){
        return $this->hasOne(PersonMdl::class, 'user_id');
    }
    /*
    =========================
    =
    =========================
    */
}
