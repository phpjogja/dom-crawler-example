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
<pre>

Source: <a href="{$url}">{$url}</a>

Mata uang <strong> $currency->plaintext </strong>
Simbol    <strong> $symbol->plaintext   </strong>
Beli      <strong> $buy->plaintext      </strong>
Jual      <strong> $sell->plaintext     </strong>

</pre>
HEREDOC;
