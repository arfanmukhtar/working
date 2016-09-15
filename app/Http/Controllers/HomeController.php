<?php

namespace App\Http\Controllers;

use App;
use App\Agent;
use App\Property;
use App\User;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Mail;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        $locale = Session::get('locale');
        App::setLocale($locale);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::orderBy('featured', 'DESC')->orderBy('id', 'DESC')->paginate(6);
        $featured_properties = Property::limit(5)->get();
        $agents = Agent::limit(5)->get();

        return view('home', ['agents' => $agents, 'featured_properties' => $featured_properties, 'properties' => $properties]);
    }

    public function map()
    {
        $all_properties = Property::where('is_delete', 0)->get();
        $agents = Agent::limit(5)->get();
        $properties = Property::orderBy('featured', 'DESC')->paginate(6);

        return view('map', ['agents' => $agents, 'all_properties' => $all_properties, 'properties' => $properties]);
    }

    public function listing()
    {
        $keywords = '';
        if (!empty(Input::get('keywords'))) {
            $keywords = Input::get('keywords');
        }


        $type = '';
        if (!empty(Input::get('type'))) {
            $type = Input::get('type');
        }

        $bed = '';
        if (!empty(Input::get('bed'))) {
            $bed = Input::get('bed');
        }
        $bath = '';
        if (!empty(Input::get('bath'))) {
            $bath = Input::get('bath');
        }

        $min = 0;
        if (!empty(Input::get('min'))) {
            $min = Input::get('min');
        }
        $max = 0;
        if (!empty(Input::get('max'))) {
            $max = Input::get('max');
        }

        $query = Property::where('is_delete', 0);

        if (!empty($keywords)) {
            $query->orWhere('title', 'like', "%$keywords%");
            $query->orWhere('address', 'like', "%$keywords%");
            $query->orWhere('zip', 'like', "%$keywords%");
            $query->orWhere('city', 'like', "%$keywords%");
            $query->orWhere('state', 'like', "%$keywords%");
        }

        if (!empty($min) and !empty($max)) {
            $query->where('price', '>=', $min);
            $query->where('price', '<=', $max);
        }


        if (!empty($bed)) {
            $query->where('beds', $bed);
        }

        if (!empty($bath)) {
            $query->where('bath', $bath);
        }

        if (!empty($type)) {
            $query->where('type', $type);
        }

        $forms = [
            'keywords' => $keywords,
            'type'     => $type,
            'max'      => $max,
            'min'      => $min,
            'bath'     => $bath,
            'bed'      => $bed,
        ];



        $order = 'new';
        $orderby = 'id';
        $ordertype = 'desc';
        if (!empty(Input::get('order'))) {
            $order = Input::get('order');

            if ($order == 'priceh') {
                $orderby = 'price';
                $ordertype = 'desc';
            }

            if ($order == 'pricel') {
                $orderby = 'price';
                $ordertype = 'asc';
            }
        }

        $query->orderBy($orderby, $ordertype);
        $properties = $query->paginate(12);

        $agents = Agent::limit(5)->get();

        return view('listing', ['forms' => $forms, 'order' => $order, 'agents' => $agents, 'properties' => $properties]);
    }

    public function maplisting()
    {
        $keywords = '';
        if (!empty(Input::get('keywords'))) {
            $keywords = Input::get('keywords');
        }


        $type = '';
        if (!empty(Input::get('type'))) {
            $type = Input::get('type');
        }

        $bed = '';
        if (!empty(Input::get('bed'))) {
            $bed = Input::get('bed');
        }
        $bath = '';
        if (!empty(Input::get('bath'))) {
            $bath = Input::get('bath');
        }

        $min = 0;
        if (!empty(Input::get('min'))) {
            $min = Input::get('min');
        }
        $max = 0;
        if (!empty(Input::get('max'))) {
            $max = Input::get('max');
        }

        $query = Property::where('is_delete', 0);

        if (!empty($keywords)) {
            $query->orWhere('title', 'like', "%$keywords%");
            $query->orWhere('address', 'like', "%$keywords%");
            $query->orWhere('zip', 'like', "%$keywords%");
            $query->orWhere('city', 'like', "%$keywords%");
            $query->orWhere('state', 'like', "%$keywords%");
        }

        if (!empty($min) and !empty($max)) {
            $query->where('price', '>=', $min);
            $query->where('price', '<=', $max);
        }


        if (!empty($bed)) {
            $query->where('beds', $bed);
        }

        if (!empty($bath)) {
            $query->where('bath', $bath);
        }

        if (!empty($type)) {
            $query->where('type', $type);
        }

        $forms = [
            'keywords' => $keywords,
            'type'     => $type,
            'max'      => $max,
            'min'      => $min,
            'bath'     => $bath,
            'bed'      => $bed,
        ];



        $order = 'new';
        $orderby = 'id';
        $ordertype = 'desc';
        if (!empty(Input::get('order'))) {
            $order = Input::get('order');

            if ($order == 'priceh') {
                $orderby = 'price';
                $ordertype = 'desc';
            }

            if ($order == 'pricel') {
                $orderby = 'price';
                $ordertype = 'asc';
            }
        }

        $query->orderBy($orderby, $ordertype);
        $all_properties = $query->get();
        $properties = $query->paginate(12);


        $agents = Agent::limit(5)->get();

        return view('maplisting', ['forms' => $forms, 'order' => $order, 'agents' => $agents, 'all_properties' => $all_properties, 'properties' => $properties]);
    }

    public function detail($id)
    {
        $property = Property::find($id);
        $features = DB::table('features')->get();
        $agent = Agent::find($property->agent_id);
        $property_photos = DB::table('supporting_images')->where('property_id', $id)->get();

        return view('detail', ['agent' => $agent, 'features' => $features, 'property' => $property, 'property_photos' => $property_photos]);
    }

    public function agents()
    {
        $agents = Agent::get();

        return view('agent', ['agents' => $agents]);
    }

    public function contact()
    {
        return view('contact');
    }

    public function calculator()
    {
        return view('calculator');
    }

    public function about()
    {
        return view('about');
    }

    public function profile()
    {
        $user = User::find(Auth::user()->id);

        return view('profile', ['user' => $user, 'title', 'My Profile']);
    }

    public function send_request(Request $request)
    {
        if ($request->input('property_id')) {
            $property_id = $request->input('property_id');
        } else {
            $property_id = 0;
        }

        $email = $request->Input('email');
        $name = $request->Input('name');
        $msg = $request->Input('message');
        $phone = $request->Input('phone');

        $data_contact = [
            'property_id' => $property_id,
            'name'        => $request->input('name'),
            'phone'       => $request->input('phone'),
            'email'       => $request->input('email'),
            'message'     => $request->input('message'),
        ];
        $insert_id = DB::table('customers_request')->insertGetId($data_contact);
        $data = ['phone' => $phone, 'title' => 'SaleForCast', 'email' => $email, 'name' => $name, 'msg' => $msg];
        Mail::send('email_template', $data, function ($header) use ($email, $name) {
            $header->from($email, $name);
            $header->to('arfan67@gmail.com')->subject('Easy Estate');
        });


        return $insert_id;
    }
}
