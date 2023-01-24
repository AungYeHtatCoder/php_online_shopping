<?php

namespace Helpers;

class Auth
{
	static $loginUrl = '../login_form.php';

	static function check()
	{
		session_start();
		if (isset($_SESSION['user'])) {
			return $_SESSION['user'];
		} else {
			header('Location: ' . self::$loginUrl);
		}
	}
}