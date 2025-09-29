<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ItemCategory;

class ItemCategoryController extends Controller
{
    public function index()
    {
        $categories = ItemCategory::all();

        if ($categories->isEmpty()) {
            return response()->json([
                'status'=>'error',
                'message' => 'No ItemCategories found',
            ], 404);
        }
        return response()->json([
            'status'=>'success',
            'message' => 'ItemCategory retrieved successfully',
            'data' => $categories
             ], 200);
    }  

    public function show($id)
    {
        $categories = ItemCategory::find($id);

        if (!$categories) {
            return response()->json(['message' => 'Item Category not found'], 404);
        }

        return response()->json($categories);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'categoryName' => 'required|string' ,
            'categoryDescription' => 'required|string',
        ]);

        if($validatedData){
            $categories = ItemCategory::create([
                'categoryName' => $validatedData['categoryName'],
                'categoryDescription' => $validatedData['categoryDescription'],
            ]);

            if(!$categories){
                return response()->json([
                    'status'=>'error',
                    'message' => 'An error occurred while creating the Item Category.',
                ]);
            }
            return response()->json([
                'status'=>'success',
                'message' => 'Item Category created successfully',
                'data' => $categories
            ]);    
        }
    }

    public function update(Request $request, $id)
    {
      $validatedData = $request->validate([
            'categoryName' => 'required|string',
            'categoryDescription' => 'required|string',
        ]);

        $categories = ItemCategory::where('id', $id)->first();

        if (!$categories) {
           return response()->json([
                    'status'=>'error',
                    'message' => 'Item Category not found.',
           ]);
        }
           $updatedItemCategory = $categories->update([
                'categoryName' => $validatedData['categoryName'],
                'categoryDescription' => $validatedData['categoryDescription'], 
           ]);
           if($updatedItemCategory){
               return response()->json([
                   'status'=>'success',
                   'message' => 'Item Category updated successfully',
                   'data' => $categories
               ]);
           } 
        }

    public function destroy($id)
    {
        $categories = ItemCategory::where('id', $id)->first();

        if (!$categories) {
           return response()->json([
                    'status'=>'error',
                    'message' => 'Item Category not found.',
           ]);
        }
           $categories->delete();
           return response()->json([
                   'status'=>'success',
                   'message' => 'Item Category deleted successfully',
               ]);
        }
    }



