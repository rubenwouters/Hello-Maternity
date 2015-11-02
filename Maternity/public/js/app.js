(function(){
	console.log('app.js');

	console.log('.cover-slider');
	// $('.cover-slider').addClass('second-image');

	$('.cover-slider .left').click(function(){
		console.log('clicked left');
		$('.cover-slider').removeClass('second-image');

	});

	$('.cover-slider .right').click(function(){
		console.log('clicked right');
		$('.cover-slider').addClass('second-image');
	});
})();
(function(){
	console.log('search.js');

	var searchBtn = $('#search');
	var searchbox = $('.search-clothes');

	searchBtn.click(function(){
		console.log('button clicked');

		searchbox.toggleClass('active');
	});
})();