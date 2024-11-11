<?php

namespace App\Contracts\Interface\Reports;

use App\Contracts\Interface\Eloquent\DeleteInterface;
use App\Contracts\Interface\Eloquent\GetInterface;
use App\Contracts\Interface\Eloquent\ShowInterface;
use App\Contracts\Interface\Eloquent\StoreInterface;
use App\Contracts\Interface\Eloquent\UpdateInterface;

interface ReportsInterface extends StoreInterface,UpdateInterface,DeleteInterface,ShowInterface, GetInterface
{

}
