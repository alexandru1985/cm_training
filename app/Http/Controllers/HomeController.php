<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use Illuminate\Support\Facades\File;
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
    public function testAjax($id) {
        $idTest = $id;
        return view('testAjax', compact('idTest'));
    }
    public function testAjaxPost($id, Request $request) {
        $arr = [];
        for($i = 0;$i <100000;$i++) {
           $arr[] = $i;
           
        }

      return $arr;
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


        return response()->json([
                        'first_name' => $validator->errors()->first('first_name'),
                        'last_name' => $validator->errors()->first('last_name')
        ]);
    }
    public function uploadSubmit(Request $request) {
// dd($request->test);
        $file = $request->file_name;
//        
//dd($file);
       $destinationPath = 'uploads';
       $file->move($destinationPath,$file->getClientOriginalName());
             return redirect()
          ->back()
          ->withSuccess("File  uploaded.");


    }
}
