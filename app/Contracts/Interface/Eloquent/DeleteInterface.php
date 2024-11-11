<?php

namespace App\Contracts\Interface\Eloquent;

use Illuminate\Database\Eloquent\Model;

interface DeleteInterface
{
    public function delete(mixed $id): mixed;
}
