<?php

namespace App\Model\Warga_belajar;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;

class Warga_belajar extends Authenticatable
{
    use Notifiable;
    protected $guard = 'warga_belajar';
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $connection = 'mysql';
    public $table = 'warga_belajars';
    protected $fillable = [
        'email',
        'password',
        'nama_lengkap',
        'nama_panggilan',
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

    
    public function Status()
    {
        return $this->hasMany('App\Model\Admin\Status');
    }

    
}
