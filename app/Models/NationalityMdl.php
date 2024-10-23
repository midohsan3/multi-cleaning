<?php

namespace App\Models;

use App\Models\PersonMdl;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NationalityMdl extends Model
{
    use HasFactory, Notifiable, SoftDeletes, HasRoles;

    protected $table = 'nationalities';

    protected $primaryKey = 'id';

    protected $fillable = [
    'name_en',
    'name_ar',
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
    = PERSON
    =========================
    */
    public function person_nationality(){
        return $this->hasMany(PersonMdl::class, 'nationality_id');
    }
    /*
    =========================
    =
    =========================
    */
}
