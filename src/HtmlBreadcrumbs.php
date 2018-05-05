<?php

namespace empyrean\breadcrumbs;

class HtmlBreadcrumbs extends Builder
{
    public function build()
    {
        $link="";

        foreach ($this->splitPath() as $key => $page)
        {
            $numberOfPages= count($this->splitPath());
            $link .=$page."/";

            if($key == $numberOfPages - 1)
            {
                $this->newPath .= '<li class="breadcrumb-item active">'.$this->buildPageName($page).'</li>';
                continue;
            }   

            $this->newPath .= '<li class="breadcrumb-item"><a href="/'.$link.'">'. $this->buildPageName($page).'</a></li>';
        }

        return '<ol class="breadcrumb">'.$this->newPath.'</ol>';
    }
}