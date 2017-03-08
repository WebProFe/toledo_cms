<?php
class __Redirect {
	private static $home = "SitioCenterCo/index.php?success=1#form";
	

	public static function toHome($success) {
		header("Location: ".self::$home.$success);
	}
}
?>