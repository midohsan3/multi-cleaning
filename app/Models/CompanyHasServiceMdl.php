<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompanyHasServiceMdl extends Model
{
    use HasFactory, Notifiable, HasRoles;

    protected $table = 'companies_has_services';

    protected $fillable = [
    'company_id',
    'service_id',
    ];

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
