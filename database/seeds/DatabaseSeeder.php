<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('admins')->insert([
            'name' => 'alfasalam',
            'email' => 'alfasalam@gmail.com',
            'password' => Hash::make('123'),
        ]);

        DB::table('warga_belajars')->insert([
            'email' => 'byashaqiqie48@gmail.com',
            'password' => Hash::make('123'),
            'nama_lengkap'=> 'byashqq',
            'nama_panggilan'=> 'byashqq',
            'alamat'=> 'byashqq',
            'tempat_lahir'=> 'byashqq',
            'tanggal_lahir'=> '123',
            'agama'=> 'byashqq',
            'gender'=> 'L',
            'phone'=> '123123',
            'anak_ke'=> '123',
            'jenis_ijazah'=> 'byashqq',
            'tahun_ijazah'=> '213123',
            'nomor_ijazah'=> '2313',
            'nama_ayah'=> 'byashqq',
            'pekerjaan_ayah'=> 'byashqq',
            'alamat_ayah'=> 'byashqq',
            'nama_ibu'=> 'byashqq',
            'pekerjaan_ibu'=> 'byashqq',
            'alamat_ibu'=> 'byashqq',
            'no_ktp'=> '21321',
            'paket'=> 'Paket A',
            'lampiran_ktp'=> 'byashqq',
        ]);
    }
}
