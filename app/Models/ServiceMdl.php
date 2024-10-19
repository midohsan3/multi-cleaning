<?php

namespace App\Models;

use App\Models\CompanyMdl;
use App\Models\ActivityMdl;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceMdl extends Model
{
    use HasFactory, Notifiable, SoftDeletes, HasRoles;

    protected $table = 'services';

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
    public function activities_service(){
        return $this->belongsToMany(ActivityMdl::class,'activity_has-services','service_id','activity_id');
    }
    /*
    =========================
    = COMPANIES
    =========================
    */
    public function companies_service(){
        return $this->belongsToMany(CompanyMdl::class,'companies_has_services','service_id','company_id');
    }
    /*
    =========================
    =
    =========================
    */
}