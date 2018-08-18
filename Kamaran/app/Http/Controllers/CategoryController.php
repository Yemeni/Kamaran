<?php

namespace App\Http\Controllers;

use App\Alerts\Alert;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller {
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
		Gate::authorize('admin');

		$categories = Category::all();

		return view('manage_categories', compact('categories'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		Gate::authorize('admin');

		return view('category_create');
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
		Gate::authorize('admin');

		$request->validate([
			'name'    => 'required|unique:categories,name',
			'comment' => 'nullable'
		]);

		Category::create($request->all());

		Alert::flash('Category added successfully', 'success');

		return redirect('/category');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Category $category
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show(Category $category)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Category $category
	 *
	 * @return \Illuminate\Http\Response
	 * @throws \Illuminate\Auth\Access\AuthorizationException
	 */
	public function edit(Category $category)
	{
		$this->authorize('update', $category);

		return view('category_edit', compact('category'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \App\Category            $category
	 *
	 * @return \Illuminate\Http\Response
	 * @throws \Exception
	 */
	public function update(Request $request, Category $category)
	{
		$this->authorize('update', $category);

		$request->validate([
			'name'    => 'required|unique:categories,name,' . $category->id,
			'comment' => 'nullable|max:255'
		]);

		$category->update($request->all());

		Alert::flash('Category updated successfully', 'success');

		return redirect('/category');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Category $category
	 *
	 * @return \Illuminate\Http\Response
	 * @throws \Exception
	 */
	public function destroy(Category $category)
	{
		Gate::authorize('admin');

		if ($category->users()->count() || $category->inventories()->count() || $category->orders()->count())
		{
			Alert::flash('You can not delete this category because of related records', 'danger');

			return back();
		}

		$category->delete();

		Alert::flash('Category deleted successfully', 'success');

		return back();
	}
}
