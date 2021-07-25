<?php

class Foramt{
    
    public function textShorten($txt, $limit = 400){
        $txt = $txt. "";
        $txt = substr($txt, 0, $limit );
        $txt = $txt."...";
        return $txt;
    }









}
?>