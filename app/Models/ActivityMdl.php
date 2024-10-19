<?php

namespace App\Models;

use App\Models\CompanyMdl;
use App\Models\ServiceMdl;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ActivityMdl extends Model
{
    use HasFactory, Notifiable, SoftDeletes, HasRoles;

    protected $table = 'activities';

    protected $primaryKey = 'id';

    protected $fillable = [
    'name_en',
    'name_ar',
    'status',
    'description_en',
    'description_ar',
    'keywords_en',
    'keywords_ar',
    'og_image',
    ];

    protected $data = ['deleted_at'];

    /*
    =========================
    RELATIONS
    =========================
    */
    public function countries_activity(){
        return $this->belongsToMany(CountryMdl::class,'countries_has_activities','activity_id','country_id');
    }

    /*
    =========================
    = SERVICES
    =========================
    */
    public function services_activity(){
        return $this->belongsToMany(ServiceMdl::class,'activity_has-services','activity_id','service_id');
    }
    /*
    =========================
    = COMPANIES
    =========================
    */
    public function companies_activity(){
        return $this->hasMany(CompanyMdl::class, 'activity_id');
    }
    /*
    =========================
    =
    =========================
    */
}