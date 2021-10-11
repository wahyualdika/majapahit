<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfileModel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserDataController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
    }

    public function getProfile(Request $request){
      $user = User::findOrFail(Auth::user()->id);
      return $user;
    }

    public function makeProfileForm(Request $request){
      $user = User::findOrFail(Auth::user()->id);
      return view('user.user_edit_profile_form')->withUser($user);
    }

    public function editProfileForm(Request $request){
      $user = User::findOrFail(Auth::user()->id);
    }

    public function editProfile(Request $request){
      $validator = Validator::make($request->all(), [
          'alamat' => 'required|email:rfc,dns',
          'perkerjaan' => 'required',
          'pendidikan_terakhir' => 'required',
      ]);

      $profile = ProfileModel::findOrFail(Auth::user()->id);
      $profile->alamat = $request->alamat;
      $profile->perkerjaan = $request->perkerjaan;
      $profile->pendidikan_terakhir = $request->pendidikan_terakhir;
      $profile->users_id = Auth::user()->id;

      if($profile->save()){
        return $profile;
      }
    }

    public function createProfile(Request $request){
      $validator = Validator::make($request->all(), [
          'alamat' => 'required|email:rfc,dns',
          'perkerjaan' => 'required',
          'pendidikan_terakhir' => 'required',
      ]);

      $profile = new ProfileModel;
      $profile->users_id = Auth::user()->id;
      $profile->alamat = $request->id;
      $profile->pendidikan_terakhir = $request->pendidikan_terakhir;
      $profile->save();
      return $profile;
    }

    public function deleteProfile(Request $request){
      $profile = ProfileModel::findOrFail($id);
      $profile->delete();
      return "Berhasil dihapus";
    }
}
