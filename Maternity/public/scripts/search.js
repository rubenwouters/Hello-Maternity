(function(){
	// console.log('search.js loaded');

	var searchBtn = $('#search');
	var searchbox = $('.search-clothes');

	searchBtn.click(function(){
		console.log('button clicked');

		searchbox.toggleClass('active');
	});
})();