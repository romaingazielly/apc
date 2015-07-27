(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
		
		// DOM ready, take it away
		logoSize();

		if( jQuery('body').hasClass('home') ){
			infiniteScroll();
		}

		if(getCookie('prehome') != 'false'){
			jQuery('.prehome').show();
			centerIntro();
			setTimeout(function(){ animateIntro(); }, 500);

			jQuery(window).resize(function(event) {
				centerIntro();
			});
		}
		else{
			jQuery('.prehome').hide();
			popAnim();
		}

		TweenMax.to(jQuery('.projet'), .9, {css:{autoAlpha:1}, delay:.2}); // Fade Projet

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
			animateOut: 'fadeOut',
			animateIn: 'fadeIn',
			navRewind:true,
			loop:true,
			autoplayTimeout:2000,
			smartSpeed:1200,
			autoplayHoverPause:true,
			dots:true
		});

		jQuery(window).resize(function(event){
			var imgH = jQuery('.photos').height();
			jQuery('.infos').height(imgH);

			logoSize();
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


		// Diaporama
		jQuery('#player').on('click', function(event) {
			event.preventDefault();
			playDiapo();
		});
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

	tl.to(jQuery('#anim-container'), .9, {css:{autoAlpha:1}}); // Fade blanc
	tl.to(jQuery('#firstline'), .9, {css:{left:'0'}}); // Ligne grise
	tl.to(jQuery('#secline'), .9, {css:{left:'0'}}, "-=.9"); // Ligne rouge
	tl.to(jQuery('#thirdline'), .9, {css:{left:'0'}}, "-=.9"); // Ligne grise
	tl.to(jQuery('#fourthline'), .8, {css:{left:'0'}}, "-=.8"); // Ligne grise
	tl.to(jQuery('#lastline'), .9, {css:{left:'0'}}, "-=.9"); // Ligne rouge

	tl.to(jQuery('#secline img'), .6, {css:{autoAlpha:1}}); // Logo APC
	tl.to(jQuery('#sentence'), .6, {css:{autoAlpha:1}}); // Phrases
	tl.to(jQuery('#fourthline span'), .4, {css:{autoAlpha:1}}); // 2e Phrases
	tl.to(jQuery('#chinois'), .6, {css:{autoAlpha:1}});
	tl.to(jQuery('#acces'), .6, {css:{autoAlpha:1}});
}

function popAnim(){

	// Lance l'appartition des petites vignettes de la home
	jQuery('.line-container').each(function(index, el) {
		var elem = jQuery(this);
		setTimeout(function(){
			elem.addClass('visible');
		}, index*350);
	});
}

function linkIt(){
	jQuery('#anim-container').addClass('clickable').on('click', function(event) {
		event.preventDefault();

		// Quand la préhome disparait
		jQuery('.prehome').fadeOut(function() {
			setCookie('prehome','false');
			popAnim();
		});
	});
}

function logoSize(){
	var w = jQuery('.mini, .infos').width();
	var h = jQuery('.logo-img').height();

	jQuery('.logo a').height(h);
	jQuery('.logo a').width(w);
}

function playDiapo(){
	var t = null;

	// Réadapation de l'écran pour ne pas avoir de scroll
	var wh = jQuery(window).height();
	jQuery('.wrapper').height(wh).css({'overflow': 'hidden'});

	// Appel de la 1ere grande image
	jQuery('#diapo').owlCarousel({
		items:1,
		autoplay:true,
		animateOut: 'fadeOut',
		animateIn: 'fadeIn',
		navRewind:true,
		loop:true,
		autoplayTimeout:2000,
		smartSpeed:1200,
		autoplayHoverPause:true,
		dots:true
	});

	var tl = new TimelineLite({onComplete:mouseCanMove});
	tl.to(jQuery('header'), .5, {css:{top:'-90px'}}, 3); // Masque le header
	tl.to(jQuery('footer'), .5, {css:{bottom:'-51px'}}, "-=.5"); // Masque le footer
	TweenMax.to(jQuery('#diapo'), .8, {css:{autoAlpha:1, display:'block'}}); // Apparition du diapo
	
	function mouseCanMove(){
		// Si l'utilisateur bouge sa souris
		jQuery('body').on('mousemove', function() {
			if(t !== null){
				showBars();
				clearTimeout(t);
			}
			t = setTimeout(function(){ hideBars() }, 3000);
		});
	}

	function hideBars(){
		TweenMax.to(jQuery('header'), .5, {css:{top:'-90px'}}); // Masque le header
		TweenMax.to(jQuery('footer'), .5, {css:{bottom:'-51px'}}); // Masque le footer
	}

	function showBars(){
		TweenMax.to(jQuery('header'), .5, {css:{top:'0'}}); // Masque le header
		TweenMax.to(jQuery('footer'), .5, {css:{bottom:'0'}}); // Masque le footer
	}

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


function infiniteScroll(){
	var offset = 20;

	jQuery(window).data('ajaxready', true);
	
	// ici on ajoute un petit loader gif qui fera patienter pendant le chargement
	jQuery('.container').append('<div id="loader"><img src="wp-content/themes/apc/img/ajax-loader.gif" alt="loader ajax"></div>');

	var deviceAgent = navigator.userAgent.toLowerCase();
	var agentID = deviceAgent.match(/(iphone|ipod|ipad)/);

	// on déclence une fonction lorsque l'utilisateur utilise sa molette 
	jQuery(window).scroll(function() {

		if (jQuery(window).data('ajaxready') == false) return;

		if((jQuery(window).scrollTop() + jQuery(window).height()) == jQuery(document).height() || agentID && (jQuery(window).scrollTop() + jQuery(window).height()) + 150 > jQuery(document).height()) {
			jQuery('.container #loader').fadeIn(400);
			jQuery.get('/more/' + offset + '/', function(data){

				if (data != '') {
				  jQuery('.container #loader').before(data);

				  jQuery('.container .hidden').fadeIn(400);

				  offset+= 20;
				  jQuery(window).data('ajaxready', true);
				}
				jQuery('.container #loader').fadeOut(400);
						
			});
		}
	});	
}
