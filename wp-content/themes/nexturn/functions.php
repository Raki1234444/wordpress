<?php

/**
 * NextTurn website functions and definitions
 *
 * @link    https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Nexturn
 */

define("TEAM_MEMBER_PREFIX", "nexturn_team_");
define("TESTIMONIAL_PREFIX", "nexturn_testimonial_");
define("JOB_POST_PREFIX", "nexturn_job_post_");
define("IMPACT_STORY_PREFIX", "nex_impact_story_");

if (!function_exists('nexturn_theme_setup')):
    function nexturn_theme_setup()
    {
        add_theme_support('title-tag');

        add_theme_support('post-thumbnails');

        add_theme_support('custom-header');

        add_theme_support('custom-logo');

        register_nav_menus(array(
            'primary_menu' => esc_html__('Primary Menu', 'nexturn'),
            'footer_menu' => esc_html__('Footer Menu', 'nexturn')
        ));
        add_image_size('team_member_thumb', 300, 350, true); // Width, height, crop (true/false)

        add_theme_support('editor-styles');

        add_editor_style('assets/vendors/bootstrap/bootstrap.min.css');
        add_editor_style('assets/css/theme.css');
        add_editor_style('assets/css/admin-editor.css');
    }
    add_action('after_setup_theme', 'nexturn_theme_setup');
endif;

add_filter('wp_kses_allowed_html', function ($tags) {

    $tags['svg'] = array(
        'xmlns' => array(),
        'fill' => array(),
        'viewbox' => array(),
        'role' => array(),
        'aria-hidden' => array(),
        'focusable' => array(),
    );
    $tags['path'] = array(
        'd' => array(),
        'fill' => array(),
    );
    return $tags;
}, 10, 2);

require_once get_template_directory() . '/_admin/post-types.php';  // Post-types
require_once get_template_directory() . '/_admin/metaboxes.php';  // Meta-boxes



if (!function_exists('nexturn_theme_scripts')):
    function nexturn_theme_scripts()
    {
        wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/vendors/bootstrap/bootstrap.min.css', array(), '5.3.0-alpha1', 'all');
        wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/vendors/font-awesome/all.min.css', array(), '6.0.0', 'all');
        wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Funnel Sans', array(), null, 'all');

        // wp_enqueue_style('aos', 'https://unpkg.com/aos@next/dist/aos.css', array(), null, 'all');
        //wp_enqueue_style('animate-css', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css', array(), null, 'all');
        wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/assets/vendors/owlcarousel/assets/owl.carousel.min.css', array(), null, 'all');
        wp_enqueue_style('owl-carousel-theme', get_template_directory_uri() . '/assets/vendors/owlcarousel/assets/owl.theme.default.min.css', array(), null, 'all');

        wp_enqueue_style('nexturn-theme', get_template_directory_uri() . '/assets/css/theme.css', array(), null, 'all');

        wp_enqueue_style('nexturn-style', get_stylesheet_uri(), array(), null, 'all');

        //wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js', array('jquery'), '5.3.0-alpha1', true);
        wp_enqueue_script('bootstrap-bundle', get_template_directory_uri() . '/assets/vendors/bootstrap/bootstrap.bundle.min.js', array('jquery'), '5.3.0', true);
        // wp_enqueue_script('aos', 'https://unpkg.com/aos@next/dist/aos.js', array(), null, true);
        wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/assets/vendors/owlcarousel/owl.carousel.min.js', array(), null, true);
        wp_enqueue_script('popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', array(), null, true);
        wp_enqueue_script('nexturn-theme', get_template_directory_uri() . '/assets/js/theme.js', array(), null, true);
        wp_localize_script('nexturn-theme', 'NEXTURN_AJAX', [
            'ajax_url' => admin_url('admin-ajax.php')
        ]);

        // Enqueue jsPDF for single resource pages
        if (is_singular('resource')) {
            wp_enqueue_script('jspdf', 'https://cdn.jsdelivr.net/npm/jspdf@2.5.1/dist/jspdf.umd.min.js', array(), '2.5.1', true);
            // Lightweight, scoped handler for resource form only (formatted for readability)
            $inline_js = <<<'JS'
(function(){
	function generateResourcePdf(){
		try{
			var wrapper = document.getElementById('resource-form');
			if (!wrapper) return;
			var desc = document.getElementById('resource-description');
			if (!desc) return;
			if (!window.jspdf || !window.jspdf.jsPDF) return;

			var titleEl = document.querySelector('h1, .entry-title');
			var title = titleEl ? titleEl.textContent.trim() : document.title;
			var description = (desc.innerText ? desc.innerText : desc.textContent).trim();

			var doc = new window.jspdf.jsPDF({ unit: 'pt', format: 'a4' });
			var margin = 40, maxWidth = 515;
			doc.setFont('Helvetica', 'bold');
			doc.setFontSize(16);
			doc.text(title || 'Resource', margin, margin);
			doc.setFont('Helvetica', 'normal');
			doc.setFontSize(12);
			var y = margin + 24;
			var lines = doc.splitTextToSize(description, maxWidth);
			doc.text(lines, margin, y, { maxWidth: maxWidth, lineHeightFactor: 1.4 });

			var safeName = (title || 'resource').replace(/[^\w\-\s\.]/g, '_') + '.pdf';
			var blob = doc.output('blob');
			var url = URL.createObjectURL(blob);
			var a = document.createElement('a');
			a.href = url;
			a.download = safeName;
			document.body.appendChild(a);
			a.click();
			document.body.removeChild(a);
			setTimeout(function(){ URL.revokeObjectURL(url); }, 1000);
			console.log('Resource PDF generated:', safeName);
		}catch(e){ console.error('PDF generation failed', e); }
	}

	function handler(e){
		var wrapper = document.getElementById('resource-form');
		if (!wrapper) return;
		var form = e && e.target ? e.target : null;
		if (form && !wrapper.contains(form)) return;

		// Mirror other forms: close modal and reset form
		try {
			var modalEl = document.getElementById('resource_form_modal');
			if (modalEl && window.bootstrap && window.bootstrap.Modal) {
				var modal = window.bootstrap.Modal.getOrCreateInstance(modalEl);
				modal.hide();
			}
			// Reset form after a brief delay to allow CF7 to finish DOM updates
			var frm = form || wrapper.querySelector('form');
			if (frm) setTimeout(function(){ try { frm.reset(); } catch(_){} }, 100);
		} catch(_){}
		setTimeout(generateResourcePdf, 100);
	}

	document.addEventListener('wpcf7mailsent', handler);
	document.addEventListener('wpcf7submit', handler);

	// MutationObserver fallback on CF7 wrapper adding 'sent' class
	document.addEventListener('DOMContentLoaded', function(){
		var wrapper = document.getElementById('resource-form');
		if (!wrapper) return;
		var form = wrapper.querySelector('form');
		if (!form) return;
		var cf7 = form.closest('.wpcf7') || wrapper.querySelector('.wpcf7');
		if (!cf7) return;
		var done = false;
		try{
			var obs = new MutationObserver(function(list){
				for (var i = 0; i < list.length; i++){
					if (list[i].attributeName === 'class'){
						var cls = cf7.getAttribute('class') || '';
						if (!done && /(^|\s)sent(\s|$)/.test(cls)){
							done = true;
							generateResourcePdf();
							obs.disconnect();
							break;
						}
					}
				}
			});
			obs.observe(cf7, { attributes: true });
		}catch(err){ console.warn('Observer failed', err); }
	});
})();
JS;
            wp_add_inline_script('jspdf', $inline_js);
        }
    }
    add_action('wp_enqueue_scripts', 'nexturn_theme_scripts');
