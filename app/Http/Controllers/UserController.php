<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::get();

        return view('dashboard.user.userlist',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.user.adduser' );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
          
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' =>  $validatedData['password'],
            
            
        ]);
    
        $user->save();

       

        return redirect('dashboard/user'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
     
        return view('dashboard.user.edituser',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages= $this->messages();

        $data = $request->validate([
            'name'=>'required',
        'email'=>'required',
        'password'=>'required',
       
        
       

        ],$messages);
        $data['active'] = isset($request['active']);

        User::where('id', $id)->update($data);
        return redirect('dashboard/user'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::where('id', $id)->delete();
        return redirect ('dashboard/user');
    }

    public function trashed(){
        $test = User::onlyTrashed()->get();
        return view('dashboard.user.trasheduser',compact('test'));
    }

    public function forcedelete(string $id): RedirectResponse
    {
        User::where('id', $id)->forceDelete();
        return redirect ('dashboard/user');


    }
    public function restore(string $id): RedirectResponse
    {
        User::where('id', $id)->restore();
        return redirect ('dashboard/user');
    }

    public function messages(){
        return [
            'name.required'=>'name is required',
            'email.required'=> 'email is required',
            'password.required'=> 'password is required',
            
        

           
        
        ];
    }
}
