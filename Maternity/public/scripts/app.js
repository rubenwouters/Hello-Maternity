(function(){
	console.log('app.js');

	console.log('.cover-slider');
	// $('.cover-slider').addClass('second-image');


	/* 
	 * Cover Slider 
	 */

	var prefixClass = 'pic-';
	var maxIndex = 7;
	var currentIndex = 1;

	$('.cover-slider .left').click(function(){
		console.log('clicked left, new index:', currentIndex - 1);
		if (currentIndex <= 1) return;

		var currentClass = 'pic-' + currentIndex;
		currentIndex--;
		var newClass = 'pic-' + currentIndex;
		$('.cover-slider').removeClass(currentClass).addClass(newClass);
	});

	$('.cover-slider .right').click(function(){
		console.log('clicked right, new index:', currentIndex + 1);
		if (currentIndex >= maxIndex) return;

		var currentClass = 'pic-' + currentIndex;
		currentIndex++;
		var newClass = 'pic-' + currentIndex;
		$('.cover-slider').removeClass(currentClass).addClass(newClass);
	});
})();