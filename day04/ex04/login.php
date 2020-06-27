<?php
    include("auth.php");
    session_start();
    $path = '../htdocs/private/passwd';
    if (auth($_POST['login'], $_POST['passwd'])){
        $_SESSION['loggued_on_user'] = $_POST['login'];
	    header('Content-type: text/html');
    }
    else{
        $_SESSION['loggued_on_user'] = "";    
		header('Location: index.html');
		echo "ERROR\n";
    }
?>
<html><body>
	<form>
		<iframe name="chat" src="chat.php" width="100%" height="550px"></iframe>
		<iframe name="speak" src="speak.php" width="100%" height="50px"></iframe>
		<input name="logout" formaction="logout.php" type="submit" value="Log out"/>
	</form>
</html></body>