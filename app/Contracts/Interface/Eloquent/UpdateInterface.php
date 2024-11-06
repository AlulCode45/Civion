<?php

namespace App\Contracts\Interface\Eloquent;

use Illuminate\Database\Eloquent\Model;

interface UpdateInterface
{
    public function update(array $data, mixed $id): mixed;
}
