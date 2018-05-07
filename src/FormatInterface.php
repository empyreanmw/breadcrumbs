<?php


namespace empyrean\breadcrumbs;


interface FormatInterface
{
    public function setUp($parsedPath, $links);

    public function withLinks();

    public function get();
}