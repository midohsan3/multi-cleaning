<?php

namespace App\Models;

use App\Models\User;
use App\Models\CountryMdl;
use App\Models\NationalityMdl;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PersonMdl extends Model
{
    use HasFactory, Notifiable, SoftDeletes, HasRoles;

    protected $table = 'persons';

    protected $primaryKey = 'id';

    protected $fillable = [
    'user_id',
    'nationality_id',
    'county_id',
    'gender',
    'birth_date',
    'located_at',
    'specialist',
    'cv',
    'status',
    ];

    protected $data = ['deleted_at'];

    /*
    =========================
    RELATIONS
    =========================
    */
    /*
    =========================
    = USER
    =========================
    */
    public function user_person(){
        return $this->belongsTo(User::class, 'user_id');
    }
    /*
    =========================
    = NATIONALITY
    =========================
    */
    public function nationality_person(){
        return $this->belongsTo(NationalityMdl::class, 'nationality_id');
    }
    /*
    =========================
    = COUNTRY
    =========================
    */
    public function country_person(){
        return $this->belongsTo(CountryMdl::class, 'country_id');
    }
    /*
    =========================
    =
    =========================
    */
}