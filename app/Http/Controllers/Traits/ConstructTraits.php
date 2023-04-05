<?php

namespace App\Http\Controllers\Traits;

use App\Services\ServiceContract;

trait ConstructTraits
{
    public function __construct(protected ServiceContract $service) {}
}
