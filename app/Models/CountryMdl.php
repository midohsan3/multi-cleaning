<?php

namespace App\Models;

use App\Models\CompanyMdl;
use App\Models\ActivityMdl;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CountryMdl extends Model
{
    use HasFactory, Notifiable, SoftDeletes, HasRoles;

    protected $table = 'countries';

    protected $primaryKey = 'id';

    protected $fillable = [
    'name_en',
    'name_ar',
    'country_code',
    'phone_code',
    'currency_code',
    'flag',
    'status',
    ];

    protected $data = ['deleted_at'];

    /*
    =========================
    RELATIONS
    =========================
    */
    public function activities_country(){
        return $this->belongsToMany(ActivityMdl::class,'countries_has_activities','country_id','activity_id');
    }
    /*
    =========================
    = COMPANY
    =========================
    */
    public function company_country(){
        return $this->hasMany(CompanyMdl::class, 'country_id');
    }
    /*
    =========================
    = \
    =========================
    */
}