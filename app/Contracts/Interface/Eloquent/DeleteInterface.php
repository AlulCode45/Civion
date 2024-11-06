<?php

namespace App\Contracts\Interface\Eloquent;

use Illuminate\Database\Eloquent\Model;

interface DeleteInterface
{
    public function delete(Model $id): mixed;
}
