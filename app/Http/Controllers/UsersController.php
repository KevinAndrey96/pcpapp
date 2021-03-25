<?php

namespace App\Http\Controllers;

use App\Models\User;
use Facade\Ignition\Http\Controllers\ScriptController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class UsersController extends Controller
{
    //
    public function index(Request $request)
    {
        // si request input role == "all" entonces muestre Usr::all() si no, muestre la que ya está
        //$data['admins'] = User::where('role', $request->input('role'))->get();

        
        
        if($request->input('role')=='all'){
           
            $data['admins'] = User::all(); 
            return view('users.index',$data);

        }else{

            $data['admins'] = User::where('role', $request->input('role'))->get();
            return view('users.index',$data);
        
        }
        
       
        return $request;
        
        
    }

    
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) 
    {  

    if(Auth::user()->role=='Administrador'){

        $fields = [

            'name' =>'required|string|max:100',
            'phone' => 'required|string|max:20',
            'email' => 'required|email',
            'country' => 'required|string|max:40',
            'city' => 'required|string|max:40',
            'role' => 'required|string|max:20',
            'establishment_name' => 'required|string|max:100',

         ];

         $message = ["required" => "El campo :attribute es requerido"];

         $this -> validate($request, $fields, $message);

        $userData = request()->except('_token');

        if ($request->hasFile('image')) {
            $userData['image'] = $request->file('image')->store('images','public');
        }

        $userData['password'] = Hash::make($request->input('password'));

        User::insert($userData);    
        
        }


        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Users  $Users
     * @return \Illuminate\Http\Response
     */
    public function show(User $Users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Users  $Users
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit',compact('user'));

    }

    public function form(User $Users)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Users  $Users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
       
        $userData = request()->except(['_token','_method']);
        $userData['password'] = Hash::make($request->input('password'));
        User::where('id','=',$id)->update($userData);

        return redirect('home')->with('Mensaje','Empleado Modificado con éxito');

    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Users  $Users
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$user = User::findOrFail($id);

        /*
        
        if(Storage::delete('public/'.$user->image)){

            User::destroy($id);

        }

        */

        if(Auth::user()->role=='Administrador'){

        User::destroy($id);

        }

        return view('home');

    }

    public function passwordEdit($id)
    {

        $user = User::findOrFail($id);

        return view('users.passwordEdit', compact('user'));
    }

    
    
    public function passwordUpda(Request $request)
    {
        
        $user = User::findOrFail(Auth::user()->id);
        $id = $user->id;
        $oldPass = $request->oldPass;
        $oldPass2 = Auth::user()->password;

        if (Hash::check($oldPass, $oldPass2 )){
            if($request->input('newPass1') == $request->input('newPass2')){

                $user->password = Hash::make($request->input('newPass1'));
                $user->save();
                
                return view('home');

            }else{

                return view('home');
            }
            }else{

            return view('home');

        }
        
    }









}
