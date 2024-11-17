<?php

namespace App\Contracts\Repository\News;

use App\Contracts\Interface\News\NewsInterface;
use App\Contracts\Repository\BaseRepository;
use App\Models\News;

class NewsRepository extends BaseRepository implements NewsInterface
{

    public function __construct(News $model)
    {
        $this->model = $model;
    }
    public function update(array $data, $id): mixed
    {
        return $this->model->query()
            ->findOrFail($id)
            ->update($data);
    }

    public function store(array $data): mixed
    {
        return $this->model->query()
            ->create($data);
    }

    public function show($id): mixed
    {
        return $this->model->query()
            ->with(['category','user'])
            ->findOrFail($id);
    }

    public function delete($id): mixed
    {
        return $this->model->query()
            ->findOrFail($id)
            ->delete();
    }

    public function get(): mixed
    {
        return $this->model->query()
            ->with(['category','user'])
            ->get();
    }
}
