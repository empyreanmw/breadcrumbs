><?php

namespace  empyrean\breadcrumbs;

use Illuminate\Support\Facades\URL;



class Breadcrumbs
{
    protected $url;
    protected $appName;
    protected $newpath;
    protected $pageDelimiter = "-";

    public function __construct()
    {
        $this->url = URL::current();
        $this->appName = strtolower(env('APP_NAME'));
    }

    protected function parsedPath()
    {
        return str_replace('http://'.$this->appName,'', $this->url);
    }

    protected function splitPath()
    {
        $explodedPath = explode('/', $this->parsedPath());

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
            $this->newpath .= $this->buildPageName($page). "/ ";
        }

        return str_replace_last('/', '', $this->newpath); 
    }

    protected function html()
    {
        $link="";

        foreach ($this->splitPath() as $key => $page)
        {
            $numberOfPages= count($this->splitPath());
            $link .=$page."/";

            if($key == $numberOfPages - 1)
            {
                $this->newpath .= '<li class="breadcrumb-item active">'.$this->buildPageName($page).'</li>';
                continue;
            }   

            $this->newpath .= '<li class="breadcrumb-item"><a href="/'.$link.'">'. $this->buildPageName($page).'</a></li>';
        }

        return $this->newpath;
    }

    public function build()
    {
        return $this->connectPages();
    }

    public function buildHtml()
    {
        return $this->html();
    }


}
