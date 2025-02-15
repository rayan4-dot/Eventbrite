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

    public function create(Request $request, Response $response): void
    {
        if (!$request->isPost()) {
            $this->render('admin/categories', ['model' => $this->category]);
            return;
        }

        if ($request->isPost()) {
            $this->category->loadData($request->getBody());

            if ($this->category->validate() && $this->category->save()) {
                echo json_encode(['success' => true, 'Category added']);
                return;
            } else {
                echo json_encode(['success' => false, 'errors' => $this->category->getErrors()]);
                return;
            }
        }
    }

    public function editCategory(Request $request, Response $response, array $params = [])
    {
        $id = $params[0];
        if (!$id) {
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Invalid category id']);
            return;
        }

        $category = Category::findOne(['id' => $id]);
        if (!$category) {
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'category not found']);
            return;
        }

        if (!$request->isPost()) {
            header('Content-Type: application/json');
            echo json_encode($category);
            return;
        }

        $category->loadData($request->getBody());
        if ($category->validate() && $category->update()) {
            header('Content-Type: application/json');
            echo json_encode(['success' => true, 'message' => 'category updated successfully']);
            return;
        } else {
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'category not updated']);
            return;
        }
    }

    public function delete(Request $request, Response $response, array $params = []): void
    {
        $id = $params[0] ?? null;
        if (!$id) {
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Category id is not valid']);
            return;
        }
        $db = Application::$app->db->conn;
        $stmt = $db->prepare("DELETE FROM categories WHERE id = ?");
        if ($stmt->execute([$id])) {
            header('Content-Type: application/json');
            echo json_encode(['success' => true, 'message' => 'Category deleted successfully']);
            return;
        } else {
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Failed to delete category']);
            return;
        }
    }

    public function getAllCategories(): void
    {
        $categories = $this->category::getAll();
        header('Content-Type: application/json');
        echo json_encode($categories);
    }
}