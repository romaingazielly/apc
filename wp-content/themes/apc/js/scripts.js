(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
		
		// DOM ready, take it away

		if(getCookie('prehome') != 'false'){

			centerIntro();
			animateIntro();

			jQuery(window).resize(function(event) {
				centerIntro();
			});
		}
		else{
			jQuery('.prehome').hide();
		}

		// Carousel
		jQuery('.photos').on('initialized.owl.carousel', function(){
			// Vars
			var imgH = jQuery('.photos').height();
			var h1H = jQuery('.infos h1').height();
			setTimeout(function() { var h2H = jQuery('.infos h2').height(); jQuery('.infos p').height(imgH-(69 + h1H + h2H)); console.log(h2H)}, 500);
			//

			// Adaptation du bloc info par rapport à la taille de l'image
			jQuery('.infos').height(imgH);

			// Adaptation de la hauteur du contenu
			// jQuery('.infos p').height(imgH-(69 + h1H + h2H));
		});

		jQuery('.photos').owlCarousel({
			items:1,
			autoplay:true,
			navRewind:true,
			loop:true,
			autoplayTimeout:5000,
			smartSpeed:1200,
			autoplayHoverPause:true,
			dots:true
		});

		jQuery(window).resize(function(event){
			var imgH = jQuery('.photos').height();
			jQuery('.infos').height(imgH);
		})

		
		// Effet hover home
		jQuery('.mini').hover(function() {
			jQuery('.mini').removeClass('giant');
			jQuery(this).addClass('giant');
		}, function() {
			setTimeout(function(){
				jQuery(this).removeClass('giant');
			},200)
		});

		jQuery('.bigger').on('click', function(e) {
			e.preventDefault();
			var lien = jQuery(this).siblings('a').attr('href');
			document.location.href = lien;
		});

		popAnim(); // Animation des vignettes au chargement de la page
	});
	
})(jQuery, this);

function centerIntro(){
	var wH = jQuery(window).height();
	var bH = jQuery('#anim-container').height();

	var centerVal =  (wH - bH) / 4;
	jQuery('#anim-container').css({marginTop: centerVal});
}

function animateIntro() {
	var tl = new TimelineLite({onComplete:linkIt});

	tl.to(jQuery('#firstline'), .8, {css:{left:'0'}}); // Ligne grise
	tl.to(jQuery('#secline'), .8, {css:{left:'0'}}, "-=.8"); // Ligne rouge
	tl.to(jQuery('#thirdline'), .8, {css:{left:'0'}}, "-=.8"); // Ligne grise
	tl.to(jQuery('#fourthline'), .8, {css:{left:'0'}}, "-=.8"); // Ligne grise
	tl.to(jQuery('#lastline'), .8, {css:{left:'0'}}, "-=.8"); // Ligne rouge

	tl.to(jQuery('#secline img'), .4, {css:{autoAlpha:1}}); // Logo APC
	tl.to(jQuery('#sentence'), .4, {css:{autoAlpha:1}}); // Phrases
	tl.to(jQuery('#fourthline span'), .4, {css:{autoAlpha:1}}); // 2e Phrases
	tl.to(jQuery('#chinois'), .4, {css:{autoAlpha:1}});
	tl.to(jQuery('#acces'), .4, {css:{autoAlpha:1}});
}

function popAnim(){
	jQuery('.mini').each(function(index, el) {
		var elem = jQuery(this);
		setTimeout(function(){
			elem.addClass('visible');
		}, index*150);
	});
}

function linkIt(){
	jQuery('#anim-container').addClass('clickable').on('click', function(event) {
		event.preventDefault();
		jQuery('.prehome').fadeOut(function() {
			setCookie('prehome','false');
		});
	});
}

function setCookie(key, value) {
    var expires = new Date();
    expires.setTime(expires.getTime() + (1 * 24 * 60 * 60 * 1000)); // 24h
    document.cookie = key + '=' + value + ';expires=' + expires.toUTCString();
}

function getCookie(key) {
    var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
    return keyValue ? keyValue[2] : null;
}
