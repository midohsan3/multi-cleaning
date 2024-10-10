<?php

namespace App\Models;

use App\Models\FeatureMdl;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PackageMdl extends Model
{
   use HasFactory, Notifiable, SoftDeletes, HasRoles;

   protected $table = 'packages';

   protected $primaryKey = 'id';

   protected $fillable = [
   'name_en',
   'name_ar',
   'price',
   'old_price',
   'status',
   ];

   protected $data = ['deleted_at'];

   /*
   =========================
   RELATIONS
   =========================
   */
  public function features_package(){
    return $this->belongsToMany(FeatureMdl::class,'package_has_features','package_id','feature_id');
  }

   /*
   =========================
   =
   =========================
   */
}
