<?php

use Illuminate\Database\Seeder;
use App\Component\Model\Jabatan;

class jabatan_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jabatan1 = Jabatan::create([
            'name' => 'Admin'            
        ]);
        $jabatan2 = Jabatan::create([
            'name' => 'Kepala Bappppeda'            
        ]);
        $jabatan5 = Jabatan::create([
            'name' => 'Sekretaris'            
        ]);
        $jabatan3 = Jabatan::create([
            'name' => 'Kepala Bidang'            
        ]);
        $jabatan4 = Jabatan::create([
            'name' => 'Sub Bidang'            
        ]);
    }
}
