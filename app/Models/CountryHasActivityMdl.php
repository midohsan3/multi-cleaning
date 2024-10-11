<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CountryHasActivityMdl extends Model
{
    use HasFactory, Notifiable, HasRoles;

    protected $table = 'features';

    protected $primaryKey = 'id';

    protected $fillable = [
    'country_id',
    'activity_id',
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