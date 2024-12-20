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
                <img src="/images/logo-citycars.png" alt="City Cars Barcelona" />
            </h1>
            <div class="nav">
                <a href="/<?php if (strlen($queryStringLang) > 0) { echo '?'.$queryStringLang; } ?>" class="bt-home">
                    <img src="/images/bt-home.png" alt="Home" />
                </a>
                <ul class="menu">
                    <li class="item"><a href="info.php<?php if (strlen($queryStringLang) > 0) { echo '?'.$queryStringLang; } ?>" class="link icon-info"><span class="tooltip"><?= _str('information.title') ?></span></a></li>
                    <li class="item"><a href="credits.php<?php if (strlen($queryStringLang) > 0) { echo '?'.$queryStringLang; } ?>" class="link icon-credits"><span class="tooltip"><?= _str('credits.title') ?></span></a></li>
                    <li class="item"><a href="screenviews.php<?php if (strlen($queryStringLang) > 0) { echo '?'.$queryStringLang; } ?>" class="link icon-screenviews"><span class="tooltip"><?= _str('screenviews.title') ?></span></a></li>
                    <?php if (!$mobileDetect->isMobile() AND !$mobileDetect->isTablet()) { ?>
                    <li class="item"><a href="/game/<?php if (strlen($queryStringLang) > 0) { echo '?'.$queryStringLang; } ?>" class="link icon-play"><span class="tooltip"><?= _str('play.title') ?></span></a></li>
                    <?php } ?>
                    <li class="item"><a href="contact.php<?php if (strlen($queryStringLang) > 0) { echo '?'.$queryStringLang; } ?>" class="link icon-contact"><span class="tooltip"><?= _str('contact.title') ?></span></a></li>
                </ul>
            </div>
        </div>
        <div class="content">
            <div class="info-app">
                <h2 class="title">
                    <?= _str('credits.title') ?>
                </h2>
                <dl class="credits">
                    <dt><?= _str('credits.idea') ?></dt>
                    <dd>Jaleco (1985)</dd>
                     
                    <dt><?= _str('credits.development') ?></dt>
                    <dd><a href="http://www.zdzapps.com">ZDZ Touch &amp; Play</a></dd>
                     
                    <dt><?= _str('credits.engine') ?></dt>
                    <dd><a href="http://www.photonstorm.com">Phaser by PhotonStorm.com</a></dd>
                     
                    <dt><?= _str('credits.maps') ?></dt>
                    <dd><a href="http://www.mapeditor.org">Tiled by Thorbjørn Lindeijer</a></dd>
                     
                    <dt><?= _str('credits.packager') ?></dt>
                    <dd><a href="http://www.ludei.com">CocoonJS by Ludei</a></dd>
                     
                    <dt><?= _str('credits.audio') ?></dt>
                    <dd>Ogg Vorbis</dd>
                     
                    <dt><a href="http://www.paltian.com"><?= _str('credits.music') ?> <strong>Paltian.com</strong></a></dt>
                    <dd class="breakline">Waiting</dd>
                    <dd class="breakline">Ready!</dd>
                    <dd class="breakline">The race</dd>
                    <dd class="breakline">Blue &amp; White</dd>
                    <dd class="breakline">Freedom!</dd>
                </dl>
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
                ®2015 CityCarsBarcelona.com, <a href="http://www.zdzapps.com/<?php if (strlen($queryStringLang) > 0) { echo '?'.$queryStringLang; } ?>"><img src="/images/logo-zdz.png" alt="ZDZ" /></a>. <a href="/contact.php<?php if (strlen($queryStringLang) > 0) { echo '?'.$queryStringLang; } ?>"><?= _str('contact.title') ?></a>.
            </p>
            <?= langSwitch() ?>
        </div>
    </div>
</body>
</html>
