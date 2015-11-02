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