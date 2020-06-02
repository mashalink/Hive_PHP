#!/usr/bin/php
<?php
    if($argc == 2 && file_exists($argv[1]))
    {
        $file_arr = file($argv[1]);
        foreach($file_arr as $str)
        {
            if (preg_match('/(<a.*>.*<\/a>)/', $str, $matches) != 0)
            {
                preg_match_all('([\'"].*?[\'"]|[\>].*?[\<])', $matches[0], $matches1);
                foreach ($matches1[0] as $up)
                    $str = str_replace($up, strtoupper($up), $str);
            }
            echo "$str";
        }
    }
?>