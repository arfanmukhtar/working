<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::get();

        return view('category/home', ['categories' => $categories, 'title' => 'Categories']);
    }

    public function save(Request $request)
    {
        $id = $request->input('id');
        $data = [
            'name' => $request->input('name'),
        ];

        if ($id) {
            \Session::flash('flash_message', 'Updated Successfully');
            Category::where('id', $id)->update($data);
        } else {
            \Session::flash('flash_message', 'Added Successfully');
            Category::insert($data);
        }

        return redirect('categories');
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');
        Category::where('id', $id)->delete();
    }

    public function get(Request $request)
    {
        $id = $request->input('id');
        $result = Category::find($id);
        echo json_encode($result);
    }
}
