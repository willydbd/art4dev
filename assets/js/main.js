$(function () {
    /**
     * Initalize wow js
     */
    var wow = new WOW({
        boxClass: 'wow', // animated element css class (default is wow)
        animateClass: 'animated', // animation css class (default is animated)
        offset: 0, // distance to the element when triggering the animation (default is 0)
        mobile: true, // trigger animations on mobile devices (default is true)
        live: true, // act on asynchronously loaded content (default is true)
        callback: function (box) {
            // the callback is fired every time an animation is started the argument that is
            // passed in is the DOM node being animated
        },
        scrollContainer: null // optional scroll container selector, otherwise use window
    });
    wow.init();


    if(window.innerWidth <= 767) {
        $(".center").slick({
            dots: false,
            autoplay: true,
            infinite: true,
            slidesToShow: 2,
            autoplaySpeed: 2000,
        });
    }
    else {
        $(".center").slick({
            dots: false,
            autoplay: true,
            infinite: true,
            slidesToShow: 4,
            autoplaySpeed: 2000,
        });
    }

    $(window).resize(function () {
        if(window.innerWidth <= 767) {
            $(".center").slick({
                dots: false,
                autoplay: true,
                infinite: true,
                slidesToShow: 2,
                autoplaySpeed: 2000,
            });
        }
        else {
            $(".center").slick({
                dots: false,
                autoplay: true,
                infinite: true,
                slidesToShow: 4,
                autoplaySpeed: 2000,
            });
        }
    })

    $('#declaration').change(function () {
        $('#accept').prop("disabled", !this.checked);
    }).change();

    /*Scroll function*/
    $('a').on('click', function(e) {

        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
            // Prevent default anchor click behavior
            e.preventDefault();
            // Store hash
            var hash = this.hash;
            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 600, function(){

                // Add hash (#) to URL when done scrolling (default click behavior)
                //window.location.hash = hash;
            });
        }
    });

    //FAQ Sidebar
    /*var $sideNav = $('#sideNav'),
         $window = $(window),
         topPadding = 15,
         offset = $sideNav.offset();

    $window.scroll(function () {
        if($window.scrollTop() > offset.top) {
            $sideNav.stop().animate({
                marginTop: $window.scrollTop() - offset.top + topPadding
            });
        } else {
            $sideNav.stop().animate({
                marginTop: 0
            });
        }
    });*/
});

/**
 * Script for FAQ page
 */
    // var action = 'click';
    // var speed = '500';

    $(document).ready(function(){
        $('li.q').on('click', function(){
            $(this).next().slideToggle('500')
            .siblings('li.a').slideUp();

            var img = $(this).children('img');
            //Remove Rotate Class from all images except the active
            $('img').not(img).removeClass('rotate');
            img.toggleClass('rotate');
        });
    });
/*
	By Osvaldas Valutis, www.osvaldas.info
	Available for use under the MIT License
*/

'use strict';

( function ( document, window, index )
{
    var inputs = document.querySelectorAll( '.inputfile, .add-more' );
    Array.prototype.forEach.call( inputs, function( input )
    {
        var label	 = input.nextElementSibling,
            labelVal = label.innerHTML;

        input.addEventListener( 'change', function( e )
        {
            var fileName = '';
            if( this.files && this.files.length > 1 )
                fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
            else
                fileName = e.target.value.split( '\\' ).pop();

            if( fileName )
                label.querySelector( 'span' ).innerHTML = fileName;
            else
                label.innerHTML = labelVal;
        });

        // Firefox bug fix
        input.addEventListener( 'focus', function(){ input.classList.add( 'has-focus' ); });
        input.addEventListener( 'blur', function(){ input.classList.remove( 'has-focus' ); });
    });

    $('.cd-faq-trigger').click(function () {
        $(this).next('.cd-faq-content').toggleClass('shown');
    });
}( document, window, 0 ));

$(function() {

    var Page = (function() {

        var $nav = $( '#nav-dots > span' ),
            slitslider = $( '#slider' ).slitslider( {
                onBeforeChange : function( slide, pos ) {

                    $nav.removeClass( 'nav-dot-current' );
                    $nav.eq( pos ).addClass( 'nav-dot-current' );

                }
            } ),

            init = function() {

                initEvents();

            },
            initEvents = function() {

                $nav.each( function( i ) {

                    $( this ).on( 'click', function( event ) {

                        var $dot = $( this );

                        if( !slitslider.isActive() ) {

                            $nav.removeClass( 'nav-dot-current' );
                            $dot.addClass( 'nav-dot-current' );

                        }

                        slitslider.jump( i + 1 );
                        return false;

                    } );

                } );

            };

        return { init : init };

    })();

    Page.init();

    /**
     * Notes:
     *
     * example how to add items:
     */

    /*

    var $items  = $('<div class="sl-slide sl-slide-color-2" data-orientation="horizontal" data-slice1-rotation="-5" data-slice2-rotation="10" data-slice1-scale="2" data-slice2-scale="1"><div class="sl-slide-inner bg-1"><div class="sl-deco" data-icon="t"></div><h2>some text</h2><blockquote><p>bla bla</p><cite>Margi Clarke</cite></blockquote></div></div>');

    // call the plugin's add method
    ss.add($items);

    */

});

$(function () {
    $('#booth_all').on('change', function () {
        let allocation = $(this).val();
        $('#booth').on('change', function () {
            let booth_num = $(this).val();
            let final = parseInt(allocation) * parseInt(booth_num);
            //console.log(final);
             $('#amt').html(final + ' Naira Only');
        });
    });

    $('.dropzone').dropzone({
        url: '',
        margin: 20,
        allowedFileTypes: 'image,*',
        params: {
            'action' : 'save'
        },
        uploadOnDrop:true,
        uploadDone: true,
        uploadOnPreview: true,
        success: function () {
            alert('Upload Successfully');
        }
    });
});