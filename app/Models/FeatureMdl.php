<?php

namespace App\Models;

use App\Models\PackageMdl;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FeatureMdl extends Model
{
    use HasFactory, Notifiable, SoftDeletes, HasRoles;

    protected $table = 'features';

    protected $primaryKey = 'id';

    protected $fillable = [
    'name_en',
    'name_ar',
    'status',
    ];

    protected $data = ['deleted_at'];

    /*
    =========================
    RELATIONS
    =========================
    */
    public function packages_Feature(){
        return $this->belongsToMany(PackageMdl::class,'package_has_features','feature_id','package_id');
    }

    /*
    =========================
    =
    =========================
    */
}