endif;

add_filter('run_wptexturize', '__return_false');

add_action('wp_head', function () {
    if (is_front_page() || is_home()) {
        $banner_url = get_template_directory_uri() . '/assets/images/home/home-banner.jpg';
        echo '<link rel="preload" as="image" href="' . esc_url($banner_url) . '" />' . "\n";
    }
}, 1);

// function change_title_dash($sep){
//     return '-';
// }
// add_filter ('document_title_separator', 'change_title_dash');

function add_file_types_to_uploads($file_types)
{
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes);
    return $file_types;
}
add_filter('upload_mimes', 'add_file_types_to_uploads');

function disable_wp_auto_p($content)
{
    remove_filter('the_content', 'wpautop');
    remove_filter('the_excerpt', 'wpautop');
    return $content;
}
add_filter('the_content', 'disable_wp_auto_p', 0);

function menu_add_class_on_anchor($classes, $item, $args)
{
    if (isset($args->add_anchor_class)) {
        $classes['class'] = $args->add_anchor_class;
    }
    return $classes;
}
add_filter('nav_menu_link_attributes', 'menu_add_class_on_anchor', 1, 3);

function menu_add_class_on_li($classes, $item, $args)
{
    if (isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'menu_add_class_on_li', 1, 3);



remove_action('wpcf7_init', 'wpcf7_add_form_tag_submit');
add_action('wpcf7_init', 'my_add_form_tag_submit', 10, 0);

function my_add_form_tag_submit()
{
    wpcf7_add_form_tag('submit', 'my_submit_form_tag_handler');
}

function my_submit_form_tag_handler($tag): string
{
    return '<button class="wpcf7-form-control wpcf7-submit has-spinner btn btn-submit" type="submit">Submit <span class="ms-2">→</span></button>';
}

add_filter('shortcode_atts_wpcf7', 'custom_shortcode_atts_wpcf7_filter', 10, 3);

function custom_shortcode_atts_wpcf7_filter($out, $pairs, $atts)
{
    $my_attr = 'cand_role';

    if (isset($atts[$my_attr])) {
        $out[$my_attr] = $atts[$my_attr];
    }

    return $out;
}

// Custom validation function for email field (including DNS verification)
function custom_validate_email_dns_and_letters($result, $tag)
{

    // Apply only for email fields (both required and optional)
    if ('email' === $tag->basetype) {

        // Get the submitted email value
        $email = isset($_POST[$tag->name]) ? trim($_POST[$tag->name]) : '';

        // Check for more than three consecutive identical alphabetical letters (case-insensitive)
        if (preg_match('/([A-Za-z])\1{3,}/', $email)) {
            //$result->invalidate( $tag, "Email cannot contain more than 3 consecutive identical letters." );
            $result->invalidate($tag, "Please enter a valid email address.");
            return $result;
        }

        // Extract the domain part after the @ symbol
        $parts = explode('@', $email);
        if (count($parts) < 2) {
            // Invalid email format; let CF7's built-in rules handle this
            return $result;
        }
        $domain = array_pop($parts);

        // Check for a valid DNS record on the domain (preferably MX, fallback to A)
        if (!checkdnsrr($domain, "MX") && !checkdnsrr($domain, "A")) {
            //$result->invalidate( $tag, "The email domain does not appear to be valid." );
            $result->invalidate($tag, "Please enter a valid email address.");
        }
    }
    return $result;
}

// Apply the filter for both optional and required email fields
add_filter('wpcf7_validate_email', 'custom_validate_email_dns_and_letters', 20, 2);
add_filter('wpcf7_validate_email*', 'custom_validate_email_dns_and_letters', 20, 2);


add_action('rest_api_init', function () {
    register_rest_route('custom/v1', '/validate-email', [
        'methods' => 'GET',
        'callback' => 'validate_email_domain',
        'permission_callback' => '__return_true'
    ]);
});

function validate_email_domain(WP_REST_Request $request)
{
    $domain = sanitize_text_field($request->get_param('domain'));

    if ($domain != '') {
        // Validate domain DNS (MX records)
        $is_valid = checkdnsrr($domain, 'MX');
    } else {
        $is_valid = false;
    }
    return rest_ensure_response(['valid' => $is_valid]);
}



add_shortcode('put_team_thumbs', 'put_team_thumbs');
function put_team_thumbs()
{
    global $post;
    $args = array(
        'posts_per_page' => -1,
        'offset' => 0,
        'orderby' => 'date',
        'order' => 'ASC',
        'include' => '',
        'exclude' => '',
        'meta_key' => '',
        'meta_value' => '',
        'post_type' => 'nexturn_team',
        'post_mime_type' => '',
        'post_parent' => '',
        'author' => '',
        'post_status' => 'publish',
        'suppress_filters' => true
    );
    $team_members = get_posts($args);

    if (!empty($team_members) && count($team_members) != 0):
        foreach ($team_members as $post):
            setup_postdata($post);
            $role = get_post_meta(get_the_ID(), TEAM_MEMBER_PREFIX . 'role', TRUE);
            $picture_id = get_post_meta(get_the_ID(), TEAM_MEMBER_PREFIX . 'picture', TRUE);
            $picture = get_the_guid($picture_id);
            $picture_meta = rwmb_meta(TEAM_MEMBER_PREFIX . 'picture', array('size' => 'team_member_thumb'));
            $picture_1 = reset($picture_meta);
            //echo '<pre>';
            //print_r($picture_1['url']);
            //echo '</pre>';
            //print_r($picture);
            $lnkdn_link = get_post_meta(get_the_ID(), TEAM_MEMBER_PREFIX . 'linkdn_link', TRUE);
            if (!empty(get_the_title()) && $picture_1['url'] != ''):
?>
                <div class="col-md-3">
                    <div class="founders-card">
                        <img src="<?php echo $picture_1['url']; ?>" alt="<?php the_title(); ?>" class="founders-img img-fluid">
                        <h4 class="mt-3"><?php the_title(); ?></h4>
                        <div class="d-flex justify-content-between">
                            <p><?php echo $role; ?></p>
                            <?php if ($lnkdn_link != ''): ?>
                                <a href="<?php echo $lnkdn_link; ?>" class="social-link" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                        class="bi bi-linkedin" viewBox="0 0 24 24">
                                        <path
                                            d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z">
                                        </path>
                                    </svg>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
        <?php
            endif;
        endforeach;
    else:
        return '<div class="col-12"><p class="lead">No Team Members Found</p></div>';
    endif;
    wp_reset_postdata();
}

add_shortcode('put_job_thumbs', 'put_job_thumbs');
function put_job_thumbs()
{
    global $post;
    $args = array(
        'posts_per_page' => -1,
        'offset' => 0,
        'orderby' => 'date',
        'order' => 'ASC',
        'include' => '',
        'exclude' => '',
        'meta_key' => '',
        'meta_value' => '',
        'post_type' => 'nexturn_job_posts',
        'post_mime_type' => '',
        'post_parent' => '',
        'author' => '',
        'post_status' => 'publish',
        'suppress_filters' => true
    );
    $job_posts = get_posts($args);
    //print_r($job_posts);
    if (!empty($job_posts) && count($job_posts) > 0):
        ob_start();
        ?>
        <div class="row g-4">
            <!-- Job Card 1 -->
            <?php
            $count = 0;
            foreach ($job_posts as $post):
                setup_postdata($post);
            ?>
                <div class="col-12 col-md-6 job_post_thumb <?php echo ++$count > 2 ? 'show_hide' : ''; ?>"
                    id="<?php echo 'job_post_thumb_' . $count; ?>" <?php echo $count > 2 ? 'style="display:none;"' : ''; ?>>
                    <div class="job-card">
                        <h3 class="whitecard-heading"><?php the_title(); ?></h3>
                        <p class="job-subtitle"><?php echo get_post_meta(get_the_ID(), JOB_POST_PREFIX . 'location', TRUE); ?></p>

                        <div class="mb-3 card-text-medium">
                            <strong class="job-subtitle">Work Experience:</strong>
                            <?php echo get_post_meta(get_the_ID(), JOB_POST_PREFIX . 'work_exp', TRUE); ?>
                        </div>
                        <div class="mb-3 card-text-medium">
                            <strong class="job-subtitle">Qualifications:</strong>
                            <?php echo get_post_meta(get_the_ID(), JOB_POST_PREFIX . 'qual', TRUE); ?>
                        </div>
                        <div class="mb-3 card-text-medium">
                            <strong class="job-subtitle">Reports To:</strong>
                            <?php echo get_post_meta(get_the_ID(), JOB_POST_PREFIX . 'reports_to', TRUE); ?>
                        </div>
                        <div class="my-4 ">
                            <strong class="job-subtitle">Job Description:</strong>
                            <p class="card-text-medium">
                                <?php echo substr(strip_tags(get_post_meta(get_the_ID(), JOB_POST_PREFIX . 'desc', TRUE)), 0, 100) . ' [...]'; ?>
                            </p>
                        </div>

                        <a href="<?php echo get_the_permalink(); ?>" class="job-apply-btn mb-4">
                            <span class="pe-2">Apply</span> <svg width="14" height="14" viewBox="0 0 14 14" fill="#000"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.079 7.5L6.286 13.292L7 14L14 7L7 0L6.286 0.708L12.08 6.5H0V7.5H12.079Z" fill="#000">
                                </path>
                            </svg>
                            </svg>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php if (count($job_posts) > 2): ?>
                <div class="text-center mt-4">
                    <button class="btn btn-link text-white text-decoration-none innersec-white" id="show_more_jobs" data-count=2
                        data-total="<?php echo count($job_posts); ?>">Show
                        more</button>
                    <button class="btn btn-link text-white text-decoration-none innersec-white" id="hide_more_jobs"
                        style="display:none;">Hide all</button>
                </div>
            <?php endif; ?>

        </div>
    <?php
    endif;
    wp_reset_postdata();
    return ob_get_clean();
}

add_action('wp_ajax_nopriv_live_search', 'handle_live_search');
add_action('wp_ajax_live_search', 'handle_live_search');

function handle_live_search()
{
    $term = isset($_GET['term']) ? sanitize_text_field($_GET['term']) : '';

    if (!$term) {
        wp_send_json([]);
    }

    global $wpdb;

    // Search posts with full-word match using REGEXP
    $escaped_term = esc_sql($term);
    $pattern = '[[:<:]]' . $escaped_term . '(-[a-zA-Z0-9]+)?[[:>:]]'; // MySQL word boundary match

    $results = $wpdb->get_results("
    SELECT ID
    FROM $wpdb->posts
    WHERE post_status = 'publish'
      AND post_type IN ('post', 'page', 'nexturn_job_posts')
      AND (
        post_title REGEXP '{$pattern}'
        OR post_content REGEXP '{$pattern}'
      )
    LIMIT 10
  ");

    $data = [];

    foreach ($results as $row) {
        $post = get_post($row->ID);
        $data[] = [
            'title' => get_the_title($post),
            'link' => get_permalink($post),
            'excerpt' => wp_trim_words(strip_tags($post->post_content), 20, '...')
        ];
    }

    wp_send_json($data);
}

add_shortcode('partner-with-us', function () {
    ob_start(); ?>
    <a class="svg-container action-click cta-btn" data-bs-target="#partner_contact_modal" data-bs-toggle="modal"><span
            class="pe-3">Partner with us</span>
        <svg class="home-bn-arrow home-bn-arrow-sec" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
            <g data-name="Layer 2">
                <path d="M1 16a15 15 0 1 1 15 15A15 15 0 0 1 1 16Zm28 0a13 13 0 1 0-13 13 13 13 0 0 0 13-13Z" fill="#ffffff"
                    class="fill-000000"></path>
                <path
                    d="M12.13 21.59 17.71 16l-5.58-5.59a1 1 0 0 1 0-1.41 1 1 0 0 1 1.41 0l6.36 6.36a.91.91 0 0 1 0 1.28L13.54 23a1 1 0 0 1-1.41 0 1 1 0 0 1 0-1.41Z"
                    fill="#ffffff" class="fill-000000"></path>
            </g>
        </svg>
    </a>
    <?php
    //$partner_contact_modal = get_template_part('template','partner-contact');
    add_action('wp_footer', function () {
        get_template_part('template', 'partner-contact');
    });
    return ob_get_clean();
});

add_shortcode('home-partner-with-us', function () {
    ob_start(); ?>
    <a class="svg-container cta-btn home-cta-btn" data-bs-toggle="modal" data-bs-target="#partner_contact_modal">
        <svg class="home-bn-arrow" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
            <g data-name="Layer 2">
                <path d="M1 16a15 15 0 1 1 15 15A15 15 0 0 1 1 16Zm28 0a13 13 0 1 0-13 13 13 13 0 0 0 13-13Z" fill="#ffffff"
                    class="fill-000000"></path>
                <path
                    d="M12.13 21.59 17.71 16l-5.58-5.59a1 1 0 0 1 0-1.41 1 1 0 0 1 1.41 0l6.36 6.36a.91.91 0 0 1 0 1.28L13.54 23a1 1 0 0 1-1.41 0 1 1 0 0 1 0-1.41Z"
                    fill="#ffffff" class="fill-000000"></path>
            </g>
        </svg>
    </a>
    <?php
    add_action('wp_footer', function () {
        get_template_part('template', 'partner-contact');
    });
    return ob_get_clean();
});

add_shortcode('know-more', function ($atts = []) {
    ob_start();
    $atts = array_change_key_case((array) $atts, CASE_LOWER);
    $atts = shortcode_atts(array(
        'slug' => '#',
        'text' => 'Know More',
    ), $atts);
    ?>
    <a class="svg-container" href="<?php echo site_url($atts['slug']) ?>"><span
            class="pe-3"><?php echo $atts['text'] ?></span>
        <svg class="home-bn-arrow home-bn-arrow-sec" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
            <g data-name="Layer 2">
                <path d="M1 16a15 15 0 1 1 15 15A15 15 0 0 1 1 16Zm28 0a13 13 0 1 0-13 13 13 13 0 0 0 13-13Z" fill="#ffffff"
                    class="fill-000000"></path>
                <path
                    d="M12.13 21.59 17.71 16l-5.58-5.59a1 1 0 0 1 0-1.41 1 1 0 0 1 1.41 0l6.36 6.36a.91.91 0 0 1 0 1.28L13.54 23a1 1 0 0 1-1.41 0 1 1 0 0 1 0-1.41Z"
                    fill="#ffffff" class="fill-000000"></path>
            </g>
        </svg>
    </a>
<?php
    return ob_get_clean();
});

add_shortcode('impact-stories', function ($atts = []) {
    ob_start();
    global $post;
    $atts = array_change_key_case((array) $atts, CASE_LOWER);
?>
    <div class="row">
        <div class="col-12">
            <?php
            if (isset($atts['group-slug']) && trim($atts['group-slug']) != '') {
                $group_slug = $atts['group-slug'];
                $args = array(
                    'post_type' => 'nex_impact_stories',
                    'posts_per_page' => -1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'nex_impact_group',
                            'field' => 'slug',
                            'terms' => $group_slug
                        )
                    )
                );
                $posts = get_posts($args);
            ?>
                <div class="owl-carousel owl-theme">
                    <!-- Item -->
                    <?php foreach ($posts as $post):
                        setup_postdata($post); ?>
                        <div class="item">
                            <div class="story-card">
                                <div class="story-title"><?php the_title(); ?></div>
                                <div class="innersec-white grey-text">
                                    <?php echo get_post_meta(get_the_ID(), IMPACT_STORY_PREFIX . 'sub_title', TRUE) ?>
                                </div>
                                <div class="innersec-white mt-3 pb-5">
                                    <?php echo get_post_meta(get_the_ID(), IMPACT_STORY_PREFIX . 'desc', TRUE); ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;
                    wp_reset_postdata(); ?>
                </div>
            <?php } else { ?>
                <span>- No Impact Stories Found -</span>
            <?php } ?>
        </div>
    </div>
<?php
    return ob_get_clean();
});

