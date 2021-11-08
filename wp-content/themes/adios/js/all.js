/*--------------------------------------------------------*/
/* TABLE OF CONTENTS: */
/*--------------------------------------------------------*/

/* 01 - VARIABLES */
/* 02 - WINDOW LOAD */
/* 03 - SWIPER SLIDER */
/* 04 - MOBILE MENU */
/* 05 - WINDOW SCROLL */
/* 06 - IZOTOPE */
/* 07 - CLICK */
/* 08 - VIDEO OPEN */
/* 09 - WOW ANIMATION */

(function($, window, document, undefined) {

  "use strict";

  /*--------------------------------------------------------------
    Variables
  --------------------------------------------------------------*/
  var winW, winH, winScr, _isresponsive,
    _ismobile = navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPod/i);


  /*--------------------------------------------------------------
    Scripts initialization
  --------------------------------------------------------------*/

  $(window).on('load', function() {
    $('.loader').hide(200);
    isotopMsSetup();
  });

  $(document).on('ready', function() {
    pageCalculations();
    isotopMsSetup();
    megaMenuMargin();
    ajazLoadMore();
    qtyStepper();
    enableFullWidth();
    lightGallery();
    ytPlayer();
    vimeoPlayer();
    clickableSetup();
    mobileMenu();
    dropDownBtn();
    videoOpen();
    wowActive();
    sectionScrolling();
    lazyActive();
    videoBlock();
    tabSetup();
    slickSetup();

  });

  $(window).on('resize', function() {
    isotopMsSetup();
    megaMenuMargin();
    dropDownBtn();
  });

  $(window).on('scroll', function() {
    timeLine();
    startLine();
    isotopMsSetup();

  });

  $.exists = function(selector) {
    return ($(selector).length > 0);
  }




  /*--------------------------------------------------------------
    Page Calculator
  --------------------------------------------------------------*/

  function pageCalculations() {
    winW = $(window).width();
    winH = $(window).height();
    if (_ismobile) { $('body').addClass('mobile'); }
  }

  /*--------------------------------------------------------------
    Slick Slider
  --------------------------------------------------------------*/
    function slickSetup() {
      $(".swiper-container").each(function() {

        // Slick Variable
        var $ts = $(this);
        var $slickActive = $(this).find('.swiper-wrapper');
        var $sliderNumber = $(this).siblings('.slider-number');
        
        // Show Slider Number
        $slickActive.on('init reInit afterChange', function (event, slick, currentSlide) {
          var i = (currentSlide ? currentSlide : 0) + 1;
          $sliderNumber.find('span').text(i);
          // $sliderNumber.find('b').text(slick.slideCount);
        });

        // Auto Play
        var autoPlayVar = parseInt($ts.attr('data-autoplay'), 10);
        // Auto Play Time Out
        var autoplaySpdVar = 3000;
        if (autoPlayVar>1) {
          autoplaySpdVar = autoPlayVar;
          autoPlayVar = 1;
        }
        // Slide Change Speed
        var speedVar = parseInt($ts.attr('data-speed'), 10);
        // Slider Loop
        var loopVar = Boolean(parseInt($ts.attr('data-loop'), 10));
        // Slider Center
        var centerVar = Boolean(parseInt($ts.attr('data-center'), 10));
        // Pagination
        var paginaiton = $ts.children().hasClass('pagination');
        // Slide Per View
        var slidesPerView = $ts.attr('data-slides-per-view');
        if (slidesPerView == 1) {
          slidesPerView = 1;
        }
        if (slidesPerView == 'responsive') {
          var slidesPerView = parseInt($ts.attr('data-add-slides'), 10);
          var lgPoint = parseInt($ts.attr('data-lg-slides'), 10);
          var mdPoint = parseInt($ts.attr('data-md-slides'), 10);
          var smPoint = parseInt($ts.attr('data-sm-slides'), 10);
          var xsPoing = parseInt($ts.attr('data-xs-slides'), 10);
        }

        // Slick Active Code
        $slickActive.slick({
          autoplay: autoPlayVar,
          dots: paginaiton,
          centerPadding: '0',
          speed: speedVar,
          infinite: loopVar,
          autoplaySpeed: autoplaySpdVar,
          centerMode: centerVar,
          prevArrow: $ts.find('.swiper-arrow-left'),
          nextArrow: $ts.find('.swiper-arrow-right'),
          appendDots: $ts.find('.pagination'),
          slidesToShow: slidesPerView,
          responsive: [
            {
              breakpoint: 1600,
              settings: {
                slidesToShow: lgPoint
              }
            },
            {
              breakpoint: 1200,
              settings: {
                slidesToShow: mdPoint
              }
            },
            {
              breakpoint: 992,
              settings: {
                slidesToShow: smPoint
              }
            },
            {
              breakpoint: 768,
              settings: {
                slidesToShow: xsPoing
              }
            }
          ],
          customPaging: function (slider, i) {
            $sliderNumber.find('b').text(i + 1);
          }
        });
      })
    }


  /*--------------------------------------------------------------
    ## Isotop Initialize
  --------------------------------------------------------------*/

  function isotopMsSetup() {
    if ($.exists('.izotope-container')) {
      $('.izotope-container').isotope({
        itemSelector: '.item',
        transitionDuration: '0.60s',
        percentPosition: true,
        masonry: {
          columnWidth: '.grid-sizer'
        }
      });
      /* Active Class of Portfolio*/
      $('.filter-mob-list li').on('click', function(event) {
        $(this).siblings('.active').removeClass('active');
        $(this).addClass('active');
        event.preventDefault();
      });
      /*=== Portfolio filtering ===*/
      $('.filter-mob-list').on('click', 'li', function() {
        var filterElement = $(this).attr('data-filter');
        $('.izotope-container').isotope({
          filter: filterElement
        });
      });
    }

    $('.filter-mob-list').on('click', function() {
      $('.izotope-container .item').removeClass('zoomIn');
    });
  }


  function ajazLoadMore() {
    $('.ajax-load-more').each(function() {
      var ajaxButton = $(this).find('.portfolio-load-more'),
        postWrapper = $(this).prev().find('.izotope-container'),
        postItem = $(this).prev().find('.item'),
        ajaxButtonOuter = $(this),
        flag = 1,
        counter = 2,
        pagi = 3;

      $(ajaxButton).on('click', function(e) {

        e.preventDefault();
        // Variables
        var element = $(this),
          target = element.attr('href'),
          loadingTextOrg = element.html(),
          loadingText = element.data('loading-text'),
          $ajaxButton = $(ajaxButton),
          $postWrapper = $(postWrapper),
          totalFoundPost = element.data('total-post'),
          postLimit = element.data('post-limit');

        if (flag > 1) {
          var postCounter = postLimit * counter
          var remaningPost = totalFoundPost - postCounter;
          target = (remaningPost > 0) ? window.location.href + "/page/" + pagi : target;
          pagi++;
          counter++;
        }

        // Loading Text
        // if (loadingText == 'spinner') element.addClass('spinner');
        // else element.html(loadingText);

        // Run AJAX
        $.ajax({
          type: 'GET',
          url: target,
          success: function(data, textStatus, XMLHttpRequest) {
            //console.log(data);
            // Store New Data
            var newPostItems = $(data).find('.izotope-container' + ' ' + '.item'),
              nextPageUrl = $(data).find(ajaxButton).attr('href');

            newPostItems.imagesLoaded(function() {
              $postWrapper.append(newPostItems).isotope('appended', newPostItems);
              $postWrapper.isotope('layout');
            });
            // Trigger Resize To Fix Responsive Issues
            $(window).trigger('resize');
          },
          complete: function() {
            console.log(remaningPost);
            console.log(postLimit);
            if (remaningPost <= postLimit) {
              element.removeClass('spinner');
              ajaxButtonOuter.addClass('pagination-executed');
            }
          },
          error: function(MLHttpRequest, textStatus, errorThrown) {
            alert(errorThrown);
          }
        });

        flag++;
      });

    });
  }


  /*--------------------------------------------------------------
    ## Mega Menu Margin
  --------------------------------------------------------------*/

  function megaMenuMargin() {
    var countMegamenu = $('.mega-menu').length;
    for (var m = 0; m < countMegamenu; m++) {
      var inioffset = $('body').find('.mega-menu').eq(m).offset().left;
      $('body').find('.mega-menu').eq(m).children('.mega-menu-wrap').css('left', -inioffset)
    }
  }


  /*--------------------------------------------------------------
    ## QTY Stepper
  --------------------------------------------------------------*/
  function qtyStepper() {
    if (typeof $.fn.number != 'function') {
      return;
    }
    if ($('input[type=number]').length) {
      console.log('sfsdf');
      $('input[type=number]').number();
    };
  }

  /*--------------------------------------------------------------
    ## Enable Full Width
  --------------------------------------------------------------*/
  function enableFullWidth() {
    initFullWidth();
    $(window).bind('load resize', function() {
      initFullWidth();
    }).trigger('resize');
  }

    function initFullWidth() {
      $('.fullwidth').each(function() {
        var element = $(this),
          total_padding;

        if ($(window).width() > 1586) {
          total_padding = 200;
        } else if ($(window).width() > 992 && $(window).width() < 1600) {
          total_padding = 120;
        } else {
          total_padding = 0;
        }

        total_padding = (element.hasClass('full_stretch_row_content')) ? 0 : total_padding;

        // Styles
        element.css({ 'margin-left': '', 'width': '' });
        element.css({ 'margin-left': -(element.offset().left - (total_padding / 2)), 'width': ($(window).outerWidth() - total_padding) });

      });

    }



  /*--------------------------------------------------------------
    ## Light Gallery
  --------------------------------------------------------------*/
  function lightGallery() {
    var gridblock_lightbox = $('.lightgallery');
    gridblock_lightbox.each(function() {
      $(this).lightGallery({
        mode: 'lg-slide',
        selector: '.lightbox-item',
        addClass: 'custom-lightbox',
        loop: false,
        thumbnail: false,
        pager: false,
        speed: 400,
        scale: 1,
        keypress: true,
      });

    });
  }

  /*--------------------------------------------------------------
    ## YT Player
  --------------------------------------------------------------*/
  function ytPlayer() {
    if ($('.top-baner.video-bg .yt-player').length) {
      if (_ismobile) {
        $('.player-mb').YTPlayer();
      } else {
        $('.player').YTPlayer();
      }
    }
  }

  /*--------------------------------------------------------------
    ## vimeoPlayer
  --------------------------------------------------------------*/
  function vimeoPlayer() {
    if ($('.top-baner.video-bg .vm-player').length) {
      if (_ismobile) {
        $('.player-mb').vimeo_player();
      } else {
        $('.player').vimeo_player();
      }
    }
  }

  /*--------------------------------------------------------------
    ## Time Line
  --------------------------------------------------------------*/
  function timeLine() {
    if ($('.time-line').length) {
      $('.time-line').not('.animated').each(function() {
        if ($(window).scrollTop() >= $(this).offset().top - $(window).height() * 0.5) { $(this).addClass('animated').find('.timer').countTo(); }
      });
    }
  }

  /*--------------------------------------------------------------
    ## Start Line
  --------------------------------------------------------------*/
  function startLine() {
    if ($('.start-line').length) {
      if ($(window).scrollTop() >= $('.start-line').offset().top - $('.start-line').height()) {
        $('.skill-line div').each(function() {
          var objel = $(this);
          var pb_width = objel.attr('data-width-pb');
          objel.css({ 'width': pb_width });
        });
      }
    }
  }


  /*--------------------------------------------------------------
    ## Clickable
  --------------------------------------------------------------*/
  function clickableSetup() {

    $('.close-popup').on('click', function() {
      $('.success').removeClass('active');
    });

    if ($(window).width() <= 992) {
      $(document).on('mouseenter', '.nav-list li', function() {
        $(this).removeClass('active');
        $(this).addClass('active');
        $(this).find('.drop-menu').slideDown(300);
      });

      $('.nav-list li').on('mouseleave', function() {
        $(this).removeClass('active');
        $(this).stop(true, true).find('> .drop-menu').slideUp(500);
      });

      $(document).on('mouseenter', '.nav-list > li > ul > li', function() {
        $(this).addClass('active');
        $(this).find('> .drop-menu-next').slideDown(300);
      });

      $(document).on('mouseleave', '.nav-list > li > ul > li', function() {
        $(this).removeClass('active');
        $(this).find('> .drop-menu-next').slideUp(300);
      });
    } else {
      $(document).on('mouseenter', '.style-1 .drop-link', function() {
        $('.style-1 .nav-list li').removeClass('active');
        $(this).parent().addClass('active');
        $(this).parent().find('> .drop-menu').slideDown(300);
      });

      $('.style-1 .nav-list li').on('mouseleave', function() {
        $(this).removeClass('active');
        $(this).stop(true, true).find('> .drop-menu').slideUp(500);
      });

      $(document).on('mouseenter', '.style-1 .drop-link-next', function() {
        $(this).addClass('active');
        $(this).parent().find('.drop-menu-next').slideDown(300);
      });
    }
  }


  /*--------------------------------------------------------------
    ## Mobile Menu
  --------------------------------------------------------------*/
  function mobileMenu() {
    $(document).on('click', '.burger-menu', function() {
      $('.nav-menu').toggleClass('slide');
      $('body').toggleClass('fix');
      $(this).toggleClass('active');
      return false;
    });
  }

  function dropDownBtn() {
    if ($(window).width() <= 992) {
      $(document).on('click', '.drop-filter', function() {
        $(this).parent().find('.filter-mob-list').slideToggle(300);
      });

      $(document).on('click', '.filter-mob-list li', function() {
        $(this).parent().slideUp(300);
        $('.drop-filter span').text($(this).text());
      });
    }
  }

  /*--------------------------------------------------------------
    ## Video Open
  --------------------------------------------------------------*/
  function videoOpen() {
    $(document).on('click', '.play-button', function() {
      var buttonVal = $('.play-button').index(this);
      var vid = $(this).closest('.video-item').find('.bgvid').eq(buttonVal);
      $('.video-item').addClass('act');
      vid.get(0).play();
      return false;
    });

    $('.close-video').on('click', function() {
      var closeVal = $('.close-video').index(this);
      var pauseVid = $(this).closest('.video-item').find('.bgvid').eq(closeVal);
      $('.video-item').removeClass('act');
      pauseVid.get(0).pause();
    });
  }

  /*--------------------------------------------------------------
    ## WoW Active
  --------------------------------------------------------------*/
  function wowActive() {

    if (!($('.elementor-editor-active').length)) {
      if ($(window).width() > 1200) {
        var wow = new WOW({
          boxClass: 'wow',
          animateClass: 'animated',
          offset: 0,
          mobile: true,
          live: true,
          scrollContainer: null
        });
        wow.init();
      }
    }

  }

  /*--------------------------------------------------------------
    ## Section Scrolling
  --------------------------------------------------------------*/
  function sectionScrolling() {
    if ($('.section-scroll').length && !_ismobile) {
      $.scrollify({
        section: ".section-scroll",
        setHeights: false,
        offset: 0
      });
    }
  }

  /*--------------------------------------------------------------
    ## Lazy Active
  --------------------------------------------------------------*/
  function lazyActive() {
    if ($('.lazy').length) {
      $('img.lazy').lazyload();
    }
  }
  /*--------------------------------------------------------------
    ## Video Block
  --------------------------------------------------------------*/
  function videoBlock() {
    $(document).on('click', '.video-open', function(e) {
      e.preventDefault();
      var video = $(this).attr('href');
      $('.video-popup-container iframe').attr('src', video);
      $('.video-popup').addClass('active');

    });
    $('.video-popup-close, .video-popup-layer').on('click', function(e) {
      $('.video-popup').removeClass('active');
      $('html').removeClass('overflow-hidden');
      $('.video-popup-container iframe').attr('src', 'about:blank')
      e.preventDefault();
    });
  }

  /*--------------------------------------------------------------
    ## Lazy Active
  --------------------------------------------------------------*/
  function tabSetup() {
    var tabFinish = 0;
    $('.tt-nav-tab-item').on('click', function() {
      var $t = $(this);
      if (tabFinish || $t.hasClass('active')) return false;
      tabFinish = 1;
      $t.closest('.tt-nav-tab').find('.tt-nav-tab-item').removeClass('active');
      $t.addClass('active');
      var index = $t.parent().parent().find('.tt-nav-tab-item').index(this);
      $t.parents('.tt-tab-nav-wrapper').find('.tt-tab-select select option:eq(' + index + ')').prop('selected', true);
      $t.closest('.tt-tab-wrapper').find('.tt-tab-info:visible').fadeOut(500, function() {
        var $tabActive = $t.closest('.tt-tab-wrapper').find('.tt-tab-info').eq(index);
        $tabActive.css('display', 'block').css('opacity', '0');
        // tabReinit($tabActive.parents('.tt-tab-wrapper'));
        $tabActive.animate({ opacity: 1 });
        tabFinish = 0;
      });
    });
  }



  $(window).on('elementor/frontend/init', function() {

    var triggerSwiper = [
      'client',
      'hero-slider',
      'portfolio-slider',
      'team',
      'testimonial',
      'blog-slider'
    ];

    $.each(triggerSwiper, function(index, item) {
      elementorFrontend.hooks.addAction('frontend/element_ready/rs-' + item + '-widget.default', function($scope, $) {
        slickSetup();
      });
    });

    elementorFrontend.hooks.addAction('frontend/element_ready/rs-hero-video-banner-widget.default', function($scope, $) {
      ytPlayer();
      vimeoPlayer();
    });

    elementorFrontend.hooks.addAction('frontend/element_ready/rs-portfolio-widget.default', function($scope, $) {
      isotopMsSetup();
    });


  });


})(jQuery, window, document);
