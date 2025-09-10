var $ = jQuery.noConflict();

$(document).ready(function () {
  $(".owl-carousel").owlCarousel({
    loop: false,
    items: 2,
    margin: 20,
    nav: true,
    dots: true,
    autoplay: false,
    slideBy: 2,
    autoplayHoverPause: false,
    responsiveBaseElement: 'body',
    navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
    responsive: {
      0: {
        items: 1,
        slideBy: 1
      },
      768: {
        items: 1,
        slideBy: 1
      },
      998: {
        items: 2
      },
      1200: {
        items: 2
      }
    }
  });

  //console.log('WWW===>>' + $(window).width());
  if ($(window).width() <= 992) {
    $(".mobile-cloud-button, .dropdown-toggle").click(function () {
      if ($(this).hasClass('show')) {
        $(this).find('.mobile-arrow').hide();
        $(this).find('.mobile-minus-arrow').show();
      }
      else {
        $(this).find('.mobile-arrow').show();
        $(this).find('.mobile-minus-arrow').hide();
      }
    });

    /*$('.desktop-src').click(function(){
      console.log('clicked');
      $('#searchOverlay').show();
    });*/

//     // Get elements
// const searchButton = document.querySelector('.mobile-src');
// const searchOverlay = document.getElementById('searchOverlay');
// const closeSearch = document.getElementById('closeSearch');

// // Open search overlay
// searchButton.addEventListener('click', function() {
//     searchOverlay.classList.add('active');
//     document.querySelector('.search-input').focus();
// });

// // Close search overlay
// closeSearch.addEventListener('click', function() {
//     searchOverlay.classList.remove('active');
// });

  }
  $.urlParam = function (name) {
    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    return results[1] || 0;
  }

  var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
      sURLVariables = sPageURL.split('&'),
      sParameterName,
      i;

    for (i = 0; i < sURLVariables.length; i++) {
      sParameterName = sURLVariables[i].split('=');

      if (sParameterName[0] === sParam) {
        return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
      }
    }
    return false;
  };


  var pos = getUrlParameter('pos');

  //console.log($('#prod').offset());
  //console.log($('#infra').offset());

  if (pos == 'infrastructure-engineering') {
    $(document).scrollTop($('#infra').offset().top - 125);
  } else if (pos == 'product-engineering') {
    $(document).scrollTop($('#prod').offset().top - 125);
  }

 if(window.location.pathname.split('/')[1] == 'job'){
    setTimeout(function(){
        $(document).scrollTop($('.job-container').offset().top - 110);    
    },1000);
    
 }


 $('#show_more_jobs').on('click', function () {
  console.log('show more jobs');
  var count = $(this).data('count');
  $('#job_post_thumb_' + ++count).fadeIn();
  $('#job_post_thumb_' + ++count).fadeIn();
  $(this).data('count', count);
  if ($(this).data('total') <= count) {
    $(this).fadeOut();
    $('#hide_more_jobs').fadeIn();
  }
  let sess_temp = sessionStorage.getItem('show_more_clicked');
  sessionStorage.setItem('show_more_clicked', ++sess_temp);
  console.log('show_more ==> ' + sessionStorage.getItem('show_more_clicked'));
}); 

$('#hide_more_jobs').on('click', function () {
    sessionStorage.setItem('show_more_clicked', 0);
    $('.show_hide').fadeOut();
    $(this).hide();
    $('#show_more_jobs').data('count', 2).fadeIn();
});

$('.job-apply-btn').on('click',function(e){
    sessionStorage.setItem('job_thumb_clicked','#' + $(this).parent().parent().attr('id'));
});

if($('#show_more_jobs').length > 0) {
    console.log('Show more exists');
    console.log(sessionStorage.getItem('show_more_clicked'));
    const prev_show_more_clicked = parseInt(sessionStorage.getItem('show_more_clicked'));
    sessionStorage.setItem('show_more_clicked',0);
    for(var i=1 ; i<=prev_show_more_clicked; i++){
        console.log('show more clicked');
        $('#show_more_jobs').trigger('click');
    }
    console.log(sessionStorage.getItem('job_thumb_clicked'));
    if(sessionStorage.getItem('job_thumb_clicked')){
      $(document).scrollTop($(sessionStorage.getItem('job_thumb_clicked')).offset().top - 110);  
    }
    
}


});

