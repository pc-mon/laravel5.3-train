<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Passenger;
use Illuminate\Http\Request;
use Session;

class PassengersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $passengers = Passenger::paginate(25);

        return view('admin\passengers.passengers.index', compact('passengers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin\passengers.passengers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'email' => 'required',
			'fullname' => 'required',
			'idno' => 'required',
			'mobile' => 'required'
		]);
        $requestData = $request->all();
        
        Passenger::create($requestData);

        Session::flash('flash_message', 'Passenger added!');

        return redirect('admin/passengers/passengers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $passenger = Passenger::findOrFail($id);

        return view('admin\passengers.passengers.show', compact('passenger'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $passenger = Passenger::findOrFail($id);

        return view('admin\passengers.passengers.edit', compact('passenger'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
			'email' => 'required',
			'fullname' => 'required',
			'idno' => 'required',
			'mobile' => 'required'
		]);
        $requestData = $request->all();
        
        $passenger = Passenger::findOrFail($id);
        $passenger->update($requestData);

        Session::flash('flash_message', 'Passenger updated!');

        return redirect('admin/passengers/passengers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Passenger::destroy($id);

        Session::flash('flash_message', 'Passenger deleted!');

        return redirect('admin/passengers/passengers');
    }
}
