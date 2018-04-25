<?php

namespace empyrean\breadcrumbs\facade;
use Illuminate\Support\Facades\Facade;

class Breadcrumb extends Facade
{
    protected static function getFacadeAccessor() {return 'Breadcrumbs';}
}
