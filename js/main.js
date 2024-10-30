/* =====================================
Template Name: Meheraj
Author Name: Shakil Hossain
Description: Meheraj is a modern Creative Personal Portfolio Template, you can use this template for your own personal portfolio,CV,Resume purpouse.
Version:	1.1
========================================*/   
/*======================================
[Start Activation Code]
========================================
	* One Page Nav
	* Sticky JS
	* Mobile Menu
	* Social JS
	* Service hover
	* Isotop Active 
========================================
[End Activation Code]
========================================*/ 
(function ($) {
	"use strict";
    $(document).ready(function(){
	

		function Maheraz_Custom_JS() {
			var windowS = $(window),
				windowH = windowS.height(),
				projecthoverS = $('.portfolio-hover'),
				projecthoverH = projecthoverS.height(),
				proejectdevide = (projecthoverH / 2);
				projecthoverS.css({
				marginTop: -proejectdevide,
			});
		}; 
		

		
		/*====================================
		// Isotop Active
		======================================*/
		$(window).on('load', function() {
			Maheraz_Custom_JS();		
			
			if ($.fn.isotope) {
                $(".isotop-active").isotope({
                    filter: '*',
                });

					$('.portfolio-nav ul li').on('click', function() {
                    $(".portfolio-nav ul li").removeClass("mbactive");
                    $(this).addClass("mbactive");

                    var selector = $(this).attr('data-filter');
                    $(".isotop-active").isotope({
                        filter: selector,
                        animationOptions: {
                            duration: 750,
                            easing: 'easeInOutQuart',
                            queue: false,
                        }
                    });
                    return false;
                });
            }
		});

		
    });
	
	/*======================================
	// lightbox
	======================================*/ 

    lightbox.option({
      'resizeDuration': 200,
      'wrapAround': true,
      'alwaysShowNavOnTouchDevices' : true
    });
		
})(jQuery);	