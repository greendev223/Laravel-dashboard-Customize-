<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Calendar;

class PurchaseController extends Controller
{
    public function index()
    {
        // if(Auth::user()->can('Manage Calendar Event'))
        // {
            $now =date('m');
            $events=Calendar::select('start','end','title','created_at','className')->whereRaw('MONTH(start)='.$now)->get();
            
            return view('purchase.index',compact('events'));
    //     }
    //     else
    //     {
    //         return redirect()->back()->with('error', __('Permission denied.'));
    //     }
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
       
    }

    public function show(Calendar $calendar)
    {
        //
    }

    public function edit(Calendar $calendar)
    {
        //
    }

    public function update(Request $request, Calendar $calendar)
    {
        
    }

    public function destroy(Calendar $calendar)
    {
       
    }
}

