<?php
	if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] && $_POST['submit'] === "OK")
	{
		if(!file_exists("../htdocs")){
            mkdir("../htdocs");
            if(!file_exists("../htdocs/private")){
                mkdir("../htdocs/private");
            }
        }
		$new_user = array(
			'login'=> $_POST['login'],
            'passwd' => hash('whirlpool', $_POST['passwd']));
        $path = '../htdocs/private/passwd';
        $db = unserialize(file_get_contents($path));
        $user_exists = false;
        foreach($db as $id => $user){
            if($user['login'] === $new_user['login']){
                $user_exists= true;
                echo "ERROR\n";
                break;
            }
        }
        if (!$user_exists){
			$db[] = $new_user;
			file_put_contents($path, serialize($db));
			header('Location: index.html');
            echo "OK\n";
        }
	}
	else {
        echo "ERROR\n";
	}
?>