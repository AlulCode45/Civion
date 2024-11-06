<?php

namespace App\Contracts\Interface\Category;

use App\Contracts\Interface\Eloquent\DeleteInterface;
use App\Contracts\Interface\Eloquent\GetInterface;
use App\Contracts\Interface\Eloquent\StoreInterface;
use App\Contracts\Interface\Eloquent\UpdateInterface;
use App\Contracts\Interface\Eloquent\ShowInterface;

interface CategoryInterface extends StoreInterface, UpdateInterface,DeleteInterface,ShowInterface, GetInterface
{
    public function getCategoryWithReports();
}
