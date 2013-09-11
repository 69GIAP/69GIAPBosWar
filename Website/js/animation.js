// JavaScript Document


/*The animation is really quite simple.
We'll use jQuery to animate the opacity of the <span> tag.
Remember that the <span> tag displays the "hover" state of the image.
Hence, when the <span> is visible, the link takes the "hover" appearance.
We'll need the "hover" state to be invisible when the page loads.
We can do this by setting the opacity of the <span> tag to "0″:
*/
	$(function() {
		// set opacity to nill on page load
		$("ul#navigation span").css("opacity","0");
		// on mouse over
		$("ul#navigation span").hover(function () {
			// animate opacity to full
			$(this).stop().animate({
				opacity: 1
			}, "slow");
		},
		
	
/*Placing the code inside of "$(function() { … });" tells the browser to execute the code when the document has loaded. 
The code that we'll use to do the animation is as follows:*/
		
		// on mouse out
		function () {
			// animate opacity to nill
			$(this).stop().animate({
				opacity: 0
			}, "slow");
		});
	});
	
$(function() {
		// set opacity to nill on page load
		$("ul#register span").css("opacity","0");
		// on mouse over
		$("ul#register span").hover(function () {
			// animate opacity to full
			$(this).stop().animate({
				opacity: 1
			}, "slow");
		},
		
	
/*Placing the code inside of "$(function() { … });" tells the browser to execute the code when the document has loaded. 
The code that we'll use to do the animation is as follows:*/
		
		// on mouse out
		function () {
			// animate opacity to nill
			$(this).stop().animate({
				opacity: 0
			}, "slow");
		});
	});	
