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
            'help' => '/help',
            'error' => '/error',
            'support' => '/support',
            'activate' => '/activate',
            'logout' => '/logout',
            'account' => '/account',
            'deleteaccount' => '/account/delete'
        );
        $this->extData = array('countries' => array("AF"=>"Afghanistan","AL"=>"Albania","DZ"=>"Algeria","AS"=>"American Samoa","AD"=>"Andorra","AO"=>"Angola","AI"=>"Anguilla","AQ"=>"Antarctica","AG"=>"Antigua and Barbuda","AR"=>"Argentina","AM"=>"Armenia","AW"=>"Aruba","AU"=>"Australia","AT"=>"Austria","AZ"=>"Azerbaijan","BS"=>"Bahamas","BH"=>"Bahrain","BD"=>"Bangladesh","BB"=>"Barbados","BY"=>"Belarus","BE"=>"Belgium","BZ"=>"Belize","BJ"=>"Benin","BM"=>"Bermuda","BT"=>"Bhutan","BO"=>"Bolivia","BA"=>"Bosnia and Herzegovina","BW"=>"Botswana","BV"=>"Bouvet Island","BR"=>"Brazil","BQ"=>"British Antarctic Territory","IO"=>"British Indian Ocean Territory","VG"=>"British Virgin Islands","BN"=>"Brunei","BG"=>"Bulgaria","BF"=>"Burkina Faso","BI"=>"Burundi","KH"=>"Cambodia","CM"=>"Cameroon","CA"=>"Canada","CT"=>"Canton and Enderbury Islands","CV"=>"Cape Verde","KY"=>"Cayman Islands","CF"=>"Central African Republic","TD"=>"Chad","CL"=>"Chile","CN"=>"China","CX"=>"Christmas Island","CC"=>"Cocos [Keeling] Islands","CO"=>"Colombia","KM"=>"Comoros","CG"=>"Congo - Brazzaville","CD"=>"Congo - Kinshasa","CK"=>"Cook Islands","CR"=>"Costa Rica","HR"=>"Croatia","CU"=>"Cuba","CY"=>"Cyprus","CZ"=>"Czech Republic","CI"=>"C\u00f4te d\u2019Ivoire","DK"=>"Denmark","DJ"=>"Djibouti","DM"=>"Dominica","DO"=>"Dominican Republic","NQ"=>"Dronning Maud Land","DD"=>"East Germany","EC"=>"Ecuador","EG"=>"Egypt","SV"=>"El Salvador","GQ"=>"Equatorial Guinea","ER"=>"Eritrea","EE"=>"Estonia","ET"=>"Ethiopia","FK"=>"Falkland Islands","FO"=>"Faroe Islands","FJ"=>"Fiji","FI"=>"Finland","FR"=>"France","GF"=>"French Guiana","PF"=>"French Polynesia","TF"=>"French Southern Territories","FQ"=>"French Southern and Antarctic Territories","GA"=>"Gabon","GM"=>"Gambia","GE"=>"Georgia","DE"=>"Germany","GH"=>"Ghana","GI"=>"Gibraltar","GR"=>"Greece","GL"=>"Greenland","GD"=>"Grenada","GP"=>"Guadeloupe","GU"=>"Guam","GT"=>"Guatemala","GG"=>"Guernsey","GN"=>"Guinea","GW"=>"Guinea-Bissau","GY"=>"Guyana","HT"=>"Haiti","HM"=>"Heard Island and McDonald Islands","HN"=>"Honduras","HK"=>"Hong Kong SAR China","HU"=>"Hungary","IS"=>"Iceland","IN"=>"India","ID"=>"Indonesia","IR"=>"Iran","IQ"=>"Iraq","IE"=>"Ireland","IM"=>"Isle of Man","IL"=>"Israel","IT"=>"Italy","JM"=>"Jamaica","JP"=>"Japan","JE"=>"Jersey","JT"=>"Johnston Island","JO"=>"Jordan","KZ"=>"Kazakhstan","KE"=>"Kenya","KI"=>"Kiribati","KW"=>"Kuwait","KG"=>"Kyrgyzstan","LA"=>"Laos","LV"=>"Latvia","LB"=>"Lebanon","LS"=>"Lesotho","LR"=>"Liberia","LY"=>"Libya","LI"=>"Liechtenstein","LT"=>"Lithuania","LU"=>"Luxembourg","MO"=>"Macau SAR China","MK"=>"Macedonia","MG"=>"Madagascar","MW"=>"Malawi","MY"=>"Malaysia","MV"=>"Maldives","ML"=>"Mali","MT"=>"Malta","MH"=>"Marshall Islands","MQ"=>"Martinique","MR"=>"Mauritania","MU"=>"Mauritius","YT"=>"Mayotte","FX"=>"Metropolitan France","MX"=>"Mexico","FM"=>"Micronesia","MI"=>"Midway Islands","MD"=>"Moldova","MC"=>"Monaco","MN"=>"Mongolia","ME"=>"Montenegro","MS"=>"Montserrat","MA"=>"Morocco","MZ"=>"Mozambique","MM"=>"Myanmar [Burma]","NA"=>"Namibia","NR"=>"Nauru","NP"=>"Nepal","NL"=>"Netherlands","AN"=>"Netherlands Antilles","NT"=>"Neutral Zone","NC"=>"New Caledonia","NZ"=>"New Zealand","NI"=>"Nicaragua","NE"=>"Niger","NG"=>"Nigeria","NU"=>"Niue","NF"=>"Norfolk Island","KP"=>"North Korea","VD"=>"North Vietnam","MP"=>"Northern Mariana Islands","NO"=>"Norway","OM"=>"Oman","PC"=>"Pacific Islands Trust Territory","PK"=>"Pakistan","PW"=>"Palau","PS"=>"Palestinian Territories","PA"=>"Panama","PZ"=>"Panama Canal Zone","PG"=>"Papua New Guinea","PY"=>"Paraguay","YD"=>"People's Democratic Republic of Yemen","PE"=>"Peru","PH"=>"Philippines","PN"=>"Pitcairn Islands","PL"=>"Poland","PT"=>"Portugal","PR"=>"Puerto Rico","QA"=>"Qatar","RO"=>"Romania","RU"=>"Russia","RW"=>"Rwanda","RE"=>"R\u00e9union","BL"=>"Saint Barth\u00e9lemy","SH"=>"Saint Helena","KN"=>"Saint Kitts and Nevis","LC"=>"Saint Lucia","MF"=>"Saint Martin","PM"=>"Saint Pierre and Miquelon","VC"=>"Saint Vincent and the Grenadines","WS"=>"Samoa","SM"=>"San Marino","SA"=>"Saudi Arabia","SN"=>"Senegal","RS"=>"Serbia","CS"=>"Serbia and Montenegro","SC"=>"Seychelles","SL"=>"Sierra Leone","SG"=>"Singapore","SK"=>"Slovakia","SI"=>"Slovenia","SB"=>"Solomon Islands","SO"=>"Somalia","ZA"=>"South Africa","GS"=>"South Georgia and the South Sandwich Islands","KR"=>"South Korea","ES"=>"Spain","LK"=>"Sri Lanka","SD"=>"Sudan","SR"=>"Suriname","SJ"=>"Svalbard and Jan Mayen","SZ"=>"Swaziland","SE"=>"Sweden","CH"=>"Switzerland","SY"=>"Syria","ST"=>"S\u00e3o Tom\u00e9 and Pr\u00edncipe","TW"=>"Taiwan","TJ"=>"Tajikistan","TZ"=>"Tanzania","TH"=>"Thailand","TL"=>"Timor-Leste","TG"=>"Togo","TK"=>"Tokelau","TO"=>"Tonga","TT"=>"Trinidad and Tobago","TN"=>"Tunisia","TR"=>"Turkey","TM"=>"Turkmenistan","TC"=>"Turks and Caicos Islands","TV"=>"Tuvalu","UM"=>"U.S. Minor Outlying Islands","PU"=>"U.S. Miscellaneous Pacific Islands","VI"=>"U.S. Virgin Islands","UG"=>"Uganda","UA"=>"Ukraine","SU"=>"Union of Soviet Socialist Republics","AE"=>"United Arab Emirates","GB"=>"United Kingdom","US"=>"United States","ZZ"=>"Unknown or Invalid Region","UY"=>"Uruguay","UZ"=>"Uzbekistan","VU"=>"Vanuatu","VA"=>"Vatican City","VE"=>"Venezuela","VN"=>"Vietnam","WK"=>"Wake Island","WF"=>"Wallis and Futuna","EH"=>"Western Sahara","YE"=>"Yemen","ZM"=>"Zambia","ZW"=>"Zimbabwe","AX"=>"\u00c5land Islands"));
        $this->exceptions = array(
            'account' => function(){
                if(Auth::check()){
                    return 'account';   
                }else{
                    $this->extData['loginSame'] = true;
                    return 'login';
                }
            },
            'deleteaccount' => function(){
                if(Auth::check()){
                    return 'deleteaccount';   
                }else{
                    $this->extData['loginSame'] = true;
                    return 'login';
                }
            }
        );
        $this->languages = array('en'=>'English','fr'=>'Français <span class="text-muted">Alpha</span>');
    }
    public function showPage($page = 'home')
    {
        $lang = '';
        if(array_key_exists($page, $this->languages)){
            $lang = $page;
            $page = 'home';   
        }
        if($page[0] != '/'){
            $page = '/'.$page;
        }
        return $this->showPageLang($lang, $page);
    }
    public function checkRedirect($lang, $page){
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
    public function checkPageUrl($page){
        if($page[0] != '/'){
            $page = '/'.$page;
        }
        $pageflipped = array_flip($this->pages);
        if(array_key_exists($page, $pageflipped) === true && View::exists($pageflipped[$page]) === true){
            return $this->checkPageName($pageflipped[$page]);
        }else{
            if($page == '/home'){
                return $this->checkPageName('home');
            }else{
                return $this->checkPageName('error');
            }
        }
    }
    public function checkPageName($page){
        if(array_key_exists($page, $this->exceptions)){
            $page = $this->exceptions[$page]();   
        }
        if(array_key_exists($page, $this->pages) === true && View::exists($page) === true){
            return $page;
        }else{
            if($page == '/home'){
                return 'home';
            }else{
                return 'error';
            }
        }
    }
    public function getPageUrl($page){
        $page = $this->checkPageName($page);
        return substr($this->pages[$page], 1);
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
    	$page = $this->checkPageUrl($page);
        return View::make($page, array_merge(array('currentPage'=>$page, 'lang'=>$lang),$this->extData));
    }
    public static function getUrlPath($lang, $page){
        $selfPageController = new PageController;
        $lang = $selfPageController->checkLang($lang);
        if($lang != ''){
            $lang = '/'.$lang;
        }
        return URL::to('/').$lang.'/'.$selfPageController->getPageUrl($page);
    }
}
?>