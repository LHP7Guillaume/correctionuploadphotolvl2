<?php
session_start();
setcookie("sessionLogin", "", time() - 1, "/");
session_unset();
session_destroy();
