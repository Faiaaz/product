<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class categoriesController extends Controller
{
    public function index()
    {
        return view('categories.new');
    }

    public function show()
    {

        $category = Category::all();
        return view('categories.index');
//        return view('categories.showCategories')->with('category',$category);

    }

    public function store()
    {
        $this->validate(\request(), [
            'name' => 'required',
        ]);
        $data = \request()->all();// get the data inserted in the form

        $category = new Category();         // we created our model variable

        $category->name = $data['name'];

        $category->save();


        return redirect('home');
    }

    public function edit(Category $category){
        return view('categories.edit')->with('category',$category);
    }

    public function update(Category $category){
        $this->validate(\request(),[
            'name'=> 'required',
        ]);

        $data = \request()->all();

        $category->name = $data['name'];

        $category->save();
       // session()->flash('success','Todo updated successfully!');

        return redirect('home');
    }
    public function destroy(Category $category)
    {

        $category->delete();

        return redirect('home');

    }

}