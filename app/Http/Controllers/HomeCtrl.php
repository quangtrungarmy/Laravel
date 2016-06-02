<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App;
use App\Employee;
use App\Department;
use App\Account;

class HomeCtrl extends Controller
{
    //
    public function index(Request $request) {
		$status = $request->session()->get('status', 'n');
		$name = $request->session()->get('name');
		$lang = $request->session()->get('lang', 'en');
		App::setLocale($lang);

		return view('home', [ 'status' => $status, 'name' => $name, 'lang' => $lang]);
	}

	public function countEmp(){
		$data = Employee::count();
		echo $data;
	}

	public function countDep(){
		$data = Department::count();
		echo $data;
	}

	public function countUsr(){
		$data = Account::count();
		echo $data;
	}
}