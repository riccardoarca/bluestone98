document.addEventListener("DOMContentLoaded", () => {
	if (document.body.classList.contains('blog')) {
	   const waypoint = new Waypoint({
	   element: document.querySelector('.fade_in_up'),
		  handler: function(element, direction) {
		  	this.element.classList.add( 'animatetrigger', 'animated', 'fadeIn' );
		  },
		  offset: '75%'
		});
	}
});

