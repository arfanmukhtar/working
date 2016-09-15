<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use DB;
use Auth;
use Session;
class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$total_properties = DB::table("properties")->count();
		$total_agents = DB::table("users")->count();
		$agents = DB::table("users")->orderBy('id' , 'DESC')->limit(10)->get();
		$total_customer_requets = DB::table("customers_request")->count();
		$customer_requets = DB::table("customers_request")->orderBy('id' , 'DESC')->limit(10)->get();
		$data = array(
			"total_properties" => $total_properties,
			"total_agents" => $total_agents,
			"agents" => $agents,
			"customer_requets" => $customer_requets,
			"total_customer_requets" => $total_customer_requets
		);
        return view('dashboard/home' , ['data' => $data, 'title' , "Dashboard"]);
    }
	
	public function profile()
    {
		$user = User::find(Auth::user()->id);
        return view('profile' , ['user' => $user, 'title' , "My Profile"]);
    }
	
	public function customer_requets()
    {
		if(Auth::user()->AccessLevel == 1) {
			$properties = DB::table("properties")->where("agent_id" , Auth::user()->id)->get();
			$property_ids = array();
			foreach($properties as $pro) { 
				$property_ids[] = $pro->id;
			}
			
			$customer_requets = DB::table("customers_request")->whereIn("property_id" , $property_ids)->orderBy('id' , 'DESC')->limit(10)->get();
		} else { 
			$customer_requets = DB::table("customers_request")->orderBy('id' , 'DESC')->limit(10)->get();
		}
		
		return view('dashboard/customer_requests' , ['title' => "Customers Requests", 'customer_requets' => $customer_requets, 'title' , "My Profile"]);
    }
}
