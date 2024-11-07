<?php

namespace App\Models;

use App\Models\User;
use App\Models\OrderMdl;
use App\Models\CountryMdl;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustomerMdl extends Model
{
    use HasFactory, Notifiable, SoftDeletes, HasRoles;

    protected $table = 'customers';

    protected $primaryKey = 'id';

    protected $fillable = [
    'user_id',
    'country_id',
    'address',
    'total_booking',
    'last_booking',
    ];

    protected $data = ['deleted_at'];

    /*
    =========================
    RELATIONS
    =========================
    */
    /*
    =========================
    = USER
    =========================
    */
    public function user_customer(){
    return $this->belongsTo(User::class, 'user_id');
    }
    /*
    =========================
    = COUNTRY
    =========================
    */
    public function country_customer(){
        return $this->belongsTo(CountryMdl::class, 'country_id');
    }
    /*
    =========================
    = BOOKING
    =========================
    */
    public function order_customer(){
        return $this->hasMany(OrderMdl::class, 'customer_id');
    }
    /*
    =========================
    =
    =========================
    */
}