add_shortcode('join-our-team', function ($atts = []) {
    ob_start();
    $atts = array_change_key_case((array) $atts, CASE_LOWER);
    $atts = shortcode_atts(array(
        'text' => 'Join Our Team',
    ), $atts);
?>
    <a class="svg-container action-click cta-btn" data-bs-toggle="modal" data-bs-target="#join_our_team"><span
            class="pe-3">Join our team</span>
        <svg class="home-bn-arrow home-bn-arrow-sec" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
            <g data-name="Layer 2">
                <path d="M1 16a15 15 0 1 1 15 15A15 15 0 0 1 1 16Zm28 0a13 13 0 1 0-13 13 13 13 0 0 0 13-13Z" fill="#ffffff"
                    class="fill-000000"></path>
                <path
                    d="M12.13 21.59 17.71 16l-5.58-5.59a1 1 0 0 1 0-1.41 1 1 0 0 1 1.41 0l6.36 6.36a.91.91 0 0 1 0 1.28L13.54 23a1 1 0 0 1-1.41 0 1 1 0 0 1 0-1.41Z"
                    fill="#ffffff" class="fill-000000"></path>
            </g>
        </svg>
    </a>
    <?php
    add_action('wp_footer', function () { ?>
        <div class="modal fade findanwser" id="join_our_team" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content p-3">
                    <div class="modal-header border-bottom-0 pb-0">
                        <h2 class="modal-title section-title m-0 pb-5" id="exampleModalLabel">Job Application Form</h2>
                        <button type="button" class="close close-btn" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body pt-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <?php echo do_shortcode('[contact-form-7 id="4abff73" title="Join Team Form"]'); ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    <?php get_template_part('template', 'contact-popup');
    });
    return ob_get_clean();
});

