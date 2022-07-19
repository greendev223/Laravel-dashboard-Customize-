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

    public function create()
    {
        // if(Auth::user()->can('Manage Calendar Event'))
        // {
            $calendars = Calendar::where('created_by', '=', Auth::user()->getCreatedBy())->get();
            // dd($calendars);
            echo json_encode($calendars);
        // }
        // else
        // {
        //     return redirect()->back()->with('error', __('Permission denied.'));
        // }
    }

    public function store(Request $request)
    {
        // if(Auth::user()->can('Create Calendar Event'))
        // {
            $calendar             = new Calendar();
            $calendar->title      = $request->title;
            $calendar->start      = date('Y-m-d', strtotime($request->start));
            $calendar->end        = date('Y-m-d', strtotime($request->end));
            $calendar->allDay     = filter_var($request->allDay, FILTER_VALIDATE_BOOLEAN);
            $calendar->className  = $request->className;
            $calendar->created_by = Auth::user()->getCreatedBy();
            $calendar->save();

            return response()->json(
                [
                    'code' => 200,
                    'success' => __('Calendar event added successfully!'),
                    'last_id' => $calendar->id,
                ]
            );
        // }
        // else
        // {
        //     return redirect()->back()->with('error', __('Permission denied.'));
        // }
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
        // if(Auth::user()->can('Edit Calendar Event'))
        // {
            if($request->calendaraction == 'update')
            {
                $calendar->title       = $request->title;
                $calendar->description = $request->description;
                $calendar->className   = $request->className;
            }
            else if($request->calendaraction == 'dropped')
            {
                $calendar->start = $request->start;
                $calendar->end   = $request->end;
            }

            $calendar->save();

            return response()->json(
                [
                    'code' => 200,
                    'success' => __('Calendar event updated successfully!'),
                ]
            );
        // }
        // else
        // {
        //     return redirect()->back()->with('error', __('Permission denied.'));
        // }
    }

    public function destroy(Calendar $calendar)
    {
        // if(Auth::user()->can('Delete Calendar Event'))
        // {
            $calendar->delete();

            return response()->json(
                [
                    'code' => 200,
                    'success' => __('Calendar event deleted successfully!'),
                ]
            );
        // }
        // else
        // {
        //     return redirect()->back()->with('error', __('Permission denied.'));
        // }
    }
}

