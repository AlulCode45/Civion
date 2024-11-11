<?php

namespace App\Contracts\Repository\Reports;

use App\Contracts\Interface\Reports\ReportsInterface;
use App\Contracts\Repository\BaseRepository;
use App\Models\Reports;
use Illuminate\Database\Eloquent\Model;

class ReportsRepository extends BaseRepository implements ReportsInterface
{
    public Model $model;

    public function __construct(
        Reports $reports
    )
    {
        $this->model = $reports;
    }

    public function get(): mixed
    {
        return $this->model->query()
            ->with([
                'category', 'user', 'province', 'regency', 'district', 'village'
            ])
            ->get();
    }

    public function update(array $data, $id): mixed
    {
        return $this->model->query()
            ->findOrFail($id)
            ->update($data);
    }

    public function delete($id): mixed
    {
        return $this->model->query()
            ->findOrFail($id)
            ->delete();
    }

    public function store(array $data): mixed
    {
        return $this->model->query()
            ->create($data);
    }

    public function show($id): mixed
    {
        return $this->model
            ->query()
            ->with([
                'category', 'user', 'province', 'regency', 'district', 'village'
            ])
            ->findOrFail($id);
    }
}
