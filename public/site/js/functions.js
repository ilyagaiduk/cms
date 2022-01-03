$(document).ready(function(){
    
   	$('.menu-button').click(
		function() {
            $('.menu').slideToggle();
            $('.menu-button').toggleClass('active');
            	});
            	
   	$('.search-button').click(
		function() {
            $('.search').slideToggle();
            $('.search-button').toggleClass('active');
            	});
            	
   	$('.filters-button').click(
		function() {
            $('.filters').slideToggle();
            $('.filters-button').toggleClass('active');
            	});
            	
   	$('.close, .bot-close').click(
		function() {
            $('.on-player-pl').hide();
            	});
            	
   	$('.more').click(
		function() {
            $('.video-links').slideDown();
            $('.more').hide();
            $('.less').show();
            	});
            	
   	$('.less').click(
		function() {
            $('.video-links').slideUp();
            $('.less').hide();
            $('.more').show();
            	});
            	

            	
});