jQuery(function() {
  
  jQuery(".webais-pf-project").click(
	  function(){
	    //console.log("hovered"+this.id);
		//jQuery(".webais-pf-content").hide();
		/* close the project if already opened */
		//console.log("has hover class? "+jQuery(this).hasClass("webais-pf-hover"));
		if (jQuery(this).hasClass("webais-pf-hover")) {
			jQuery(this).removeClass("webais-pf-hover");
			//jQuery(this).find(".webais-pf-content").fadeIn(500);
			jQuery(this).find(".webais-pf-content").removeClass("webais-pf-content-hover");
		} else {
			jQuery(".webais-pf-project").removeClass("webais-pf-hover");
			jQuery(".webais-pf-content").removeClass("webais-pf-content-hover");
			jQuery(this).addClass("webais-pf-hover");
			//jQuery(this).find(".webais-pf-content").fadeIn(500);
			jQuery(this).find(".webais-pf-content").addClass("webais-pf-content-hover");
		}
	  }
   );

	var insearch = false;

	// toggle the search on the side bar
    jQuery("#findworkbutton").mouseenter(
		function(){
			if (insearch == false) { // if not insearch then fade in the search
				jQuery("#apsform").fadeIn();
			}
			//console.log('insearch1'+insearch);
		}
	);

	// hide the search form when leaving the button unless the mouse is in the search form
    jQuery("#findworkbutton").mouseleave(
		function(){
			//console.log('insearch2a'+insearch);
			// wait a bit and then if still not insearch then fade out search
				setTimeout(function() {
					if (insearch == false) {
						jQuery("#apsform").fadeOut();
					}
				 }, 200); // wait one second then fade out
				 //console.log('insearch2b'+insearch);
		}
	);

    // set the insearch variable when the mouse is in the search form
	jQuery( "#apsform.formhidden" ).mouseenter(
		function() {
			insearch = true;
		    //console.log('insearch3'+insearch);
		}
	);

	// unset the insearch variable when the mouse leaves search form
	jQuery( "#apsform.formhidden" ).mouseleave(
		function() {
			jQuery("#apsform").fadeOut();
			// after leaving the search wait a bit and then set search to off
			setTimeout(function() {
					insearch = false;
			}, 200); // wait one second then fade out
		   //console.log('insearch4'+insearch);

		}
	);


});