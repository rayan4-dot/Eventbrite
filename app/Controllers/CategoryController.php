<?php

// CategoryController.php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Http\Request;
use App\Core\Http\Response;
use App\Models\Category;

class CategoryController extends Controller
{
    public function create(Request $request, Response $response): void
    {
        $category = new Category();
        if ($request->isPost()) {
            $category->loadData($request->getBody());
            if ($category->validate() && $category->save()) {
                $response->redirect('/admin/categories');
                return;
            }
        }
        $this->render('/admin/categories', ['model' => $category, "categories" => Category::getAll()]);
    }


    public function edit(Request $request, Response $response, int $id): void
{
    $category = Category::getById($id);
    if (!$category) {
        $response->redirect('/admin/categories');
        return;
    }

    if ($request->isPost()) {
        $data = $request->getBody();
        $category->loadData($data);
        if ($category->validate() && $category->updateCategory($id, [
            'name' => $category->name,
            'description' => $category->description
        ])) {
            $response->redirect('/admin/categories');
            return;
        }

        $errors = $category->getErrors();
        $this->render('/admin/category_edit', ['model' => $category, 'errors' => $errors]);
        return;
    }

    $this->render('/admin/category_edit', ['model' => $category]);
}

public function delete(Request $request, Response $response, int $id): void
{
    $category = Category::getById($id);
    if ($category && $category->deleteCategory($id)) {
        $response->redirect('/admin/categories');
    } else {
        $response->redirect('/admin/categories');
    }
}

}
