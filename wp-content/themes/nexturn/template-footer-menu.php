<!-- <ul class="nav">
      <li class="nav-item"><a href="#" class="nav-link text-white">Cloud</a></li>
      <li class="nav-item"><a href="#" class="nav-link text-white">Data & AI</a></li>
      <li class="nav-item"><a href="#" class="nav-link text-white">Salesforce</a></li>
      <li class="nav-item"><a href="#" class="nav-link text-white">Oracle</a></li>
      <li class="nav-item"><a href="#" class="nav-link text-white">About Us</a></li>
      <li class="nav-item"><a href="#" class="nav-link text-white">Careers</a></li>
      <li class="nav-item"><a href="#" class="nav-link text-white">Contact Us</a></li>
</ul> -->

<?php
if (has_nav_menu('footer_menu')):
    $args = array(
        'container' => false,
        'container_class' => false,
        'menu_class' => 'nav',
        'menu_id' => 'footerMenu',
        'theme_location' => 'footer_menu',
        'add_li_class' => 'nav-item',
        'add_anchor_class' => 'nav-link text-white'
    );
    wp_nav_menu($args);
endif;