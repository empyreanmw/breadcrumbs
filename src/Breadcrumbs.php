<?php

namespace  empyrean\breadcrumbs;

use Illuminate\Support\Facades\URL;

class Breadcrumbs
{
    public function buildHtml()
    {
        return (new HtmlBreadcrumbs)->build();
    }

    public function buildParsedPath()
    {
        return (new ParsedPath)->build();
    }
}