<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'jenis';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'kode',
        'kode_berkas',
        'nama'
    ];
}