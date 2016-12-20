<?php

namespace App\Http\Controllers;

use App\Models\Cost;
use App\Models\Page;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only('book');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home')->with(['pages'=>Page::all()]);
    }

    public function page($id = 0)
    {
        if($id == 0 )
            return redirect('/home');
        return view('page')->with([ 'pages'=>Page::all() , 'page'=>Page::find($id) ]);
    }
    public function book()
    {
        return view('book')->with([ 'pages'=>Page::all() , 'costs'=>Cost::all() , 'tickets'=>Ticket::where('passenger_id',Auth::user()->id)->get() , 'userid' => Auth::user()->id ]);
    }

    public function bookSave(Request $request)
    {
        Ticket::firstOrCreate($request->all()['d']);
        return redirect()->route('book');
    }
    public function bookDelete($id)
    {
        Ticket::destroy($id);
        return redirect()->route('book');
    }
}
