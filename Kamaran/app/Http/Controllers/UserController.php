<?php

namespace App\Http\Controllers;

use App\Alerts\Alert;
use App\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller {

	/**
	 * UserController constructor.
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * @param null $user
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 * @throws \Illuminate\Auth\Access\AuthorizationException
	 */
	public function profile($user = null)
	{
		$this->authorize('view', auth()->user());

		$user = $this->getUser($user);

		return view('profile', compact('user'));
	}

	/**
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 * @throws \Illuminate\Auth\Access\AuthorizationException
	 * @throws \Exception
	 */
	public function profileEdit($user = null, Request $request)
	{
		$this->authorize('update', auth()->user());

		$request->validate([
			'phone'   => 'required',
			'address' => 'required'
		]);

		$user = $this->getUser($user);

		$user->update($request->all());

		Alert::flash('updated successfully', 'success');

		return back();
	}

	/**
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 * @throws \Illuminate\Auth\Access\AuthorizationException
	 * @throws \Exception
	 */
	public function profileChangePassword($user = null, Request $request)
	{
		$user = $this->getUser($user);

		$this->authorize('update', $user);

		$request->validate([
			'old_password'          => ['required', function ($attribute, $value, $fail) use ($user) {
				if (!Hash::check($value, $user->password))
				{
					return $fail('the password is not correct try again.');
				}
			}],
			'password'              => 'bail|required|confirmed',
			'password_confirmation' => 'bail|required'
		]);

		$user->update([
			'password' => bcrypt($request->password)
		]);

		Alert::flash('Password updated successfully', 'success');

		return back();
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function employees()
	{
		Gate::authorize('admin||manager');

		if (auth()->user()->hasCategoryEmployees())
			$employees = auth()->user()->categoryEmployees();

		if (auth()->user()->isAdmin())
			$employees = User::all();

        $activeEmployees = $employees->where('status' , 'active');


        return view('manage_employees', compact('employees', 'activeEmployees'));
	}

	/**
	 * @param $user
	 *
	 * @return \Illuminate\Contracts\Auth\Authenticatable|null
	 */
	private function getUser($user)
	{
		if ($user)
			$user = User::find($user);
		else
			$user = auth()->user();

		return $user;
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 * @throws \Illuminate\Auth\Access\AuthorizationException
	 */
	public function create()
	{
		$this->authorize('create', auth()->user());

		$categories = Category::all();

		return view('employee_create', compact('categories'));
	}

	/**
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 * @throws \Exception
	 */
	public function store(Request $request)
	{
		if ($request->level == 'manager'){
			if ($request->has('category_id')){
				if (Category::where('id',$request->category_id)->whereHas('users', function ($q){
					$q->where('level', 'manager');
				})->count()){
					Alert::flash('This Category is already with a manager', 'danger');

					return redirect('/manage_employees');
				}
			}
		}
		$request->validate([
			'name'        => 'required',
			'username'    => 'required|unique:users,username',
			'gender'      => [
				'required',
				Rule::in(['male', 'female']),
			],
			'phone'       => 'required|unique:users,phone',
			'email'       => 'required|email|unique:users,email',
			'level'       => [
				'required',
				Rule::in(['admin', 'employee', 'manager', 'inventory_employee', 'head_of_suppliers']),
			],
			'category_id' => 'nullable|exists:categories,id',
			'address'     => 'required'
		]);

		User::create(array_merge($request->all(),['password' => bcrypt('kamaran')]));

		Alert::flash('User added successfully', 'success');

		return redirect('/manage_employees');
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function myManager()
	{
		Gate::authorize('employee');

		return view('my_manager');
	}

	/**
	 * @param User $user
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 * @throws \Illuminate\Auth\Access\AuthorizationException
	 */
	public function edit(User $user)
	{
		$this->authorize('update', $user);

		$categories = Category::all();

		return view('employee_edit', compact('user', 'categories'));
	}

	/**
	 * @param User    $user
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 * @throws \Illuminate\Auth\Access\AuthorizationException
	 * @throws \Exception
	 */
	public function update(User $user, Request $request)
	{
		$this->authorize('update', $user);

		$request->validate([
			'name'        => 'required',
			'username'    => 'required|unique:users,username,' . $user->id,
			'gender'      => [
				'required',
				Rule::in(['male', 'female']),
			],
			'phone'       => 'required',
			'email'       => 'required|email',
			'level'       => [
				'required',
				Rule::in(['admin', 'employee', 'manager', 'inventory_employee', 'head_of_suppliers']),
			],
			'category_id' => 'nullable|exists:categories,id',
			'address'     => 'required'
		]);

		$user->update([
			'name'        => $request->name,
			'username'    => $request->username,
			'gender'      => $request->gender,
			'phone'       => $request->phone,
			'email'       => $request->email,
			'level'       => $request->level,
			'address'     => $request->address,
			'category_id' => $request->category_id ?? null,
			'status'      => $request->status == 'active' ? 'active' : 'inactive',
		]);

		Alert::flash('User updated successfully', 'success');

		return redirect('/manage_employees');
	}

	/**
	 * @param User $user
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 * @throws \Exception
	 */
	public function destroy(User $user)
	{
		$this->authorize('delete', $user);

		if ($user->status == 'active')
		{
			$user->update([
				'status' => 'inactive'
			]);

			Alert::flash('User ' . $user->name . ' is inactive now', 'success');
		} else
		{
			$user->update([
				'status' => 'active'
			]);

			Alert::flash('User ' . $user->name . ' is active now', 'success');

		}


		return back();
	}

	/**
	 * @param User $user
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 * @throws \Exception
	 */
	public function passwordReset(User $user)
	{
		$user->update([
			'password' => bcrypt('kamaran'),
		]);

		Alert::flash('Password for User "' . $user->name . '" has been changed to default', 'success');

		return back();
	}

}
