<?php

use Illuminate\Database\Seeder;
use App\Component\Model\User;

class user_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
        	'nik' => '00001',
            'name' => 'Admin Bapppeda',
            'username' => 'Admin',
            'password' => bcrypt('qwezxc'),
            'jabatan_id' => '1',
        ]);
        $user1 = User::create([
            'nik' => '00002',
            'name' => 'Kepala Bapppeda',
            'username' => 'Kepalabpd',
            'password' => bcrypt('qwezxc'),
            'jabatan_id' => '2',
        ]);

        $user2 = User::create([
            'nik' => '00003',
            'name' => 'Kabid A',
            'username' => 'kabidabc',
            'password' => bcrypt('qwezxc'),
            'jabatan_id' => '4',
            'kabid_id' => '3'
        ]);

        $user3 = User::create([
            'nik' => '00004',
            'name' => 'Subid A1',
            'username' => 'Subid123',
            'password' => bcrypt('qwezxc'),
            'jabatan_id' => '4',
            'kabid_id' => '5',
            'subid_id' => '3'
        ]);
    }
}
