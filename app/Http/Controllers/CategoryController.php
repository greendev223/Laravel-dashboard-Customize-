<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        if(Auth::user()->can('Manage Category'))
        {
            $categories = Category::where('created_by', '=', Auth::user()->getCreatedBy())
                                    ->orderBy('id', 'DESC')
                                    ->get();

            return view('categories.index')->with('categories', $categories);
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function create()
    {
        if(Auth::user()->can('Create Category'))
        {
            return view('categories.create');
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function store(Request $request)
    {
        if(Auth::user()->can('Create Category'))
        {
            $validator = Validator::make(
                $request->all(), [
                                   'name' => 'required|max:100|unique:categories,name,NULL,id,created_by,' . Auth::user()->getCreatedBy(),
                               ]
            );

            if($validator->fails())
            {
                return redirect()->back()->with('error', $validator->errors()->first());
            }
            
            if(!empty($request->categorie_img))
            {
                $filenameWithExt  = $request->file('categorie_img')->getClientOriginalName();
                $filename         = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension        = $request->file('categorie_img')->getClientOriginalExtension();
                $fileNameToStores = $filename . '_' . time() . '.' . $extension;
                $dir              = storage_path('uploads/product_image/');
                if(!file_exists($dir))
                {
                    mkdir($dir, 0777, true);
                }
                $path = $request->file('categorie_img')->storeAs('uploads/product_image/', $fileNameToStores);
            }


            $category             = new Category();
            $category->name       = $request->name;
            $category->slug       = Str::slug($request->name, '-');
            $category->created_by = Auth::user()->getCreatedBy();
            $category->save();

            return redirect()->route('categories.index')->with('success', __('Category added successfully.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function show(Category $category)
    {
        return redirect()->back()->with('error', __('Permission denied.'));
    }

    public function edit(Category $category)
    {
        if(Auth::user()->can('Edit Category'))
        {
            return view('categories.edit', compact('category'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function update(Request $request, Category $category)
    {
        if(Auth::user()->can('Edit Category'))
        {
            $validator = Validator::make(
                $request->all(), [
                                   'name' => 'required|max:100|unique:categories,name,' . $category->id . ',id,created_by,' . Auth::user()->getCreatedBy(),
                               ]
            );

            if($validator->fails())
            {
                return redirect()->back()->with('error', $validator->errors()->first());
            }
            $category->name = $request->name;
            $category->slug = Str::slug($request->name, '-');
            $category->save();

            return redirect()->route('categories.index')->with('success', __('Category updated successfully.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function destroy(Category $category)
    {
        if(Auth::user()->can('Delete Category'))
        {
            $category->delete();

            return redirect()->route('categories.index')->with('success', __('Category deleted successfully.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }
    public function getProductCategories(){

        $cat = Category::getallCategories();
        $all_products = Product::getallproducts()->count();
        $html = '<div class="col-md-3 mb-3 zoom-in ">
                  <div class="card rounded-10 card-stats mb-0 cat-active" data-id="">
                     <div class="card-body p-3 category-select" data-cat-id="">
                        <div class="row">
                           <div class="col text-white">
                              <h6 class="card-title text-white mb-0 ">'.__("All").'</h6>
                                <span class="product-count">'.$all_products.' Items</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>';
            foreach ($cat as $key => $c) {
                $dcls = '';
                if($c->products > 0){
                    $dcls = 'category-select';
                }
                $html .= ' <div class="col-md-3 mb-3 zoom-in ">
                          <div class="card rounded-10 card-stats mb-0 " data-id="'.$c->id.'">
                             <div class="card-body p-3 '.$dcls.'" data-cat-id="'.$c->id.'">
                                <div class="row">
                                   <div class="col">
                                      <h6 class="card-title mb-0 ">'.$c->name.'</h6>
                                        <span class="product-count">'.$c->products.' Items</span>
                                   </div>
                                </div>
                             </div>
                          </div>
                       </div>';
            }
        return Response($html);
    }   
}
