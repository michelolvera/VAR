$(document).ready(function() {
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