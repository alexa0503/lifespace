$(document).ready(function(){
	
	var mobileWidthThreshold = 800;
	var isMobile = false;
	function isMobileUpdate() {
		if ( $(window).width() > mobileWidthThreshold ) {
			isMobile = false;
		} else {
			isMobile = true;
		}
	}
	isMobileUpdate();
	
	var isFirefox = false;
	isFirefox = typeof InstallTrigger !== 'undefined';
	
	// Fix to show Adidas logo instead of TM on Apparel page
	if ( $(".page-id-apparel")[0] ){
		$("body").addClass("apparel");
	}
	
	var navButton = $('#button-menu');
	var utilButton = $('#button-account');
	var navMenu = $('#mobile-menu-nav');
	var utilMenu = $('#mobile-menu-util');
	var mobileOverlay = $('.mobile-menu-overlay');
	
	$(navButton).click(function() {
		if ($(navButton).hasClass('tmactive')) {
			closeNavMenu();
		} else {
			openNavMenu();
		}
    });
	
    $(utilButton).click(function() {
		if ($(utilButton).hasClass('tmactive')) {
			closeUtilMenu();
		} else {
			openUtilMenu();
		}
    });
	
	function openNavMenu() {
		$(navButton).addClass('tmactive');
		$(utilButton).removeClass('tmactive');
		
		$(navMenu).slideDown(200);
		$(utilMenu).slideUp(200);
		
		mobileOverlay.show();
	}
	
	function closeNavMenu() {
		mobileOverlay.hide();
		$(navButton).removeClass('tmactive');
		$(navMenu).slideUp(200);
	}
	
	function openUtilMenu() {
		$(utilButton).addClass('tmactive');
		$(navButton).removeClass('tmactive');
		
		$(utilMenu).slideDown(200);			
		$(navMenu).slideUp(200);
		
		mobileOverlay.show();
	}
	
	function closeUtilMenu() {
		mobileOverlay.hide();
		$(utilButton).removeClass('tmactive');
		$(utilMenu).slideUp(200);
	}
	
	var addEvent = function(obj, type, callback) {
	    if (obj == null || typeof(obj) == 'undefined') return;
	    if (obj.addEventListener) {
	        obj.addEventListener(type, callback, false);
	    } else if (obj.attachEvent) {
	        obj.attachEvent("on" + type, callback);
	    }
	};
	
	addEvent(window, "resize", onWindowResize);
	
	function onWindowResize() {
		isMobileUpdate();
		mobileOverlay.hide();
		headerOffset = parseInt( $(offsetElement).css("margin-top") , 10); // Remove "px"
		closeNavMenu();
		closeUtilMenu();
	};
	
	$(".scrollbutton").click( function(e) {
		$('html,body').animate({scrollTop: $("#header-container").offset().top + $("#header-container").height() - $(".submenu").height() - $("#header").height() + 1 }, 200);
	});
	
	$(".players-full").each( function(e) {
		$(this).on( "mouseover", function(e) {
			$(this).children(".players-full-over").fadeIn(200);
		});
		$(this).on("mouseleave", function(e) {
			$(this).children(".players-full-over").fadeOut(200);
		});
	});
	
	$(".storelocator-pin > img").click( function(e) {
		$('html,body').animate({scrollTop: $("#header-container").offset().top + $("#header-container").height() - $(".submenu").height() - $("#header").height() + 1 }, 200);
		
		var clickedStoreId =  parseInt( $(this).closest(".storelocator-box").attr('id') , 10); // int
		if (typeof markers_arr !== 'undefined') {
			if (markers_arr.length > 0) {
				clickStore(clickedStoreId);
			}
		}
		
	});
	
	/*$('.bxslider').show().bxSlider({
		preloadImages: 'all',
		mode: 'fade',
		adaptiveHeight: false,
		responsive: true,
		controls: true,
		useCSS: true,
		auto: true
  	});*/
	
	/*$('.bxslider-apparel-header').show().bxSlider({
		pause: 3000,
		preloadImages: 'all',
		mode: 'fade',
		adaptiveHeight: false,
		responsive: true,
		controls: true,
		useCSS: true,
		auto: true
  	});*/
	
	$()
	
	var bx = $(".bxslider-video");
	// var allVideos = $('.bxslider-video video');
	
	// init slideshow
	/*bx.show().bxSlider({
		speed: 500,
		pause: 4000,
		preloadImages: 'all',
		mode: 'fade',
		easing: 'linear',
		adaptiveHeight: false,
		responsive: true,
		controls: true,
		useCSS: true,
		video: false,
		auto: true,
		autoHover: false,
		onSlideBefore: function(slideElement, oldIndex, newIndex){
			$(slideElement).find("video").each(function() {
				if (!bx) return;
				
				if ( isMobile ) { return; } // Don't show masthead video on mobile
				
				bx.stopAuto(); // Disable slideshow autoadvance
				$(this).closest(".slide-video-container").show(); // Show video's container
				
				var hero_video = $(this)[0]; // document.getElementById("hero-video")
				if ( hero_video ) {
					hero_video.pause();
					hero_video.currentTime = 0;
					hero_video.play();
				}

				if ( $(this).hasClass("needs-video-event") ) { // Attach listener to video event only once
					// alert('attach events');
					$(this).on('ended', function(){
						// alert('video end');
						// $(this).closest(".slide-video-container").hide(); // Hide video's container
						// $(this).closest(".slide-video-container").fadeOut(200); // Hide video's container
						if ( $(this).hasClass("fade-to-pic") ) {
							$(this).closest(".slide-video-container").fadeOut(1000); // Hide video's container
							bx.startAuto(); // Video finished playing, enable slideshow autoadvance again
						} else {
							// bx.goToNextSlide();
							bx.startAuto(); // Video finished playing, enable slideshow autoadvance again
						}
					});
					$(this).removeClass("needs-video-event"); // Listener is attached to video (once)
				}
			});
		}
  	});*/
	
	/*$('.bxslider-product').show().bxSlider({
		preloadImages: 'all',
		mode: 'fade',
		adaptiveHeight: true,
		responsive: true,
		controls: false,
		video: true,
		speed: 1,
		// Pause all videos on slide change
		onSlideAfter: function(){
			$("video").each(function() {
			    $(this).get(0).pause();
			});
		}
  	});
	
	$('.bxslider-ball').show().bxSlider({
		preloadImages: 'all',
		mode: 'fade',
		adaptiveHeight: false,
		responsive: true,
		useCSS: true,
		auto: true,
		controls: false
  	});
	
	$('.bxslider-apparel-popup').show().bxSlider({
		preloadImages: 'all',
		mode: 'fade',
		adaptiveHeight: true,
		responsive: true,
		controls: true,
		useCSS: true,
		auto: false,
		speed: 300
  	});*/
	
	/*$( "#accordion" ).accordion({
		animate: { easing: "easeOutQuint", duration: 800 },
		heightStyle: "content",
		collapsible: true
	});*/
	// /*
	/*$( "#accordion-tab2" ).accordion({
		active: 1,
		animate: { easing: "easeOutQuint", duration: 800 },
		heightStyle: "content",
		collapsible: true
	});*/
	// */
	$('.cardcontainer.needsevent').each(function(){
		$(this).mouseenter(function(){
			$(this).find('.card').addClass('flipped');
		});
		
		$(this).mouseleave(function(){
			$(this).find('.card').removeClass('flipped');
		});
		
		$(this).on({ 'touchstart' : function(){ 
			// Close others
			$('.cardcontainer').not(this).each(function(){ 
				$(this).find('.card').removeClass('flipped');
			});
			$(this).find('.card').addClass('flipped');
		} });
		
		$(this).removeClass('needsevent');
	});
	
	$('.button-more').click(function(e) {
		e.preventDefault();
		var buttonMore = this;
		$('.hidden-content').filter(":first").slideDown(1000, function() {
			$(this).removeClass('hidden-content');
			if ($('.hidden-content').length > 0) {
				
			} else {
				$(buttonMore).remove();
			}
		});
    });
	
	var qrcodePopup = $('#qrcode-popup');
	$('.qrcode-button').click(function(e) {
		e.preventDefault();
		$(qrcodePopup).fadeToggle( 200, "linear" );
	});
	
	
	var hero_video = document.getElementById("apparel-video");
	function play_hero_video() {
		if ( hero_video ) {
			hero_video.currentTime = 0;
			hero_video.play();
		}
	}
	function stop_hero_video() {
		if ( hero_video ) {
			hero_video.pause();
			hero_video.currentTime = 0;
		}
	}
	
	var apparelPopupVideo = $('.apparel-popup-video');
	$('.apparel-play-button-click').click(function(e) {
		e.preventDefault();
		$(apparelPopupVideo).removeClass('apparel-popup-off');
		play_hero_video();
	});
	$('.popup-close-button-apparel-video-click').click(function(e) {
		e.preventDefault();
		stop_hero_video();
		$(apparelPopupVideo).addClass('apparel-popup-off');
	});
	
	var apparelPopup1 = $('.apparel-popup-1');
	$('.apparel-banner-button-1').click(function(e) {
		e.preventDefault();
		// $(apparelPopup1).css('display', 'none');
		$(apparelPopup1).removeClass('apparel-popup-hidden');
		// $(apparelPopup1).fadeIn( 200, "linear" );
	});
	
	var apparelPopup2 = $('.apparel-popup-2');
	$('.apparel-banner-button-2').click(function(e) {
		e.preventDefault();
		// $(apparelPopup2).css('display', 'none');
		$(apparelPopup2).removeClass('apparel-popup-hidden');
		// $(apparelPopup2).fadeIn( 200, "linear" );
	});
	
	$('.popup-close-button-click').click(function(e) {
		e.preventDefault();
		// $('.apparel-popup').fadeOut( 100, "linear" );
		// alert("Click");
		$(apparelPopup1).addClass('apparel-popup-hidden');
		$(apparelPopup2).addClass('apparel-popup-hidden');
	});
	
	$('.popup-titlebar-close').click(function(e) {
		e.preventDefault();
		$(this).closest('.popup-table').fadeOut( 200, "linear" );
	});
	$('.fakesubmit').click(function(e) {
		e.preventDefault();
		// $(this).siblings('input[type=submit].realsubmit').click();
		$(this).closest("form").find('input[type=submit].realsubmit').first().click();
	});
	
	var countryMenu = $('.country-menu');
	$('.country-select').click(function(e) {
		e.preventDefault();
		$(countryMenu).fadeToggle( 200, "linear" );
	});
	
	if ($(".submenu").length > 0) {
		$("#wrapper").addClass("withsubmenu");
	}
	
	//TODO Use a.tmall-link everywhere
	$(".buy-button-first a").click(function(e) {
		var url = $(this).attr("href");
		if ( url.indexOf("tmall") !== -1 ) {
			e.preventDefault();
			var url2 = '/shop/shop.php?url=' + encodeURIComponent(url);
			window.open(url2, '_blank');
			return false;
		}
	});
	
	$("a.tmall-link").click(function(e) {
		var url = $(this).attr("href");
		if ( url.indexOf("tmall") !== -1 ) {
			e.preventDefault();
			var url2 = '/shop/shop.php?url=' + encodeURIComponent(url);
			window.open(url2, '_blank');
			return false;
		}
	});
	
    $('.source-radio-group input[type="radio"]').click(function(){
        if ($(this).attr("value") == "other"){
            $(".source-radio-group .othertext").css("display", "inline");
        } else {
        	$(".source-radio-group .othertext").css("display", "none");
        }
    });
	
	$("#resetpass-link").click(function(e) {
		e.preventDefault();
		$("#popup-resetpass").fadeIn( 200, "linear" );
	});
	
	// $(document).mouseup(function (e)
	// {
	// 	if ( $(countryMenu).css('display') !== 'none' ){
	// 	    var container = countryMenu;
	// 	    if (!container.is(e.target) // if the target of the click isn't the container...
	// 	        && container.has(e.target).length === 0) // ... nor a descendant of the container
	// 	    {
	// 	        container.hide();
	// 	    }
	// 	}
	//
	// });
	
	// $('.country-select').mouseleave(function(e) {
	// $('.country-select').mouseleave(function(e) {
	// 	$(countryMenu).fadeToggle( 100, "linear" );
	// });
	
	//-------------------- Parallax
	
	var parallaxElement;
	var parallaxContainer;
	var parallaxContainerHeight;
	var rect = {};
	var stringValue = "";
	var parallaxRatio = 0.6; // 0.1 - 1.0
	var scrollPos = 0;
	var offsetElement;
	var headerOffset = 0;
	// var logElement = $(".overlay-text-1");

	function updateParallax2(e)
	{
		if (isFirefox) return;
		
		e = window.event ? window.event : e;
		var delta = e.wheelDelta ? e.wheelDelta : -e.detail;
		delta = Math.floor( delta * 0.1 );
		// console.log("wheel delta " + delta);
		e.preventDefault();
		
		document.body.scrollTop -= delta;
	}

	function updateParallax(e)
	{		
		rect = parallaxContainer.getBoundingClientRect();
		
		if (rect.top - headerOffset > 0) {
			scrollPos = 0;
		} else if (Math.abs(rect.top - headerOffset) > parallaxContainerHeight) {
			scrollPos = parallaxContainerHeight;
		} else {
			scrollPos = rect.top - headerOffset;
		}
		
		stringValue =  "translate3D(0px," + ( Math.abs(scrollPos) * parallaxRatio).toFixed(1) + "px,0px)";
		// stringValue =  "translate3D(0px," + ~~( Math.abs(scrollPos) * parallaxRatio) + "px,0px)";

		parallaxElement.style.msTransform = stringValue;
		parallaxElement.style.webkitTransform = stringValue;
		parallaxElement.style.transform = stringValue;
		// $(logElement).text(stringValue);
	}
	
	parallaxElement = document.getElementById("header-parallax");
	var scrollElement = window;
	if (parallaxElement) {
		parallaxContainer = document.getElementById("header-container");
		parallaxContainerHeight = parseInt( $(parallaxContainer).css("height") , 10); // Remove "px"
		offsetElement = document.getElementById("wrapper");
		headerOffset = parseInt( $(offsetElement).css("margin-top") , 10); // Remove "px"
		
		updateParallax();
		
		if (scrollElement.addEventListener) {
			// IE9+, Chrome, Safari, Firefox 
			scrollElement.addEventListener('DOMMouseScroll', updateParallax2, false); 
			scrollElement.addEventListener('mousewheel', updateParallax2, false); 
			scrollElement.addEventListener('scroll', updateParallax, false);
		} else if (scrollElement.attachEvent)  {
			// IE5-8
			scrollElement.attachEvent('DOMMouseScroll', updateParallax2);
			scrollElement.attachEvent('mousewheel', updateParallax2);
			scrollElement.attachEvent('onscroll', updateParallax);
		}
	}
	
	//-------------------- /Parallax
	
  
});