<?php

namespace App\Models;

use App\Models\User;
use App\Models\CountryMdl;
use App\Models\PackageMdl;
use App\Models\ServiceMdl;
use App\Models\ActivityMdl;
use App\Models\CompanyConnectionMdl;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompanyMdl extends Model
{
   use HasFactory, Notifiable, SoftDeletes, HasRoles;

   protected $table = 'companies';

   protected $primaryKey = 'id';

   protected $fillable = [
   'code',
   'user_id',
   'country_id',
   'activity_id',
   'package_id',
   'url',
   'name_en',
   'name_ar',
   'license',
   'about_en',
   'about_ar',
   'lat',
   'lng',
   'status',
   'register_by',
   ];

   protected $data = ['deleted_at'];

   /*
   =========================
   RELATIONS
   =========================
   */
   public function user_company(){
    return $this->belongsTo(User::class, 'user_id');
   }
   /*
   =========================
   = COUNTRY
   =========================
   */
  public function country_company(){
    return $this->belongsTo(CountryMdl::class,'country_id');
  }
   /*
   =========================
   = ACTIVITY
   =========================
   */
  public function activity_company(){
    return $this->belongsTo(ActivityMdl::class, 'activity_id');
  }
   /*
   =========================
   = PACKAGE
   =========================
   */
  public function package_company(){
    return $this->belongsTo(PackageMdl::class, 'package_id');
  }
   /*
   =========================
   = SERVICES
   =========================
   */
  public function services_company(){
    return $this->belongsToMany(ServiceMdl::class,'companies_has_services','company_id','service_id');
  }
   /*
   =========================
   = CONNECTION
   =========================
   */
  public function connection_company(){
    return $this->hasMany(CompanyConnectionMdl::class,'company_id');
  }
   /*
   =========================
   =
   =========================
   */
}
