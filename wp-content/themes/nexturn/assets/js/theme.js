var $ = jQuery.noConflict();

$(document).ready(function () {
    let searchButton = null;
    const searchOverlay = document.getElementById('searchOverlay');
    const closeSearch = document.getElementById('closeSearch');
    const bodyElement = document.querySelector('body');

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

    initResponsiveElements();

    $(window).resize(initResponsiveElements);

    //console.log('WWW===>>' + $(window).width());

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

    if (window.location.pathname.split('/')[1] == 'job') {
        setTimeout(function () {
            $(document).scrollTop($('.job-container').offset().top - 110);
        }, 1000);

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

    $('.job-apply-btn').on('click', function (e) {
        sessionStorage.setItem('job_thumb_clicked', '#' + $(this).parent().parent().attr('id'));
    });

    if ($('#show_more_jobs').length > 0) {
        console.log('Show more exists');
        console.log(sessionStorage.getItem('show_more_clicked'));
        const prev_show_more_clicked = parseInt(sessionStorage.getItem('show_more_clicked'));
        sessionStorage.setItem('show_more_clicked', 0);
        for (var i = 1; i <= prev_show_more_clicked; i++) {
            console.log('show more clicked');
            $('#show_more_jobs').trigger('click');
        }
        console.log(sessionStorage.getItem('job_thumb_clicked'));
        if (sessionStorage.getItem('job_thumb_clicked')) {
            $(document).scrollTop($(sessionStorage.getItem('job_thumb_clicked')).offset().top - 110);
        }

    }


    function initResponsiveElements() {
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
        }

        if ($(window).width() <= 992) {
            searchButton = document.querySelector('.mobile-src');
        } else {
            searchButton = document.querySelector('.desktop-src');
        }

        // Open search overlay
        searchButton.addEventListener('click', function () {
            searchOverlay.classList.add('active');
            bodyElement.classList.add('overflow-hidden');
            document.querySelector('.search-input').focus();
        });

        // Close search overlay
        closeSearch.addEventListener('click', function () {
            searchOverlay.classList.remove('active');
            bodyElement.classList.remove('overflow-hidden');
        });

        // Close search overlay on ESC key
        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') {
                searchOverlay.classList.remove('active');
                bodyElement.classList.remove('overflow-hidden');
            }
        });
    }

});

// Get elements


