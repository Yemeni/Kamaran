<?php

namespace App\Http\Controllers;

use App\Alerts\Alert;
use App\Category;
use App\Inventory;
use App\Item;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $onHold = Inventory::where('arrival_status', 0)->get();
        $inventories = Inventory::query();

        if (\request()->has('category_id')){
        	$inventories = $inventories->where('category_id', \request('category_id'));
		}
		if (\request()->has('item_id')){
        	$inventories = $inventories->where('item_id', \request('item_id'));
		}
		if (\request()->has('status')){
        	$inventories = $inventories->where('transaction_type', \request('status'));
		}

		$inventories = $inventories->get();

		$categories = Category::orderBy('name', 'asc')->get();
		$items = Item::orderBy('name', 'asc')->get();

        return view('inventory', compact('onHold', 'inventories', 'items', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Inventory $inventory
	 *
	 * @return \Illuminate\Http\Response
	 * @throws \Exception
	 */
    public function approved(Inventory $inventory)
    {
        $inventory->update([
        	'arrival_status' => 1,
			'date' => Carbon::now()->timestamp,
			'user_id' => auth()->id(),
			'transaction_type' => 'voucher',

		]);

        Alert::flash('The Inventory has been approved', 'success');

        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventory $inventory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventory $inventory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventory $inventory)
    {
        //
    }
}
