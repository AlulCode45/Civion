<?php

namespace App\Contracts\Interface\Category;

use App\Contracts\Interface\Eloquent\DeleteInterface;
use App\Contracts\Interface\Eloquent\StoreInterface;
use App\Contracts\Interface\Eloquent\UpdateInterface;
use App\Contracts\Interface\Eloquent\ViewInterface;

interface CategoryInterface extends StoreInterface, UpdateInterface,DeleteInterface,ViewInterface
{
    public function getCategoryWithReports();
}
