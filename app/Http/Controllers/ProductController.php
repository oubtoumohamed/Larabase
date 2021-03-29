<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public $model = 'product';
    public function filter_fields(){
        return [
            'title'=>[ 'type'=>'text' ],
            'price'=>[ 'type'=>'text' ],
            'date'=>[ 'type'=>'text' ],

        ];
    }

    public function __construct()
    {
        //$this->middleware('auth');

    }
    public function index()
    {
        $products = Product::where($this->filter(false))
                        ->orderBy($this->orderby, 'desc')->paginate($this->perpage())
                        ->withPath($this->url_params(true,['page'=>null]));

        return $this->view_('product.list', [
            'results'=>$products
        ]);
    }

    /*
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->view_('product.update',[
            'object'=> new Product(),
        ]);
    }

    /*
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$this->validate(request(), [ ]);

        $product = Product::create([

            'title'=>request('title'),
            'price'=>request('price'),
            'date'=>request('date'),

        ]);

       return redirect()
                ->route('product_edit', $product->id)
                ->with('success', __('global.create_succees'));
    }

    /*
     * Display the specified resource.
     */

    public function show($id)
    {
        return $this->edit($id);
    }

    
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return $this->view_('product.update', [
            'object'=>$product,
        ]);
    }

    /*
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //$this->validate(request(), [ ]);
      
        $product = Product::findOrFail($id);

        $product->title=request('title');
        $product->price=request('price');
        $product->date=request('date');

        $product->save();

        return redirect()
                ->route('product_edit', $product->id)
                ->with('success', __('global.edit_succees'));
    }

    /*
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $msg = 'delete_error';
        $flash_type = 'error';
        $product = Product::findOrFail($id);

        if( $product->delete() ){
            $flash_type = 'success';
            $msg = 'delete_succees';
        }

        return redirect()
            ->route('product')
            ->with($flash_type, __('global.'.$msg));
    }
}