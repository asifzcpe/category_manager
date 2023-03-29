<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categoryModel = new Category();
        $categories = $categoryModel->getCategoriesOrderByTotalItems();
        $this->render('category_list', ['categories' => $categories]);
    }
}
