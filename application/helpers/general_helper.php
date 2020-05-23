<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function unSlug($text){
	return str_replace("-"," ",$text);
}

function createSlug($text){
	$text = strip_tags($text);
    $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
    $text = trim($text, '-');
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    $text = strtolower($text);
    $text = preg_replace('~[^-\w]+~', '', $text);
    if (empty($text))
    {
        return 'n-a';
    }
    return $text;
}