add_shortcode('careers-faq', function ($atts = []) {
    ob_start();
    ?>
    <a class="svg-container action-click cta-btn" data-bs-toggle="modal" data-bs-target="#faqModal"><span class="pe-3">Find
            the answers</span>
        <svg class="home-bn-arrow home-bn-arrow-sec" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
            <g data-name="Layer 2">
                <path d="M1 16a15 15 0 1 1 15 15A15 15 0 0 1 1 16Zm28 0a13 13 0 1 0-13 13 13 13 0 0 0 13-13Z" fill="#ffffff"
                    class="fill-000000"></path>
                <path
                    d="M12.13 21.59 17.71 16l-5.58-5.59a1 1 0 0 1 0-1.41 1 1 0 0 1 1.41 0l6.36 6.36a.91.91 0 0 1 0 1.28L13.54 23a1 1 0 0 1-1.41 0 1 1 0 0 1 0-1.41Z"
                    fill="#ffffff" class="fill-000000"></path>
            </g>
        </svg>
    </a>
    <?php
    add_action('wp_footer', function () {
        get_template_part('template', 'careers-faq');
    });
    return ob_get_clean();
});

add_shortcode('team-testimonial', function () {
    global $post;
    $args = array(
        'post_type' => 'nexturn_testimonial',
        'post_status' => 'publish',
        'posts_per_page' => -1
    );
    $posts = get_posts($args);
    if (count($posts) > 0):
        ob_start();
    ?>
        <div id="testimonialCarousel" class="carousel">
            <div class="carousel-inner">
                <?php
                foreach ($posts as $post):
                    //print_r($post);
                    setup_postdata($post);
                    // $picture_id = get_post_meta(get_the_ID(), TESTIMONIAL_PREFIX . 'picture', true);
                    // print_r($picture);
                    $picture_meta = rwmb_meta(TESTIMONIAL_PREFIX . 'picture', array('size' => 'team_member_thumb'));
                    $picture = reset($picture_meta);
                ?>
                    <div class="carousel-item">
                        <div class="card shadow-sm rounded-3">
                            <div class="quotes display-2 text-body-tertiary">
                                <i class="bi bi-quote"></i>
                            </div>
                            <div class="card-body">
                                <p class="card-text"><?php echo get_post_meta(get_the_ID(), TESTIMONIAL_PREFIX . 'message', true) ?>
                                </p>
                                <div class="d-flex align-items-center pt-2 testimonials-bottom">
                                    <img src="<?php echo $picture['url']; ?>" alt="bootstrap testimonial carousel slider 2">
                                    <div>
                                        <h5 class="card-title fw-bold text-dark"><?php the_title(); ?> </h5>
                                        <span class="text-secondary"><?php echo get_post_meta(get_the_ID(), TESTIMONIAL_PREFIX . 'desg', true) ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    <?php
    else:
        echo '- No Testimonial Found -';
    endif;
    return ob_get_clean();
});

