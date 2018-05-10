<?php

namespace  empyrean\breadcrumbs;

use Illuminate\Support\Facades\URL;


abstract class Builder
{
    protected $links = [];
    protected $basePath;
    protected $appName;
    protected $newPath;
    protected $pageDelimiter = "-";
    protected $parsedPath = [];

    public function __construct()
    {
        $this->appName = strtolower(env('APP_NAME'));
        $this->basePath = request()->getPathInfo();
    }

    public abstract function build();

    protected function splitPath()
    {
        $explodedPath = explode('/', $this->basePath);

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
        $result="";

        foreach($this->checkForMultipleWords($page) as $word)
        {
            $result.=  ucfirst($word)." ";
        }

        return $result;
    }

    protected function connectPages()
    {
        foreach ($this->splitPath() as $page)
        {
            $this->newPath .= $this->buildPageName($page). "/ ";
        }

        return str_replace_last('/', '', $this->newPath);
    }

    public function links()
    {
        foreach ($this->splitPath() as $key => $page) {
            if ($key != 0) {
                $this->links[] = $this->links[$key-1] .'/'.$page;
            }
            else{
                $this->links[] = '/'. $page;
            }

        }

        return $this->links;
    }
}

