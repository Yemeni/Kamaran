<?php

namespace App\Http\Controllers;

use App\Alerts\Alert;
use App\Category;
use App\Item;
use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class ItemController extends Controller {

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

		$items = Item::orderBy('name', 'asc')->get();

		return view('manage_items', compact('items'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		Gate::authorize('admin||supplier');

		$categories = Category::orderBy('name', 'asc')->get();
		$suppliers = Supplier::orderBy('name', 'asc')->get();

		return view('add_item', compact('item', 'suppliers', 'categories'));
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
			'name'          => 'required',
			'category_id'   => 'required|exists:categories,id',
			'description'   => 'nullable',
			'specification' => 'nullable',
			'unit'          => [
				'required',
				Rule::in(['KG', 'Gram', 'Tonne', 'Liter', 'Milliliter', 'Barrel', 'Gallon', 'Bottle', 'Meter', 'Centimeter', 'Kilometer', 'Cartons', 'Pack', 'Packet', 'Box'])
			],
			'danger_level' => [
				'required',
				Rule::in(['low','normal','high'])
			],
		]);

		Item::create($request->all());

		Alert::flash('New Item has been added', 'success');

		return redirect('/item');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Item $item
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show(Item $item)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Item $item
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Item $item)
	{
		Gate::authorize('admin||supplier');

		$categories = Category::orderBy('name', 'asc')->get();
		$suppliers = Supplier::orderBy('name', 'asc')->get();

		return view('edit_item', compact('item', 'suppliers', 'categories'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \App\Item                $item
	 *
	 * @return \Illuminate\Http\Response
	 * @throws \Exception
	 */
	public function update(Request $request, Item $item)
	{
		Gate::authorize('admin||supplier');

		$request->validate([
			'name'          => 'required',
			'category_id'   => 'required|exists:categories,id',
			'description'   => 'nullable',
			'specification' => 'nullable',
			'unit'          => [
				'required',
				Rule::in(['KG', 'Gram', 'Tonne', 'Liter', 'Milliliter', 'Barrel', 'Gallon', 'Bottle', 'Meter', 'Centimeter', 'Kilometer', 'Cartons', 'Pack', 'Packet', 'Box'])
			],
			'danger_level' => [
				'required',
				Rule::in(['low','normal','high'])
			],
		]);

		$item->update([
            'name'          => $request->name,
            'category_id'   => $request->category_id,
            'description'   => $request->description,
            'specification' => $request->specification,
            'unit' => $request->unit,
            'danger_level' => $request->danger_level,
            'important' => $request->important == '1' ? '1' : '0',
        ]);

		Alert::flash('New Item has been added', 'success');

		return redirect('/item');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Item $item
	 *
	 * @return \Illuminate\Http\Response
	 * @throws \Exception
	 */
	public function destroy(Item $item)
	{
		Gate::authorize('admin||supplier');

		if ($item->order()->count()){

			Alert::flash('You can not delete this item because it is related to some orders', 'danger');

			return back();
		}

		$item->delete();

		Alert::flash('The item has been deleted', 'success');

		return back();
	}
}
