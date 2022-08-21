<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $products = Product::select(DB::raw('products.*, categories.name as category'))
                ->join('categories', 'categories.id', '=', 'products.category_id');
            return DataTables::of($products)
                // ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="/admin/product/' . $row->id . '/edit" class="edit btn btn-primary btn-sm mx-1">Edit</a>';
                    $btn .= '<button class="btn btn-sm btn-danger drop mx-1" data-id="' . $row->id . '">Hapus</button>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);;
        }
        return view('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            'name' => 'required|unique:products,name',
            'description' => '',
            'category_id' => 'required',
            'price' => 'required|integer',
            'photo' => 'required|mimes:png,jpg,jpeg,gif,webp|max:2048'
        ]);

        $photo = $request->file('photo');

        $ext = $photo->getClientOriginalExtension();
        $filename = 'product_' . date("YmdHis.") . $ext;
        $request->photo->storeAs('public/product', $filename);
        $valid['photo'] = '/storage/product/' . $filename;

        // return response()->json($valid);
        Product::create($valid);
        return redirect('admin/product/create')->with('status', 'success-saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::where('id', $id)->first();
        $categories = Category::all();
        // return response()->json($product);
        return view('admin.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $valid = $request->validate([
            'name' => 'required|unique:products,name,' . $id,
            'description' => '',
            'category_id' => 'required',
            'price' => 'required|integer',
            'photo' => 'mimes:png,jpg,jpeg,gif,webp|max:2048'
        ]);

        $product=Product::where('id', $id);

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');

            $ext = $photo->getClientOriginalExtension();
            $filename = 'product_' . date("YmdHis.") . $ext;
            $request->photo->storeAs('public/product', $filename);
            $valid['photo'] = '/storage/product/' . $filename;

            $product = $product->first();
            if(File::exists(public_path($product->photo))){
                File::delete(public_path($product->photo));
            }

        } else {
            unset($valid['photo']);
        }

        $product->update($valid);
        return redirect('admin/product')->with('status', 'success-saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Product::destroy($product);
        return redirect('admin/product')->with('status', 'success-deleted');
    }
}
