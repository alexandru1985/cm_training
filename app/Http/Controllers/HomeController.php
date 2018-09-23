<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Validator;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('home');
    }

    public function myform() {

        return view('myform');
    }

    /**

     * Display a listing of the myformPost.

     *

     * @return \Illuminate\Http\Response

     */
    public function myformPost(Request $request) {
        
        $messages = [
            'first_name.required' => 'First Name is required',
        ];

        $validator = Validator::make($request->all(), [
                    'first_name' => 'required',
                    'last_name' => 'required',
//            'email' => 'required|email',
//
//            'address' => 'required',
                        ], $messages);


        if ($validator->passes()) {


            return response()->json(['success' => 'Added new records.']);
        }


        return response()->json(['error' => [
                        'first_name' => $validator->errors()->first('first_name'),
                        'last_name' => $validator->errors()->first('last_name')
        ]]);
    }

}