// Get elements
let searchButton = null;
if ($(window).width() <= 992) { 
  searchButton = document.querySelector('.mobile-src');
  console.log('mobile fired .. ');
} else {
  searchButton = document.querySelector('.desktop-src');
  console.log('desktop fired .. ');
}

const searchOverlay = document.getElementById('searchOverlay');
const closeSearch = document.getElementById('closeSearch');
const bodyElement = document.querySelector('body');

// Open search overlay
searchButton.addEventListener('click', function() {
    searchOverlay.classList.add('active');
    bodyElement.classList.add('overflow-hidden');
    document.querySelector('.search-input').focus();
});

// Close search overlay
closeSearch.addEventListener('click', function() {
    searchOverlay.classList.remove('active');
    bodyElement.classList.remove('overflow-hidden');
});

// Close search overlay on ESC key
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        searchOverlay.classList.remove('active');
        bodyElement.classList.remove('overflow-hidden');
    }
});


document.addEventListener('DOMContentLoaded', function () {
    var pageNameField = document.querySelector('[name="page_name"]');
    if (pageNameField) {
        //let page_name = window.location.pathname.trim().replace(/\//g, "").replace('-'," ");
        let split_path_name = window.location.pathname.split('/')[1];
        if(split_path_name !== ''){
            let menu_link_text = '';
            if( split_path_name == 'contact-us'){
              pageNameField.value="Contact Us Page";
            } else {
                try{
                  menu_link_text = document.querySelector('.nav-link.active').innerText;
                } catch(e){
                  console.log(e);
                  menu_link_text = document.querySelector('.dropdown-item.active').innerText;
                }
              
              pageNameField.value = menu_link_text.trim() + ' Page';  
            }
            
        } else {
            pageNameField.value="Home Page";
        }
        console.log(pageNameField.value);
    }

    let phoneInput = document.querySelector('.wpcf7-tel');

    phoneInput.addEventListener('input', function () {
        this.value = this.value.replace(/\D/g, ''); // Remove non-digits
    });


    // let emailInput = document.querySelector('.wpcf7-email');
    // let form = document.querySelector('.wpcf7-form');
    // let emailValid = false;
    // let emailErrorMessage = "Please enter a valid email address.";

    // function getOrCreateCF7ErrorSpan() {
    //     let parentDiv = emailInput.closest('.wpcf7-form-control-wrap');
    //     let errorSpan = parentDiv.querySelector('.wpcf7-not-valid-tip');

    //     if (!errorSpan) {
    //         errorSpan = document.createElement('span');
    //         errorSpan.classList.add('wpcf7-not-valid-tip');
    //         parentDiv.appendChild(errorSpan);
    //     }
    //     return errorSpan;
    // }

    // function setCF7ErrorMessage(message) {
    //     let errorSpan = getOrCreateCF7ErrorSpan();

    //     if (message) {
    //         errorSpan.innerText = message; // Replace default CF7 error message
    //         errorSpan.style.display = "block";
    //     } else {
    //         errorSpan.style.display = "none"; // Hide if no error
    //     }
    // }

    // emailInput.addEventListener('input', function () {
    //     let email = emailInput.value.trim();
    //     if (email.includes("@")) {
    //         let domain = email.split("@").pop();
    //         const invalidPattern = /(.)\1{3,}/;

    //         if(!invalidPattern.test(domain)){
    //             fetch(`/wp-json/custom/v1/validate-email?domain=${domain}`)
    //             .then(response => response.json())
    //             .then(data => {
    //                 if (data.valid) {
    //                     emailValid = true;
    //                     setCF7ErrorMessage(""); // Clear error
    //                 } else {
    //                     emailValid = false;
    //                     setCF7ErrorMessage(emailErrorMessage);
    //                 }
    //             })
    //             .catch(error => {
    //                 emailValid = false;
    //                 setCF7ErrorMessage(emailErrorMessage);
    //             });
    //         } else {
    //             emailValid = false;
    //             setCF7ErrorMessage(emailErrorMessage);
    //         }
            
    //     }
    // });

    // // Prevent form submission if email is invalid
    // document.addEventListener('wpcf7beforesubmit', function (event) { 
    //     console.log('Submit');
    //     if (!emailValid && emailInput.value.trim() !=='') {
    //         console.log('invalid email');
    //         event.preventDefault();
    //         event.stopImmediatePropagation();
    //         event.detail.apiResponse = { status: 'aborted', message: 'Submission stopped.' };
    //         setCF7ErrorMessage(emailErrorMessage);
    //         emailInput.dispatchEvent(new Event("input")); // Trigger validation
    //     }
    // }, false);

    // // Keep error visible after focus change
    // emailInput.addEventListener('blur', function () {
    //     if(!emailValid){
    //       setCF7ErrorMessage(emailErrorMessage);
    //     }
    // });

    // // Keep error visible after focus change
    // emailInput.addEventListener('focus', function () {
    //     if(!emailValid){
    //       setCF7ErrorMessage(emailErrorMessage);
    //     }
    // });



    document.addEventListener('wpcf7mailsent', function () {
        showCF7Popup("Thank you for your interest.<br/>A NexTurner will reach out to you soon.", "success");
    });

    document.addEventListener('wpcf7invalid', function () {
        showCF7Popup("Please fill in all required fields correctly.", "error");
    });

    document.addEventListener('wpcf7mailfailed', function () {
        showCF7Popup("Oops! Something went wrong.Please try again later.", "error");
    });

    function showCF7Popup(message, type) {

        let modalMessage = document.getElementById("cf7ModalMessage");
        let modalTitle = document.getElementById("cf7ModalLabel");
        let modalIcon = document.getElementById("cf7ModalIcon");

        modalMessage.innerHTML = message;
        modalTitle.innerHTML = type === "success" ? "Success" : "Error";

        // Clear previous icon
        modalIcon.innerHTML = type === "success" ? getSuccessSVG() : getErrorSVG();

        let modal = new bootstrap.Modal(document.getElementById('cf7SuccessModal'));
        modal.show();
    }

    function getSuccessSVG() {
        return `
            <svg width="100" height="100" viewBox="0 0 100 100">
                <circle cx="50" cy="50" r="40" stroke="#28a745" stroke-width="5" fill="none"/>
                <polyline points="30,50 45,65 70,35" stroke="#28a745" stroke-width="5" fill="none"
                    stroke-linecap="round" stroke-linejoin="round"
                    style="stroke-dasharray: 100; stroke-dashoffset: 100; animation: draw 0.8s ease forwards;"/>
            </svg>
        `;
    }

    function getErrorSVG() {
        return `
            <svg width="100" height="100" viewBox="0 0 100 100">
                <circle cx="50" cy="50" r="40" stroke="#dc3545" stroke-width="5" fill="none"/>
                <line x1="35" y1="35" x2="65" y2="65" stroke="#dc3545" stroke-width="5" stroke-linecap="round"
                    style="stroke-dasharray: 50; stroke-dashoffset: 50; animation: draw 0.5s ease forwards;"/>
                <line x1="65" y1="35" x2="35" y2="65" stroke="#dc3545" stroke-width="5" stroke-linecap="round"
                    style="stroke-dasharray: 50; stroke-dashoffset: 50; animation: draw 0.5s ease forwards;"/>
            </svg>
        `;
    }
});

