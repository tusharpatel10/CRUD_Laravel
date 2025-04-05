<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\CrudOperations;
use Illuminate\Http\Request;
use App\Providers\AppServiceProvider;

class CrudOperationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = CrudOperations::with('getCountry')->paginate('10');
        /* echo "<pre>";
        print_r($users);
        exit; */
        return view('Templates/index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::all();
        return view('Templates/registration', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->except(['_token', 'regist']);


        /* image uppload method */
        $imgName = 'lv_' . rand() . '' . $request->profile->extension();
        $request->profile->move(public_path('profile', $imgName));
        $requestData['profile'] = $imgName;

        /*  checked the data */
        // echo "<pre>";
        // print_r($imgName);
        // exit;
        $store = CrudOperations::create($requestData);
        return redirect()->route('crud.index')->with('success','Data was Registered successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(CrudOperations $crud)
    {

        $countries = Country::all();
        return view('Templates/show', compact('countries', 'crud'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CrudOperations $crud)
    {
        $countries = Country::all();
        return view('Templates/edit', compact('countries', 'crud'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CrudOperations $crud)
    {
        $crud->first_name = $request->first_name ?? $crud->first_name;
        $crud->last_name = $request->last_name ?? $crud->last_name;
        $crud->email = $request->email ?? $crud->email;
        $crud->contact = $request->contact ?? $crud->contact;
        $crud->gender = $request->gender ?? $crud->gender;
        $crud->hobbies = $request->hobbies ?? $crud->hobbies;
        $crud->address = $request->address ?? $crud->address;
        $crud->country = $request->country ?? $crud->country;
        if (isset($request->profile)) {
            /* image uppload method */
            $imgName = 'lv_' . rand() . '' . $request->profile->extension();
            $request->profile->move(public_path('profile', $imgName));
            $crud->profile = $imgName;
        }
        $crud->save();
        return redirect()->route('crud.index')->with('primary', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CrudOperations $crud)
    {
        $crud->delete();
        return redirect()->route('crud.index')->with('danger', 'Data Deleted successfully');
    }
}
