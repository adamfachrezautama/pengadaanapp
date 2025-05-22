<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    /** @use HasFactory<\Database\Factories\AdminFactory> */
    use HasFactory;

    protected $table = 'admins';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'token',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
        'password',
        'token',

    ];

     public function getStatusAttribute($value)
    {
        return $value == 1 ? 'Aktif' : 'Tidak Aktif';
    }
}
