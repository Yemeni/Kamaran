<?php

namespace App\Http\Controllers;

use App\Alerts\Alert;
use App\Item;
use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SupplierController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		Gate::authorize('admin||supplier');

		$suppliers = Supplier::orderBy('name', 'asc')->get();

		return view('manage_suppliers', compact('suppliers'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		Gate::authorize('admin||supplier');

		$items = Item::orderBy('name', 'asc')->get();

		return view('add_supplier', compact('items'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\Response
	 * @throws \Exception
	 */
	public function store(Request $request)
	{
		Gate::authorize('admin||supplier');

		$request->validate([
			'name'    => 'required',
			'address' => 'required',
			'phone'   => 'required',
			'email'   => 'required|email',
			'item_id' => 'required|array'
		]);

		$supplier = Supplier::create([
			'name'    => $request->name,
			'address' => $request->address,
			'phone'   => $request->phone,
			'email'   => $request->email,
		]);

		$supplier->items()->attach($request->item_id);

		Alert::flash('New Supplier has been added', 'success');

		return redirect('/supplier');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Supplier $supplier
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show(Supplier $supplier)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Supplier $supplier
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Supplier $supplier)
	{
		Gate::authorize('admin||supplier');

		$items = Item::orderBy('name', 'asc')->get();

		return view('edit_supplier', compact('items', 'supplier'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \App\Supplier            $supplier
	 *
	 * @return \Illuminate\Http\Response
	 * @throws \Exception
	 */
	public function update(Request $request, Supplier $supplier)
	{
		Gate::authorize('admin||supplier');

		$request->validate([
			'name'    => 'required',
			'address' => 'required',
			'phone'   => 'required',
			'email'   => 'required|email',
			'item_id' => 'required|array'
		]);

		$supplier->update([
			'name'    => $request->name,
			'address' => $request->address,
			'phone'   => $request->phone,
			'email'   => $request->email,
		]);

		$supplier->items()->sync($request->item_id);

		Alert::flash('Supplier has been updated', 'success');

		return redirect('/supplier');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Supplier $supplier
	 *
	 * @return \Illuminate\Http\Response
	 * @throws \Exception
	 */
	public function destroy(Supplier $supplier)
	{
		Gate::authorize('admin||supplier');

		if ($supplier->items()->count()){
			Alert::flash('You can not delete this supplier because of related items', 'danger');

			return back();
		}

		$supplier->delete();

		Alert::flash('Supplier has been deleted', 'success');

		return back();
	}
}