document.addEventListener('DOMContentLoaded', function () {
    var pageNameField = document.querySelector('[name="page_name"]');
    //console.log(window.location);
    if (pageNameField) {
        let slug = '';
        let split_path_name = window.location.pathname.split('/');
        if (window.location.host == 'localhost') {
            slug = split_path_name[2]; // For Localhost only
        } else {
            slug = split_path_name[1]; // For Live Domain
        }

        if (slug !== '') {
            let menu_link_text = '';
            if (slug == 'contact-us') {
                pageNameField.value = "Contact Us Page";
            } else {
                try {
                    menu_link_text = document.querySelector('.nav-link.active').innerText;
                } catch (e) {
                    console.log(e);
                    menu_link_text = document.querySelector('.dropdown-item.active').innerText;
                }

                pageNameField.value = menu_link_text.trim() + ' Page';
            }

        } else {
            pageNameField.value = "Home Page";
        }
        console.log(pageNameField.value);
    }

    const telInputs = document.querySelectorAll("input[type='tel']");

    telInputs.forEach(function (input) {
        const fieldName = input.getAttribute('name');
        const codeField = document.querySelector(`input[name='${fieldName}_code']`);

        if (codeField) {
            const iti = window.intlTelInput(input, {
                initialCountry: "auto",
                geoIpLookup: function (callback) {
                    fetch('https://ipapi.co/json/')
                        .then(res => res.json())
                        .then(data => {
                            callback(data.country_code || "us");
                        })
                        .catch(() => {
                            callback("us");
                        });
                },
                separateDialCode: true,
                dropdownContainer: document.querySelector('.contact_form_modal'),
                utilsScript: NEXTURN_VARS.asset_uri + 'vendors/intl-tel-input/js/utils.js'
            });

            // Set on initial load
            setTimeout(() => {
                const countryData = iti.getSelectedCountryData();
                if (countryData && countryData.dialCode) {
                    codeField.value = countryData.dialCode;
                }
                console.log(codeField.value);
            }, 500);

            input.addEventListener('input', function () {
                this.value = this.value.replace(/\D/g, ''); // Remove non-digits
            });

            // Set on manual country change
            input.addEventListener('countrychange', function () {
                const countryData = iti.getSelectedCountryData();
                if (countryData && countryData.dialCode) {
                    codeField.value = countryData.dialCode;
                }
                console.log(codeField.value);
            });
        }
    });

    $('.wpcf7-tel').focus(function () {
        $('.iti__selected-dial-code').css('color', '#000');
    });
    $('.wpcf7-tel').blur(function () {
        $('.iti__selected-dial-code').css('color', 'inherit');
    });


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

$('.wpcf7-form').on('submit', function () {
    $(this).find('.wpcf7-submit').attr('disabled', true);
});

$('.wpcf7').on('wpcf7submit', function (e) {
    $(this).find('.wpcf7-submit').removeAttr('disabled');
});

jQuery(document).ready(function ($) {
    const $input = $('#live-search-input');
    const $results = $('#autocomplete-results');
    let debounceTimer;
    let currentFocus = -1;

    $input.on('input', function () {
        clearTimeout(debounceTimer);
        const term = $(this).val().trim();

        if (term.length < 2) {
            $results.empty().hide();
            return;
        }

        debounceTimer = setTimeout(() => {
            $.ajax({
                url: NEXTURN_VARS.ajax_url,
                data: {
                    action: 'live_search',
                    term: term
                },
                success: function (data) {
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
    $input.on('keydown', function (e) {
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

    $(document).on('click', function (e) {
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

if (typeof multipleItemCarousel != 'undefined' && multipleItemCarousel != null) {
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

}
//solutions
(function () {
    // Create observer only if supported
    let observer;
    if ('IntersectionObserver' in window) {
        observer = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate');
                    obs.unobserve(entry.target);
                }
            });
        }, {
            root: null,
            rootMargin: '0px',
            threshold: 0.1
        });
    }

    function animateOnScroll() {
        const elements = document.querySelectorAll('.scroll-animate');
        elements.forEach((el, index) => {
            // set stagger delay if not provided
            if (!el.style.getPropertyValue('--delay')) {
                el.style.setProperty('--delay', `${index * 0.08}s`);
            }

            // Use IntersectionObserver if available
            if (observer) {
                observer.observe(el);
                return;
            }

            // Fallback: simple viewport check and stagger
            const rect = el.getBoundingClientRect();
            const elementVisible = 150;
            if (rect.top < window.innerHeight - elementVisible) {
                setTimeout(() => el.classList.add('animate'), index * 100);
            }
        });
    }

    // Run on DOM ready and attach scroll fallback if observer is not available
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', () => {
            animateOnScroll();
            if (!observer) window.addEventListener('scroll', animateOnScroll);
        });
    } else {
        animateOnScroll();
        if (!observer) window.addEventListener('scroll', animateOnScroll);
    }
})();

/* Solutions Page Animations */
(function () {
    // Initialize scroll animations
    function initSolutionsAnimations() {
        // Intersection Observer for scroll animations
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate');
                }
            });
        }, {
            threshold: 0.1
        });

        document.querySelector('.btn-signup').addEventListener('click', function (e) {
            e.preventDefault();

            const email = document.querySelector('input[type="email"]').value;
            console.log('email==>', email)
            if (email) {
                alert('Thank you for signing up! We\'ll be in touch soon.');
                document.querySelector('input[type="email"]').value = '';
            } else {
                alert('Please enter a valid email address.');
            }
        });
        // Observe all scroll-animate elements
        document.querySelectorAll('.scroll-animate').forEach(el => {
            observer.observe(el);
        });

        // Add stagger delays to elements
        document.querySelectorAll('.stagger-animate').forEach((el, index) => {
            el.style.setProperty('--delay', `${index * 0.1}s`);
        });

        // Initialize solution cards hover effects
        document.querySelectorAll('.solution-card').forEach(card => {
            card.addEventListener('mouseenter', function () {
                this.querySelector('.card-image').style.transform = 'scale(1.05)';
            });
            card.addEventListener('mouseleave', function () {
                this.querySelector('.card-image').style.transform = 'scale(1)';
            });
        });

        document.querySelectorAll('.learn-more-btn').forEach(btn => {
            btn.addEventListener('click', function (e) {
                e.preventDefault(); // stop immediate navigation
                const url = this.href; // get the link
                const originalText = this.innerHTML;

                this.innerHTML = '<i class="fa-solid fa-spinner fa-spin me-2"></i> Loading...';

                setTimeout(() => {
                    window.location.href = url; // go to the link after 1.5s
                    this.innerHTML = originalText; // optional, reset text
                }, 1500);
            });
        });


        // Partner logos animation
        document.querySelectorAll('.partner-logo').forEach(logo => {
            logo.addEventListener('mouseenter', function () {
                this.style.transform = 'scale(1.1) rotate(2deg)';
            });
            logo.addEventListener('mouseleave', function () {
                this.style.transform = 'scale(1) rotate(0deg)';
            });
        });
    }

    // Run on DOM ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initSolutionsAnimations);
    } else {
        initSolutionsAnimations();
    }
})();



