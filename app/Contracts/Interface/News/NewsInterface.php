<?php

namespace App\Contracts\Interface\News;

use App\Contracts\Interface\Eloquent\DeleteInterface;
use App\Contracts\Interface\Eloquent\GetInterface;
use App\Contracts\Interface\Eloquent\ShowInterface;
use App\Contracts\Interface\Eloquent\StoreInterface;
use App\Contracts\Interface\Eloquent\UpdateInterface;

interface NewsInterface extends StoreInterface,UpdateInterface,DeleteInterface,GetInterface,ShowInterface
{

}
