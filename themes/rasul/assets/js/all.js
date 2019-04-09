$(document).ready(function() {

    'use-strict';

    var toggle, icon;

    function onDocumentReady() {
        toggle = $('.navbar-toggler');
        icon = $('#icon');
        toggle.on('click', onToggleClick);
    }

    function onToggleClick() {
        var aniEasing = Quart.easeInOut,
            aniDuration = 0.75,
            top = icon.find('.top'),
            middle = icon.find('.middle'),
            bottom = icon.find('.bottom');

        toggle.toggleClass('active');

        TweenMax.to(icon, aniDuration, {
            rotation: '+=180',
            ease: aniEasing
        });

        if (toggle.hasClass('active')) {
            TweenMax.to(top, aniDuration, {
                width: '50%',
                rotation: 45,
                x: '104%',
                y: 5,
                ease: aniEasing,
                yoyo: true
            });
            TweenMax.to(bottom, aniDuration, {
                width: '50%',
                rotation: -45,
                x: '108%',
                y: -5,
                ease: aniEasing
            });
        } else {
            TweenMax.to(top, aniDuration, {
                width: '100%',
                rotation: 0,
                x: '0%',
                y: 0,
                ease: aniEasing
            });
            TweenMax.to(bottom, aniDuration, {
                width: '100%',
                rotation: 0,
                x: '0%',
                y: 0,
                ease: aniEasing
            });
        }

    }

    $(onDocumentReady);


    var navbar = $('.collapse.navbar-collapse').html();
    $('.mobile-nav').append(navbar);

    var socialMob = $('.social-main').html();
    $('.mobile-nav').append('<div class="social-main"></div>').find('.social-main').append(socialMob);

    $(document).on('click' , '.navbar-toggler' , function(){
        $('.mobile-nav').toggleClass('slideInLeft').toggleClass('slideOutLeft').addClass('nav-visible');
        $('body , html').toggleClass('no-overflow');
    })

    $(document).on("click",".navbar-nav > li .material-icons",function(){
        $(this).parent().find('.dropdown-content').fadeToggle();
        $(this).toggleClass('active')
    })


	$('.header_slider').owlCarousel({
        loop:false,
        margin:0,
        nav:false,
        dots: false,
        responsiveClass:true,
        responsive:{
            0:{
                items:3
            },
            576:{
                items:4
            },
            768:{
                items:6
            }
        }
    })

	$('.slider-main').owlCarousel({
		loop:true,
		margin:0,
		dots: true,
		responsiveClass:false,
		items:1,
		autoplay:true,
		responsiveClass:true,
        responsive:{
            0:{
                nav:false
            },
            768:{
                nav:true
            }
        },
		navText: [
	        "<i class='material-icons'>&#xe314</i>",
	        "<i class='material-icons'>&#xe315</i>"
	    ]
	})

	$('.mission-slider').owlCarousel({
	    loop:false,
	    margin:32,
	    nav:false,
	    dots: false,
	    responsiveClass:true,
	    responsive:{
	        0:{
	            items:1
	        },
	        576:{
	            items:2
	        },
	        992:{
	            items:3
	        },
	        1200:{
	            items:4
	        }
	    }
	})

	$('.education-slider').owlCarousel({
	    loop:false,
	    margin:30,
	    nav:false,
	    dots: false,
	    responsiveClass:true,
	    responsive:{
	        0:{
	            items:1
	        },
	        576:{
	            items:2
	        },
	        992:{
	            items:3
	        }
	    }
	})

	$('.count-slider').owlCarousel({
	    loop:false,
	    margin:0,
	    nav:false,
	    dots: false,
	    responsiveClass:true,
	    responsive:{
	        0:{
	            items:2
	        },
	        768:{
	            items:4
	        }
	    }
	})

    $('.selectpicker').selectpicker();



    if ($(".instagram_gallery").length) {

        var $insta = $(".instagram_gallery .insta-link");
        insta_len = $insta.length;

        var instaHeight = $('.instagram_gallery').height();

        for (var i = 0; i < $insta.length-1; i++) {

            insta_t = $insta.eq(i).children('img').height() + $insta.eq(i+1).children('img').height();


            if (insta_t >= instaHeight || $(window).width() < 768) {
                $insta.eq(i).wrap('<div class="item"></div>')
            } 
            else if (insta_t < instaHeight) {
                $insta.slice(i, i + 2).wrapAll('<div class="item"></div>');
                i += 1
            }
        }

    }

    var instaGallery
	(instaGallery = ()=>{
		
	    if ($(window).width() >= 768) {
		    var left = 0;
		    var galleryWidth = $('.instagram_gallery .gallery-default').outerWidth() * 5;
		    var windowWidth = $(window).width();
		    var galleryMaxPos = (galleryWidth - windowWidth) / 2;
		    //console.log(galleryMaxPos);

		    $( ".instagram_gallery" ).draggable({ 
			    axis: "x",
			    cursor: 'move',
			    containment : [-galleryMaxPos , 0 , galleryMaxPos , 0],

			    start: function(e, ui){
			    	/*console.log(ui.position.left);*/
			        var dx = (ui.position.left - left);
			        // console.log((dx < 0) ? 'toleft' : (dx > 0) ? 'toright' : '');
			        left += dx;

			        var galleryClone = $('.gallery-default').eq(0).clone();

		        	if($('.instagram_gallery .gallery-default').length<5) {

		        		if(dx>0) {
		        			$('.instagram_gallery').prepend(galleryClone);
		        		}
		        		else {
		        			$('.instagram_gallery').append(galleryClone);
		        		}

		        	}
			    },
			   
			});
		}

		if ($(window).width() < 768) {
			$('.gallery-default').owlCarousel({
	            nav: false,
	            loop: true,
	            items: 1,
	            margin: 0 ,
	            dors :true
	        })
		}
			
	})()

	window.onresize = function(){
		instaGallery()
	}


   
});