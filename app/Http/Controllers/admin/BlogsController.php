<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogsRequest;
use App\Models\Blogs;
use App\Models\Categories;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $blog;
    public function __construct(Blogs $blog){
        $this->blog = $blog;
    }
    public function index()
    {
        $blog = $this->blog->leftJoin('categories', 'blogs.id_category', '=', 'categories.id')->select('blogs.*', 'categories.name_ct')
        ->orderBy('id', 'desc')
        ->paginate(10);
        return view('admin.blogs.listblogs1', compact('blog'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cate = Categories::all();
        return view('admin.blogs.addblogs1', compact('cate'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogsRequest $request)
    {
        $validated = $request->validated();
        $blog = new Blogs();
        $blog->id_category = $request->name_ct;
        $blog->title = $request->title;
        $blog->synopsis = $request->synopsis;
        $blog->content = $request->content;
        if ($request->file('file_upload')->isValid()) {
            $uploadedFile = $request->file('file_upload');
            $extension = $uploadedFile->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            
           
            $destinationPath = public_path('uploads');
        
            $uploadedFile->move($destinationPath, $filename);
        
            $url = asset('uploads/' . $filename);
            $blog->image = $url;
        }

        $blog->save();
        return redirect()->route('blogs.index');
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
        $cate = Categories::all();
        $editblog = Blogs::find($id);
        if ($editblog == null) {
            return redirect('/thông báo');
        }
        return view('admin.blogs.editblogs', compact('cate', 'editblog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $upblog = Blogs::find($id);
        if ($upblog == null) {
            return redirect('/thông báo');
        };
        $upblog->id_category = $request->name_ct;
        $upblog->title = $request->title;
        $upblog->synopsis = $request->synopsis;
        $upblog->content = $request->content;
        if ($request->hasFile('file_upload') && $request->file('file_upload')->isValid()) {
            $uploadedFile = $request->file('file_upload');
            $extension = $uploadedFile->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            
           
            $destinationPath = public_path('uploads');
        
            $uploadedFile->move($destinationPath, $filename);
        
            $url = asset('uploads/' . $filename);
            $upblog->image = $url;
        }

        $upblog->save();
        return redirect()->route('blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blogs::find($id);
        $blog ->delete();
        return redirect()->route('blogs.index');
    }
}
