<?php

namespace  empyrean\breadcrumbs;

use Illuminate\Support\Facades\URL;

class Breadcrumbs extends Builder
{
    public function build()
    {
        return $this->connectPages();
    }

    public function buildHtml()
    {
        return $this->html();
    }

    public function buildArrayOfPages()
    {
        return $this->arrayOfPages();
    }
}