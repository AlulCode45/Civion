<?php

namespace App\Contracts\Repository\Category;

use App\Contracts\Interface\Category\CategoryInterface;
use App\Contracts\Repository\BaseRepository;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;

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
    public function show(mixed $data): mixed
    {
        return $this->model->query()
            ->findOrFail($data);
    }
    public function store(array $data): mixed
    {
        return $this->model->query()
            ->create($data);
    }
    public function update(mixed $data, $id): mixed{
        return $this->model->query()
            ->findOrFail($id)
            ->update($data);
    }
    public function delete(mixed $id): mixed
    {
        try {
            $this->show($id)->delete($id);
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1451) return false;
        }

        return true;
    }
    public function get(): mixed
    {
        return $this->model->query()
            ->get();
    }
}
