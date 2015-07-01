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
