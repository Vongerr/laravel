<?php /** @noinspection DuplicatedCode */

use Symfony\Component\VarDumper\VarDumper;

/**
 * debug function
 */
function printr($data, bool $isDie = false): void
{

    //if (!((defined('YII_ENV') && YII_ENV === 'dev') && (defined('YII_DEBUG') && YII_DEBUG))) return;

    if ($data === null) {

        echo '<pre>Parameter is null</pre>';
    } else {

        echo '<pre>', print_r(VarDumper::dump($data), 1), '</pre>';
    }

    if ($isDie) die();
}
