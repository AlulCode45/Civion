<?php

namespace App\Contracts\Interface\Eloquent;

use Illuminate\Database\Eloquent\Model;

interface ShowInterface
{
    public function show(mixed $id): mixed;
}
