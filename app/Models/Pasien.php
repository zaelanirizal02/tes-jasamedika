<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $dates = ['tanggal_lahir'];
    protected $fillable =
    [
        'nama',
        'jenis_kelamin',
        'no_telepon',
        'alamat',
        'rt',
        'rw',
        'kelurahan'

    ];
}
