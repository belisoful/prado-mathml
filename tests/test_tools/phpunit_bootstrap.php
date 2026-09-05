<?php

/**
 * Common settings for all unit tests of the PRADO Math extension.
 *
 * Registers the extension's error message file so exception codes resolve, then
 * autoloads the framework and the extension via Composer's PSR-4 map. The
 * web-control render helper trait is loaded here because a trait is not reachable
 * through the class autoloader.
 */

require_once(__DIR__ . '/../../vendor/autoload.php');
require_once(__DIR__ . '/TWebControlRenderTrait.php');

\Prado\Exceptions\TException::addMessageFile(__DIR__ . '/../../config/errorMessages.txt');
