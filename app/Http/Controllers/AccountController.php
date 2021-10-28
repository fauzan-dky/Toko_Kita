<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function profil () {
        $Account = DB::table('users')
                    ->select('*')
                    ->where('users.id', '=', Auth::user()->id)
                    ->get();
        return view('Profil.profile', compact('Account'));
    }
    public function accountSetting () {
    	$user_id = Auth::user()->id;
    	$Account = DB::table('users')
    				->select('*')
    				->where('users.id', '=', $user_id)
    				->get();
    	return view('Profil.profil_setting', compact('Account'));
    }
    public function saveAccount (Request $save) {
        $user_id = Auth::user()->id;
        $data = DB::table('users')->select('*')->where('id', $user_id)->first();

            $nama = $save->nama;
            $email = $save->email;
            $password = Hash::make($save->password);
            $alamat = $save->alamat;
            $no_hp = $save->no_hp;
            $jenis_kelamin = $save->jenis_kelamin;

            $updateProfile =
            [   
                'name' => $nama,
                'email' => $email,
                'password' => $password,
                'alamat' => $alamat,
                'nomor_hp' => $no_hp,
                'jenis_kelamin' => $jenis_kelamin
            ];

            DB::table('users')
                ->where('id', $user_id)
                ->update($updateProfile);

        return redirect(url('/profil'));
    }
}
