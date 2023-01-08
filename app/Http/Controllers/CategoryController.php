<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\Http\Requests\Category\CategoryRequest;
use App\Models\Category;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:category-list',   ['only' => ['index']]);
        $this->middleware('permission:category-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:category-edit',   ['only' => ['edit', 'update']]);
        $this->middleware('permission:category-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::get();
        return view('dashboard.categories.index', compact('categories'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::whereNull('parent_id')->get();
        return view('dashboard.categories.create', compact('categories'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = array(
        //     'name'      => $request->name ,
        //     'parent_id' => $request->parent_id ,
        // );
        // // dd($data);
        // $category = Category::create($data);

        $category = new Category();
        $category->setTranslation('name', 'en', $request->name_en)
            ->setTranslation('name', 'ar', $request->name_ar);
        $category->parent_id = $request->parent_id;
        $category->save();

        // return redirect()->route('categories.index')
        // ->with(['category_created' => "($request->name) is created successfully!"]);
        return redirect()->back()
            ->with('success', __('master.messages_add'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return abort(404);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        $categories = Category::whereNull('parent_id')->get();
        return view('dashboard.categories.edit', compact('category','categories'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category_old_name = Category::find($id)->name;
        $categories = Category::findOrFail($id);
        $categories->name = $request->name;
        $categories->parent_id = $request->parent_id;
        $categories->save();
        
        // return view('dashboard.categories.index',compact('categories'))
        // ->with(['category_updated' => "The category name ($category_old_name) has been changed to "."($request->name)"." !"]);
        return redirect()->back()
            ->with('success', __('master.messages_edit'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id)->parentCategory()->count();
        // return $category;
        if($category == 0){
            $category->delete();
            return redirect()->back()
            ->with('success', __('master.messages_delete'));
        }
        else{
            return redirect()->back()
            ->with('error', 'Please delete sub category first!');
        }
    }

    public function inActiveList()
    {
        $categories = Category::status('inactive')->get();
        return view('dashboard.categories.in-active-list', compact('categories'));
    }


}
