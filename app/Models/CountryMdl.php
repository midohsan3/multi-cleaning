<?php

namespace App\Models;

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
    =
    =========================
    */
}
