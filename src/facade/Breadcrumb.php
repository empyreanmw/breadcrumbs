<?php

namespace empyrean\breadcrumbs\Facade;
use Illuminate\Support\Facades\Facade;

class Breadcrumb extends Facade
{
    protected static function getFacadeAccessor() {return 'Breadcrumbs';}
}
