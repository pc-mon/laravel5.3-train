<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Cost;
use Illuminate\Http\Request;
use Session;

class CostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $cost = Cost::paginate(25);

        return view('admin\costs.cost.index', compact('cost'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin\costs.cost.create');
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
			'cost' => 'required',
			'trip_to' => 'required',
			'trip_from' => 'required'
		]);
        $requestData = $request->all();
        
        Cost::create($requestData);

        Session::flash('flash_message', 'Cost added!');

        return redirect('admin/cost');
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
        $cost = Cost::findOrFail($id);

        return view('admin\costs.cost.show', compact('cost'));
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
        $cost = Cost::findOrFail($id);

        return view('admin\costs.cost.edit', compact('cost'));
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
			'cost' => 'required',
			'trip_to' => 'required',
			'trip_from' => 'required'
		]);
        $requestData = $request->all();
        
        $cost = Cost::findOrFail($id);
        $cost->update($requestData);

        Session::flash('flash_message', 'Cost updated!');

        return redirect('admin/cost');
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
        Cost::destroy($id);

        Session::flash('flash_message', 'Cost deleted!');

        return redirect('admin/cost');
    }
}
