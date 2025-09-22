<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <?php wp_head(); ?>
    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-TSS74GRH62"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-TSS74GRH62');
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>

<body>
    <?php wp_body_open(); ?>
    <!-- Navigation
    <nav
        class="navbar navbar-expand-lg navbar-dark fixed-top <?php //if ( is_admin_bar_showing() ) { echo 'admin-step'; } ?>">
        <div class="container">
            <a class="navbar-brand" href="<?php //echo site_url(); ?>">
                <img src="<?php //echo get_template_directory_uri() . '/assets/images/nexturn-logo.svg'; ?>"
                    >
            </a>
            <div class="mobile-header-right">
                <button class="btn px-2 mobile-src">
                    <svg width="22" height="22" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M17 17L13.1396 13.1396M13.1396 13.1396C13.7999 12.4793 14.3237 11.6953 14.6811 10.8326C15.0385 9.96978 15.2224 9.04507 15.2224 8.11121C15.2224 7.17735 15.0385 6.25264 14.6811 5.38987C14.3237 4.5271 13.7999 3.74316 13.1396 3.08283C12.4793 2.42249 11.6953 1.89868 10.8326 1.54131C9.96978 1.18394 9.04507 1 8.11121 1C7.17735 1 6.25264 1.18394 5.38987 1.54131C4.5271 1.89868 3.74316 2.42249 3.08283 3.08283C1.74921 4.41644 1 6.2252 1 8.11121C1 9.99722 1.74921 11.806 3.08283 13.1396C4.41644 14.4732 6.2252 15.2224 8.11121 15.2224C9.99722 15.2224 11.806 14.4732 13.1396 13.1396Z"
                            stroke="white" stroke-opacity="0.9" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg></span>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
            </div>
            <div class="collapse navbar-collapse" id="navbarNav">
                <?php //get_template_part('template','primary-menu'); ?>
                <button class="btn px-2 desktop-src"><svg width="22" height="22" viewBox="0 0 18 18" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M17 17L13.1396 13.1396M13.1396 13.1396C13.7999 12.4793 14.3237 11.6953 14.6811 10.8326C15.0385 9.96978 15.2224 9.04507 15.2224 8.11121C15.2224 7.17735 15.0385 6.25264 14.6811 5.38987C14.3237 4.5271 13.7999 3.74316 13.1396 3.08283C12.4793 2.42249 11.6953 1.89868 10.8326 1.54131C9.96978 1.18394 9.04507 1 8.11121 1C7.17735 1 6.25264 1.18394 5.38987 1.54131C4.5271 1.89868 3.74316 2.42249 3.08283 3.08283C1.74921 4.41644 1 6.2252 1 8.11121C1 9.99722 1.74921 11.806 3.08283 13.1396C4.41644 14.4732 6.2252 15.2224 8.11121 15.2224C9.99722 15.2224 11.806 14.4732 13.1396 13.1396Z"
                            stroke="white" stroke-opacity="0.9" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg></button>
                <a href="<?php //echo site_url('contact-us');?>" class="btn btn-contact ms-lg-3">Contact Us</a>
            </div>
        </div>
    </nav> -->

    <!-- Navigation -->
    <nav
        class="navbar navbar-expand-lg navbar-dark fixed-top <?php if ( is_admin_bar_showing() ) { echo ' admin-step'; } ?>">
        <div class="container">
            <a class="navbar-brand" href="<?php echo site_url(); ?>">
             <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/site_logo-scaled.png' ); ?>" alt="Site Logo" />
				
				<!-- <svg width="100%" height="29" viewBox="0 0 186 29" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M55.7866 0.962158H52.7642L61.2586 14.0078C61.2589 14.0073 62.1015 13.0206 62.935 12.0732L55.7866 0.962158Z" fill="white"/>
