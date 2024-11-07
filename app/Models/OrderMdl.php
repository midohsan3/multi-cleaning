<?php

namespace App\Models;

use App\Models\CompanyMdl;
use App\Models\CountryMdl;
use App\Models\ServiceMdl;
use App\Models\CustomerMdl;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderMdl extends Model
{
    use HasFactory, Notifiable, SoftDeletes, HasRoles;

    protected $table = 'orders';

    protected $primaryKey = 'id';

    protected $fillable = [
    'country_id',
    'company_id',
    'customer_id',
    'service_id',
    'ref',
    'duration_by',
    'duration',
    'cost',
    'total',
    'started_at',
    'end_at',
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
    = COUNTRY
    =========================
    */
    public function country_order(){
        return $this->belongsTo(CountryMdl::class, 'country_id');
    }
    /*
    =========================
    = COMPANY
    =========================
    */
    public function company_order(){
        return $this->belongsTo(CompanyMdl::class, 'company_id');
    }
    /*
    =========================
    = CUSTOMER
    =========================
    */
    public function customer_order(){
        return $this->belongsTo(CustomerMdl::class, 'customer_id');
    }
    /*
    =========================
    = SERVICE
    =========================
    */
    public function service_order(){
        return $this->belongsTo(ServiceMdl::class, 'service_id');
    }
    /*
    =========================
    =
    =========================
    */
}