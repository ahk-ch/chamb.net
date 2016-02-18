/**
 * @author Rizart Dokollari
 * @since 18/2/2016
 */
jQuery(document).ready(function () {

	var readMoreText = $('input[name=readMoreText]').val();
	var readLessText = $('input[name=readLessText]').val();

	$('.read-more-js').readmore({
		collapsedHeight: 25,
		moreLink: '<div  class="text-center"><a href="#">' + readMoreText + '</a></div>',
		lessLink: '<div  class="text-center"><a href="#">' + readLessText + '</a></div>'
	});
});
