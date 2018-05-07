<?php


namespace empyrean\breadcrumbs;


class JsonFormat implements FormatInterface
{
    protected $parsedPath;
    protected $links;
    protected $withLinks;

    public function setUp($parsedPath, $links)
    {
        $this->parsedPath = json_encode($parsedPath);
        $this->links = $links;

        return $this;
    }

    public function withLinks()
    {
        $this->withLinks = json_encode($this->links, JSON_UNESCAPED_SLASHES);

        return $this;
    }

    public function get()
    {
        return $this->withLinks ? json_encode([$this->parsedPath, $this->withLinks], JSON_UNESCAPED_SLASHES) : $this->parsedPath;
    }


}