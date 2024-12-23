<?php
    include $_SERVER['DOCUMENT_ROOT'].'/includes/mobile-detect.php';
    include $_SERVER['DOCUMENT_ROOT'].'/includes/data.php';
    include $_SERVER['DOCUMENT_ROOT'].'/includes/strings.php';
?>
<!DOCTYPE HTML>
<html lang="<?= (strlen($lang) > 0) ? $lang : 'en' ?>">
<head>
    <meta charset="UTF-8" />
    <title><?= _str('app.title') ?> – <?= _str('app.description') ?></title>
    <meta name="viewport" content="width=device-width, user-scalable=false, initial-scale=1, maximum-scale=1;" />
    <meta name="robots" content="index, follow" />
    <meta name="rating" content="general" />
    <link rel="shortcut icon" href="http://www.citycarsbarcelona.com/favicon.ico" />
    <link rel="icon" type="image/png" href="http://www.citycarsbarcelona.com/icon.png" />
    <?= metaAlternate(); ?>
    <link rel="stylesheet" type="text/css" media="screen" href="/css/citycars.css" />
</head>
<body>
    <?php include_once('includes/analytics-tracking.php') ?>
    <div class="wrapper">
        <div class="header">
            <h1 class="logo">
                <img src="/images/logo-citycars.png" alt="City Cars" />
            </h1>
            <div class="nav">
                <a href="/<?php if (strlen($queryStringLang) > 0) { echo '?'.$queryStringLang; } ?>" class="bt-home">
                    <img src="images/bt-home.png" alt="Home" />
                </a>
                <ul class="menu">
                    <li class="item"><a href="info.php<?php if (strlen($queryStringLang) > 0) { echo '?'.$queryStringLang; } ?>" class="link icon-info"><span class="tooltip"><?= _str('information.title') ?></span></a></li>
                    <li class="item"><a href="credits.php<?php if (strlen($queryStringLang) > 0) { echo '?'.$queryStringLang; } ?>" class="link icon-credits"><span class="tooltip"><?= _str('credits.title') ?></span></a></li>
                    <li class="item"><a href="screenviews.php<?php if (strlen($queryStringLang) > 0) { echo '?'.$queryStringLang; } ?>" class="link icon-screenviews"><span class="tooltip"><?= _str('screenviews.title') ?></span></a></li>
                    <?php if (!$mobileDetect->isMobile() AND !$mobileDetect->isTablet()) { ?>
                    <li class="item"><a href="/game/<?php if (strlen($queryStringLang) > 0) { echo '?'.$queryStringLang; } ?>" class="link icon-play"><span class="tooltip"><?= _str('play.title') ?></span></a></li>
                    <?php } ?>
                    
                </ul>
            </div>
        </div>
        <div class="content">
            <div class="info-app">
                <h2 class="title">
                    <?= _str('information.title') ?>
                </h2>
                <div class="extract">
                    <?= _str('app.description.large') ?>
                </div>
                <div class="description">
                    <dl class="card">
                        <dt><?= _str('app.category.label') ?></dt>
                        <dd><?= _str('app.category.value') ?></dd>
                        <dt><?= _str('app.price.label') ?></dt>
                        <dd><?= _str('app.price.value') ?></dd>
                        <dt><?= _str('app.devices.label') ?></dt>
                        <dd><?= _str('app.devices.value') ?></dd>
                    </dl>
                </div>
            </div>
            <div class="download">
                <ul class="stores">
                    <?php if ($mobileDetect->isAndroidOS() OR !$mobileDetect->isAndroidOS() AND !$mobileDetect->isiOS()) { ?>
                    <li class="item">
                        <a href="https://play.google.com/store/apps/details?id=com.zdz.CityCarsBarcelona&amp;hl=<?= $langStores ?>" class="banner banner-google-play" title="Google Play">
                            <span class="txt"><?= _str('available.in') ?></span>
                        </a>
                    </li>
                    <?php } ?>
                    <?php if ($mobileDetect->isiOS() OR !$mobileDetect->isAndroidOS() AND !$mobileDetect->isiOS()) { ?>
                    <li class="item">
                        <a href="https://itunes.apple.com/<?= $langStores ?>/app/city-cars-barcelona/id983683447" class="banner banner-app-store" title="App Store">
                            <span class="txt"><?= _str('available.in') ?></span>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <div class="footer">
            <p>
                ®2015 CityCarsBarcelona
            </p>
            <?= langSwitch() ?>
        </div>
    </div>
</body>
</html>