<path d="M73.9207 28.7309L65.4889 15.801L63.6658 17.8479L70.8979 28.7309H73.9207Z" fill="white"/>
<path d="M31.9295 15.699H46.3462V13.3449H31.9295V3.14001H47.9532V0.786255H29.3069V28.4487H48.5293V26.0943H31.9295V15.699Z" fill="white"/>
<path d="M78.2988 3.14001H86.8256V28.4487H89.4482V3.14001H98.057V0.786255H78.2988V3.14001Z" fill="white"/>
<path d="M122.207 19.0071C122.207 20.5044 121.866 21.8262 121.195 22.9356C120.526 24.0423 119.596 24.9047 118.429 25.4991C117.258 26.0967 115.901 26.3997 114.394 26.3997C112.914 26.3997 111.571 26.0963 110.401 25.4988C109.235 24.9052 108.312 24.0435 107.657 22.9371C106.998 21.8276 106.665 20.5053 106.665 19.007V0.786255H104.042V19.1217C104.042 21.098 104.499 22.8278 105.401 24.2629C106.304 25.7026 107.557 26.8239 109.124 27.5957C110.685 28.3645 112.458 28.7543 114.394 28.7543C116.359 28.7543 118.146 28.3645 119.705 27.5957C121.272 26.8249 122.524 25.7039 123.429 24.2636C124.331 22.8271 124.789 21.0971 124.789 19.1219V0.786255H122.207L122.207 19.0071Z" fill="white"/>
<path d="M19.4631 23.4131L2.55049 0.779602H0V28.4799H2.84433L2.80069 5.92812L19.6758 28.1843L19.8895 28.4799H22.2166V0.779602H19.4191L19.4631 23.4131Z" fill="white"/>
<path d="M178.202 0.779175L178.247 23.4127L161.333 0.779175H158.783V28.4795H161.627L161.584 5.92769L178.459 28.1839L178.673 28.4795H181V0.779175H178.202Z" fill="white"/>
<path d="M146.65 16.4106L146.667 16.4061C148.455 15.7747 149.796 14.751 150.652 13.3631C151.499 11.9919 151.927 10.4359 151.927 8.73891C151.927 6.98201 151.458 5.48839 150.532 4.29971C149.612 3.11797 148.405 2.22624 146.946 1.64813C145.5 1.07609 143.97 0.786255 142.399 0.786255H130.775V28.4487H133.397V17.073H141.923L150.347 28.1827L150.561 28.4796H153.616L145.138 16.7693L146.65 16.4106ZM149.264 8.81493C149.264 10.4174 148.713 11.8197 147.628 12.9834C146.553 14.1354 144.711 14.7195 142.153 14.7195H133.397V3.14019H142.687C144.001 3.14019 145.172 3.39809 146.166 3.90696C147.154 4.41356 147.926 5.10952 148.459 5.97608C148.993 6.84577 149.264 7.80084 149.264 8.81493Z" fill="white"/>
<path d="M73.7115 0.821214C73.6463 0.776263 73.5703 0.754051 73.4946 0.754399C73.4006 0.754746 73.3073 0.789627 73.236 0.85714L67.243 7.18549L61.9641 12.7176L62.0293 12.7708C61.9894 12.8214 61.9495 12.8717 61.9108 12.9213C61.9591 12.8767 62.0111 12.838 62.0624 12.7983L62.0628 12.7986L61.9068 12.9262C61.5517 13.3811 61.2585 13.7802 61.2579 13.7811L52.8412 28.0907C52.7637 28.2466 52.8135 28.4347 52.9605 28.5357C53.0257 28.5805 53.1017 28.6027 53.1774 28.6026C53.2718 28.6019 53.365 28.5675 53.436 28.5002L62.7889 18.6337L65.1015 16.2213L65.3323 15.9761L65.3055 15.9545L65.4898 15.7583C65.5192 15.7169 65.5446 15.6789 65.5542 15.6598L73.8304 1.26621C73.9081 1.11001 73.8581 0.922223 73.7115 0.821214ZM63.4812 16.6458C63.7826 16.6449 64.083 16.5852 64.3633 16.4686L54.9807 26.2563L62.2171 16.2692C62.1209 16.2069 62.9291 16.6479 63.4812 16.6458ZM53.428 28.3992L53.4291 28.3976L53.4473 28.3787L53.428 28.3992ZM64.9362 15.7933C64.5562 16.1876 64.0389 16.406 63.4794 16.4079C62.969 16.41 62.4816 16.226 62.107 15.8902C61.298 15.1643 61.2497 13.9411 62.0003 13.1619C62.3802 12.7675 62.8979 12.5492 63.4567 12.5477C63.9674 12.5456 64.4549 12.7295 64.8298 13.065C65.2216 13.4163 65.4487 13.8936 65.4688 14.409C65.4892 14.9241 65.2999 15.4153 64.9362 15.7933ZM64.8148 12.7563C64.4111 12.4623 63.9348 12.3076 63.4556 12.309C63.2119 12.3099 62.97 12.3515 62.7387 12.4298L71.9269 2.80079L64.8148 12.7563Z" fill="white"/>
</svg> -->

            </a>
            <div class="mobile-header-right">
                 <button class="btn px-2 mobile-src">
                    <svg width="22" height="22" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M17 17L13.1396 13.1396M13.1396 13.1396C13.7999 12.4793 14.3237 11.6953 14.6811 10.8326C15.0385 9.96978 15.2224 9.04507 15.2224 8.11121C15.2224 7.17735 15.0385 6.25264 14.6811 5.38987C14.3237 4.5271 13.7999 3.74316 13.1396 3.08283C12.4793 2.42249 11.6953 1.89868 10.8326 1.54131C9.96978 1.18394 9.04507 1 8.11121 1C7.17735 1 6.25264 1.18394 5.38987 1.54131C4.5271 1.89868 3.74316 2.42249 3.08283 3.08283C1.74921 4.41644 1 6.2252 1 8.11121C1 9.99722 1.74921 11.806 3.08283 13.1396C4.41644 14.4732 6.2252 15.2224 8.11121 15.2224C9.99722 15.2224 11.806 14.4732 13.1396 13.1396Z"
                            stroke="white" stroke-opacity="0.9" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </button>
                <!-- Search Overlay -->
