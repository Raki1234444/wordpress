<?php
/**
 * Registering meta boxes
 */


add_filter('rwmb_meta_boxes', 'nexturn_register_meta_boxes');

/**
 * Register meta boxes
 *
 * @param array $meta_boxes List of meta boxes
 *
 * @return array
 */
function nexturn_register_meta_boxes($meta_boxes)
{

    /* Meta Boxes for Team Members */
    $team_member_prefix = TEAM_MEMBER_PREFIX;

    $meta_boxes[] = array(
        'id' => 'team_member_info',
        'title' => __('Other Settings', 'your-prefix'),
        'post_types' => array('nexturn_team'),
        'context' => 'normal',
        'priority' => 'high',
        'autosave' => true,
        'fields' => array(
            array(
                'name' => __('Role/Designation', 'your-prefix'),
                'id' => "{$team_member_prefix}role",
                'desc' => __('', 'your-prefix'),
                'type' => 'text'
            ),
            array(
                'name' => __('Display Picture', 'your-prefix'),
                'id' => "{$team_member_prefix}picture",
                'desc' => __('Recommended Size: 300 X 350', 'your-prefix'),
                'type' => 'image_advanced',
                'max_file_uploads' => 1
            ),
            array(
                'name' => __('Linkedin Link', 'your-prefix'),
                'id' => "{$team_member_prefix}linkdn_link",
                'desc' => __('', 'your-prefix'),
                'type' => 'text'
            ),
            // array(
            //     'name'  => __( 'Twitter Link', 'your-prefix' ),
            //     'id'    => "{$team_member_prefix}twitt_link",
            //     'desc'  => __( '', 'your-prefix'),
            //     'type'  => 'text'
            // ),array(
            //     'name'  => __( 'Git Link', 'your-prefix' ),
            //     'id'    => "{$team_member_prefix}git_link",
            //     'desc'  => __( '', 'your-prefix'),
            //     'type'  => 'text'
            // ),
        ),

        'validation' => array(
            'rules' => array(
                "post_title" => array(
                    'required' => true,
                    'maxlength' => 50
                ),
                "{$team_member_prefix}role" => array('required' => true),
                "{$team_member_prefix}picture" => array(
                    'required' => true
                ),
                "{$team_member_prefix}linkdn_link" => array(
                    'url' => true
                ),
            )
        )
    );




    $testimonial_prefix = TESTIMONIAL_PREFIX;
    $meta_boxes[] = array(
        'id' => 'nexturn_testimonial_info',
        'title' => __('Other Settings', 'your-prefix'),
        'post_types' => array('nexturn_testimonial'),
        'context' => 'normal',
        'priority' => 'high',
        'autosave' => true,
        'fields' => array(
            array(
                'name' => __('Display Picture', 'your-prefix'),
                'id' => "{$testimonial_prefix}picture",
                'desc' => __('', 'your-prefix'),
                'type' => 'image_advanced',
                'max_file_uploads' => 1
            ),
            array(
                'name' => __('Designation', 'your-prefix'),
                'id' => "{$testimonial_prefix}desg",
                'desc' => __('', 'your-prefix'),
                'type' => 'text',
                'size' => 50
            ),
            array(
                'name' => __('Message', 'your-prefix'),
                'id' => "{$testimonial_prefix}message",
                'desc' => __('', 'your-prefix'),
                'type' => 'textarea',
                'cols' => 70,
                'rows' => 10
            )
        )
    );

    $job_post_prefix = JOB_POST_PREFIX;
    $meta_boxes[] = array(
        'id' => 'nexturn_job_post_info',
        'title' => __('Other Information', 'your-prefix'),
        'post_types' => array('nexturn_job_posts'),
        'context' => 'normal',
        'priority' => 'high',
        'autosave' => true,
        'fields' => array(
            array(
                'name' => __('Location', 'your-prefix'),
                'id' => "{$job_post_prefix}location",
                'desc' => __('', 'your-prefix'),
                'type' => 'text',
                'size' => 50
            ),
            array(
                'name' => __('Work Experience', 'your-prefix'),
                'id' => "{$job_post_prefix}work_exp",
                'desc' => __('', 'your-prefix'),
                'type' => 'text',
                'size'=> 50
            ),
            array(
                'name' => __('Qualification', 'your-prefix'),
                'id' => "{$job_post_prefix}qual",
                'desc' => __('', 'your-prefix'),
                'type' => 'text',
                'size'=> 75
            ),
            array(
                'name' => __('Reports To', 'your-prefix'),
                'id' => "{$job_post_prefix}reports_to",
                'desc' => __('', 'your-prefix'),
                'type' => 'text',
                'size'=> 50
            ),
            array(
                'name' => __('Requirements', 'your-prefix'),
                'id' => "{$job_post_prefix}req",
                'desc' => __('', 'your-prefix'),
                'type' => 'wysiwyg',
                'options' => array(
                    'textarea_rows' => 10,
                    'media_buttons' => false,
                    'teeny' => false,
                    'wpautop' => false
                )
            ),
            array(
                'name' => __('Job Description', 'your-prefix'),
                'id' => "{$job_post_prefix}desc",
                'desc' => __('', domain: 'your-prefix'),
                'type' => 'wysiwyg',
                'options' => array(
                    'textarea_rows' => 10,
                    'media_buttons' => false,
                    'teeny' => false,
                    'wpautop' => false
                )
            ),
            
        )
    );

    $impact_story_prefix = IMPACT_STORY_PREFIX;
    $meta_boxes[] = array(
        'id' => 'nex_impact_story_info',
        'title' => __('Other Information', 'your-prefix'),
        'post_types' => array('nex_impact_stories'),
        'context' => 'normal',
        'priority' => 'high',
        'autosave' => true,
        'fields' => array(
            array(
                'name' => __('Sub Title', 'your-prefix'),
                'id' => "{$impact_story_prefix}sub_title",
                'desc' => __('', 'your-prefix'),
                'type' => 'text',
                'size' => 50
            ),
            array(
                'name' => __('Description', 'your-prefix'),
                'id' => "{$impact_story_prefix}desc",
                'desc' => __('', 'your-prefix'),
                'type' => 'textarea',
                'cols' => 55,
                'rows' => 10,
            )
        )
    );

    $resource_prefix = 'resource_';
    $meta_boxes[] = array(
        'id' => 'resource_info',
        'title' => __('Resource Information', 'your-prefix'),
        'post_types' => array('resource'),
        'context' => 'normal',
        'priority' => 'high',
        'autosave' => true,
        'fields' => array(
            array(
                'name' => __('Summary Description', 'your-prefix'),
                'id' => "{$resource_prefix}summary",
                'type' => 'wysiwyg',
                'options' => array(
                    'textarea_rows' => 5,
                    'media_buttons' => false,
                    'teeny' => false,
                    'wpautop' => false
                ),
                'desc' => __('Short summary used on Resource Center cards.', 'your-prefix'),
            ),
            array(
                'name' => __('Description', 'your-prefix'),
                'id' => "{$resource_prefix}text",
                'type' => 'wysiwyg',
                'options' => array(
                    'textarea_rows' => 10,
                    'media_buttons' => false,
                    'teeny' => false,
                    'wpautop' => false
                ),
            ),
            array(
                'name' => __('Image', 'your-prefix'),
                'id' => "{$resource_prefix}image",
                'type' => 'image_advanced',
                'max_file_uploads' => 1,
            ),
        )
    );

    return $meta_boxes;
}

