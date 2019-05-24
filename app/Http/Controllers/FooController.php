<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FooController extends Controller
{
    public function getFoo()
    {
    	return view('set-foo');
    }

    public function setFoo(Request $request)
    {
    	$this->validate($request, [
    		'foo' => 'required'
    	]);

    	try {
    		// try to set into session
    		$request->session()->put('foo', $request->get('foo'));
    		return redirect('home');
    	} catch(\Exception $e) {
            report($e);
    		return redirect('setfoo')->with(['error' => 'You must set foo to continue.']);
    	}

    }
}
