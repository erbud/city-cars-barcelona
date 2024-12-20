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
	<meta http-equiv="X-UA-Compatible" content="chrome=1, IE=9" />
	<title><?= _str('app.title') ?> – <?= _str('app.description') ?></title>
	<meta name="description" content="<?= _str('app.description.small') ?>" />
	<link rel="shortcut icon" href="http://www.citycarsbarcelona.com/favicon.ico" />
    <link rel="icon" type="image/png" href="http://www.citycarsbarcelona.com/icon.png" />
    <link rel="stylesheet" type="text/css" media="screen" href="/css/citycars.css" />
    <?= metaAlternate(); ?>
	<script src="lib/phaser.min.js"></script>
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
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- Ads Adaptable -->
		<ins class="adsbygoogle"
		     style="display:block"
		     data-ad-client="ca-pub-4435411492943008"
		     data-ad-slot="2138904772"
		     data-ad-format="auto"></ins>
		<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
	</div>
	<div id="game"></div>
</body>
</html>