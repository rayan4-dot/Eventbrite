<?php

namespace App\Controllers;

use App\Core\Application;
use App\Core\Controller;
use App\Core\Http\Request;
use App\Core\Http\Response;
use App\Models\Category;

class CategoryController extends Controller
{
    protected Category $category;
    public function __construct()
    {
        $this->category = new Category();
    }

    public function create(Request $request, Response $response) : void
    {
        $category = new Category();
        if($request->isPost()) {
            $category->loadData($request->getBody());

            if($category->validate() && $category->save()) {
                $response->redirect('/dashboard');
                return;
            }
        }
        $this->render('/admin/categories', ['model' => $category]);
    }

    public function getAllCategories() : void
    {
        $categories = $this->category::getAll();
        header('Content-Type: application/json');
        echo json_encode($categories);
    }
}