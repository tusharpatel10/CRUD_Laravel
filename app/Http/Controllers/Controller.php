<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class Controller
{
    public function index()
    {
        return view('Templates.TypeJS');
    }
    /* ------------> Flash Method <--------- */
    public function flashMethod(Request $request)
    {

        /* Push to array session value */
        // $request->session()->push('version', '8.0');

        /* Flash Method */
        $request->session()->flash('primary', 'Message from primary Method!');
        $request->session()->flash('secondary', 'Message from secondary Method!');
        $request->session()->flash('success', 'Welcome to Laravel the success Method');
        return redirect('Templates/flash_data');
    }

    public function flashData(Request $request)
    {

        // $allData = $request->session()->all();

        // session()->reflash();
        session()->keep(['primary', 'success']);
        return view('flashSession');
    }
}
