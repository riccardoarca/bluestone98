if (document.body.classList.contains('blog')) {
   const waypoint = new Waypoint({
  element: document.querySelector('.fade_in_up'),
	  handler: function(element, direction) {
	  	console.log(this.element);
	  		this.element.classList.add( 'animatetrigger', 'animated', 'fadeIn' );
	  		//if ( direction === "down" ) {
			//	this.elementclassList.remove( "hidden" );
			//	this.element.classList.add( 'animatetrigger', 'animated', 'fadeIn' );
			//}
	  },
	  offset: '75%'
	});
}

