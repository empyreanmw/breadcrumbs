<?php


namespace empyrean\breadcrumbs;


class CollectionFormat implements FormatInterface
{
    protected $parsedPath;
    protected $links;
    protected $withLinks;

    public function setUp($parsedPath, $links)
    {
        $this->parsedPath = collect($parsedPath);
        $this->links = $links;

        return $this;
    }

    public function withLinks()
    {
        $this->withLinks = collect($this->links);

        return $this;
    }

    public function get()
    {
        return $this->withLinks ? collect([$this->parsedPath, $this->withLinks]) : $this->parsedPath;
    }

}