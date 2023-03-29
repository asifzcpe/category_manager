<?php

use App\Services\CategoryTreeService;
use PHPUnit\Framework\TestCase;

class CategoryTreeServiceTest extends TestCase
{
    private array $categories = [
        ['Id' => 1, 'Name' => 'Category 1', 'ParentcategoryId' => 0, 'total_items' => 5],
        ['Id' => 2, 'Name' => 'Category 2', 'ParentcategoryId' => 1, 'total_items' => 3],
        ['Id' => 3, 'Name' => 'Category 3', 'ParentcategoryId' => 1, 'total_items' => 2],
        ['Id' => 4, 'Name' => 'Category 4', 'ParentcategoryId' => 2, 'total_items' => 1],
    ];

    public function testGetCategoryTree(): void
    {
        $categoryTreeService = new CategoryTreeService($this->categories);

        $expectedOutput = '<li><span class="caret">Category 1(11)</span><ul class="nested"><li><span class="caret">Category 2(4)</span><ul class="nested"><li><span class="">Category 4(1)</span></li></ul></li><li><span class="">Category 3(2)</span></li></ul></li>';

        $this->assertEquals($expectedOutput, $categoryTreeService->getCategoryTree());
    }

    public function testCalculateTotalItems()
    {
        $categoryTreeService = new CategoryTreeService([]);

        // Test case where there are no subcategories
        $category = ['Id' => 1, 'Name' => 'Category 1', 'ParentcategoryId' => 0, 'total_items' => 5];
        $expectedCategory = ['Id' => 1, 'Name' => 'Category 1', 'ParentcategoryId' => 0, 'total_items' => 5, 'total_items_of_subcategories' => 0, 'total_items_with_subcategories' => 5];
        $method = new \ReflectionMethod(CategoryTreeService::class, 'calculateTotalItems');
        $method->setAccessible(true);
        $actualCategory = $method->invokeArgs($categoryTreeService, array($category));
        $this->assertEquals($expectedCategory, $actualCategory);

        // Test case where there are subcategories
        $category = ['Id' => 1, 'Name' => 'Category 1', 'ParentcategoryId' => 0, 'total_items' => 5];
        $subCategories = [
            ['Id' => 2, 'Name' => 'Subcategory 1', 'ParentcategoryId' => 1, 'total_items' => 2],
            ['Id' => 3, 'Name' => 'Subcategory 2', 'ParentcategoryId' => 1, 'total_items' => 3],
        ];
        $expectedCategory = ['Id' => 1, 'Name' => 'Category 1', 'ParentcategoryId' => 0, 'total_items' => 5, 'total_items_of_subcategories' => 5, 'total_items_with_subcategories' => 10];
        $method = new \ReflectionMethod(CategoryTreeService::class, 'calculateTotalItems');
        $method->setAccessible(true);
        $actualCategory = $method->invokeArgs($categoryTreeService, array($category, 5));
        $this->assertEquals($expectedCategory, $actualCategory);
    }

    public function testCalculateTotalItemsOfSubCategories()
    {
        $categoryTreeService = new CategoryTreeService([]);

        $subCategories = [
            ['Id' => 2, 'Name' => 'Subcategory 1', 'ParentcategoryId' => 1, 'total_items' => 2],
            ['Id' => 3, 'Name' => 'Subcategory 2', 'ParentcategoryId' => 1, 'total_items' => 3],
        ];

        $reflection = new ReflectionClass(CategoryTreeService::class);
        $method = $reflection->getMethod('calculateTotalItemsOfSubCategories');
        $method->setAccessible(true);

        $expectedTotal = 5;
        $actualTotal = $method->invokeArgs($categoryTreeService, [$subCategories]);
        $this->assertEquals($expectedTotal, $actualTotal);
    }
}
