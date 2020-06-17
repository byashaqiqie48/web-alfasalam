<?php

namespace App\Model\Warga_belajar;

use Illuminate\Database\Eloquent\Model;

class Warga_belajar extends Model
{
    protected $connection = 'mysql';
    public $table = 'warga_belajars';
    protected $fillable = [
        'nama_lengkap',
        'nama_panggilan',
        'password',
        'alamat',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'gender',
        'phone',
        'anak_ke',
        'jenis_ijazah',
        'tahun_ijazah',
        'nomor_ijazah',
        'nama_ayah',
        'pekerjaan_ayah',
        'alamat_ayah',
        'nama_ibu',
        'pekerjaan_ibu',
        'alamat_ibu',
        'no_ktp',
        'paket',
        'lampiran_ktp',


    ];

    public function Tahun_ajars()
    {
        return $this->belongsTo('App\Model\Admin\Tahun_ajar', 'tahun_ajar_id');
    }
}
