(function(){
	// console.log('app.js loaded');

	/* 
	 * Cover Slider 
	 */

	var prefixClass = 'img';
	var maxIndex = 7;
	var currentIndex = 1;

	$('.cover-slider .left').click(function(){
		// console.log('clicked left, previous index: ' + currentIndex);
		if (currentIndex <= 1) return;

		var currentClass = prefixClass + currentIndex;
		currentIndex--;
		var newClass = prefixClass + currentIndex;
		$('.cover-slider .' + newClass).addClass('show');
		$('.cover-slider .' + currentClass).removeClass('show');
	});

	$('.cover-slider .right').click(function(){
		// console.log('clicked right, previous index: ' + currentIndex);
		if (currentIndex >= maxIndex) return;

		var currentClass = prefixClass + currentIndex;
		currentIndex++;
		var newClass = prefixClass + currentIndex;
		$('.cover-slider .' + newClass).addClass('show');
		$('.cover-slider .' + currentClass).removeClass('show');
	});
})();
(function(){
	// console.log('search.js loaded');

	var searchBtn = $('#search');
	var searchbox = $('.search-clothes');

	searchBtn.click(function(){
		console.log('button clicked');

		searchbox.toggleClass('active');
	});
})();