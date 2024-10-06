<?php

namespace Core\Helpers;


function truncate (string $string,int $lg_max = 150):string
{
    if (strlen($string) > $lg_max):
        $string = substr($string, 0, $lg_max);
        $last_space = strrpos($string, " ");
        return substr($string, 0, $last_space) . '...';
    endif;
    return $string;
}


function slugify(string $string): string
{
    // Strip HTML tags
    $string = strip_tags($string);
    
    // Replace non-letter or non-digit characters by hyphens
    $string = preg_replace('~[^\pL\d]+~u', '-', $string);
    
    // Transliterate to ASCII (converting accents and special characters)
    $string = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $string);
    
    // Remove unwanted characters (anything that's not a word character or hyphen)
    $string = preg_replace('~[^-\w]+~', '', $string);
    
    // Trim any leading or trailing hyphens
    $string = trim($string, '-');
    
    // Replace multiple hyphens with a single one
    $string = preg_replace('~-+~', '-', $string);
    
    // Lowercase the string for consistency
    $string = strtolower($string);
    
    // Check if the resulting string is empty (happens when all characters are stripped)
    if (empty($string)) {
        return 'n-a';  // Return 'n-a' as a fallback for empty strings
    }
    
    // Return the final slug
    return $string;
}
