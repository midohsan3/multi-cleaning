<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PackageHasFeatureMdl extends Model
{
    use HasFactory, Notifiable, HasRoles;

    protected $table = 'features';

    protected $primaryKey = 'id';

    protected $fillable = [
    'package_id',
    'feature_id',
    ];

    protected $data = ['deleted_at'];

    /*
    =========================
    RELATIONS
    =========================
    */

    /*
    =========================
    =
    =========================
    */

}
