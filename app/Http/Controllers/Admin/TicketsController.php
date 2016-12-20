<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Session;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $tickets = Ticket::paginate(25);

        return view('admin\tickets.tickets.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin\tickets.tickets.create');
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
			'passenger_id' => 'required',
			'trip_id' => 'required'
		]);
        $requestData = $request->all();
        
        Ticket::create($requestData);

        Session::flash('flash_message', 'Ticket added!');

        return redirect('admin/tickets/tickets');
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
        $ticket = Ticket::findOrFail($id);

        return view('admin\tickets.tickets.show', compact('ticket'));
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
        $ticket = Ticket::findOrFail($id);

        return view('admin\tickets.tickets.edit', compact('ticket'));
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
			'passenger_id' => 'required',
			'trip_id' => 'required'
		]);
        $requestData = $request->all();
        
        $ticket = Ticket::findOrFail($id);
        $ticket->update($requestData);

        Session::flash('flash_message', 'Ticket updated!');

        return redirect('admin/tickets/tickets');
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
        Ticket::destroy($id);

        Session::flash('flash_message', 'Ticket deleted!');

        return redirect('admin/tickets/tickets');
    }
}