// Helper function to render resource HTML
function render_resource_html($resource, $counter)
{
    $resource_summary = rwmb_meta('resource_summary', [], $resource->ID);
    $resource_text = rwmb_meta('resource_text', [], $resource->ID);
    $resource_card_text = $resource_summary !== '' ? $resource_summary : $resource_text;
    $resource_image = rwmb_meta('resource_image', ['size' => 'large'], $resource->ID);
    $resource_image_url = '';

    if ($resource_image && is_array($resource_image)) {
        $img = reset($resource_image);
        $resource_image_url = $img['url'];
    }

    $image_first = ($counter % 2 == 0);
    $column_reverse = $image_first ? '' : 'colum-reverse';

    ob_start();
    ?>
    <div class="row <?php echo $column_reverse; ?>">
        <?php if (!$image_first): ?>
            <!-- Text Content First -->
            <div class="col-lg-6 p-0">
                <div class="service-card">
                    <div class="row">
                        <div class="col-lg-11 offset-lg-1 px-lg-4 px-0">
                            <h2 class="animate-on-scroll home-card-heading mb-4"><?php echo esc_html(get_the_title($resource)); ?></h2>
                            <?php if ($resource_card_text): ?>
                                <p class="description animate-on-scroll innersec-white"><?php echo esc_html($resource_card_text); ?></p>
                            <?php endif; ?>

                            <!-- Know More Button -->
                            <div class="animate-on-scroll">
                                <a href="<?php echo esc_url(get_permalink($resource)); ?>" class="svg-container cta-btn">
                                    <span class="pe-3">Know More</span>
                                    <svg class="home-bn-arrow" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                        <g data-name="Layer 2">
                                            <path d="M1 16a15 15 0 1 1 15 15A15 15 0 0 1 1 16Zm28 0a13 13 0 1 0-13 13 13 13 0 0 0 13-13Z" fill="#ffffff" class="fill-000000"></path>
                                            <path d="M12.13 21.59 17.71 16l-5.58-5.59a1 1 0 0 1 0-1.41 1 1 0 0 1 1.41 0l6.36 6.36a.91.91 0 0 1 0 1.28L13.54 23a1 1 0 0 1-1.41 0 1 1 0 0 1 0-1.41Z" fill="#ffffff" class="fill-000000"></path>
                                        </g>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Image Second -->
            <div class="col-lg-6 p-0 cloud-image" style="background-image: url('<?php echo esc_url($resource_image_url ?: get_template_directory_uri() . '/assets/images/default-resource.jpg'); ?>');"></div>
        <?php else: ?>
            <!-- Image First -->
            <div class="col-lg-6 p-0 cloud-image" style="background-image: url('<?php echo esc_url($resource_image_url ?: get_template_directory_uri() . '/assets/images/default-resource.jpg'); ?>');"></div>
            <!-- Text Content Second -->
            <div class="col-lg-6 p-0">
                <div class="service-card">
                    <div class="row">
                        <div class="col-lg-11 px-lg-4 px-0">
                            <h2 class="animate-on-scroll home-card-heading mb-4"><?php echo esc_html(get_the_title($resource)); ?></h2>
                            <?php if ($resource_card_text): ?>
                                <p class="animate-on-scroll innersec-white"><?php echo esc_html($resource_card_text); ?></p>
                            <?php endif; ?>

                            <!-- Know More Button -->
                            <div class="animate-on-scroll">
                                <a href="<?php echo esc_url(get_permalink($resource)); ?>" class="svg-container cta-btn">
                                    <span class="pe-3">Know More</span>
                                    <svg class="home-bn-arrow" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                        <g data-name="Layer 2">
                                            <path d="M1 16a15 15 0 1 1 15 15A15 15 0 0 1 1 16Zm28 0a13 13 0 1 0-13 13 13 13 0 0 0 13-13Z" fill="#ffffff" class="fill-000000"></path>
                                            <path d="M12.13 21.59 17.71 16l-5.58-5.59a1 1 0 0 1 0-1.41 1 1 0 0 1 1.41 0l6.36 6.36a.91.91 0 0 1 0 1.28L13.54 23a1 1 0 0 1-1.41 0 1 1 0 0 1 0-1.41Z" fill="#ffffff" class="fill-000000"></path>
                                        </g>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
<?php
    return ob_get_clean();
}

