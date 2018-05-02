<?php
namespace empyrean\breadcrumbs;

class ParsedPath extends Builder
{
    public function build()
    {
        foreach ($this->splitPath() as $page)
        {
            $this->parsedPath[] = rtrim($this->buildPageName($page));
        }

        return $this->parsedPath; 
    }
}