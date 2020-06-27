<?php
    function auth($login, $passwd){
        if ($login && $passwd) {
        	$path = '../htdocs/private/passwd';
        	$db = unserialize(file_get_contents($path));
        	foreach($db as $key => $user){
            	if($user['login'] === $login && $user['passwd'] === hash('whirlpool', $passwd))
					return true;
				}
		}	
        return false;
    }
?>