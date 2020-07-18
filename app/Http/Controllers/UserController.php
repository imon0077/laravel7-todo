<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function uploadAvatar(Request $request)
    {
        //dd(request()->all());
        //dd($request->all());
        //dd($request->file('image);
        //dd($request->image);
        //dd($request->hasFile('image'));

        /*upload in images directory  */
        //$request->image->store('images');

        /*upload in public directory */
        /*if($request->hasFile('image')){
             //dd($request->image);
             //dd($request->image->getClientOriginalName());
             $filename = $request->image->getClientOriginalName();

             $this->deleteOldImage();

             //$request->image->store('images', 'public');
            $request->image->storeAs('images', $filename, 'public');
            //user::find(1)->update(['avatar' => $filename]);
            auth()->user()->update(['avatar' => $filename]); //for logged in user
        }*/

        if($request->hasFile('image')){
            User::uploadAvatar($request->image);
            //$request->session()->flash('message', 'Image Uploaded');
            return redirect()->back()->with('message', 'Image Uploaded');   // success msg
        }

        //$request->session()->flash('error', 'Image not Uploaded');
        return redirect()->back()->with('error', 'Image not Uploaded');  // error msg
    }

    /*protected function deleteOldImage()
    {
        if(auth()->user()->avatar){
            Storage::delete('/public/images/' . auth()->user()->avatar);
        }
    }*/

    public function index()
    {
        //return 'I am in user Controller';
        /*DB::insert('insert into users(name, email, password)
        values (?, ? , ?)', [
            'imon', 'imon@imonislam.com', 'password'
        ]);*/

        //$users = DB::select('select * from users');
        //return $users;

        // DB::update('update users set name = ? where id = 1',
        // ['abdullah']);

        // DB::delete('delete from users where id = 1',
        // ['abdullah']);

        // $users = DB::select('select * from users');
        // return $users;

        /* Eloquent ORM */
        //save
        // $user = new User();
        // $user->name = 'imon';
        // $user->email = 'me@imonislam.com';
        // $user->password = bcrypt('password');
        // $user->save();

        //get all
        // $user = User::all();
        // return $user;

        //delete
        //User::where('id', 2)->delete();

        //update
        //User::where('id', 3)->update(['name'    =>  'imonabd']);


        $data   = [
            'name'  =>  'Elon',
            'email'  =>  'Elon@imonislam.com',
            'password'  =>  'password'
        ];

        //User::create($data);

        $user = User::all();
        return $user;

        return view('home');
    }
}
