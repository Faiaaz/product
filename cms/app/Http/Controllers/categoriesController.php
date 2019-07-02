<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class categoriesController extends Controller
{
    public function index(){
        return view('categories.new');
    }

    public function store(){
        $this->validate(\request(),[
            'name'=> 'required',
        ]);
        $data = \request()->all();// get the data inserted in the form

        $category = new Category();         // we created our model variable

        $category->name = $data['name'];

        $category->save();

        return redirect('home');
    }
}