add_shortcode('resources-section', function ($atts) {
    $atts = shortcode_atts(array(
        'group' => '',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'DESC'
    ), $atts);

    // Fetch groups for hover UI
    $terms = get_terms([
        'taxonomy' => 'resource_group',
        'hide_empty' => false,
    ]);

    // Build list of resources to render: latest one per group (or per selected group)
    $resources_to_render = array();

    // Determine which groups to fetch from
    $groups_to_fetch = array();
    if (!empty($atts['group'])) {
        $selected = get_terms(array(
            'taxonomy' => 'resource_group',
            'hide_empty' => false,
            'slug' => sanitize_text_field($atts['group'])
        ));
        if (!is_wp_error($selected) && !empty($selected)) {
            $groups_to_fetch = $selected;
        }
    } else {
        if (!is_wp_error($terms) && !empty($terms)) {
            $groups_to_fetch = $terms;
        }
    }

    // For each group, fetch the latest single resource
    foreach ($groups_to_fetch as $grp) {
        $latest = get_posts(array(
            'post_type' => 'resource',
            'posts_per_page' => 1,
            'orderby' => $atts['orderby'],
            'order' => $atts['order'],
            'post_status' => 'publish',
            'tax_query' => array(array(
                'taxonomy' => 'resource_group',
                'field' => 'term_id',
                'terms' => $grp->term_id,
            )),
        ));
        if (!empty($latest)) {
            $resources_to_render[] = $latest[0];
        }
    }

    ob_start();
?>
    <section class="resources-section home">
        <div class="container-fluid">
            <?php if (!is_wp_error($terms) && !empty($terms)): ?>
                <div class="d-flex flex-row flex-wrap gap-3 justify-content-start mb-4" style="gap: 1rem;">
                    <?php foreach ($terms as $term): ?>
                        <?php
                        // Resources for this term (titles only)
                        $term_resources = get_posts([
                            'post_type' => 'resource',
                            'posts_per_page' => -1,
                            'orderby' => 'date',
                            'order' => 'DESC',
                            'post_status' => 'publish',
                            'tax_query' => [[
                                'taxonomy' => 'resource_group',
                                'field' => 'term_id',
                                'terms' => $term->term_id,
                            ]]
                        ]);
                        ?>
                        <div class="resource-group-tile" style="position: relative; display: inline-block; background: none; border: none; box-shadow: none; padding: 0; margin: 0;">
                            <span class="resource-group-name" style="font-weight: normal; color: inherit; padding: 0; border: none; background: none; cursor: pointer;">
                                <?php echo esc_html($term->name); ?>
                            </span>
                            <div class="resource-group-popover custom-popover">
                                <?php if (!empty($term_resources)): ?>
                                    <ul class="resources-list">
                                        <?php foreach ($term_resources as $res): ?>
                                            <li>
                                                <a href="<?php echo esc_url(get_permalink($res)); ?>" class="resource-link">
                                                    <?php echo esc_html(get_the_title($res)); ?>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php else: ?>
                                    <div class="resources-empty">No resources in this group.</div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($resources_to_render)): ?>
                <div id="resources-container">
                    <?php
                    $counter = 0;
                    foreach ($resources_to_render as $resource):
                        setup_postdata($resource);
                        $counter++;
                        echo render_resource_html($resource, $counter);
                    endforeach;
                    wp_reset_postdata();
                    ?>
                </div>
            <?php else: ?>
                <p>No resources found.</p>
            <?php endif; ?>
        </div>
    </section>

    <script>
        jQuery(document).ready(function($) {
            $('.resource-group-tile').each(function() {
                var $tile = $(this);
                var $popover = $tile.find('.resource-group-popover');
                var hideTimeout;

                $tile.on('mouseenter', function() {
                    clearTimeout(hideTimeout);
                    $popover.stop(true, true).fadeIn(120);
                }).on('mouseleave', function() {
                    hideTimeout = setTimeout(function() {
                        $popover.stop(true, true).fadeOut(120);
                    }, 120);
                });

                $popover.on('mouseenter', function() {
                    clearTimeout(hideTimeout);
                }).on('mouseleave', function() {
                    hideTimeout = setTimeout(function() {
                        $popover.stop(true, true).fadeOut(120);
                    }, 120);
                });
            });
        });
    </script>
<?php
    return ob_get_clean();
});

