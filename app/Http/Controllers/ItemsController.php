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
         $items = Item::where('id', $id)->first();

        if(!$items){
            return response()->json([
                'status'=> 'error',
                'message' => 'Item not found.'
            ]);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'Item retrieved successfully.',
            'data' => $items
        ]);
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
 	    'categoryID' => 'required|exists:item_categories,id',
        'description' =>'required|string',
        'status' => 'required|string',
        'campus' => 'required|string',
        'location' => 'required|string',
        'dateLost' => 'nullable',
        'dateFound' => 'nullable',
        ]);

        if($validatedData){
            $items = Item::create([
                'categoryID' => $validatedData['categoryID'],
                'description' => $validatedData['description'],
                'status' => $validatedData['status'],
                'campus' => $validatedData['campus'],
                'location' => $validatedData['location'],
                'dateLost' => $validatedData['dateLost'],
                'dateFound' => $validatedData['dateFound']
            ]);

            if(!$items){
                return response()->json([
                    'status'=>'error',
                    'message'=>'An error occured when creating an item.'
                ]);
            }
 
                return response()->json([
                    'status'=>'success',
                    'message'=>'Item created successfully.',
                    'data'=> $items
                ]);
    }
    }

    public function update(Request $request, $id)
    {
       $validatedData = $request->validate([
        'categoryID' => 'required|exists:item_categories,id',
        'description' =>'required|string',
        'status' => 'required|string',
        'campus' => 'required|string',
        'location' => 'required|string',
        'dateLost' => 'nullable',
        'dateFound' => 'nullable',
        ]);

        $items = Item::where('id', $id)->first();

        if (!$items) {
           return response()->json([
                    'status'=>'error',
                    'message' => 'Item not found.',
           ]);
        }
           $updatedItems = $items->update([
               'categoryID' => $validatedData['categoryID'],
                'description' => $validatedData['description'],
                'status' => $validatedData['status'],
                'campus' => $validatedData['campus'],
                'location' => $validatedData['location'],
                'dateLost' => $validatedData['dateLost'],
                'dateFound' => $validatedData['dateFound']
           ]);

           if($updatedItems){
               return response()->json([
                   'status'=>'success',
                   'message' => 'Item updated successfully',
                   'data' => $items
               ]);
           }  
    }   

    public function destroy($id)
    {
         $items = Item::where('id', $id)->first();

        if (!$items) {
           return response()->json([
                    'status'=>'error',
                    'message' => 'Item not found.',
           ]);
        }
           $items->delete();
           return response()->json([
                   'status'=>'success',
                   'message' => 'Item deleted successfully',
               ]);
    }   


}
