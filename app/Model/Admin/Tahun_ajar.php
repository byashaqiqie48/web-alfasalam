<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Tahun_ajar extends Model
{
    protected $table = 'tahun_ajars';
    protected $fillable = [
        'tahun_ajar',
        'status_dibuka_tahun_ajar',
        'status_pendaftaran',
        
    ];


    public function Warga_belajars()
    {
        return $this->hasMany('App\Model\Warga_belajar\Warga_belajar', 'tahun_ajar_id');
    }

    // Eloquent Many To One
    public function Admins()
    {
        return $this->belongsTo('App\Model\Admin\Admin');
    }

}
