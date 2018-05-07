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

        return $this; 
    }

    public function format(FormatInterface $format)
    {
	return $format->setUp($this->parsedPath, $this->links());
    }
}