<div class="search-overlay" id="searchOverlay">
    <button class="close-search" id="closeSearch">&times;</button>
    
    <div class="search-container">
        <form id="live-search-form" class="search-form" method="get" action="<?php echo esc_url(home_url('/')); ?>">
            <input type="text" name="s" id="live-search-input" class="search-input" placeholder="Search..." value="<?php the_search_query(); ?>" autofocus/>
            <button type="submit" class="search-submit">
                <svg width="22" height="22" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17 17L13.1396 13.1396M13.1396 13.1396C13.7999 12.4793 14.3237 11.6953 14.6811 10.8326C15.0385 9.96978 15.2224 9.04507 15.2224 8.11121C15.2224 7.17735 15.0385 6.25264 14.6811 5.38987C14.3237 4.5271 13.7999 3.74316 13.1396 3.08283C12.4793 2.42249 11.6953 1.89868 10.8326 1.54131C9.96978 1.18394 9.04507 1 8.11121 1C7.17735 1 6.25264 1.18394 5.38987 1.54131C4.5271 1.89868 3.74316 2.42249 3.08283 3.08283C1.74921 4.41644 1 6.2252 1 8.11121C1 9.99722 1.74921 11.806 3.08283 13.1396C4.41644 14.4732 6.2252 15.2224 8.11121 15.2224C9.99722 15.2224 11.806 14.4732 13.1396 13.1396Z" stroke="white" stroke-opacity="0.9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </button>
            <div id="autocomplete-results" class="list-group position-absolute w-100" style="z-index: 9999;"></div>
        </form>
    </div>
</div>
                    <button class="navbar-toggler border-0 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
            </div>
            <div class="collapse navbar-collapse  header-mobile-menu" id="navbarNav">
                <?php get_template_part('template','primary-menu'); ?>
            </div>
        </div>
    </nav>