<?php

namespace App\Alerts;

abstract class Alert {

	/**
	 * @var string
	 */
	protected static $name = 'alert';

	/**
	 * @var array
	 */
	protected static $types = ['success', 'danger', 'warning', 'info'];

	/**
	 * @param $message
	 * @param $type
	 *
	 * @throws \Exception
	 */
	public static function flash($message, $type)
	{

		if (!in_array($type, static::$types))
		{
			throw new \Exception('There in no such ' . $type . ' type in this Alert');
		}

		session()->flash('alert', [
			'message' => $message,
			'type'    => $type
		]);
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public static function renderJs()
	{
		return view('alert.assets.' . static::$name . '.js');
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public static function renderCss()
	{
		return view('alert.assets.' . static::$name . '.css');
	}

	/**
	 * @return mixed
	 */
	public static function render()
	{
		if (session()->has('alert'))
		{
			$session = session('alert');

			return static::template($session);
		}

		return false;
	}

	/**
	 * @param $name
	 * @param $data
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public static function view($name, $data)
	{
		return view('alert.' . $name, $data);
	}

	/**
	 * @param $data
	 *
	 * @return mixed
	 */
	public abstract static function template($data);

}
