<?php
    $path = '../htdocs/private/passwd';
    if($_POST['login'] && $_POST['oldpw'] && $_POST['newpw'] && $_POST['submit'] && $_POST['submit'] === "OK" && file_exists($path)){
        $db = unserialize(file_get_contents($path));
        $match = false;
        foreach ($db as $id => $user){
            if($user['login'] === $_POST['login'] && $user['passwd'] === hash('whirlpool', $_POST['oldpw'])){
                $db[$id]['passwd'] = hash('whirlpool', $_POST['newpw']);
                file_put_contents($path, serialize($db));
                $match = true;
				header('Location: index.html');
				echo "OK\n";
                break;
            }
        }
        if(!$match)
            echo "ERROR\n";
    }
    else
        echo "ERROR\n";
?>