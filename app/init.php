<?php

$_ENV = parse_ini_file('.env', false, INI_SCANNER_RAW);

define("APP_NAME",$_ENV["APP_NAME"]);
define("THEME",$_ENV["THEME"]);
define('ROOT', $_ENV["APP_PATH"]);
define('ASSETS', ROOT."/assets/".THEME);
define('DB_TYPE',$_ENV["DB_CONNECTION"]);
define('DB_HOST',$_ENV["DB_HOST"]);
define('DB_NAME',$_ENV["DB_DATABASE"]);
define('DB_USER',$_ENV["DB_USERNAME"]);
define('DB_PASS',$_ENV["DB_PASSWORD"]);

include "../app/core/function.php";
include "../app/core/app.php";
include "../app/core/controller.php";
include "../app/core/request.php";
include "../app/core/response.php";
include "../app/core/router.php";
include "../app/middlewares/AuthMiddleware.php";
include "../app/core/database.php";
include "../app/core/model.php";
include "../app/core/validator.php";
include "../app/core/pagination.php";
include "../app/core/language.php";

//b51f e139 3fd9 9db0
