<?php

namespace App\Http\Controllers;

use App\Agent;
use App\property;
use Response;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = property::orderBy('id', 'DESC')->get();
        if ($property) {
            return Response::json([
                    'status' => true,
                    'data'   => $properties,
                        ], 200);
        } else {
            return Response::json([
                        'error' => [
                            'message' => 'Something wrong with your Information',
                        ],
                            ], 404);
        }
    }

    public function featured()
    {
        $properties = property::where('featured', 1)->orderBy('id', 'DESC')->get();
        if ($property) {
            return Response::json([
                    'status' => true,
                    'data'   => $properties,
                        ], 200);
        } else {
            return Response::json([
                        'error' => [
                            'message' => 'Something wrong with your Information',
                        ],
                            ], 404);
        }
    }

    public function detail($id)
    {
        $property = property::where('id', $id)->first();
        if ($property) {
            return Response::json([
                    'status' => true,
                    'data'   => $property,
                        ], 200);
        } else {
            return Response::json([
                        'error' => [
                            'message' => 'Something wrong with your Information',
                        ],
                            ], 404);
        }
    }

    public function agents()
    {
        $agents = Agent::get();
        if ($property) {
            return Response::json([
                    'status' => true,
                    'data'   => $agents,
                        ], 200);
        } else {
            return Response::json([
                        'error' => [
                            'message' => 'Something wrong with your Information',
                        ],
                            ], 404);
        }
    }
}
