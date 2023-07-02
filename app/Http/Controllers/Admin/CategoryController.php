<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Method index
     * @param Request $request [explicite description]
     * @author AlokDas
     * @return void
     */
    public function index(Request $request)
    {
        $data['page_title'] = 'Admin | Category';
        $data['category']   = Category::get();
        return view('admin.super_admin.category.index')->with($data);
    }

    /**
     * Method role
     * @param Request $request [explicite description]cater
     * @author AlokDas
     * @return void
     */
    public function store(Request $request)
    {
        $request->validate([
            'cat_name' => 'required',
            'status'   => 'required',
        ], [
            'cat_name.required' => 'Please enter a category name',
            'status.required'   => 'Please select an status',
        ]);

        try {
            $category = Category::where('name', $request->cat_name);
            if ($category->exists()) {
                $data['data']    = [];
                $data['message'] = 'Category already exists.';
                return response($data, 200);
                // return redirect()->route('admin.category')->with($data);
            } else {
                $insert_data = [
                    'name'   => $request->cat_name,
                    'status' => $request->status,
                ];
                $category        = Category::insert($insert_data);
                $data['data']    = $category;
                $data['message'] = 'Category added successfully.';
                return response($data, 200);
                // return redirect()->route('admin.category')->with($data);
            }
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            // return response($data, 500);
            return redirect()->route('admin.category')->with($data);
        }
    }

    /**
     * Method show
     *
     * @param Request $request [explicite description]
     *
     * @return void
     */
    public function show(Request $request, $id = null)
    {
        try {
            $category        = Category::where('id', $id)->first();
            $data['data']    = $category;
            $data['message'] = 'Category loaded successfully.';
            return response($data, 200);
            // return redirect()->route('admin.category')->with($data);
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
            // return redirect()->route('admin.category')->with($data);
        }
    }

    public function edit(Request $request)
    {
        try {
            $update_data = [
                'name'   => $request->edit_cat_name,
                'status' => $request->edit_status,
            ];
            $role            = Category::where('id', $request->edit_cat_id)->update($update_data);
            $data['data']    = [];
            $data['message'] = 'Category updated successfully.';
            return response($data, 200);
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
    }

    public function delete(Request $request, $id = null)
    {
        try {
            $category = Category::where('id', $id)->delete();
            if ($category) {
                $data['data']    = [];
                $data['message'] = 'Category deleted successfully.';
                return response($data, 200);
            }
        } catch (\Exception $e) {
            $data['data']    = [];
            $data['message'] = $e->getMessage();
            return response($data, 500);
        }
    }

}
