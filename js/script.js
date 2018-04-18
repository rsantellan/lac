jQuery(document).ready(function ($) {
	
	"use strict";
	
/*=================== Scripts ===================*/

		//===== Sticky Header =====// 
			var menu_height = $('header').innerHeight();
			$(window).scroll(function () {
		 var scroll = $(window).scrollTop();
		 if (scroll >= 150) {
			 $('.stick').addClass('sticky');
		 } else {
			 $('.stick').removeClass('sticky');
		 }
			});
			if ($('header').hasClass('stick')) {
		 $('.theme-layout').css({'padding-top': menu_height});
			}

		//parallax
			if ($.isFunction($.fn.scrolly)) {
			$('.parallax').scrolly({bgParallax: true});
			}
			
			//responsive menu dropdown	res-close-btn
			$('.menu-btn').on('click', function() {
				$('.res-menu-dropdown').addClass('active');
				return false;
				});
				
				$('.res-close-btn').on('click', function() {
				$('.res-menu-dropdown').removeClass('active');
				return false;
				});
			
		//responsive menu has dropdown	
			$('.dropdown  li.has-dropdown > a').on('click', function () {
				$(this).parent().siblings().children('ul').slideUp();
				$(this).parent().siblings().removeClass('active');
				$(this).parent().children('ul').slideToggle();
				$(this).parent().toggleClass('active');
	
			});
			
		//Login dropdown	
		$('.user-meta > li:last-child a').on('click', function() {
			$('.login-wraper').addClass('active');
			return false;
			});
			
		$('.close').on('click', function() {
			$('.login-wraper').removeClass('active');
			return false;
			});
			
		//blood group select	
		$('.blood-groups > li').on('click', function() {
			$(this).siblings().removeClass('active');			
			$(this).addClass('active');
			return false;
			});
			
		//responsive menu click show email	
		$('.respnsv-top > a').on('click', function() {
			$(this).toggleClass('active');
			return false;
			});			
			
		//featured section carouselfeatured-banner-caro
			if ($.isFunction($.fn.owlCarousel)) {
			$('.featured-carousel').owlCarousel({
				margin:0,
				smartSpeed: 1000,
				autoplay:true,
				responsiveClass:true,
				responsive:{
					0:{
						items:1,
						nav:false,
						dots:false
					},
					600:{
						items:1,
						nav:false,
						dots:false
					},
					1000:{
						items:1,
						nav:false,
						loop:true,
						dots:false
					}
				}
			});

			//featured-banner-caro
			$('.featured-banner-caro').owlCarousel({
				margin:0,
				smartSpeed: 1000,
				autoplay:true,
				responsiveClass:true,
				responsive:{
					0:{
						items:1,
						nav:false,
						dots:false
					},
					600:{
						items:1,
						nav:false,
						dots:false
					},
					1000:{
						items:1,
						nav:false,
						loop:true,
						dots:false
					}
				}
			});	
			
			//featured-text-caro
			$('.text-caro').owlCarousel({
				items:1,
				loop:true,
				margin:0,
				autoplay:true,
				autoplayTimeout:2500,
				autoplayHoverPause:true,
				dots:false,
				nav:false,
				animateIn:'fadeIn',
				animateOut:'fadeOut',
			});
		//team section carousel
			$('.team-carouzel').owlCarousel({
				loop:true,
				margin:28,
				smartSpeed: 1000,
				responsiveClass:true,
				nav:true,
				dots:false,
				responsive:{
					0:{
						items:1,
						nav:false,
						dots:false
					},
					600:{
						items:3,
						nav:true
					},
					1000:{
						items:3,
						nav:true,
						loop:false
					}
				}
			});
		//sponsors carousel	
			$('.sponsors').owlCarousel({
				loop:true,
				margin:80,
				smartSpeed: 1000,
				responsiveClass:true,
				nav:true,
				dots:false,
				autoplay:true,
				responsive:{
					0:{
						items:1,
						nav:false,
						dots:false
					},
					600:{
						items:3,
						nav:false
					},
					1000:{
						items:5,
						nav:false,
						loop:false,
						dots:false
					}
				}
			});
			
			//Recent news carousel	
			$('.recent-news-detail').owlCarousel({
				loop:true,
				margin:80,
				smartSpeed: 1000,
				responsiveClass:true,
				nav:false,
				dots:true,
				autoplay:true,
				responsive:{
					0:{
						items:1,
						nav:false,
						dots:false
					},
					600:{
						items:1,
						nav:false,
						dots:false
					},
					1000:{
						items:1,
						nav:false,
						loop:false,
						dots:true
					}
				}
			});
			
			//Recent news carousel	
			$('.testimonial').owlCarousel({
				loop:true,
				margin:80,
				smartSpeed: 1000,
				responsiveClass:true,
				nav:true,
				dots:false,
				autoplay:true,
				responsive:{
					0:{
						items:1,
						nav:false,
						dots:false
					},
					600:{
						items:1,
						nav:true
					},
					1000:{
						items:1,
						nav:true,
						loop:false,
						dots:false
					}
				}
			});

		}
			
			//Select2 for select options
			if ($.isFunction($.fn.select2)) {
				$(".services").select2({
					  minimumResultsForSearch: Infinity,
					  placeholder: "Choose Services *"
					});
			
			$(".doctor").select2({
				  minimumResultsForSearch: Infinity,
				  placeholder: "Select Doctor *"
				});
			$(".day").select2({
			  minimumResultsForSearch: Infinity,
			  placeholder: "Morning"
			});

			  $(".country").select2();
			  }

			//Bootstrap date picker	
				if ($.isFunction($.fn.datepicker)) {
					$('.datepicker').datepicker({
						format: 'mm/dd/yyyy',
						startDate: '-3d'
					});
				}
		//counter for funfacts
			if ($.isFunction($.fn.counterUp)) {
			$('.counter').counterUp({
				delay: 10,
				time: 1000
			});
			}
			
					
		//scrollbar plugin
		if ($.isFunction($.fn.perfectScrollbar)) {
			$('.res-menu-dropdown').perfectScrollbar();
		}
		
		//===== Ajax Contact Form =====//
    $('#contactform').submit(function () {
        var action = $(this).attr('action');
        var msg = $(this).find('.msg-box');//console.log(msg);
        $(msg).hide();
        var data = $(this).serialize() + "&g-recaptcha-response=" + grecaptcha.getResponse($('#contact-form').attr('data-widget-id'));
        console.log(data);
        $.ajax({
            type: 'POST',
            url: action,
            data: data,
            beforeSend: function () {
                $('#submit').attr('disabled', true);
                $('#contactform img.loader').fadeIn('slow');
            },
            success: function (data) {
                $('#submit').attr('disabled', false);
                $('#contactform img.loader').fadeOut('slow');
                $(msg).empty();
                $(msg).html(data);
                $(msg).slideDown('slow');
                grecaptcha.reset();
            }
        });
        return false;
    });

    $('#newsletterform').submit(function () {
        var action = $(this).attr('action');
        var msg = $(this).find('.msg-box');
        $(msg).hide();
        var data = $(this).serialize() + "&g-recaptcha-response=" + grecaptcha.getResponse($('#newsletter-form').attr('data-widget-id'));;
        $.ajax({
            type: 'POST',
            url: action,
            data: data,
            beforeSend: function () {
                $('#submit').attr('disabled', true);
                $('#newsletterform img.loader').fadeIn('slow');
            },
            success: function (data) {
                $('#submit').attr('disabled', false);
                $('#newsletterform img.loader').fadeOut('slow');
                $(msg).empty();
                $(msg).html(data);
                $(msg).slideDown('slow');
                window.setTimeout(function() {
                	$(msg).fadeOut('slow');
                }, 3000);
                grecaptcha.reset();
                
            }
        });
        return false;
    });
    $('div.manual-pruebas li:contains("Resultado (D")').remove()
});

var CaptchaCallback = function() {
  $('.g-recaptcha').each(function(index, el) {
    var widgetId = grecaptcha.render(el, {'sitekey' : '6LecyDIUAAAAAIHPYUa_T79rNXSadOJOF9c0U3bO'});
    $(this).attr('data-widget-id', widgetId);
  });
};
