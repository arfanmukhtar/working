<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Feature;
use DB;
use Session;
class FeatureController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
	
    public function index()
    {
		$features = Feature::get();
        return view('feature/home' , ['features' => $features, 'title' => "Features"]);
    }
	
	
	public function save(Request $request)
    {
		$id = $request->input("id");
        $data = array(
			"name" => $request->input("name")
		);
		
		if($id) { 
			\Session::flash('flash_message', 'Updated Successfully');
			Feature::where("id" , $id)->update($data);
		} else { 
			\Session::flash('flash_message', 'Added Successfully');
			Feature::insert($data);
		}
		return redirect("features");
    }
	
	public function delete(Request $request)
    {
        $id = $request->input("id");
		Feature::where("id" , $id)->delete();
    }
	
	public function get(Request $request)
    {
		$id = $request->input("id");
        $result = Feature::find($id);
		echo json_encode($result);
    }
}
