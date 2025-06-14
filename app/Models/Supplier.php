<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Supplier extends Model
{
    /** @use HasFactory<\Database\Factories\SupplierFactory> */
    use HasFactory;

    protected $table = 'suppliers';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_usaha',
        'email',
        'alamat',
        'no_npwp',
        'status',
        'token',
        'password',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getRouteKeyName()
    {
        return 'email';
    }
    public function getStatusAttribute($value)
    {
        return $value == 1 ? 'Aktif' : 'Tidak Aktif';
    }

}
