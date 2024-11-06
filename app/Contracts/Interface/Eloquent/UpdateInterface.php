<?php

namespace App\Contracts\Interface\Eloquent;

use Illuminate\Database\Eloquent\Model;

interface UpdateInterface
{
    public function update(Model $data, mixed $id): mixed;
}
