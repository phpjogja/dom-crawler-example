<?php
require 'vendor/autoload.php';

use ThauEx\SimpleHtmlDom\SHD;

SHD::$fileCacheDir = "tmp";

$url = 'http://www.bankmandiri.co.id/resource/kurs.asp';

$dom = SHD::fileGetHtml($url);

$currency = $dom->find('table.tbl-view tr', 10)->find('td', 0);
$symbol   = $dom->find('table.tbl-view tr', 10)->find('td', 1);
$buy      = $dom->find('table.tbl-view tr', 10)->find('td', 2);
$sell     = $dom->find('table.tbl-view tr', 10)->find('td', 4);


echo <<<HEREDOC

Source: <a href="http://www.bankmandiri.co.id/resource/kurs.asp">http://www.bankmandiri.co.id/resource/kurs.asp</a>

<p>Mata uang: <strong>{$currency->plaintext}</strong></p>
<p>Simbol: <strong>{$symbol->plaintext}</strong></p>
<p>Beli: <strong>{$buy->plaintext}</strong></p>
<p>Jual: <strong>{$sell->plaintext}</strong></p>

HEREDOC;
