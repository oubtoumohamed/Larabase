<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Catégorie;

class CatégorieController extends Controller
{
    public $model = 'Catégorie';
    public function filter_fields(){
        return [
            'label'=>[ 'type'=>'text' ],
            'parent'=>[ 'type'=>'text' ],

        ];
    }

    public function __construct()
    {
        //$this->middleware('auth');

    }
    public function index()
    {
        $Catégories = Catégorie::where($this->filter(false))
                        ->orderBy($this->orderby, 'desc')->paginate($this->perpage())
                        ->withPath($this->url_params(true,['page'=>null]));

        return $this->view_('Catégorie.list', [
            'results'=>$Catégories
        ]);
    }

    /*
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->view_('Catégorie.update',[
            'object'=> new Catégorie(),
        ]);
    }

    /*
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$this->validate(request(), [ ]);

        $Catégorie = Catégorie::create([

            'label'=>request('label'),
            'parent'=>request('parent'),

        ]);

       return redirect()
                ->route('Catégorie_edit', $Catégorie->id)
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
        $Catégorie = Catégorie::findOrFail($id);

        return $this->view_('Catégorie.update', [
            'object'=>$Catégorie,
        ]);
    }

    /*
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //$this->validate(request(), [ ]);
      
        $Catégorie = Catégorie::findOrFail($id);

        $Catégorie->label=request('label');
        $Catégorie->parent=request('parent');

        $Catégorie->save();

        return redirect()
                ->route('Catégorie_edit', $Catégorie->id)
                ->with('success', __('global.edit_succees'));
    }

    /*
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $msg = 'delete_error';
        $flash_type = 'error';
        $Catégorie = Catégorie::findOrFail($id);

        if( $Catégorie->delete() ){
            $flash_type = 'success';
            $msg = 'delete_succees';
        }

        return redirect()
            ->route('Catégorie')
            ->with($flash_type, __('global.'.$msg));
    }
}