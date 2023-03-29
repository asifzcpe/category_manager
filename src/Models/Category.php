<?php

declare(strict_types=1);

namespace App\Models;

class Category extends BaseModel
{
    public function getCategoriesOrderByTotalItems()
    {
        $sql = 'SELECT cat.name, COUNT(*) AS total_items
            FROM item_category_relations AS rel
            JOIN category AS cat ON cat.id = rel.categoryId
            GROUP BY cat.id
            ORDER BY total_items DESC';

        $stmt = $this->db->query($sql);
        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $results;
    }

    public function getAllCategories()
    {
        $sql = 'SELECT cat.Id, cat.Name, cat.Number, cr.ParentcategoryId, COUNT(icr.id) AS total_items
                FROM category AS cat
                LEFT JOIN catetory_relations AS cr ON cat.Id = cr.categoryId
                LEFT JOIN item_category_relations AS icr ON cat.Id = icr.categoryId
                WHERE cat.Disabled = 0
                GROUP BY cat.Id';

        $stmt = $this->db->query($sql);
        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $results;
    }
}
