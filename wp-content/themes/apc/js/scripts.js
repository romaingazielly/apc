var t;
(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
		
		// DOM ready, take it away
		logoSize();

		if( $('body').hasClass('home') ){
			infiniteScroll();
		}

		if(getCookie('prehome') != 'false'){
			jQuery('.prehome').show();
			centerIntro();
			setTimeout(function(){ animateIntro(); }, 500);

			$(window).resize(function(event) {
				centerIntro();
			});
		}
		else{
			$('.prehome').hide();
			popAnim();
		}

		TweenMax.to($('.projet, .page-format'), .9, {css:{autoAlpha:1}, delay:.2}); // Fade Projet

		// Carousel
		$('.photos').on('initialized.owl.carousel', function(){
			resizeWindow();
			sameSize();
		});

		// Dans le cas ou on a qu'une seule photo
		$(document).ready(function() {
			if( $('body').hasClass('single-project') || $('body').hasClass('single-enseignements') ){
				resizeWindow();
				sameSize();
			}

			if($('body').hasClass('equipe')){
				var maxH = $('.team-container').height();
				$('.page-format').height(maxH);
			}
		});

		$('.photos').owlCarousel({
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

		if($('body').hasClass('contact') || $('body').hasClass('enseignement') || $('body').hasClass('a-propos')){
			resizeWindow();
			sameSize();
		}

		$(window).resize(function(event){
			resizeWindow();
			delay(function(){
		    	sameSize();
				logoSize();
		    }, 500);
		})

		// Clic sur i
		$('#informations').on('click', function(event) {
			event.preventDefault();
			$('.infos-hidden').toggleClass('visible');
			$(this).toggleClass('on');
		});
		//Clic sur Video
		var youtubeURL = '';
		$('#video').on('click', function(event) {
			event.preventDefault();
			if( $('#vid-ytb').attr('src') != ''){
				youtubeURL = $('#vid-ytb').attr('src');
			}
			else{
				$('#vid-ytb').attr('src', youtubeURL);
			}
			$('.video-y').fadeIn('slow');
		});
		$('a.close-vid').on('click', function(event) {
			event.preventDefault();
			$('#vid-ytb').attr('src', '');
			$('.video-y').fadeOut('slow');
		});

		
		// Effet hover home
		$('.mini').hover(function() {
			$('.mini').removeClass('giant');
			$(this).addClass('giant');
		}, function() {
			setTimeout(function(){
				$(this).removeClass('giant');
			},200)
		});

		$('.bigger').on('click', function(e) {
			e.preventDefault();
			var lien = jQuery(this).siblings('a').attr('href');
			document.location.href = lien;
		});


		// Diaporama
		jQuery('#player').on('click', function(event) {
			event.preventDefault();
			var $this = $(this);

			if($this.hasClass('played'))
				playDiapo(true);
			else
				playDiapo(false);

			$this.toggleClass('played');
		});
	});
	
})(jQuery, this);

// Pour un resize propre
var delay = (function(){
  var timer = 0;
  return function(callback, ms){
    clearTimeout (timer);
    timer = setTimeout(callback, ms);
  };
})();

function resizeWindow() {
	if (document.all) {
		h=document.body.clientHeight;
		w=document.body.clientWidth;
	} else {
		w=window.innerWidth;
		h=window.innerHeight;
	}
	jQuery('.sizer').height(h-90-72);
}

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
	jQuery('.line-container').not('.visible').each(function(index, el) {
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

function sameSize(){
	var imgH = jQuery('.photos, .solophoto').height();
	jQuery('.projet').height(imgH);
}

function logoSize(){
	var w = jQuery('.mini, .infos, .map-infos').width(); // .infos -> Page projets, .mini -> home
	var h = jQuery('.logo-img').height();

	jQuery('.logo a').height(h);
	jQuery('.logo a').width(w);
}

function playDiapo(e){
	// Le diapo se lance
	if(e){
		t = null;

		// Réadapation de l'écran pour ne pas avoir de scroll
		var wh = jQuery(window).height();
		jQuery('.wrapper').height(wh).css({'overflow': 'hidden'}); // Désactive le scroll pendant le diapo

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
			dots:false
		});

		var tl = new TimelineLite({onComplete:mouseCanMove(true)});
		tl.to(jQuery('header'), .5, {css:{top:'-90px'}}, 3); // Masque le header
		tl.to(jQuery('footer'), .5, {css:{bottom:'-51px'}}, "-=.5"); // Masque le footer
		TweenMax.to(jQuery('#diapo'), .8, {css:{autoAlpha:1, display:'block'}}); // Apparition du diapo
		setTimeout(function(){ jQuery('#diapo').toggleClass('playing'); }, 3500);// Logo APC présent pendant le diapo 
		

	// Le diapo s'arrête
	}else{
		jQuery('.wrapper').css({'overflow': 'visible'}); // Réactive le scroll
		
		TweenMax.to(jQuery('#diapo'), .8, {css:{autoAlpha:0, display:'none'}, onComplete:function(){ // Disparition du diapo
			//jQuery('#diapo').trigger('stop.owl.autoplay'); // stop le carousel (n'a pas l'air de fonctionner)
		}});

		mouseCanMove(false);
	}
	

	function mouseCanMove(e){
		// Si l'utilisateur bouge sa souris
		if(e){
			jQuery('body').on('mousemove', timer);
		}else{
			jQuery('body').off('mousemove');
			timer(false);
		}

		function timer(e){
			if(t !== null){
				showBars();
				clearTimeout(t);
			}

			if(e !== false){
				t = setTimeout(function(){ hideBars() }, 3000);
			}
		}
	}

	function hideBars(){
		console.log("toto")
		TweenMax.to(jQuery('header'), .5, {css:{top:'-90px'}}); // Masque le header
		TweenMax.to(jQuery('footer'), .5, {css:{bottom:'-51px'}}); // Masque le footer
		jQuery('#diapo').addClass('playing'); // Affiche le logo en faut à droite du diapo
	}

	function showBars(){
		TweenMax.to(jQuery('header'), .5, {css:{top:'0'}}); // Affiche le header
		TweenMax.to(jQuery('footer'), .5, {css:{bottom:'0'}}); // Affiche le footer
		jQuery('#diapo').removeClass('playing'); // Cache le logo en faut à droite du diapo
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
	jQuery(window).data('ajaxready', true);
	var page = 1;
	var isScrolling = false;
	
	// Ajout du loader
	jQuery('.container').append('<div id="loader"><img src="wp-content/themes/apc/img/ajax-loader.gif" alt="loader ajax"></div>');

	var deviceAgent = navigator.userAgent.toLowerCase();
	var agentID = deviceAgent.match(/(iphone|ipod|ipad)/);

	// Au scroll
	jQuery(window).scroll(function() {
		if(!isScrolling){

			if (jQuery(window).data('ajaxready') == false) return;

			if((jQuery(window).scrollTop() + jQuery(window).height()) == jQuery(document).height() || agentID && (jQuery(window).scrollTop() + jQuery(window).height()) + 150 > jQuery(document).height()) {
				isScrolling = true;
				page += 1;

				jQuery('.container #loader').fadeIn(400);

				jQuery.get('/?page=' + page + '/', function(data){

					var projects = jQuery(data).find('.line-container');

					// if (jQuery('.line-container').is(':empty')){

					// 	alert(projects)
					// 	return;
					// }

					if (data != '') {
					  jQuery('.list').append(projects);
					  popAnim();

					  jQuery(window).data('ajaxready', true);
					}
					jQuery('.container #loader').fadeOut(400);
				});
			}
		}
	});
}
