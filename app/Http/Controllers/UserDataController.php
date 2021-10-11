<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfileModel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserDataController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
    }

    public function getProfile(Request $request){
      $users = User::findOrFail(Auth::user()->id);
      return view('user.user_profile')->withUsers($users);
    }

    public function makeProfileForm(Request $request){
      $users = User::findOrFail(Auth::user()->id);
      return view('user.user_profile_form')->withUsers($users);
    }

    public function editProfileForm(Request $request){
      $users = ProfileModel::where('users_id', Auth::user()->id)->first();
      return view('user.user_edit_profile_form')->withUsers($users);
      // return $users->perkerjaan;
    }

    public function editProfile(Request $request){
      $validator = Validator::make($request->all(), [
          'alamat' => 'required|email:rfc,dns',
          'perkerjaan' => 'required',
          'pendidikan_terakhir' => 'required',
      ]);

      $profile = ProfileModel::where('users_id', Auth::user()->id)->first();
      $profile->alamat = $request->alamat;
      $profile->perkerjaan = $request->perkerjaan;
      $profile->pendidikan_terakhir = $request->pendidikan_terakhir;
      $profile->users_id = Auth::user()->id;

      if($profile->save()){
        return $profile;
      }
    }

    public function makeProfile(Request $request){
      $validator = Validator::make($request->all(), [
          'alamat' => 'required|email:rfc,dns',
          'perkerjaan' => 'required',
          'pendidikan_terakhir' => 'required',
      ]);

      $profile = new ProfileModel;
      $profile->users_id = Auth::user()->id;
      $profile->nama = $request->nama;
      $profile->alamat = $request->alamat;
      $profile->pendidikan_terakhir = $request->pendidikan_terakhir;
      $profile->nomor_telepon = $request->nomor_telepon;
      $profile->perkerjaan = $request->perkerjaan;
      $profile->save();
      return $profile;
    }

    public function deleteProfile(Request $request){
      $profile = ProfileModel::where('users_id', Auth::user()->id)->first();
      $profile->delete();
      return "Berhasil dihapus";
    }
}
