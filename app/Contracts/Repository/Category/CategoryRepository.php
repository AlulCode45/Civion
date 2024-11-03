<?php

namespace App\Contracts\Repository\Category;

use App\Contracts\Interface\Category\CategoryInterface;
use App\Contracts\Repository\BaseRepository;
use App\Models\Category;

class CategoryRepository extends BaseRepository implements CategoryInterface
{
    function __construct(Category $model){
        $this->model = $model;
    }
    public function getCategoryWithReports()
    {
        return $this->model->query()
            ->with('reports')
            ->get();
    }
}
