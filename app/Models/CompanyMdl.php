<?php

namespace App\Models;

use App\Models\User;
use App\Models\CountryMdl;
use App\Models\PackageMdl;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompanyMdl extends Model
{
   use HasFactory, Notifiable, SoftDeletes, HasRoles;

   protected $table = 'countries';

   protected $primaryKey = 'id';

   protected $fillable = [
   'code',
   'user_id',
   'country_id',
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
   = PACKAGE
   =========================
   */
  public function package_company(){
    return $this->belongsTo(PackageMdl::class, 'package_id');
  }
   /*
   =========================
   =
   =========================
   */
}