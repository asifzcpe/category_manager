<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Database;

class BaseModel
{
    protected $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->connect();
    }
}
