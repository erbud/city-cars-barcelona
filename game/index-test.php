<?php
    include $_SERVER['DOCUMENT_ROOT'].'/includes/mobile-detect.php';
    include $_SERVER['DOCUMENT_ROOT'].'/includes/data.php';
    include $_SERVER['DOCUMENT_ROOT'].'/includes/strings.php';
?>
<?php
	if ($mobileDetect->isMobile() OR $mobileDetect->isTablet()) {
		header('Location: http://www.citycarsbarcelona.com');
	}
?>
<!DOCTYPE HTML>
<html lang="en">
	<meta charset="utf-8" />
	<title><?= _str('app.title') ?> – <?= _str('app.description') ?></title>
	<meta http-equiv="X-UA-Compatible" content="chrome=1, IE=9" />
	<meta name="format-detection" content="telephone=no" />
	<meta name="HandheldFriendly" content="true" />
	<meta name="robots" content="noindex,nofollow" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<meta name="apple-mobile-web-app-title" content="City Cars Barcelona" />
	<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi" />
	<link rel="shortcut icon" href="http://www.citycarsbarcelona.com/favicon.ico" />
    <link rel="icon" type="image/png" href="http://www.citycarsbarcelona.com/icon.png" />
    <link rel="stylesheet" type="text/css" media="screen" href="/css/citycars.css" />
    <?= metaAlternate(); ?>
	<script src="lib/cocoon.min.js"></script>
	<script src="lib/phaser.min.js"></script>
	<script src="lib/DOMishParser.min.js"></script>
	<script src="lib/store.min.js"></script>
	<script src="build/game.min.js"></script>
</head>
<body class="game">
	<?php include_once('../includes/analytics-tracking.php') ?>
	<div class="header">
		<h1 class="title">
			<a href="/<?php if (strlen($queryStringLang) > 0) { echo '?'.$queryStringLang; } ?>" class="bt-home">
            	<img src="/images/logo-citycars-gamepage.png" alt="City Cars Barcelona" />
            </a>
        </h1>
	</div>
	<div id="game"></div>
</body>
</html>