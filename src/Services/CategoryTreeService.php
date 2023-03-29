<?php

namespace App\Services;

class CategoryTreeService
{
    private array $categories;

    public function __construct(array $categories)
    {
        $this->categories = $categories;
    }

    public function getCategoryTree(): string
    {
        $categoryTreeArray = $this->buildCategoryTree($this->categories);
        return $this->generateCategoryTreeHtml($categoryTreeArray);
    }

    private function generateCategoryTreeHtml(array $categories): string
    {
        $html = '';

        foreach ($categories as $category) {
            $totalItems = isset($category['total_items_with_subcategories']) ? $category['total_items_with_subcategories'] : $category['total_items'];
            
            $html .= '<li><span class="'.(isset($category['subcategories']) ? 'caret' : '').'">' . $category['Name'] . '('.$totalItems.')</span>';
            if (isset($category['subcategories'])) {
                $html .= '<ul class="nested">' . $this->generateCategoryTreeHtml($category['subcategories']) . '</ul>';
            }
            
            $html .= '</li>';
        }

        return $html;
    }

    private function buildCategoryTree(array $categories, int $parentId = 0): array
    {
        $tree = [];
        foreach ($categories as $category) {
            if ($category['ParentcategoryId'] == $parentId) {
                $subCategories = $this->buildCategoryTree($categories, intval($category['Id']));

                if (!empty($subCategories)) {
                    $totalItemsOfSubCategories = $this->calculateTotalItemsOfSubCategories($subCategories);
                    $category = $this->calculateTotalItems($category, $totalItemsOfSubCategories);
                    $category['subcategories'] = $subCategories;
                }
                $tree[] = $category;
            }
        }

        return $tree;
    }

    private function calculateTotalItems(array $category, int $totalItemsOfSubCategories = 0): array
    {
        $category['total_items_of_subcategories'] = $totalItemsOfSubCategories;
        $category['total_items_with_subcategories'] = $totalItemsOfSubCategories + $category['total_items'];
        return $category;
    }

    private function calculateTotalItemsOfSubCategories(array $subCategories): int
    {
        $total = 0;
        foreach ($subCategories as $subCategory) {
            if (isset($subCategory['total_items_of_subcategories'])) {
                $total += $subCategory['total_items_of_subcategories'] + $subCategory['total_items'];
            } else {
                $total += $subCategory['total_items'];
            }
        }
        return $total;
    }
}
