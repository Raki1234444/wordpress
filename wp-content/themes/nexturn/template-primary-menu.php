<!-- <ul class="navbar-nav ms-auto">
    <li class="nav-item">
        <a class="nav-link active" href="#">Home <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                class="mobile-arrow" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.079 7.5L6.286 13.292L7 14L14 7L7 0L6.286 0.708L12.08 6.5H0V7.5H12.079Z" fill="white" />
            </svg></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">Cloud <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                class="mobile-arrow" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.079 7.5L6.286 13.292L7 14L14 7L7 0L6.286 0.708L12.08 6.5H0V7.5H12.079Z" fill="white" />
            </svg></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">Data & AI <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                class="mobile-arrow" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.079 7.5L6.286 13.292L7 14L14 7L7 0L6.286 0.708L12.08 6.5H0V7.5H12.079Z" fill="white" />
            </svg></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">Salesforce <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                class="mobile-arrow" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.079 7.5L6.286 13.292L7 14L14 7L7 0L6.286 0.708L12.08 6.5H0V7.5H12.079Z" fill="white" />
            </svg></a>

    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">Oracle <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                class="mobile-arrow" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.079 7.5L6.286 13.292L7 14L14 7L7 0L6.286 0.708L12.08 6.5H0V7.5H12.079Z" fill="white" />
            </svg></a>

    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">About Us <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                class="mobile-arrow" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.079 7.5L6.286 13.292L7 14L14 7L7 0L6.286 0.708L12.08 6.5H0V7.5H12.079Z" fill="white" />
            </svg></a>

    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">Careers
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" class="mobile-arrow"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M12.079 7.5L6.286 13.292L7 14L14 7L7 0L6.286 0.708L12.08 6.5H0V7.5H12.079Z" fill="white" />
            </svg>



        </a>
    </li>
</ul> -->

<?php
/*if (has_nav_menu('primary_menu')):
    $args = array(
        'container' => false,
        'container_class' => false,
        'menu_class' => 'navbar-nav ms-auto',
        'menu_id' => 'primaryMenu',
        'theme_location' => 'primary_menu',
        'add_li_class' => 'nav-item',
        'add_anchor_class' => 'nav-link',
        'link_after' => '<svg width="14" height="14" viewBox="0 0 14 14" fill="none" class="mobile-arrow" xmlns="http://www.w3.org/2000/svg">
            <path d="M12.079 7.5L6.286 13.292L7 14L14 7L7 0L6.286 0.708L12.08 6.5H0V7.5H12.079Z" fill="white" />
        </svg>',
        'walker' => new WP_Bootstrap_Navwalker(),
    );
    wp_nav_menu($args);
endif;*/
?>
<?php
global $post;
$post_slug = $post->post_name;
?>
<ul class="navbar-nav ms-auto ">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle<?php echo $post_slug == 'cloud-engineering' ? ' active' : '' ?>"
            href="<?php echo site_url('cloud-engineering') ?>">Cloud
            <!-- <svg width="14" height="14" viewBox="0 0 14 14"
                fill="none" class="mobile-arrow" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.079 7.5L6.286 13.292L7 14L14 7L7 0L6.286 0.708L12.08 6.5H0V7.5H12.079Z" fill="white" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14"
                class="mobile-minus-arrow">
                <path id="generated-svg-image" d="M12.079,7.5,6.286,13.292,7,14l7-7L7,0,6.286.708,12.08,6.5H0v1Z"
                    transform="translate(14) rotate(90)" fill="#fff" />
            </svg> -->
        </a>
        <a class="mobile-cloud-button" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <svg width="14" height="14" class="mobile-arrow" viewBox="0 0 14 14" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 6V0H8V6H14V8H8V14H6V8H0V6H6Z" fill="white" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="3" viewBox="0 0 14 3"
                    class="mobile-minus-arrow">
                    <path id="_211863_minus_round_icon_1_" data-name="211863_minus_round_icon (1)"
                        d="M76.884,224H65.116c-.616,0-1.116.67-1.116,1.5s.5,1.5,1.116,1.5H76.884c.616,0,1.116-.67,1.116-1.5S77.5,224,76.884,224Z"
                        transform="translate(-64 -224)" fill="#fff" />
                </svg>
