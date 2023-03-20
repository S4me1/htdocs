<?php

session_start();

unset($_SESSION['GET_USER_SSID']);

session_unset();

session_destroy();

echo '<script>window.location.href="auth/auth-login"</script>';

?>