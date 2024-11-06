<?php

namespace App\Contracts\Interface\Eloquent;

use Illuminate\Database\Eloquent\Model;

interface ViewInterface
{
    public function view(Model $data): mixed;
}
