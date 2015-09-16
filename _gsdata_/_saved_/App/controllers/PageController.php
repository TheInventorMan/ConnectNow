<?php
class PageController extends BaseController{
    public function __construct() {
        $this->pages = array(
            'home' => '/',
            'explore' => '/explore',
            'start' => '/start',
            'signup' => '/signup',
            'login' => '/login',
            'about' => '/about',
            'terms' => '/terms',
            'privacy' => '/privacy',
            'contact' => '/contact',
            'search' => '/search',
            'help' => '/help'
        );
        $this->languages = array('en'=>'English','fr'=>'Français <span class="text-muted">Alpha</span>');
    }
    public function showPage($page = 'home')
    {
        if(array_key_exists($page, $this->languages)){
            return $this->showPageLang($page, 'home');
        }else{
            return $this->showPageLang('', $page);
        }
    }
    public function checkRedirect($lang,$page){
        $redirect = false;
        if($lang == 'en'){
            $redirect = URL::to('/');
        }
        if((Request::segment(1) == 'home' && $lang == '') || (Request::segment(2) == 'home' && $lang != '')){
            if($redirect == false){
                $lang = $this->checkLang($lang);
                if($lang != ''){
                    $lang = '/'.$lang;
                }
                $redirect = URL::to('/').$lang;
            }
        }elseif($redirect != false){
            $redirect .= $this->getPageUrl($page);
        }else{

        }
        if($redirect != false){
            header('Location: '.$redirect);
            exit();
        }
    }
    public function checkPageName($page){
        if(array_key_exists($page, $this->pages)){
            return $page;
        }else{
            if($page == ''){
                return 'home';
            }else{
                return 'error';
            }
        }
    }
    public function getPageUrl($page){
        $page = $this->checkPageName($page);
        return $this->pages[$page];
    }
    public function checkLang($lang){
        if(array_key_exists($lang, $this->languages)){
            if($lang == 'en'){
                return '';
            }else{
                return $lang;
            }
        }else{
            return '';
        }
    }
    public function setLang($lang){
        if(array_key_exists($lang, $this->languages)){
            App::setLocale($lang);
            if($lang == 'en'){
                return '';
            }else{
                return $lang;
            }
        }else{
            return '';
        }
    }
    public function showPageLang($lang, $page)
    {
        $this->checkRedirect($lang,$page);
        $lang = $this->setLang($lang);
    	$page = $this->checkPageName($page);
        return View::make($page, array('currentPage'=>$page, 'lang'=>$lang));
    }
    public static function getUrlPath($lang, $page){
        $selfPageController = new PageController;
        $lang = $selfPageController->checkLang($lang);
        if($lang != ''){
            $lang = '/'.$lang;
        }
        return URL::to('/').$lang.$selfPageController->getPageUrl($page);
    }
}
?>