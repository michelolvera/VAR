$(document).ready(function() {
	$('.slider').slider();
	$('.carousel').carousel({
		dist: -10,
		shift:0,
		padding:20,
	});
	// init Masonry
	var $grid = $('.grid').masonry({
		columnWidth: '.col',
		itemSelector: '.col'
	});
	// layout Masonry after each image loads
	$grid.imagesLoaded().progress( function() {
		$grid.masonry('layout');
	});
});