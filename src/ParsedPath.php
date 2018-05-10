<?php
namespace empyrean\breadcrumbs;

class ParsedPath extends Builder
{
    protected $withLinks;

    public function build()
    {
        foreach ($this->splitPath() as $page)
        {
            $this->parsedPath[] = rtrim($this->buildPageName($page));
        }

        return $this; 
    }

    public function format(FormatInterface $format)
    {
	    return $format->setUp($this->parsedPath, $this->links());
    }

    public function withLinks()
    {
        $this->withLinks = $this->links();

        return $this;
    }

    public function get()
    {
        return $this->withLinks ? [$this->parsedPath, $this->withLinks] : $this->parsedPath;
    }
}
