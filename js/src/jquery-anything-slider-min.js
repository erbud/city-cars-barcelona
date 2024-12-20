/*
 * AnythingSlider v1.9.0 minified using Google Closure Compiler
 * Original by Chris Coyier: http://css-tricks.com
 * Get the latest version: https://github.com/CSS-Tricks/AnythingSlider
 */
;(function(d,m,l){d.anythingSlider=function(j,p){var a=this,b,k;a.el=j;a.$el=d(j).addClass("anythingBase").wrap('<div class="anythingSlider"><div class="anythingWindow" /></div>');a.$el.data("AnythingSlider",a);a.init=function(){a.options=b=d.extend({},d.anythingSlider.defaults,p);a.initialized=!1;d.isFunction(b.onBeforeInitialize)&&a.$el.bind("before_initialize",b.onBeforeInitialize);a.$el.trigger("before_initialize",a);d('\x3c!--[if lte IE 8]><script>jQuery("body").addClass("as-oldie");\x3c/script><![endif]--\x3e').appendTo("body").remove(); a.$wrapper=a.$el.parent().closest("div.anythingSlider").addClass("anythingSlider-"+b.theme);a.$outer=a.$wrapper.parent();a.$window=a.$el.closest("div.anythingWindow");a.$win=d(m);a.$controls=d('<div class="anythingControls"></div>');a.$nav=d('<ul class="thumbNav"><li><a><span></span></a></li></ul>');a.$startStop=d('<a href="#" class="start-stop"></a>');if(b.buildStartStop||b.buildNavigation)a.$controls.appendTo(b.appendControlsTo&&d(b.appendControlsTo).length?d(b.appendControlsTo):a.$wrapper);b.buildNavigation&& a.$nav.appendTo(b.appendNavigationTo&&d(b.appendNavigationTo).length?d(b.appendNavigationTo):a.$controls);b.buildStartStop&&a.$startStop.appendTo(b.appendStartStopTo&&d(b.appendStartStopTo).length?d(b.appendStartStopTo):a.$controls);a.runTimes=d(".anythingBase").length;a.regex=b.hashTags?RegExp("panel"+a.runTimes+"-(\\d+)","i"):null;1===a.runTimes&&a.makeActive();a.flag=!1;b.autoPlayLocked&&(b.autoPlay=!0);a.playing=b.autoPlay;a.slideshow=!1;a.hovered=!1;a.panelSize=[];a.currentPage=a.targetPage= b.startPanel=parseInt(b.startPanel,10)||1;b.changeBy=parseInt(b.changeBy,10)||1;k=(b.mode||"h").toLowerCase().match(/(h|v|f)/);k=b.vertical?"v":(k||["h"])[0];b.mode="v"===k?"vertical":"f"===k?"fade":"horizontal";"f"===k&&(b.showMultiple=1,b.infiniteSlides=!1);a.adj=b.infiniteSlides?0:1;a.adjustMultiple=0;b.playRtl&&a.$wrapper.addClass("rtl");b.buildStartStop&&a.buildAutoPlay();b.buildArrows&&a.buildNextBackButtons();a.$lastPage=a.$targetPage=a.$currentPage;a.updateSlider();b.expand&&(a.$window.css({width:"100%", height:"100%"}),a.checkResize());d.isFunction(d.easing[b.easing])||(b.easing="swing");b.pauseOnHover&&a.$wrapper.hover(function(){a.playing&&(a.$el.trigger("slideshow_paused",a),a.clearTimer(!0))},function(){a.playing&&(a.$el.trigger("slideshow_unpaused",a),a.startStop(a.playing,!0))});a.slideControls(!1);a.$wrapper.bind("mouseenter mouseleave",function(b){d(this)["mouseenter"===b.type?"addClass":"removeClass"]("anythingSlider-hovered");a.hovered="mouseenter"===b.type?!0:!1;a.slideControls(a.hovered)}); d(l).keyup(function(c){if(b.enableKeyboard&&(a.$wrapper.hasClass("activeSlider")&&!c.target.tagName.match("TEXTAREA|INPUT|SELECT"))&&!("vertical"!==b.mode&&(38===c.which||40===c.which)))switch(c.which){case 39:case 40:a.goForward();break;case 37:case 38:a.goBack()}});a.currentPage=(b.hashTags?a.gotoHash():"")||b.startPanel||1;a.gotoPage(a.currentPage,!1,null,-1);var c="slideshow_paused slideshow_unpaused slide_init slide_begin slideshow_stop slideshow_start initialized swf_completed".split(" ");d.each("onShowPause onShowUnpause onSlideInit onSlideBegin onShowStop onShowStart onInitialized onSWFComplete".split(" "), function(f,e){d.isFunction(b[e])&&a.$el.bind(c[f],b[e])});d.isFunction(b.onSlideComplete)&&a.$el.bind("slide_complete",function(){setTimeout(function(){b.onSlideComplete(a)},0);return!1});a.initialized=!0;a.$el.trigger("initialized",a);a.startStop(b.autoPlay)};a.updateSlider=function(){a.$el.children(".cloned").remove();a.navTextVisible="hidden"!==a.$nav.find("span:first").css("visibility");a.$nav.empty();a.currentPage=a.currentPage||1;a.$items=a.$el.children();a.pages=a.$items.length;a.dir="vertical"=== b.mode?"top":"left";b.showMultiple=parseInt(b.showMultiple,10)||1;b.navigationSize=!1===b.navigationSize?0:parseInt(b.navigationSize,10)||0;a.$items.find("a").unbind("focus.AnythingSlider").bind("focus.AnythingSlider",function(c){var f=d(this).closest(".panel"),f=a.$items.index(f)+a.adj;a.$items.find(".focusedLink").removeClass("focusedLink");d(this).addClass("focusedLink");a.$window.scrollLeft(0).scrollTop(0);if(-1!==f&&(f>=a.currentPage+b.showMultiple||f<a.currentPage))a.gotoPage(f),c.preventDefault()}); 1<b.showMultiple&&(b.showMultiple>a.pages&&(b.showMultiple=a.pages),a.adjustMultiple=b.infiniteSlides&&1<a.pages?0:b.showMultiple-1);a.$controls.add(a.$nav).add(a.$startStop).add(a.$forward).add(a.$back)[1>=a.pages?"hide":"show"]();1<a.pages&&a.buildNavigation();"fade"!==b.mode&&(b.infiniteSlides&&1<a.pages)&&(a.$el.prepend(a.$items.filter(":last").clone().addClass("cloned")),1<b.showMultiple?a.$el.append(a.$items.filter(":lt("+b.showMultiple+")").clone().addClass("cloned multiple")):a.$el.append(a.$items.filter(":first").clone().addClass("cloned")), a.$el.find(".cloned").each(function(){d(this).find("a,input,textarea,select,button,area,form").attr({disabled:"disabled",name:""});d(this).find("[id]")[d.fn.addBack?"addBack":"andSelf"]().removeAttr("id")}));a.$items=a.$el.addClass(b.mode).children().addClass("panel");a.setDimensions();b.resizeContents?(a.$items.css("width",a.width),a.$wrapper.css("width",a.getDim(a.currentPage)[0]).add(a.$items).css("height",a.height)):a.$win.load(function(){a.setDimensions();k=a.getDim(a.currentPage);a.$wrapper.css({width:k[0], height:k[1]});a.setCurrentPage(a.currentPage,!1)});a.currentPage>a.pages&&(a.currentPage=a.pages);a.setCurrentPage(a.currentPage,!1);a.$nav.find("a").eq(a.currentPage-1).addClass("cur");"fade"===b.mode&&(k=a.$items.eq(a.currentPage-1),b.resumeOnVisible?k.css({opacity:1}).siblings().css({opacity:0}):(a.$items.css("opacity",1),k.fadeIn(0).siblings().fadeOut(0)))};a.buildNavigation=function(){if(b.buildNavigation&&1<a.pages){var c,f,e,g,h;a.$items.filter(":not(.cloned)").each(function(n){h=d("<li/>"); e=n+1;f=(1===e?" first":"")+(e===a.pages?" last":"");c='<a class="panel'+e+(a.navTextVisible?'"':" "+b.tooltipClass+'" title="@"')+' href="#"><span>@</span></a>';d.isFunction(b.navigationFormatter)?(g=b.navigationFormatter(e,d(this)),"string"===typeof g?h.html(c.replace(/@/g,g)):h=d("<li/>",g)):h.html(c.replace(/@/g,e));h.appendTo(a.$nav).addClass(f).data("index",e)});a.$nav.children("li").bind(b.clickControls,function(c){!a.flag&&b.enableNavigation&&(a.flag=!0,setTimeout(function(){a.flag=!1},100), a.gotoPage(d(this).data("index")));c.preventDefault()});b.navigationSize&&b.navigationSize<a.pages&&(a.$controls.find(".anythingNavWindow").length||a.$nav.before('<ul><li class="prev"><a href="#"><span>'+b.backText+"</span></a></li></ul>").after('<ul><li class="next"><a href="#"><span>'+b.forwardText+"</span></a></li></ul>").wrap('<div class="anythingNavWindow"></div>'),a.navWidths=a.$nav.find("li").map(function(){return d(this).outerWidth(!0)+Math.ceil(parseInt(d(this).find("span").css("left"),10)/ 2||0)}).get(),a.navLeft=a.currentPage,a.$nav.width(a.navWidth(1,a.pages+1)+25),a.$controls.find(".anythingNavWindow").width(a.navWidth(1,b.navigationSize+1)).end().find(".prev,.next").bind(b.clickControls,function(c){a.flag||(a.flag=!0,setTimeout(function(){a.flag=!1},200),a.navWindow(a.navLeft+b.navigationSize*(d(this).is(".prev")?-1:1)));c.preventDefault()}))}};a.navWidth=function(b,f){var e;e=Math.min(b,f);for(var d=Math.max(b,f),h=0;e<d;e++)h+=a.navWidths[e-1]||0;return h};a.navWindow=function(c){if(b.navigationSize&& b.navigationSize<a.pages&&a.navWidths){var f=a.pages-b.navigationSize+1;c=1>=c?1:1<c&&c<f?c:f;c!==a.navLeft&&(a.$controls.find(".anythingNavWindow").animate({scrollLeft:a.navWidth(1,c),width:a.navWidth(c,c+b.navigationSize)},{queue:!1,duration:b.animationTime}),a.navLeft=c)}};a.buildNextBackButtons=function(){a.$forward=d('<span class="arrow forward"><a href="#"><span>'+b.forwardText+"</span></a></span>");a.$back=d('<span class="arrow back"><a href="#"><span>'+b.backText+"</span></a></span>");a.$back.bind(b.clickBackArrow, function(c){b.enableArrows&&!a.flag&&(a.flag=!0,setTimeout(function(){a.flag=!1},100),a.goBack());c.preventDefault()});a.$forward.bind(b.clickForwardArrow,function(c){b.enableArrows&&!a.flag&&(a.flag=!0,setTimeout(function(){a.flag=!1},100),a.goForward());c.preventDefault()});a.$back.add(a.$forward).find("a").bind("focusin focusout",function(){d(this).toggleClass("hover")});a.$back.appendTo(b.appendBackTo&&d(b.appendBackTo).length?d(b.appendBackTo):a.$wrapper);a.$forward.appendTo(b.appendForwardTo&& d(b.appendForwardTo).length?d(b.appendForwardTo):a.$wrapper);a.arrowWidth=a.$forward.width();a.arrowRight=parseInt(a.$forward.css("right"),10);a.arrowLeft=parseInt(a.$back.css("left"),10)};a.buildAutoPlay=function(){a.$startStop.html("<span>"+(a.playing?b.stopText:b.startText)+"</span>").bind(b.clickSlideshow,function(c){b.enableStartStop&&(a.startStop(!a.playing),a.makeActive(),a.playing&&!b.autoPlayDelayed&&a.goForward(!0,b.playRtl));c.preventDefault()}).bind("focusin focusout",function(){d(this).toggleClass("hover")})}; a.checkResize=function(b){var f=!(!l.hidden&&!l.webkitHidden&&!l.mozHidden&&!l.msHidden);clearTimeout(a.resizeTimer);a.resizeTimer=setTimeout(function(){var e=a.$outer.width(),d="BODY"===a.$outer[0].tagName?a.$win.height():a.$outer.height();if(!f&&(a.lastDim[0]!==e||a.lastDim[1]!==d))a.setDimensions(),a.gotoPage(a.currentPage,a.playing,null,-1);"undefined"===typeof b&&a.checkResize()},f?2E3:500)};a.setDimensions=function(){a.$wrapper.find(".anythingWindow, .anythingBase, .panel")[d.fn.addBack?"addBack": "andSelf"]().css({width:"",height:""});a.width=a.$el.width();a.height=a.$el.height();a.outerPad=[a.$wrapper.innerWidth()-a.$wrapper.width(),a.$wrapper.innerHeight()-a.$wrapper.height()];var c,f,e,g,h=0,n={width:"100%",height:"100%"},j=1<b.showMultiple&&"horizontal"===b.mode?a.width||a.$window.width()/b.showMultiple:a.$window.width(),k=1<b.showMultiple&&"vertical"===b.mode?a.height/b.showMultiple||a.$window.height()/b.showMultiple:a.$window.height();b.expand&&(a.lastDim=[a.$outer.width(),a.$outer.height()], c=a.lastDim[0]-a.outerPad[0],f=a.lastDim[1]-a.outerPad[1],a.$wrapper.add(a.$window).css({width:c,height:f}),a.height=f=1<b.showMultiple&&"vertical"===b.mode?k:f,a.width=j=1<b.showMultiple&&"horizontal"===b.mode?c/b.showMultiple:c,a.$items.css({width:j,height:k}));a.$items.each(function(k){g=d(this);e=g.children();b.resizeContents?(c=a.width,f=a.height,g.css({width:c,height:f}),e.length&&("EMBED"===e[0].tagName&&e.attr(n),"OBJECT"===e[0].tagName&&e.find("embed").attr(n),1===e.length&&e.css(n))):("vertical"=== b.mode?(c=g.css("display","inline-block").width(),g.css("display","")):c=g.width()||a.width,1===e.length&&c>=j&&(c=e.width()>=j?j:e.width(),e.css("max-width",c)),g.css({width:c,height:""}),f=1===e.length?e.outerHeight(!0):g.height(),f<=a.outerPad[1]&&(f=a.height),g.css("height",f));a.panelSize[k]=[c,f,h];h+="vertical"===b.mode?f:c});a.$el.css("vertical"===b.mode?"height":"width","fade"===b.mode?a.width:h)};a.getDim=function(c){var f,e,d=a.width,h=a.height;if(1>a.pages||isNaN(c))return[d,h];c=b.infiniteSlides&& 1<a.pages?c:c-1;if(e=a.panelSize[c])d=e[0]||d,h=e[1]||h;if(1<b.showMultiple)for(e=1;e<b.showMultiple;e++)f=c+e,"vertical"===b.mode?(d=Math.max(d,a.panelSize[f][0]),h+=a.panelSize[f][1]):(d+=a.panelSize[f][0],h=Math.max(h,a.panelSize[f][1]));return[d,h]};a.goForward=function(c,d){a.gotoPage(a[b.allowRapidChange?"targetPage":"currentPage"]+b.changeBy*(d?-1:1),c)};a.goBack=function(c){a.gotoPage(a[b.allowRapidChange?"targetPage":"currentPage"]-b.changeBy,c)};a.gotoPage=function(c,f,e,g){!0!==f&&(f=!1, a.startStop(!1),a.makeActive());/^[#|.]/.test(c)&&d(c).length&&(c=d(c).closest(".panel").index()+a.adj);if(1!==b.changeBy){var h=a.pages-a.adjustMultiple;1>c&&(c=b.stopAtEnd?1:b.infiniteSlides?a.pages+c:b.showMultiple>1-c?1:h);c>a.pages?c=b.stopAtEnd?a.pages:b.showMultiple>1-c?1:c-=h:c>=h&&(c=h)}if(!(1>=a.pages)&&(a.$lastPage=a.$currentPage,"number"!==typeof c&&(c=parseInt(c,10)||b.startPanel,a.setCurrentPage(c)),!f||!b.isVideoPlaying(a)))b.stopAtEnd&&(!b.infiniteSlides&&c>a.pages-b.showMultiple)&& (c=a.pages-b.showMultiple+1),a.exactPage=c,c>a.pages+1-a.adj&&(c=!b.infiniteSlides&&!b.stopAtEnd?1:a.pages),c<a.adj&&(c=!b.infiniteSlides&&!b.stopAtEnd?a.pages:1),b.infiniteSlides||(a.exactPage=c),a.currentPage=c>a.pages?a.pages:1>c?1:a.currentPage,a.$currentPage=a.$items.eq(a.currentPage-a.adj),a.targetPage=0===c?a.pages:c>a.pages?1:c,a.$targetPage=a.$items.eq(a.targetPage-a.adj),g="undefined"!==typeof g?g:b.animationTime,0<=g&&a.$el.trigger("slide_init",a),0<g&&a.slideControls(!0),b.buildNavigation&& a.setNavigation(a.targetPage),!0!==f&&(f=!1),(!f||b.stopAtEnd&&c===a.pages)&&a.startStop(!1),0<=g&&a.$el.trigger("slide_begin",a),setTimeout(function(d){var f,h=!0;b.allowRapidChange&&a.$wrapper.add(a.$el).add(a.$items).stop(!0,!0);b.resizeContents||(f=a.getDim(c),d={},a.$wrapper.width()!==f[0]&&(d.width=f[0]||a.width,h=!1),a.$wrapper.height()!==f[1]&&(d.height=f[1]||a.height,h=!1),h||a.$wrapper.filter(":not(:animated)").animate(d,{queue:!1,duration:0>g?0:g,easing:b.easing}));"fade"===b.mode?a.$lastPage[0]!== a.$targetPage[0]?(a.fadeIt(a.$lastPage,0,g),a.fadeIt(a.$targetPage,1,g,function(){a.endAnimation(c,e,g)})):a.endAnimation(c,e,g):(d={},d[a.dir]=-a.panelSize[b.infiniteSlides&&1<a.pages?c:c-1][2],"vertical"===b.mode&&!b.resizeContents&&(d.width=f[0]),a.$el.filter(":not(:animated)").animate(d,{queue:!1,duration:0>g?0:g,easing:b.easing,complete:function(){a.endAnimation(c,e,g)}}))},parseInt(b.delayBeforeAnimate,10)||0)};a.endAnimation=function(c,d,e){0===c?(a.$el.css(a.dir,"fade"===b.mode?0:-a.panelSize[a.pages][2]), c=a.pages):c>a.pages&&(a.$el.css(a.dir,"fade"===b.mode?0:-a.panelSize[1][2]),c=1);a.exactPage=c;a.setCurrentPage(c,!1);"fade"===b.mode&&a.fadeIt(a.$items.not(":eq("+(c-a.adj)+")"),0,0);a.hovered||a.slideControls(!1);b.hashTags&&a.setHash(c);0<=e&&a.$el.trigger("slide_complete",a);"function"===typeof d&&d(a);b.autoPlayLocked&&!a.playing&&setTimeout(function(){a.startStop(!0)},b.resumeDelay-(b.autoPlayDelayed?b.delay:0))};a.fadeIt=function(a,d,e,g){e=0>e?0:e;if(b.resumeOnVisible)a.filter(":not(:animated)").fadeTo(e, d,g);else a.filter(":not(:animated)")[0===d?"fadeOut":"fadeIn"](e,g)};a.setCurrentPage=function(c,d){c=parseInt(c,10);if(!(1>a.pages||0===c||isNaN(c))){c>a.pages+1-a.adj&&(c=a.pages-a.adj);c<a.adj&&(c=1);b.buildArrows&&(!b.infiniteSlides&&b.stopAtEnd)&&(a.$forward[c===a.pages-a.adjustMultiple?"addClass":"removeClass"]("disabled"),a.$back[1===c?"addClass":"removeClass"]("disabled"),c===a.pages&&a.playing&&a.startStop());if(!d){var e=a.getDim(c);a.$wrapper.css({width:e[0],height:e[1]}).add(a.$window).scrollLeft(0).scrollTop(0); a.$el.css(a.dir,"fade"===b.mode?0:-a.panelSize[b.infiniteSlides&&1<a.pages?c:c-1][2])}a.currentPage=c;a.$currentPage=a.$items.removeClass("activePage").eq(c-a.adj).addClass("activePage");b.buildNavigation&&a.setNavigation(c)}};a.setNavigation=function(b){a.$nav.find(".cur").removeClass("cur").end().find("a").eq(b-1).addClass("cur")};a.makeActive=function(){a.$wrapper.hasClass("activeSlider")||(d(".activeSlider").removeClass("activeSlider"),a.$wrapper.addClass("activeSlider"))};a.gotoHash=function(){var c= m.location.hash,f=c.indexOf("&"),e=c.match(a.regex);null===e&&!/^#&/.test(c)&&!/#!?\//.test(c)&&!/\=/.test(c)?(c=c.substring(0,0<=f?f:c.length),e=d(c).length&&d(c).closest(".anythingBase")[0]===a.el?a.$items.index(d(c).closest(".panel"))+a.adj:null):null!==e&&(e=b.hashTags?parseInt(e[1],10):null);return e};a.setHash=function(b){var d="panel"+a.runTimes+"-",e=m.location.hash;"undefined"!==typeof e&&(m.location.hash=0<e.indexOf(d)?e.replace(a.regex,d+b):e+"&"+d+b)};a.slideControls=function(c){var d= c?0:b.animationTime,e=c?b.animationTime:0,g=c?1:0,h=c?0:1;b.toggleControls&&a.$controls.stop(!0,!0).delay(d)[c?"slideDown":"slideUp"](b.animationTime/2).delay(e);b.buildArrows&&b.toggleArrows&&(!a.hovered&&a.playing&&(h=1,g=0),a.$forward.stop(!0,!0).delay(d).animate({right:a.arrowRight+h*a.arrowWidth,opacity:g},b.animationTime/2),a.$back.stop(!0,!0).delay(d).animate({left:a.arrowLeft+h*a.arrowWidth,opacity:g},b.animationTime/2))};a.clearTimer=function(b){a.timer&&(m.clearInterval(a.timer),!b&&a.slideshow&& (a.$el.trigger("slideshow_stop",a),a.slideshow=!1))};a.startStop=function(c,d){!0!==c&&(c=!1);if((a.playing=c)&&!d)a.$el.trigger("slideshow_start",a),a.slideshow=!0;b.buildStartStop&&(a.$startStop.toggleClass("playing",c).find("span").html(c?b.stopText:b.startText),"hidden"===a.$startStop.find("span").css("visibility")&&a.$startStop.addClass(b.tooltipClass).attr("title",c?b.stopText:b.startText));c?(a.clearTimer(!0),a.timer=m.setInterval(function(){l.hidden||l.webkitHidden||l.mozHidden||l.msHidden? b.autoPlayLocked||a.startStop():b.isVideoPlaying(a)?b.resumeOnVideoEnd||a.startStop():a.goForward(!0,b.playRtl)},b.delay)):a.clearTimer()};a.init()};d.anythingSlider.defaults={theme:"default",mode:"horiz",expand:!1,resizeContents:!0,showMultiple:!1,easing:"swing",buildArrows:!0,buildNavigation:!0,buildStartStop:!0,toggleArrows:!1,toggleControls:!1,startText:"Start",stopText:"Stop",forwardText:"&raquo;",backText:"&laquo;",tooltipClass:"tooltip",enableArrows:!0,enableNavigation:!0,enableStartStop:!0, enableKeyboard:!0,startPanel:1,changeBy:1,hashTags:!0,infiniteSlides:!0,navigationFormatter:null,navigationSize:!1,autoPlay:!1,autoPlayLocked:!1,autoPlayDelayed:!1,pauseOnHover:!0,stopAtEnd:!1,playRtl:!1,delay:3E3,resumeDelay:15E3,animationTime:600,delayBeforeAnimate:0,clickForwardArrow:"click",clickBackArrow:"click",clickControls:"click focusin",clickSlideshow:"click",allowRapidChange:!1,resumeOnVideoEnd:!0,resumeOnVisible:!0,isVideoPlaying:function(){return!1}};d.fn.anythingSlider=function(j,l){return this.each(function(){var a, b=d(this).data("AnythingSlider");(typeof j).match("object|undefined")?b?b.updateSlider():new d.anythingSlider(this,j):/\d/.test(j)&&!isNaN(j)&&b?(a="number"===typeof j?j:parseInt(d.trim(j),10),1<=a&&a<=b.pages&&b.gotoPage(a,!1,l)):/^[#|.]/.test(j)&&d(j).length&&b.gotoPage(j,!1,l)})}})(jQuery,window,document);