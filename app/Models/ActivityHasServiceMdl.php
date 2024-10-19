<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ActivityHasServiceMdl extends Model
{
    use HasFactory, Notifiable, HasRoles;

    protected $table = 'activity_has-services';

    protected $fillable = [
    'activity_id',
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
