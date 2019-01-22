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
        $user1 = User::create([
            'nik' => '00005',
            'name' => 'Bapak Sekretaris',
            'username' => 'sekretaris',
            'password' => bcrypt('qwezxc'),
            'jabatan_id' => '3',
        ]);
       
    }
}
