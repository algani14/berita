<?php

use\App\Dosen;
use\App\Wali;
use\App\Mahasiswa;
use\App\Hobi;

use Illuminate\Database\Seeder;

class RelasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::Table('walis')->delete();
        DB::Table('dosens')->delete();
        DB::Table('mahasiswas')->delete();
        DB::Table('hobis')->delete();
        DB::Table('mahasiswa_hobi')->delete();

        //Membuat Data Dosen
        $dosen= Dosen::create(array(
            'nipd' => '12345',
            'nama' => 'Abdul',
        ));
        $this->command->info('Data Dosen Telah Di Isi');

        //membuat Data Mahasiswa
        $al = Mahasiswa::create(array(
            'nama' => 'Al',
            'nim' => '1010101',
            'id_dosen' => $dosen->id
        ));

        $ewok = Mahasiswa::create(array(
            'nama' => 'ewok',
            'nim' => '1010102',
            'id_dosen' => $dosen->id
        ));

        $ableh = Mahasiswa::create(array(
            'nama' => 'ableh',
            'nim' => '1010103',
            'id_dosen' => $dosen->id
        ));
        $this->command->info('data mahasiswa berhasil diisi');

        //membuat data wali

        $dadang = Wali::create(array(
            'nama' => 'dadang',
            'id_mahasiswa' => $al->id
        ));

        $pekoy = Wali::create(array(
            'nama' => 'pekoy',
            'id_mahasiswa' => $ewok->id
        ));

        $rossi = Wali::create(array(
            'nama' => 'rossi',
            'id_mahasiswa' => $ableh->id
        ));
        $this->command->info('data Wali berhasil diisi');

        // membuat data hobi

        $melukis_langit= Hobi::create(array(
            'hobi' => 'Melukis langit'
        ));

        $mandi_hujan= Hobi::create(array(
            'hobi' => 'Mandi Hujan'
        ));

        $ambyar= Hobi::create(array(
            'hobi' => 'ambyar'
        ));

        $al->hobi()->attach($melukis_langit->id);
        $al->hobi()->attach($ambyar->id);
        $ewok->hobi()->attach($mandi_hujan->id);
        $ableh->hobi()->attach($ambyar->id);

         $this->command->info('mahasiswa beserta hobi telah diisi');
    }


}
