<?php


namespace empyrean\breadcrumbs;


class ArrayFormat implements FormatInterface
{
    protected $parsedPath;
    protected $links;
    protected $withLinks;


    public function setUp($parsedPath, $links)
    {
        $this->parsedPath = $parsedPath;
        $this->links = $links;

        return $this;
    }

    public function withLinks()
    {
        $this->withLinks = $this->links;

        return $this;
    }

    public function get()
    {
        return $this->withLinks ? [$this->parsedPath, $this->withLinks] : $this->parsedPath;
    }


}