<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\City;

class CityController extends Controller {

    private $rules = [
        'name' => ['required', 'min:2'],
    ];

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
        $cities = City::where('id', '>', 0)
                ->orderBy('id', 'asc')
                ->take(100)
                ->get();
        return view('city.index', compact('cities'));
    }

    public function create() {
        return view("city.create");
    }

    public function edit($id) {
        $city = City::findOrFail($id);
        //$this->authorize('modify', $city);
        return view("city.edit", compact('city'));
    }

    public function store(Request $request) {
        $this->validate($request, $this->rules);

        $data = $this->getRequest($request);

        $request->user()->contactsToCity()->create($data);
//        echo '<pre>';
//        var_dump($request->user()->contactsToCity()->create($data));
//        echo '</pre>';
//        die();
        return redirect('city')->with('message', 'City Saved!');
    }

    public function update($id, Request $request) {
        $city = City::findOrFail($id)
        ;
        //$this->authorize('modify', $contact);

        $this->validate($request, $this->rules);


        $data = $this->getRequest($request);
        $city->update($data);



        return redirect('city')->with('message', 'Contact Updated!');
    }

    private function getRequest(Request $request) {
        $data = $request->all();

        return $data;
    }

    public function destroy($id) {
        $city = City::findOrFail($id);
        //$this->authorize('modify', $city);

        $city->delete();


        return redirect('city')->with('message', 'Contact Deleted!');
    }

}
