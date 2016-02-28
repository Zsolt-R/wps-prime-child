jQuery(document).ready(function($){
  //if you change this breakpoint in the style.css file (or _layout.scss if you use SASS), don't forget to update this value as well
  var MQL = 1170;

  var headerHeight = $('.site-header').outerHeight();
  $('.cd-primary-nav').css('padding-top',headerHeight + 12); //small adjust


  //primary navigation slide-in effect
  if($(window).width() > MQL) {    

    $(window).on('scroll',
    {
          previousTop: 0
      }, 
      function () {
        var currentTop = $(window).scrollTop();
        //check if user is scrolling up
        if (currentTop < this.previousTop ) {
          //if scrolling up...
          if (currentTop > 0 && $('.site-header').hasClass('is-fixed')) {
            $('.site-header').addClass('is-visible');
          } else {
            $('.site-header').removeClass('is-visible is-fixed');
            $('.site-header').css('top','');
          }
        } else {
          //if scrolling down...
          $('.site-header').removeClass('is-visible');
          if( currentTop > headerHeight && !$('.site-header').hasClass('is-fixed')){
              $('.site-header').addClass('is-fixed');
              $('.site-header').css('top',headerHeight * -1); //small adjust
          } 

        }
        this.previousTop = currentTop;
    });
  }

  //open/close primary navigation
  $('.cd-primary-nav-trigger').on('click', function(){
    $('.cd-menu-icon').toggleClass('is-clicked'); 
    $('body').toggleClass('menu-is-open');
    
    //in firefox transitions break when parent overflow is changed, so we need to wait for the end of the trasition to give the body an overflow hidden
    if( $('.cd-primary-nav').hasClass('is-visible') ) {
      $('.cd-primary-nav').removeClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend',function(){
        $('body').removeClass('overflow-hidden');
      });
    } else {
      $('.cd-primary-nav').addClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend',function(){
        $('body').addClass('overflow-hidden');
      }); 
    }
  });
});