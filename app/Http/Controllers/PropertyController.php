<?php

namespace App\Http\Controllers;

use App\Agent;
use App\Category;
use App\Feature;
use App\Property;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Intervention\Image\ImageManagerStatic as Image;
use Session;

class PropertyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->AccessLevel == 1) {
            $properties = Property::where('agent_id', Auth::user()->id)->paginate(25);
        } else {
            $properties = Property::paginate(25);
        }

        return view('property/home', ['properties' => $properties, 'title' => 'Properties']);
    }

    public function form()
    {
        $properties = Property::get();

        $categories = Category::get();
        $features = Feature::get();
        if (Auth::user()->AccessLevel == 1) {
            $agents = Agent::find(Auth::user()->id);
        } else {
            $agents = Agent::get();
        }

        return view('property/form', ['properties' => $properties, 'agents' => $agents, 'categories' => $categories, 'features' => $features, 'title' => 'Property Form']);
    }

    public function edit($id)
    {
        $property = Property::find($id);
        $properties = Property::get();
        $categories = Category::get();
        $features = Feature::get();
        if (Auth::user()->AccessLevel == 1) {
            $agents = Agent::find(Auth::user()->id);
        } else {
            $agents = Agent::get();
        }

        $property_images = DB::table('supporting_images')->where('property_id', $id)->get();

        return view('property/edit', ['properties' => $properties, 'property_images' => $property_images, 'property' => $property, 'agents' => $agents, 'categories' => $categories, 'features' => $features, 'title' => 'Property Form']);
    }

    public function save(Request $request)
    {
        $id = $request->input('id');
        $data = [
            'title'       => $request->input('title'),
            'category_id' => $request->input('category_id'),
            'agent_id'    => $request->input('agent_id'),
            'user_id'     => Auth::user()->id,
            'address'     => $request->input('address'),
            'city'        => $request->input('city'),
            'state'       => $request->input('state'),
            'zip'         => $request->input('zip'),
            'longitude'   => $request->input('longitude'),
            'latitude'    => $request->input('latitude'),
            'price'       => $request->input('price'),
            'beds'        => $request->input('bedrooms'),
            'bath'        => $request->input('bathrooms'),
            'year'        => $request->input('year'),
            'size'        => $request->input('size'),
            'body'        => $request->input('description'),
        ];

        if (!empty($request->input('features'))) {
            $data['features'] = implode(',', $request->input('features'));
        }

        if (!empty($request->input('related'))) {
            $data['related'] = implode(',', $request->input('related'));
        }


        $user_id = Auth::user()->id;
        $destinationPath = "assets/images/uploads/$user_id/";
        if ($request->hasFile('mainfile')) {
            $fileName = rand(11111, 999999); // renameing image
                    $request->file('mainfile')->move($destinationPath, "$fileName.jpg");
            $data['image_name'] = "$fileName.jpg";
            $path = public_path("assets/images/uploads/$user_id/$fileName.jpg");
            Image::make($path)->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path);
        }


        if ($id) {
            \Session::flash('flash_message', 'Updated Successfully');
            Property::where('id', $id)->update($data);
            $g_id = Session::get('g_id');
            $data1 = [
                'property_id' => $id,
                'g_id'        => 0,
            ];
            DB::table('supporting_images')->where('g_id', $g_id)->update($data1);
            $dirname = "assets/images/uploads/$user_id/temp/";
            $images = glob($dirname.'*.jpeg');
            foreach ($images as $key => $row) {
                $move = str_replace('temp', $id, $row);
                rename($row, $move);
            }
        } else {
            $insert_id = Property::insertGetId($data);
            $g_id = Session::get('g_id');
            $data1 = [
                'property_id' => $insert_id,
                'g_id'        => 0,
            ];
            DB::table('supporting_images')->where('g_id', $g_id)->update($data1);
            rename("assets/images/uploads/$user_id/temp", "assets/images/uploads/$user_id/$insert_id");

            \Session::flash('flash_message', 'Added Successfully');
        }

        return redirect('properties');
    }

    public function delete($id)
    {
        if (Auth::user()->AccessLevel == 1) {
        } else {
        }

        return view('property/form');
    }

    public function fileupload()
    {
        $id = Auth::user()->id;
        $files = Input::file('file');
        if ($files[0]->isValid()) {
            $destinationPath = "assets/images/uploads/$id/temp/";
            $fileName = rand(11111, 99999);
            $files[0]->move($destinationPath, "$fileName.jpeg");
            $path = public_path("assets/images/uploads/$id/temp/$fileName.jpeg");
            Image::make($path)->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path);
            $g_id = Session::get('g_id');
            if (empty($g_id)) {
                $g_id = rand(111, 9999).$id;
                Session::put('g_id', $g_id);
            }
            $data = [
                'property_id' => '',
                'image_name'  => "$fileName.jpeg",
                'g_id'        => $g_id,
            ];
            DB::table('supporting_images')->insert($data);

            return 'Upload successfully';
        }
    }

    public function image_delete($id)
    {
        $image = DB::table('supporting_images')->where('id', $id)->first();
        $property = Property::where('id', $id)->first();

        unlink('assets/images/uploads/'.$property->user_id.'/'.$image->property_id.'/'.$image->image_name);
        DB::table('supporting_images')->where('id', $id)->delete();

        return redirect('listing/edit/'.$image->property_id);
    }

    public function addTofeatured(Request $request)
    {
        $id = $request->input('property_id');
        $property = Property::find($id);
        if ($property->is_delete == 1) {
            $value = 0;
        }

        if ($property->is_delete == 0) {
            $value = 1;
        }
        Property::where('id', $id)->update(['featured' => $value]);
    }

    public function addToArchive(Request $request)
    {
        $id = $request->input('property_id');
        $property = Property::find($id);
        if ($property->is_delete == 1) {
            $value = 0;
        }

        if ($property->is_delete == 0) {
            $value = 1;
        }
        Property::where('id', $id)->update(['is_delete' => $value]);
    }
}
