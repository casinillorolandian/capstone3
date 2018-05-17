<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;
use Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $current_user = Auth::user();
        $all_items= \App\Item::orderby('created_at')->where('reserve_id', '>' ,'0')->paginate(12);
        return view('home', compact('current_user','all_items'));
    }

    function profile(){

        $user= Auth::user();
        return view('profile', array('user'=>Auth::user()));
    }

    function update_avatar(Request $request){
        //handle the user upload of avatar
        if ($request->hasFile('image')){
            $file = $request -> file('image');
            $namefile = $file->getClientOriginalName();
            $finalfilename = time() . $namefile;
            $destinationPath = 'uploads';
            $file->move($destinationPath,$finalfilename);

            $imageName = $namefile;
            $imagedata = 'uploads/'. time() .$imageName;    

            $current_user = Auth::user();
            $current_user->image = $imagedata;
            $current_user->save();
        }

    
        return back();

        // dd($request);
    }

    public function showChangePasswordForm(){
        return view('auth.changepassword');
    }

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function changePassword(Request $request){
 
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }
 
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }
 
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);
 
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
 
        return redirect()->back()->with("success","Password changed successfully !");
 
    }
}