jQuery(document).ready(function($) {
  const $input = $('#live-search-input');
  const $results = $('#autocomplete-results');
  let debounceTimer;
  let currentFocus = -1;

  $input.on('input', function() {
    clearTimeout(debounceTimer);
    const term = $(this).val().trim();

    if (term.length < 2) {
      $results.empty().hide();
      return;
    }

    debounceTimer = setTimeout(() => {
      $.ajax({
        url: NEXTURN_AJAX.ajax_url,
        data: {
          action: 'live_search',
          term: term
        },
        success: function(data) {
              $results.empty();
              currentFocus = -1;

              if (data.length) {
                data.forEach(item => {
                  $results.append(`
                    <a href="${item.link}" class="list-group-item list-group-item-action">
                      <div class="fw-bold">${item.title}</div>
                      <small class="text-muted d-block">${item.excerpt}</small>
                    </a>
                  `);
                });
                $results.show();
              } else {
                $results.append('<div class="list-group-item disabled">No results found</div>').show();
              }
            }
      });
    }, 300);
  });

  // Keyboard nav
  $input.on('keydown', function(e) {
    const $items = $results.find('a');

    if (!$items.length) return;

    if (e.key === 'ArrowDown') {
      currentFocus++;
      if (currentFocus >= $items.length) currentFocus = 0;
      setActive($items);
      e.preventDefault();
    } else if (e.key === 'ArrowUp') {
      currentFocus--;
      if (currentFocus < 0) currentFocus = $items.length - 1;
      setActive($items);
      e.preventDefault();
    } else if (e.key === 'Enter') {
      if (currentFocus > -1) {
        $items.eq(currentFocus)[0].click(); // Native click to follow link
        e.preventDefault();
      }
    }
  });

  $input.on('focus', function () {
      const val = $(this).val().trim();

      if (val.length >= 2 && $results.children().length) {
        $results.show();
      }
    });
  
  function setActive($items) {
    $items.removeClass('active');
    if (currentFocus >= 0 && currentFocus < $items.length) {
      $items.eq(currentFocus).addClass('active');
    }
  }

  $(document).on('click', function(e) {
    if (!$(e.target).closest('#live-search-form').length) {
      $results.hide();
      currentFocus = -1;
    }
  });
});

