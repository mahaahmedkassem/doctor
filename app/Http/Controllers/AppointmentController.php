<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Department;
use App\Models\Doctor;
use App\Traits\Common; 
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;


class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     use Common;
    public function index()
    {

        $departments = Department::select('id', 'departmentName')->get();
        $docs = Doctor::select('id', 'name')->get();
        return view('dashboard\appointment\Appointment' , compact('departments','docs'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::select('id', 'departmentName')->get();
        return view('dashboard\appointment\Appointment' );
    }
    public function blog()
    {
        return view('layouts.main');
    }

    public function dash()
    {
        return view('layouts.parent1');
    }

    public function doctor()
    {
        return view('hospital.doctors');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
