<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
        //
        public $timestamps = false;
        protected $table = "statuses";
        protected $fillable = [
            "status_pendaftaran_status",
            "tahun_ajar_id",
            "warga_belajar_id"
        ];
    
        public function Warga_belajars()
        {
            return $this->belongsTo('App\Model\Warga_belajar\Warga_belajar','warga_belajar_id');
        }
        public function Tahun_ajars()
        {
            return $this->belongsTo('App\Admin\Tahun_ajar');
        }
}
