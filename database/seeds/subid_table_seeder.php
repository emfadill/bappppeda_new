<?php

use Illuminate\Database\Seeder;
use App\Component\Model\SubBidang;

class subid_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kabid1 = SubBidang::create([
            'jabatan_id' => '1',
            'kabid_id' => '1',
            'name' => 'Admin'
        ]);
        $kabid2 = SubBidang::create([
            'jabatan_id' => '2',
            'kabid_id' => '2',
            'name' => 'Kepala Bappppeda'
        ]);
        //A
        $kabid3 = SubBidang::create([
            'jabatan_id' => '4',
            'kabid_id' => '3',
            'name' => 'Subid A1'
        ]);
        $kabid41 = SubBidang::create([
            'jabatan_id' => '4',
            'kabid_id' => '3',
            'name' => 'Subid A2'
        ]);
        $kabid51 = SubBidang::create([
            'jabatan_id' => '4',
            'kabid_id' => '3',
            'name' => 'Subid A3'
        ]);
        //B
        $kabid13 = SubBidang::create([
            'jabatan_id' => '4',
            'kabid_id' => '4',
            'name' => 'Subid B1'
        ]);
        $kabid41 = SubBidang::create([
            'jabatan_id' => '4',
            'kabid_id' => '4',
            'name' => 'Subid B2'
        ]);
        $kabid5 = SubBidang::create([
            'jabatan_id' => '4',
            'kabid_id' => '4',
            'name' => 'Subid B3'
        ]);
        //C
        $kabid33 = SubBidang::create([
            'jabatan_id' => '4',
            'kabid_id' => '5',
            'name' => 'Subid C1'
        ]);
        $kabid44 = SubBidang::create([
            'jabatan_id' => '4',
            'kabid_id' => '5',
            'name' => 'Subid C2'
        ]);
        $kabid55 = SubBidang::create([
            'jabatan_id' => '4',
            'kabid_id' => '5',
            'name' => 'Subid C3'
        ]);
        //D
        $kabid313 = SubBidang::create([
            'jabatan_id' => '4',
            'kabid_id' => '6',
            'name' => 'Subid D1'
        ]);
        $kabid414 = SubBidang::create([
            'jabatan_id' => '4',
            'kabid_id' => '6',
            'name' => 'Subid D2'
        ]);
        $kabid515 = SubBidang::create([
            'jabatan_id' => '4',
            'kabid_id' => '6',
            'name' => 'Subid D3'
        ]);
      //E
        $kabid3131 = SubBidang::create([
            'jabatan_id' => '4',
            'kabid_id' => '7',
            'name' => 'Subid E1'
        ]);
        $kabid4114 = SubBidang::create([
            'jabatan_id' => '4',
            'kabid_id' => '7',
            'name' => 'Subid E2'
        ]);
        $kabid5151 = SubBidang::create([
            'jabatan_id' => '4',
            'kabid_id' => '7',
            'name' => 'Subid E3'
        ]);
    }
}
