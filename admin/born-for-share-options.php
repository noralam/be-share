<?php
/**
 * born-for-share options
 *
 * @author Noor alam
 */
if ( !class_exists('born_for_share_lite_options' ) ):
class born_for_share_lite_options {

    private $settings_api;

    function __construct() {
        $this->settings_api = new born_for_share_lite;

        add_action( 'admin_init', array($this, 'admin_init') );
        add_action( 'admin_menu', array($this, 'admin_menu') );
    }

    function admin_init() {

        //set the settings
        $this->settings_api->set_sections( $this->get_settings_sections() );
        $this->settings_api->set_fields( $this->get_settings_fields() );

        //initialize settings
        $this->settings_api->admin_init();
    }

    function admin_menu() {
		add_menu_page( 
		 __( 'Be share', 'bshare' ),
		__( 'Be share', 'bshare' ), 
		'manage_options',
		'Be-share-options.php',
		array($this, 'plugin_page')
	);
    }

    function get_settings_sections() {
        $sections = array(
            array(
                'id' => 'born_for_share_lite_settings',
                'title' => __( 'All Settings', 'bshare' )
            )
        );
        return $sections;
    }

    /**
     * Returns all the settings fields
     *
     * @return array settings fields
     */
    function get_settings_fields() {
        $settings_fields = array(
            'born_for_share_lite_settings' => array(
				array(
                    'name'    => 'btn_type',
                    'label'   => __( 'Select button type','bshare' ),
                    'desc'    => __( 'Select type icon only or text and icon','bshare' ),
                    'type'    => 'radio',
					'default' => 'textandicon',
                    'options' => array(
                        'textandicon' => __( 'Icon with hover text','bshare' ), 
                        'icon'  => __( 'Icon only','bshare' ),
                    )
                ),
				array(
                    'name'    => 'show_hide',
                    'label'   => __( 'Use show hide click button', 'bshare' ),
                    'desc'    => __( 'You can use show hide click button.Its user friendly and mobile friendly', 'bshare' ),
                    'type'    => 'radio',
					'default' => 'yes',
                    'options' => array(
                        'yes' => __( 'Yes','bshare' ), 
                        'no'  => __( 'No','bshare' ),
                    )
                ),
				array(
                    'name'              => 'btn_top_set',
                    'label'   => __( 'Set button position', 'bshare' ),
                    'desc'    => __( 'Set your button position.Set 25 to 40 for better view.', 'bshare' ),
                    'type'              => 'number',
                    'default'           => '20',
                    'sanitize_callback' => 'intval'
                ),

            ),
            
        );
        return $settings_fields;
    }
    function plugin_page() {
        echo '<div class="wrap easy-solution">';
		echo '<h1>' . esc_html__( 'Be share', 'bshare' ) . '</h1>';
		echo '<p><span id="footer-thankyou">Go premium for set share button on your freedom. <a href="http://codecanyon.net/item/born-for-share/15228769?s_rank=53">premium version</a>.</span></p>';
		echo '<span id="footer-thankyou">Go premium for 32 social share, Share widget with two style, Four different position and text tweet support. <a href="http://codecanyon.net/item/born-for-share/15228769?s_rank=53">premium version</a>.</span>';
        $this->settings_api->show_forms();
		echo '<span id="footer-thankyou">More options go premium. <a href="http://codecanyon.net/item/born-for-share/15228769?s_rank=53">Born for share</a>.</span>';
        echo '</div>';
    }

    /**
     * Get all the pages
     *
     * @return array page names with key value pairs
     */
    function get_pages() {
        $pages = get_pages();
        $pages_options = array();
        if ( $pages ) {
            foreach ($pages as $page) {
                $pages_options[$page->ID] = $page->post_title;
            }
        }

        return $pages_options;
    }

}
endif;
require plugin_dir_path( __FILE__ ) . '/src/class.settings-api.php';
new born_for_share_lite_options();
