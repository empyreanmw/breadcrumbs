<?php

namespace  empyrean\breadcrumbs;

use Illuminate\Support\Facades\URL;


abstract class Builder
{
    protected $url;
    protected $appName;
    protected $newPath;
    protected $pageDelimiter = "-";
    protected $parsedPath = [];

    public function __construct()
    {
        $this->url = URL::current();
        $this->appName = strtolower(env('APP_NAME'));
    }

    public abstract function build();

    protected function removeDomain()
    {
        return str_replace('http://'.$this->appName,'', $this->url);
    }

    protected function splitPath()
    {
        $explodedPath = explode('/', $this->removeDomain());

        array_shift($explodedPath);

        return $explodedPath;
    }

    protected function checkForMultipleWords($page)
    {
        $explodedPage = explode($this->pageDelimiter, $page);

        return !$explodedPage ? $page : $explodedPage;
    }

    protected function buildPageName($page)
    {
        $newPageName="";

        foreach($this->checkForMultipleWords($page) as $word)   
        {
            $newPageName.=  ucfirst($word)." ";
        }

        return $newPageName;
    }

    protected function connectPages()
    {
        foreach ($this->splitPath() as $page)
        {
            $this->newpath .= $this->buildPageName($page). "/ ";
        }

        return str_replace_last('/', '', $this->newpath); 
    }
}