</a>

        <ul class="dropdown-menu">
            <div class="dropdown-style">
                <li><a class="dropdown-item" href="<?php echo site_url('cloud/?pos=product-engineering'); ?>">Product
                        Engineering
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" class="mobile-arrow"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.079 7.5L6.286 13.292L7 14L14 7L7 0L6.286 0.708L12.08 6.5H0V7.5H12.079Z"
                                fill="white" />
                        </svg></a></li>
                <li><a class="dropdown-item"
                        href="<?php echo site_url('cloud/?pos=infrastructure-engineering'); ?>">Infrastructure Engineering
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" class="mobile-arrow"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.079 7.5L6.286 13.292L7 14L14 7L7 0L6.286 0.708L12.08 6.5H0V7.5H12.079Z"
                                fill="white" />
                        </svg>
                    </a>
                </li>
            </div>
        </ul>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php echo $post_slug == 'data-and-ai' ? ' active' : '' ?>"
            href="<?php echo site_url('data-and-ai'); ?>">Data & AI <svg width="14" height="14" viewBox="0 0 14 14"
                fill="none" class="mobile-arrow" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.079 7.5L6.286 13.292L7 14L14 7L7 0L6.286 0.708L12.08 6.5H0V7.5H12.079Z" fill="white" />
            </svg></a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">Enterprise Platforms
            <svg width="14" height="14" class="mobile-arrow" viewBox="0 0 14 14" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M6 6V0H8V6H14V8H8V14H6V8H0V6H6Z" fill="white" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="3" viewBox="0 0 14 3" class="mobile-minus-arrow">
                <path id="_211863_minus_round_icon_1_" data-name="211863_minus_round_icon (1)"
                    d="M76.884,224H65.116c-.616,0-1.116.67-1.116,1.5s.5,1.5,1.116,1.5H76.884c.616,0,1.116-.67,1.116-1.5S77.5,224,76.884,224Z"
                    transform="translate(-64 -224)" fill="#fff" />
            </svg>
        </a>

        <ul class="dropdown-menu">
            <div class="dropdown-style">
                <li><a class="dropdown-item <?php echo $post_slug == 'salesforce-agentforce' ? ' active' : '' ?>"
                        href="<?php echo site_url('salesforce-agentforce'); ?>">Agentforce <svg width="14" height="14"
                            viewBox="0 0 14 14" fill="none" class="mobile-arrow" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.079 7.5L6.286 13.292L7 14L14 7L7 0L6.286 0.708L12.08 6.5H0V7.5H12.079Z"
                                fill="white" />
                        </svg></a></li>
                <li><a class="dropdown-item <?php echo $post_slug == 'oracle-netsuite' ? ' active' : '' ?>"
                        href="<?php echo site_url('oracle-netsuite'); ?>">Oracle <svg width="14" height="14" viewBox="0 0 14 14"
                            fill="none" class="mobile-arrow" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.079 7.5L6.286 13.292L7 14L14 7L7 0L6.286 0.708L12.08 6.5H0V7.5H12.079Z"
                                fill="white" />
                        </svg></a></li>
            </div>
        </ul>
    </li>


    <!-- <li class="nav-item">
        <a class="nav-link <?php //echo $post_slug == 'about-us' ? ' active' : '' ?> "
            href="<?php //echo site_url('about-us') ?>">About Us <svg width="14" height="14" viewBox="0 0 14 14"
                fill="none" class="mobile-arrow" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.079 7.5L6.286 13.292L7 14L14 7L7 0L6.286 0.708L12.08 6.5H0V7.5H12.079Z" fill="white" />
            </svg></a>

    </li> -->
	<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">Sloutions
            <svg width="14" height="14" class="mobile-arrow" viewBox="0 0 14 14" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M6 6V0H8V6H14V8H8V14H6V8H0V6H6Z" fill="white" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="3" viewBox="0 0 14 3" class="mobile-minus-arrow">
                <path id="_211863_minus_round_icon_1_" data-name="211863_minus_round_icon (1)"
                    d="M76.884,224H65.116c-.616,0-1.116.67-1.116,1.5s.5,1.5,1.116,1.5H76.884c.616,0,1.116-.67,1.116-1.5S77.5,224,76.884,224Z"
                    transform="translate(-64 -224)" fill="#fff" />
            </svg>
        </a>

        <ul class="dropdown-menu">
            <div class="dropdown-style">
                <li><a class="dropdown-item <?php echo $post_slug == 'nss-nexidp' ? ' active' : '' ?>"
                        href="<?php echo site_url('nss-nexidp'); ?>">NexIDP <svg width="14" height="14"
                            viewBox="0 0 14 14" fill="none" class="mobile-arrow" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.079 7.5L6.286 13.292L7 14L14 7L7 0L6.286 0.708L12.08 6.5H0V7.5H12.079Z"
                                fill="white" />
                        </svg></a></li>
                <li><a class="dropdown-item <?php echo $post_slug == 'products' ? ' active' : '' ?>"
                        href="<?php echo site_url('products'); ?>">products <svg width="14" height="14" viewBox="0 0 14 14"
                            fill="none" class="mobile-arrow" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.079 7.5L6.286 13.292L7 14L14 7L7 0L6.286 0.708L12.08 6.5H0V7.5H12.079Z"
                                fill="white" />
                        </svg></a></li>
            </div>
        </ul>
    </li>


    <li class="nav-item">
        <a class="nav-link <?php echo $post_slug == 'careers' ? ' active' : '' ?>"
            href="<?php echo site_url('careers') ?>">Careers
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" class="mobile-arrow"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M12.079 7.5L6.286 13.292L7 14L14 7L7 0L6.286 0.708L12.08 6.5H0V7.5H12.079Z" fill="white" />
            </svg>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php echo $post_slug == 'resource-center' ? ' active' : '' ?>"
            href="<?php echo site_url('resource-center') ?>">Resource Center
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" class="mobile-arrow"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M12.079 7.5L6.286 13.292L7 14L14 7L7 0L6.286 0.708L12.08 6.5H0V7.5H12.079Z" fill="white" />
            </svg>
        </a>
    </li>
