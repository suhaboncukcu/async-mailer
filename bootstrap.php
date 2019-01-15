<?php
/**
 *
 *
 * @since     2019-01-14
 *
 * @author    suhaboncukcu
 * @copyright Copyright (c) 2015 Zingat.com (http://www.zingat.com)
 * @license   Zingat Commercial License
 *
 * @see      https://github.com/zingat/api
 */

require_once "./vendor/autoload.php";


define('ROOT', dirname(__DIR__));
define('CONFIG_DIR', ROOT . DIRECTORY_SEPARATOR . 'config');
define('CONFIG_FILE', CONFIG_DIR . DIRECTORY_SEPARATOR . '.env');

require_once "./App/server.php";