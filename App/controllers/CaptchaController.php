<?php
class CaptchaController extends BaseController{
    public function getCaptcha($lang = 'en'){
        $langs = array(
            "en"=>'What is',
            'fr'=>'Quelle est'
        );
        if($lang != 'en'){
            if(!array_key_exists($lang, $langs)){
                $lang = 'en';
            }
        }
        $im = imagecreatetruecolor(200, 100);
        $grey = imagecolorallocate($im, 128, 128, 128);
        $black = imagecolorallocate($im, 0, 0, 0);
        $white = imagecolorallocate($im, 255, 255, 255);
        imagefill($im,0,0,$white);
        $text = $langs[$lang];
        $fonts = array('open','linden','knewave','blackout','ostrich');
        $fontnum = rand(0,count($fonts)-1);
        $left = 0;
        $largest = 0;
        for($i = 0; $i < 1000; $i++){
            imagesetpixel($im, round(rand(0,200)), round(rand(0,100)), $black);
        }
        for($i = 0; $i < 1000; $i++){
            imagesetpixel($im, round(rand(0,200)), round(rand(0,100)), imagecolorallocate($im, rand(0,256), rand(0,256), rand(0,256)));
        }
        $operations = array('+','-','x');
        $first = rand(2,10);
        $operation = $operations[rand(0,2)];
        $second = rand(1, $first);
        $number = $first.' '.$operation.' '.$second;
        if($operation == '+'){
            $answer = $first + $second;
        }else if($operation == '-'){
            $answer = $first - $second;
        }else{
            $answer = $first * $second;
        }
        if(!Input::has('id') || intval(Input::get('id')) < time()-900 || intval(Input::get('id')) > time()+900){
            $text = "Invalid Input";
            $number = "Refresh Page";
        }else{
            Cache::put('captcha_'.Input::get('id'), $answer, 30);
        }
        foreach(explode(" ", $text) as $word){
            $angle = rand(-10,10);
            $font = base_path().'/public/fonts/'.$fonts[$fontnum].'.ttf';
            $fontnum++;
            if($fontnum >= count($fonts)){
                $fontnum = 0;
            }
            $size = rand(17, 23);
            $fontbox = imagettfbbox($size, $angle, $font, $word);
            if($fontbox[1] > $largest){
                $largest = $fontbox[1];
            }
            imagettftext($im, $size, $angle, 20+$left, 10 + $largest + $size, $black, $font, $word);  
            $left += $fontbox[4]+($size-5);
        }
        $left = 0;
        foreach(explode(" ", $number) as $word){
            $angle = rand(-20,20);
            if(in_array($word, $operations)){
                $fontnum = rand(0,3);
                $angle = 0;
            }else{
                if($fontnum == 3){
                    $fontnum = rand(0,2);
                }
            }
            $font = base_path().'/public/fonts/'.$fonts[$fontnum].'.ttf';
            $fontnum++;
            if($fontnum >= count($fonts)){
                $fontnum = 0;
            }
            $size = rand(17, 23);
            $fontbox = imagettfbbox($size, $angle, $font, $word);
            imagettftext($im, $size, $angle, 20+$left, 50 + $largest + $size, $black, $font, $word); 
            $left += $fontbox[4]+($size-5);
        }
        ob_start();
        imagepng($im);
        $contents = ob_get_contents();
        ob_end_clean();
        imagedestroy($im);
        $response = Response::make($contents, 200);
        $response->header('Content-Type', 'image/png');
        return $response;
    }
    public function validateCaptcha($id,$answer){
        if(Cache::has('captcha_'.$id) && Cache::get('captcha_'.$id) == intval($answer)){
            Cache::forget('captcha_'.$id);
            return true;
        }else{
            return false;
        }
    }
}
?>