<?php

use Illuminate\Database\Seeder;
use App\Component\Model\KepalaBidang;

class kabid_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kabid1 = KepalaBidang::create([
            'jabatan_id' => '1',
            'name' => 'Admin'
        ]);
        $kabid2 = KepalaBidang::create([
            'jabatan_id' => '2',
            'name' => 'Kepala Bappppeda'          
        ]);
        $kabid4 = KepalaBidang::create([
            'jabatan_id' => '3',
            'name' => 'Kabid A'            
        ]);
        $kabid5 = KepalaBidang::create([
            'jabatan_id' => '3',
            'name' => 'Kabid B'            
        ]);
        $kabid6 = KepalaBidang::create([
            'jabatan_id' => '3',
            'name' => 'Kabid C'            
        ]);
        $kabid7 = KepalaBidang::create([
            'jabatan_id' => '3',
            'name' => 'Kabid D'           
        ]);
        $kabid3 = KepalaBidang::create([
            'jabatan_id' => '3',
            'name' => 'Kabid E'            
        ]);
    }
}
