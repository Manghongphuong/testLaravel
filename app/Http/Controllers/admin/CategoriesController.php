<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CateValidate;
use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $cate;
    public function __construct(Categories $cate){
        $this->cate = $cate;
    }

    public function index()
    {
        $category = $this->cate->all();
        return view('admin.cates.listcate1', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cates.addcate1');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CateValidate $request)
    {   
        $validated = $request->validated();
        $cate = new Categories();
        $cate->name_ct = $request->name_ct;
        $cate->save();
        return redirect()->route('cates.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $editcate = $this->cate->find($id);
        if ($editcate == null) {
            return redirect('/thông báo');
        };
        return view('admin.cates.editcate1' ,compact('editcate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $upcate = Categories::find($id);
        $upcate->name_ct = $request->name_ct;
        if ($upcate ==null) {
            return redirect('/thông báo');
        };
        $upcate->save();
        return redirect()->route('cates.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cate = Categories::find($id);
        $cate ->delete();
        return redirect()->route('cates.index');
    }
}
