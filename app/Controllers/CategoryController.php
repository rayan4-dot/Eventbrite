<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Http\Request;
use App\Core\Http\Response;
use App\Models\Category;

class CategoryController extends Controller
{
    public function create(Request $request, Response $response) : void
    {
        $category = new Category();
        if($request->isPost()) {
            $category->loadData($request->getBody());
            if($category->validate() && $category->save()) {
                $response->redirect('/admin/categories');
                return;
            }
        }
        $this->render('/admin/categories', ['model' => $category, "categories" => Category::getAll()]);
    }
    
}