<?php
    session_start();

    include $_SERVER['DOCUMENT_ROOT'].'/includes/mobile-detect.php';
    include $_SERVER['DOCUMENT_ROOT'].'/includes/data.php';
    include $_SERVER['DOCUMENT_ROOT'].'/includes/strings.php';

    $from         = filter_var( trim($_POST["contact-from"]), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW );
    $mail         = filter_var( trim($_POST["contact-mail"]) , FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW );
    $subject      = filter_var( trim($_POST["contact-subject"]), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW );
    $message      = filter_var( trim($_POST["contact-message"]), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW );
    $captcha      = filter_var( trim($_POST["contact-captcha"]), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW );
    $captchacheck = $_SESSION['captcha'];

    if (strlen($from) > 0 OR strlen($mail) > 0 OR strlen($subject) > 0 OR strlen($message) > 0 OR strlen($captcha) > 0) {
        if (strlen($from) == 0 OR strlen($mail) == 0 OR strlen($subject) == 0 OR strlen($message) == 0 OR strlen($captcha) == 0) {
            $errorMsg   = _str('error.data.value');
        } else if (sha1($captcha) != $captchacheck) {
            $errorMsg   = _str('error.captcha.value');
        } else {
            $to         = "zdzservices@gmail.com";
            $headers    =  "From: ". $from . " <" . $mail . ">\r\n".
                           "Reply-To: " . $mail;
            $success    = mail($to , "#ZDZ #CityCars ".$subject , $message, $headers);
            $successMsg = ($success) ? _str('send.ok') : _str('error.value');

            if ($success) {
                $from    = '';
                $mail    = '';
                $subject = '';
                $message = '';
            }
        }
        $captcha = '';
    }
?>
<!DOCTYPE HTML>
<html lang="<?= (strlen($lang) > 0) ? $lang : 'en' ?>">
<head>
    <meta charset="UTF-8">
    <title><?= _str('contact.title') ?> | <?= _str('app.title') ?> – <?= _str('app.description') ?></title>
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
            <div class="contact">
                <h2 class="title">
                    <?= _str('contact.title') ?>
                </h2>
                <?php if ($successMsg) { ?>
                <div class="response contact-success">
                    <p><?= $successMsg ?></p>
                </div>
                <?php } ?>
                <?php if ($errorMsg) { ?>
                <div class="response contact-error">
                    <p><?= $errorMsg ?></p>
                </div>
                <?php } ?>
                <form class="contact-form" method="post" action="contact.php<?php if (strlen($queryStringLang) > 0) { echo '?'.$queryStringLang; } ?>">
                    <p class="contact-from">
                        <label for="contact-from"><?= _str('contact.from') ?></label>
                        <input type="text" id="contact-from" name="contact-from" class="textbox" value="<?= $from ?>" />
                    </p>
                    <p class="contact-mail">
                        <label for="contact-mail"><?= _str('contact.mail') ?></label>
                        <input type="text" id="contact-mail" name="contact-mail" class="textbox" value="<?= $mail ?>" />
                    </p>
                    <p class="contact-subject">
                        <label for="contact-subject"><?= _str('contact.subject') ?></label>
                        <input type="text" id="contact-subject" name="contact-subject" class="textbox" value="<?= $subject ?>" />
                    </p>
                    <p class="contact-message">
                        <label for="contact-message"><?= _str('contact.message') ?></label>
                        <textarea id="contact-message" name="contact-message" class="textarea"><?= $message ?></textarea>
                    </p>
                    <p class="contact-captcha">
                        <label for="contact-captcha"><?= _str('validation.code') ?> <img src="/data/captcha.php" alt="" class="validation-code" /></label>
                        <input type="text" id="contact-captcha" name="contact-captcha" maxlength="4" class="textbox empty" value="<?= $captcha ?>" />
                    </p>
                    <p class="contact-actions">
                        <input type="submit" class="button" value="<?= _str('contact.send') ?>" />
                    </p>
                </form>
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