</ul>
<button class="btn px-2 desktop-src">
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
        <form class="search-form" method="get" action="<?php echo esc_url(home_url('/')); ?>">
            <input type="text" name="s" class="search-input" placeholder="Search..." value="<?php the_search_query(); ?>" autofocus>
            <button type="submit" class="search-submit">
                <svg width="22" height="22" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17 17L13.1396 13.1396M13.1396 13.1396C13.7999 12.4793 14.3237 11.6953 14.6811 10.8326C15.0385 9.96978 15.2224 9.04507 15.2224 8.11121C15.2224 7.17735 15.0385 6.25264 14.6811 5.38987C14.3237 4.5271 13.7999 3.74316 13.1396 3.08283C12.4793 2.42249 11.6953 1.89868 10.8326 1.54131C9.96978 1.18394 9.04507 1 8.11121 1C7.17735 1 6.25264 1.18394 5.38987 1.54131C4.5271 1.89868 3.74316 2.42249 3.08283 3.08283C1.74921 4.41644 1 6.2252 1 8.11121C1 9.99722 1.74921 11.806 3.08283 13.1396C4.41644 14.4732 6.2252 15.2224 8.11121 15.2224C9.99722 15.2224 11.806 14.4732 13.1396 13.1396Z" stroke="white" stroke-opacity="0.9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </button>
        </form>
    </div>
</div>
<a href="<?php echo site_url('contact-us');?>" class="btn btn-contact ms-lg-3 <?php echo $post_slug == 'contact-us' ? ' active ' : ''; ?>">Contact Us</a>