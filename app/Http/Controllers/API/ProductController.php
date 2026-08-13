<?php

namespace App\Http\Controllers\API;
use App\Models\product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = product::with('category')->get();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    $validator = Validator::make($request->all(),[
        "name" => "required|string|max:50",
        "price" => "required|integer",
        "stock" => "required|integer",
        "description" => "required",
        "category_id" => "required|exists:categories,id"
    ]);

    if($validator->fails()) {
        return response()->json([
            'message' => 'Validation failed',
            'errors' => $validator->errors()
        ],);
    }

    $data = Product::create($validator->validated());
    return response()->json([
        'message' => "Data created succesfully",
        'data' => $data
    ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = product::find($id);

        if(!$data){
            return response()->json([
                'message' => 'data not found'
            ]);
        }
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $product = Product::findOrFail($id);
        if(!$product){
            return response()->json([
                "message" => "data not found"
        ]);

        }
          $validator = Validator::make($request->all(),[
        "name" => "required|string|max:50",
        "price" => "required|integer",
        "stock" => "required|integer",
        "description" => "required",
        "category_id" => "required|exists:categories,id"
    ]);

    if($validator->fails()) {
        return response()->json([
            'message' => 'Validation failed',
            'errors' => $validator->errors()
        ], 422
        );
    }



    $product= Product::create($validator->validated());
    return response()->json([
        'message' => "Data created succesfully",
        'data' => $product
    ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
