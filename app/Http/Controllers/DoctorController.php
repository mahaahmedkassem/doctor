<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Doctor;
use App\Traits\Common; 


class DoctorController extends Controller
{

    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doc = Doctor::get();
       

        return view('dashboard.doctor.doctors',compact('doc'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.doctor.adddoctor' );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages= $this->messages();

        $data = $request->validate([
            'name'=>'required',
            'Position'=>'required',
           'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'price'=> 'required',
          
          
          

        ], $messages);

        $fileName = $this->uploadFile($request->image, 'assets/dashboard/images');
        $data['image']= $fileName;
        $data['active'] = isset($request['active']);

           Doctor::create($data);
        //    return redirect('dashboard/doctot'); 
        return ('added');
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
        $doc = Doctor::findOrFail($id);
       
        return view('dashboard.doctor.edit',compact('doc'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages= $this->messages();

        $data = $request->validate([
            'name'=>'required',
            'Position'=>'required',
            'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048',
            'price'=> 'required',
          
          
          

        ], $messages);

        if($request->hasFile('image')){
            $fileName = $this->uploadFile($request->image, 'assets/dashboard/images');
            $data['image']= $fileName;
        }
        $data['active'] = isset($request->active);


           Doctor::where('id', $id)->update($data);
        //    return redirect('dashboard/doctot'); 
        return redirect ('dashboard/doctor');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function messages(){
        return [
            'name.required'=>'Title is required',
            ' .required'=> 'description is required',
           
            'image' => 'image is required',
            'price'=> 'price is required',
          

        ];
    }
}
