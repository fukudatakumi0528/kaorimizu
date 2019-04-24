export default class Scroll {
	init() {
		$('a[href^="#"]').click(function() {
	    var speed = 400,
	      href = $(this).attr('href'),
	      target = $(href == '#' || href == '' ? 'html' : href),
	      position = target.offset().top;
	    $('body,html').animate({ scrollTop: position - 60 }, speed, 'swing');
	    return false;
	  });
	}
}
