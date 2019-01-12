<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;

use Illuminate\Http\Request;


class FirebaseController extends Controller
{
    public function index(){
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/bappppeda-firebase-adminsdk-ywxlx-e4a81fb55d.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();
        $db = $firebase->getDatabase();

        $db->getReference('users')
            ->set([
                'id' => 1,
                'name' => 'emfadill',
                'email' => 'emfadill88@gmail.com',
                'online' => 1
            ]);
        echo '<h1>Data telah dikirim!</h1>';
    }
}
