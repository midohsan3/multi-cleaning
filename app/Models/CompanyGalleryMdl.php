<?php

namespace App\Models;

use App\Models\CompanyMdl;
use App\Models\ServiceMdl;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompanyGalleryMdl extends Model
{
    use HasFactory, Notifiable, SoftDeletes, HasRoles;

    protected $table = 'companies_gallery';

    protected $primaryKey = 'id';

    protected $fillable = [
    'company_id',
    'service_id',
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
    = COMPANY
    =========================
    */
    public function company_gallery(){
        return $this->belongsTo(CompanyMdl::class, 'company_id');
    }
    /*
    =========================
    = SERVICE
    =========================
    */
    public function service_gallery(){
        return $this->belongsTo(ServiceMdl::class, 'service_id');
    }
    /*
    =========================
    =
    =========================
    */

}