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
        $kabid4 = KepalaBidang::create([
            'jabatan_id' => '4',
            'name' => 'Kabid A'            
        ]);
        $kabid5 = KepalaBidang::create([
            'jabatan_id' => '4',
            'name' => 'Kabid B'            
        ]);
        $kabid6 = KepalaBidang::create([
            'jabatan_id' => '4',
            'name' => 'Kabid C'            
        ]);
        $kabid7 = KepalaBidang::create([
            'jabatan_id' => '4',
            'name' => 'Kabid D'           
        ]);
        $kabid4 = KepalaBidang::create([
            'jabatan_id' => '4',
            'name' => 'Kabid E'            
        ]);
    }
}
