<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function indexCategoryView()
    {
        $data['categories'] = Category::all();
        return view('admin.category_module.category', $data);
    }
    public function indexAddCategoryView()
    {
        return view('admin.category_module.addCategory');
    }
    public function indexAddSubCategory()
    {
        return view('admin.category_module.addSubCategory');
    }
    public function indexAddChildCategory()
    {
        return view('admin.category_module.addChildCategory');
    }

    public function addEditCategoryPost(Request $request)
    {
        $request->validate([
            'cat_name' => 'required|unique:categories,name,' . $request->id,
            'cat_slug' => 'required|unique:categories,slug,' . $request->id,
            'cat_image' => 'max:2048|mimes:png,jpg,jpg,jpeg,svg,gif',
            'status' => 'required'
        ],[
            'cat_name.required'=>'The category name field is required.',
            'cat_name.unique'=>'The category name has already been taken.',
            'cat_slug.unique'=>'The category slug has already been taken.',
            'cat_slug.required'=>'The category slug field is required.',
            'cat_image.mimes'=>'The category image field must be a file of type: png, jpg, jpg, jpeg, svg, gif.',
            'cat_image.max'=>'The category image field must not be greater than 2048 kilobytes.',
        ]);
        try {
            if ($request->id) {
                $category = Category::find($request->id);
            } else {
                $category = new Category();
            }
            $category->name = ucfirst($request->cat_name);
            $category->slug = $request->cat_slug;
            if ($request->hasFile('cat_image')) {
                $destination = public_path() . '/admin/src/categoryImages/';
                if ($request->id) {
                    $oldImage = $destination . $category->image;
                    if (file_exists($oldImage)) {
                        unlink($oldImage);
                    }
                }
                $file = $request->file('cat_image');
                $fileName = time() . '-' . $request->cat_slug . '.' . $file->getClientOriginalExtension();
                $file->move($destination, $fileName);
                $category->image = $fileName;
            }
            $category->status = $request->status;
            $category->meta_title = $request->meta_title;
            $category->meta_desc = $request->meta_desc;
            $category->save();
            return redirect()->route('admin.categoryView')->with('success', ucfirst($request->cat_name) . ' Added Successfully.');
        } catch (Exception $e) {
            return redirect()->route('admin.categoryView')->with('failed', $e->getMessage());
        }
    }
}
