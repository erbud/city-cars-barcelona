<?php

	// OS detection
	$mobileDetect = new Mobile_Detect;

	// Domain
	$domain 	= 'citycarsbarcelona.com';

	// Languages
	$lang       = filter_var( trim($_GET["lang"]), FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW );
	$langStores = (strlen($lang) > 0) ? $lang : 'en';
	$languages 	= array(
	            	'ca' => 'Català',
	            	/*'da' => 'Dansk',
	            	'de' => 'Deutsch',*/
	            	'en' => 'English',
	            	'es' => 'Español'/*,
	            	'fr' => 'Français',
	            	'it' => 'Italiano',
	            	'nb' => 'Norsk Bokmål',
	            	'nl' => 'Nederlands',
	            	'pt' => 'Português',
	            	'sv' => 'Svensk'*/
	            );

	// Languages Methods
	function initLanguage() {
        global $lang;
        global $languages;
        global $domain;

        $referer = 'es'; //$_SERVER['HTTP_REFERER'];

        if (!$lang AND strrpos($referer, $domain) === false) {
        	$browser_lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2); // browser language

        	if ($browser_lang !== 'en' AND _bot_detected() === FALSE) {
        		$uri = $_SERVER['REQUEST_URI'];

	        	foreach ($languages as $code => $label) {
					if ($code === $browser_lang) {
						if (strpos($uri, 'lang=')) {
							$uri  = preg_replace('/lang=\w{2}/', 'lang='.$code, $uri);
						} else if (strpos($uri, '?')) {
								$uri = $uri . '&lang=' . $code;
						} else {
							$uri = $uri . '?lang=' . $code;
						}
					}
				}
				header("Location: " . $uri);
				die();
			}
	    }
    }
    initLanguage();
    
	function langControl() {
		global $lang;
		global $languages;
		global $queryStringLang;

		$valid = false;
		$lang  = (strlen($lang) > 0) ? $lang : 'en';

		foreach ($languages as $code => $label) {
			if ($lang == $code) {
				$valid = true;
				break 1;
			}
		}
		if (strlen($lang) > 0 AND $valid == FALSE) {
	        header('HTTP/1.1 301 Moved Permanently');
	        header('Location: /');
	    } else if (strlen($lang) > 0 AND $lang != 'en' AND $valid) {
	        $queryStringLang = 'lang='. $lang;
	    }
	}

	function langSwitch() {
		global $lang;
		global $languages;

		$c 		= 1;
		$uri 	= $_SERVER['REQUEST_URI'];
		$langs  = count($languages);
		$output = '<ul class="languages">';

		foreach ($languages as $code => $label) {
			$select  = ($lang === $code) ? ' selected' : '';
			$last 	 = ($c === $langs) ? ' last' : '';

			if ($code === 'es') {
				$uri  = preg_replace('/(\&|\?)lang=\w{2}/', '', $uri);
			} else {
				if (strpos($uri, 'lang=')) {
					$uri  = preg_replace('/lang=\w{2}/', 'lang='.$code, $uri);
				} else {
					if (strpos($uri, '?')) {
						$uri = $uri . '&amp;lang=' . $code;
					} else {
						$uri = $uri . '?lang=' . $code;
					}
				}
			}
			$output .= '<li class="item'. $select . $last .'">';
			
			if ($lang !== $code) {
				$output .= '<a href="'. $uri .'" class="link" rel="alternate" hreflang="'. $code .'"><abbr title="'. $label .'" lang="'. $code .'">'. strtoupper($code) .'</abbr></a>';
			} else {
				$output .= '<span><abbr title="'. $label .'" lang="'. $code .'">'. strtoupper($code) .'</abbr></span>';
			}
			$output .= '</li>';
			$c = $c + 1;
		}
		$output .= '</ul>';

		return $output;
	}

	// Metadata Methods
	function metaAlternate() {
		global $lang;
		global $languages;

		$c 		= 1;
		$uri 	= $_SERVER['REQUEST_URI'];
		$langs  = count($languages);
		$output = '';

		foreach ($languages as $code => $label) {
			if ($lang !== $code) {
				$select  = ($lang === $code) ? ' selected' : '';
				$last 	 = ($c === $langs) ? ' last' : '';

				if ($code === 'en') {
					$uri  = preg_replace('/(\&|\?)lang=\w{2}/', '', $uri);
				} else {
					if (strpos($uri, 'lang=')) {
						$uri  = preg_replace('/lang=\w{2}/', 'lang='.$code, $uri);
					} else {
						if (strpos($uri, '?')) {
							$uri = $uri . '&amp;lang=' . $code;
						} else {
							$uri = $uri . '?lang=' . $code;
						}
					}
				}
				$output .= '<link rel="alternate" hreflang="'. $code .'" lang="'. $code .'" title="'. $label .'" href="'. $uri .'" />';
			}
			$c = $c + 1;
		}
		return $output;
	}

	function _bot_detected() {
		if (isset($_SERVER['HTTP_USER_AGENT']) && preg_match('/bot|crawl|slurp|spider|w3c/i', $_SERVER['HTTP_USER_AGENT'])) {
			return TRUE;
		}
		else {
			return FALSE;
		}
	}

?>