// AJAX handler for filtering resources
add_action('wp_ajax_filter_resources', 'handle_filter_resources');
add_action('wp_ajax_nopriv_filter_resources', 'handle_filter_resources');

function handle_filter_resources()
{
    if (!wp_verify_nonce($_POST['nonce'], 'filter_resources_nonce')) {
        wp_send_json_error('Invalid nonce');
    }

    $resource_group = isset($_POST['resource_group']) ? sanitize_text_field($_POST['resource_group']) : '';
    $order = isset($_POST['order']) && strtolower($_POST['order']) === 'asc' ? 'ASC' : 'DESC';
    $posts_per_page = isset($_POST['posts_per_page']) ? intval($_POST['posts_per_page']) : 6;
    if ($posts_per_page === 0) {
        $posts_per_page = 6;
    }

    $args = array(
        'post_type' => 'resource',
        'posts_per_page' => $posts_per_page,
        'orderby' => 'date',
        'order' => $order,
        'post_status' => 'publish'
    );

    if (!empty($resource_group)) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'resource_group',
                'field' => 'slug',
                'terms' => $resource_group
            )
        );
    }

    $resources = get_posts($args);

    if (empty($resources)) {
        wp_send_json_success(array(
            'html' => '<p class="text-center">No resources found matching your criteria.</p>'
        ));
    }

    ob_start();
    $counter = 0;
    foreach ($resources as $resource):
        $counter++;
        echo render_resource_html($resource, $counter);
    endforeach;

    $html = ob_get_clean();

    wp_send_json_success(array('html' => $html));
}
