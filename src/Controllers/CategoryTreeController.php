<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Category;
use App\Services\CategoryTreeService;

class CategoryTreeController extends Controller
{
    public function index()
    {
        $categoryModel = new Category();
        $categories = $categoryModel->getAllCategories();
        $categoryTree = new CategoryTreeService($categories);
        $this->render('category_tree', ['categoryTree' => $categoryTree->getCategoryTree()]);
    }
}
