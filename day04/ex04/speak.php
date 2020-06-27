<?php
	session_start();
	date_default_timezone_set('Europe/Helsinki');
	if (!($_SESSION['loggued_on_user'])) {
		if (isset($_POST['msg'])) {
			$file = '../htdocs/private/chat';
			if (!file_exists($file)) {
				file_put_contents($file, null);
			}
			$chat = unserialize(file_get_contents($file));
			$fp = fopen($file, "w+");
			flock($fp, LOCK_EX);
			$tmp['login'] = $_SESSION['loggued_on_user'];
			$tmp['time'] = time();
			$tmp['msg'] = $_POST['msg'];
			$chat[] = $tmp;
			fclose($fp);
			file_put_contents($file, serialize($chat));
			header('Content-type: text/html');
		}
		echo "<html>\n";
		echo "<head>\n";
		echo "<script langage=\"javascript\">top.frames['chat'].location = 'chat.php';</script>\n";
		echo "</head>\n";
		echo "<body>\n";
		echo "<form action=\"speak.php\" method=\"POST\">\n";
		echo "<input type=\"text\" name=\"msg\" value=\"\"/>\n";
		echo "<input type=\"submit\" name=\"submit\" value=\"Send\"/>\n";
		echo "</form>\n";
		echo "</body>\n";
		echo "</html>\n";
	}
	else {
		echo "ERROR\n";
	}
?>
