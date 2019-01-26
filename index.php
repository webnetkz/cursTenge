<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

date_default_timezone_set('Asia/Almaty');
$date = date('d.m.Y');

    $site = file_get_contents('http://kurstenge.kz/');
    
    function parse($params1, $params2, $params3) {

        $first = strpos($params1, $params2);
        if($first === false) return 0;
        $last = substr($params1, $first);
        return strip_tags(substr($last, 0, strpos($last, $params3)));
    }

    $usdString = parse($site, 'Доллар США', '</tr>');
        $usd = explode("\n", $usdString);

    $eurString = parse($site, 'Евро', '</tr>');
        $eur = explode("\n", $eurString);

    $rubString = parse($site, 'Российский рубль', '</tr>');
        $rub = explode("\n", $rubString);

?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <title>Курс Тенге <?=$date;?></title>

        <meta charset="UTF-8">
        <meta name="author" content="TOO WebNet">
        <meta name="description" content="Курс тенге сегодня">
        <meta name="keywords" content="курс тенге, курс долара, курс евро, курс рубля">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="robots" content="index, follow">

        <link rel="shortcut icon" href="miniLogoWebnet.png" type="image/png">
        <link rel="stylesheet" href="public/css/style.css">
        <link rel="stylesheet" href="public/css/mobileStyle.css">
    </head>
    <body>
        <h1>Курс тенге на <?=$date;?></h1>
        <div id="content">
            <div id="usd" class="many">
                <h2 class="name" title="курс доллара США"><?=$usd[0]?></h2>
            </div>
                <hr>
            <div id="eur" class="many">
                <h2 class="name" title="курс евро"><?=$eur[0]?></h2>
            </div>
                <hr>
            <div id="rub" class="many">
                <h2 class="name" title="курс рубля"><?=$rub[0]?></h2>
            </div>
        </div>
    </body>
</html>