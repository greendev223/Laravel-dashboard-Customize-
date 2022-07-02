<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Calendar;

class CalendarController extends Controller
{
    public function index()
    {
        // if(Auth::user()->can('Manage Calendar Event'))
        // {
            $now =date('m');
            $events=Calendar::select('start','end','title','created_at','className')->whereRaw('MONTH(start)='.$now)->get();
            
            return view('calendars.index',compact('events'));
    //     }
    //     else
    //     {
    //         return redirect()->back()->with('error', __('Permission denied.'));
    //     }
    }
}
