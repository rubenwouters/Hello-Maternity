(function(){
	console.log('search.js');

	var searchBtn = $('#search');
	var searchbox = $('.search-clothes');

	searchBtn.click(function(){
		console.log('button clicked');

		searchbox.toggleClass('active');
	});
})();