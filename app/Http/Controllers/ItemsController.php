<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;

class ItemsController extends Controller
{
    public function index()
    {
        $items = Item::all();

        if($items->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'No items found.'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Items retrieved successfully.',
            'data' => $items
        ], 200 );
    }
    public function show($id)
    {

    }

    public function store(Request $request)
    {

    }

    public function update(Request $request, $id)
    {
        
    }   

    public function destroy($id)
    {
        
    }   


}