// Intersection Observer to detect when elements are in viewport
const observerOptions = {
  root: null, // use viewport as root
  rootMargin: '0px',
  threshold: 0.1 // trigger animation when 10% of element is visible
};

const observer = new IntersectionObserver((entries, observer) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('visible');
      observer.unobserve(entry.target); // stop observing once animation is triggered
    }
  });
}, observerOptions);

// Observe all elements with animation classes
document.addEventListener('DOMContentLoaded', () => {
  const animatedElements = document.querySelectorAll('.animate-on-scroll, .fade-in, .slide-in-left, .slide-in-right, .scale-in');

  animatedElements.forEach(element => {
    observer.observe(element);
  });
});

const multipleItemCarousel = document.querySelector("#testimonialCarousel");

if(typeof multipleItemCarousel != 'undefined' && multipleItemCarousel != null ){
    if (window.matchMedia("(min-width:576px)").matches) {
      const carousel = new bootstrap.Carousel(multipleItemCarousel, {
        interval: false
      });

      var carouselWidth = $(".carousel-inner")[0].scrollWidth;
      var cardWidth = $(".carousel-item").width();

      var scrollPosition = 0;

      $(".carousel-control-next").on("click", function () {
        if (scrollPosition < carouselWidth - cardWidth * 3) {
          console.log("next");
          scrollPosition = scrollPosition + cardWidth;
          $(".carousel-inner").animate({ scrollLeft: scrollPosition }, 800);
        }
      });
      $(".carousel-control-prev").on("click", function () {
        if (scrollPosition > 0) {
          scrollPosition = scrollPosition - cardWidth;
          $(".carousel-inner").animate({ scrollLeft: scrollPosition }, 800);
        }
      });


    } else {
      $(multipleItemCarousel).addClass("slide");
    }

    // $('#testimonialCarousel').on('slid.bs.carousel', function () {
    //    // Get the currently active slide
    //    curSlide = $('.active');

    //    // Hide or disable the "prev" button
    //    if (curSlide.is(':first-child')) {
    //      $('.carousel-control-prev').hide(); // Or .prop('disabled', true)
    //    } else {
    //      $('.carousel-control-prev').show(); // Or .prop('disabled', false)
    //    }

    //    // Hide or disable the "next" button
    //    if (curSlide.is(':last-child')) {
    //      $('.carousel-control-next').hide(); // Or .prop('disabled', true)
    //    } else {
    //      $('.carousel-control-next').show(); // Or .prop('disabled', false)
    //    }
    //  });

}