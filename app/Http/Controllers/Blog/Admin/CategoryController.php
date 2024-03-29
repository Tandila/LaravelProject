<?php

namespace App\Http\Controllers\Blog\Admin;

use foo\bar;
use Illuminate\Http\Request;
use App\Models\BlogCategory;

class CategoryController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = BlogCategory::paginate(15);

        return view('blog.admin.categories.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd(__METHOD__);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd(__METHOD__);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = BlogCategory::findOrFail($id);
        $categoryList = BlogCategory::all();

        return view('blog.admin.categories.edit',
            compact('item', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = BlogCategory::find($id);
        if(empty($item)){
            return back()
                ->withErrors(['msg' => "record id=[{$id}] don't find"])
                ->withInput();
        }

        $data = $request->all();
        $result = $item
            ->fill($data)
            ->save();

        if($result){
            return redirect()
                ->route('blog.admin.categories.edit', $item->id)
                ->with(['success' => 'success saved']);
        }   else{
            return back()
                ->withErrors(['msg' => 'failed save'])
                ->withInput();
        }
    }


}
