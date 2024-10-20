<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyHasServiceMdl extends Model
{
    use HasFactory, Notifiable, HasRoles,SoftDeletes;

    protected $table = 'companies_has_services';

    protected $primaryKey = 'id';

    protected $fillable = [
    'company_id',
    'service_id',
    'price',
    'photo',
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