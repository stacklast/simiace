<?php
/**
 *  @package Vista
 *  @subpackage Login
 *  @author Edwin Benalcácar Espín <softwareywebsoluciones@gmail.com> <edwinrock1m@gmail.com>
 *  @version 1.0
 *  #file  : logout.php
 */
	session_start();
	session_unset();   
    session_destroy();
	echo '<script>location.href = "/SEK";</script>'; 
?>