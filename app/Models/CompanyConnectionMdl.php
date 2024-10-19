<?php

namespace App\Models;

use App\Models\CompanyMdl;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompanyConnectionMdl extends Model
{
    use HasFactory, Notifiable, SoftDeletes, HasRoles;

    protected $table = 'company_connections';

    protected $primaryKey = 'id';

    protected $fillable = [
    'company_id',
    'channel',
    'info',
    ];

    protected $data = ['deleted_at'];

    /*
    =========================
    RELATIONS
    =========================
    */
    public function company_connection(){
    return $this->belongsTo(CompanyMdl::class, 'company_id');
    }
    /*
    =========================
    =
    =========================
    */
}