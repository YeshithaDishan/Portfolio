<?php
namespace TPCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Background;
use \Elementor\Control_Media;
use \Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Portm Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class TG_Hero_Banner extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'hero-banner';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Hero Banner', 'tpcore' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'tp-icon';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'tpcore' ];
	}

	/**
	 * Retrieve the list of scripts the widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return [ 'tpcore-slider' ];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function register_controls() {

        // layout Panel
        $this->start_controls_section(
            'tg_layout',
            [
                'label' => esc_html__('Design Layout', 'tpcore'),
            ]
        );
        $this->add_control(
            'tg_design_style',
            [
                'label' => esc_html__('Select Layout', 'tpcore'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'layout-1' => esc_html__('Layout 1', 'tpcore'),
                    'layout-2' => esc_html__('Layout 2', 'tpcore'),
                ],
                'default' => 'layout-1',
            ]
        );

        $this->end_controls_section();

        // Background Image
        $this->start_controls_section(
            'tg_section_bg',
            [
                'label' => esc_html__('Background Image', 'tpcore'),
            ]
        );

        $this->add_control(
            'tg_image02',
            [
                'label' => esc_html__( 'Choose Image', 'tpcore' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'tg_image_size02',
                'default' => 'full',
                'exclude' => [
                    'custom'
                ]
            ]
        );

        $this->end_controls_section();


        // Designation Detail
        $this->start_controls_section(
            'tp_designation_section',
            [
                'label' => esc_html__('Designation Detail', 'tpcore'),
                'condition' => [
                    'tg_design_style' => 'layout-1'
                ]                             
            ]
        );

        $this->add_control(
            'tg_designation_name',
            [
                'label' => esc_html__('Designation Name', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('UI/UX Designer', 'tpcore'),
                'placeholder' => esc_html__('Type Designation Name', 'tpcore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_designation_location',
            [
                'label' => esc_html__('Designation Location', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Based in USA', 'tpcore'),
                'placeholder' => esc_html__('Type Designation Location', 'tpcore'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        // Email
        $this->start_controls_section(
            'tp_email_section',
            [
                'label' => esc_html__('Email', 'tpcore'),
                 'condition' => [
                    'tg_design_style' => 'layout-1'
                ]                            
            ]
        );

        $this->add_control(
            'tg_profile_email_subtitle',
            [
                'label' => esc_html__('Email Subtitle', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Say hello to', 'tpcore'),
                'placeholder' => esc_html__('Type Email Subtitle', 'tpcore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_profile_email',
            [
                'label' => esc_html__('Email', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('doe@gmail.com', 'tpcore'),
                'placeholder' => esc_html__('Type Email Here', 'tpcore'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        // Client Satisfactio
        $this->start_controls_section(
            'tp_client_section',
            [
                'label' => esc_html__('Client Satisfaction', 'tpcore'),
                 'condition' => [
                    'tg_design_style' => 'layout-1'
                ]                            
            ]
        );

        $this->add_control(
            'tg_client_satisfaction',
            [
                'label' => esc_html__('Client Satisfaction Title', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Client Satisfaction', 'tpcore'),
                'placeholder' => esc_html__('Type Client Title', 'tpcore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_client_satisfaction_number',
            [
                'label' => esc_html__('Client Satisfaction Number', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('100', 'tpcore'),
                'placeholder' => esc_html__('Type Client Number', 'tpcore'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        // Project Sectiion
        $this->start_controls_section(
            'tp_project_section',
            [
                'label' => esc_html__('Project Sectiion', 'tpcore'),
                'condition' => [
                    'tg_design_style' => 'layout-1'
                ]                             
            ]
        );

        $this->add_control(
            'tg_project_title',
            [
                'label' => esc_html__('Project Title', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Project Done', 'tpcore'),
                'placeholder' => esc_html__('Type Project Title', 'tpcore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_project_number',
            [
                'label' => esc_html__('Project Number', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('690', 'tpcore'),
                'placeholder' => esc_html__('Type Project Number', 'tpcore'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        // Years Experience
        $this->start_controls_section(
            'tp_years_experience',
            [
                'label' => esc_html__('Years Experience', 'tpcore'),             
            ]
        );

        $this->add_control(
            'tg_experience_title',
            [
                'label' => esc_html__('Experience Title', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Years Experience', 'tpcore'),
                'placeholder' => esc_html__('Type xperience Title', 'tpcore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_experience_subtitle',
            [
                'label' => esc_html__('Experience Sub Title', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Happy Clients', 'tpcore'),
                'placeholder' => esc_html__('Type Experience SubTitle', 'tpcore'),
                'label_block' => true,
                 'condition' => [
                    'tg_design_style' => 'layout-2'
                ]                
            ]
        );

        $this->add_control(
            'tg_experience_years',
            [
                'label' => esc_html__('Experience Years', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('8', 'tpcore'),
                'placeholder' => esc_html__('Type Experience Years', 'tpcore'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        // _tg_image
        $this->start_controls_section(
            '_tg_image',
            [
                'label' => esc_html__('Profile Image', 'tpcore'),
            ]
        );

        $this->add_control(
            'tg_image',
            [
                'label' => esc_html__( 'Choose Image', 'tpcore' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'tg_image_size',
                'default' => 'full',
                'exclude' => [
                    'custom'
                ]
            ]
        );

         $this->add_control(
            'tg_image03',
            [
                'label' => esc_html__( 'Profile Background Image', 'tpcore' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'tg_design_style' => 'layout-2'
                ]                
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'tg_image_size03',
                'default' => 'full',
                'exclude' => [
                    'custom'
                ],
                'condition' => [
                    'tg_design_style' => 'layout-2'
                ]                
            ]
        );       

        $this->end_controls_section();

        // _banner_social
        $this->start_controls_section(
            '_tg_social_section',
            [
                'label' => esc_html__('Social Section', 'tpcore'),
            ]
        );


        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'tg_social_text',
            [
                'label' => esc_html__('Social Name', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Facebook', 'tpcore'),
                'placeholder' => esc_html__('Type: fab fa-twitter', 'tpcore'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'reviewer_image',
            [
                'label' => esc_html__( 'Reviewer Image', 'tpcore' ),
                'type' => Controls_Manager::MEDIA,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'reviewer_image_size',
                'default' => 'thumbnail',
                'exclude' => [
                    'custom'
                ]
            ]
        );
               

        $repeater->add_control(
            'tg_social_url',
            [
                'label' => esc_html__('Social Url', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('#', 'tpcore'),
                'placeholder' => esc_html__('Type social link', 'tpcore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_social_list',
            [
                'label' => esc_html__('Social List', 'tpcore'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'tg_social_text' => esc_html__('facebook', 'tpcore'),
                    ],
                    [
                        'tg_social_text' => esc_html__('twitter', 'tpcore'),
                    ],
                    [
                        'tg_social_text' => esc_html__('instagram', 'tpcore'),
                    ],                   
                ],
                'title_field' => '{{{ tg_social_text }}}',
            ]
        );

        $this->end_controls_section();

       // tp_section_title
        $this->start_controls_section(
            'tp_section_title',
            [
                'label' => esc_html__('Name & Content', 'tpcore'),                               
            ]
        );

        $this->add_control(
            'tp_section_title_show',
            [
                'label' => esc_html__( 'Name & Sub Title', 'tpcore' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'tpcore' ),
                'label_off' => esc_html__( 'Hide', 'tpcore' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'tg_sub_title',
            [
                'label' => esc_html__('Sub Title', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Do you have a project?', 'tpcore'),
                'placeholder' => esc_html__('Type Sub Title Text', 'tpcore'),
                'label_block' => true, 
            ]
        );

        $this->add_control(
            'tg_title',
            [
                'label' => esc_html__('Name', 'tpcore'),
                'description' => tp_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => tp_kses('Jonathon Doe', 'tpcore'),
                'placeholder' => esc_html__('Type Heading Text', 'tpcore'),
                'label_block' => true,
                  'condition' => [
                    'tg_design_style' => 'layout-1'
                ]               
            ]
        );

        $this->add_control(
            'tg_title2',
            [
                'label' => esc_html__('Name', 'tpcore'),
                'description' => tp_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => tp_kses('<span class="cs_gradient_text">John </span><span class="cs_gradient_border_text">Smith</span>', 'tpcore'),
                'placeholder' => esc_html__('Type Heading Text', 'tpcore'),
                'label_block' => true,
                 'condition' => [
                    'tg_design_style' => 'layout-2'
                ]                 
            ]
        );

        $this->add_control(
            'tg_designation_text',
            [
                'label' => esc_html__('Designation Text', 'tpcore'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => tp_kses('Full-stack <span class="cs_accent_color_2">Web Developer</span>', 'tpcore'),
                'placeholder' => esc_html__('Type Sub Title Text', 'tpcore'),
                'label_block' => true,
                'condition' => [
                    'tg_design_style' => 'layout-2'
                ]                   
            ]
        );

        $this->add_control(
            'tg_description',
            [
                'label' => esc_html__('Description', 'tpcore'),
                'description' => tp_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => tp_kses('I build all kinds of websites including <span class="cs_primary_color">WordPress themes</span> and <span class="cs_primary_color">plugins</span> that scale up company businesses and meet their needs. Currently, I am living in <span class="cs_primary_color">Dhaka Bangladesh</span>', 'tpcore'),
                'placeholder' => esc_html__('Type section description here', 'tpcore'),
                'condition' => [
                    'tg_design_style' => 'layout-2'
                ]  
            ]
        );        

        $this->add_control(
            'tg_title_tag',
            [
                'label' => esc_html__('Title HTML Tag', 'tpcore'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'h1' => [
                        'title' => esc_html__('H1', 'tpcore'),
                        'icon' => 'eicon-editor-h1'
                    ],
                    'h2' => [
                        'title' => esc_html__('H2', 'tpcore'),
                        'icon' => 'eicon-editor-h2'
                    ],
                    'h3' => [
                        'title' => esc_html__('H3', 'tpcore'),
                        'icon' => 'eicon-editor-h3'
                    ],
                    'h4' => [
                        'title' => esc_html__('H4', 'tpcore'),
                        'icon' => 'eicon-editor-h4'
                    ],
                    'h5' => [
                        'title' => esc_html__('H5', 'tpcore'),
                        'icon' => 'eicon-editor-h5'
                    ],
                    'h6' => [
                        'title' => esc_html__('H6', 'tpcore'),
                        'icon' => 'eicon-editor-h6'
                    ]
                ],
                'default' => 'h1',
                'toggle' => false,
                 'condition' => [
                    'tg_design_style' => 'layout-1'
                ]                
            ]
        );

        $this->add_responsive_control(
            'tp_align',
            [
                'label' => esc_html__('Alignment', 'tpcore'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'text-left' => [
                        'title' => esc_html__('Left', 'tpcore'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'text-center' => [
                        'title' => esc_html__('Center', 'tpcore'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'text-right' => [
                        'title' => esc_html__('Right', 'tpcore'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'left',
                'toggle' => false,
                 'condition' => [
                    'tg_design_style' => 'layout-1'
                ]                
            ]
        );
        $this->end_controls_section();

        // tp button layout2
        $this->start_controls_section(
            'tp_button_layout2',
            [
                'label' => esc_html__('Dual Button', 'tpcore'),
                 'condition' => [
                    'tg_design_style' => 'layout-2'
                ]                 
            ]                                               

        );

        $this->add_control(
            'tp_button_layout_show',
            [
                'label' => esc_html__( 'Name & Sub Title', 'tpcore' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'tpcore' ),
                'label_off' => esc_html__( 'Hide', 'tpcore' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'tg_download_btn_text',
            [
                'label' => esc_html__('Download Button Text', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Download CV', 'tpcore'),
                'placeholder' => esc_html__('Type Download Button Text', 'tpcore'),
                'label_block' => true, 
            ]
        );

        $this->add_control(
            'tg_download_btn_url',
            [
                'label' => esc_html__('Download Button Url', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('https://www.africau.edu/images/default/sample.pdf', 'tpcore'),
                'placeholder' => esc_html__('Type Download Button Url', 'tpcore'),
                'label_block' => true, 
            ]
        );


        $this->add_control(
            'tg_btn_text2',
            [
                'label' => esc_html__('Second Button Text', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Let’s Talk', 'tpcore'),
                'placeholder' => esc_html__('Type Second Butto Text', 'tpcore'),
                'label_block' => true, 
            ]
        );

        $this->add_control(
            'tg_btn_text2_url',
            [
                'label' => esc_html__('Second Button Url', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('#', 'tpcore'),
                'placeholder' => esc_html__('Type Second Button Url', 'tpcore'),
                'label_block' => true, 
            ]
        );       


        $this->end_controls_section();

        // tg_btn_button_group
        $this->start_controls_section(
            'tg_btn_button_group',
            [
                'label' => esc_html__('Button', 'tpcore'),
                 'condition' => [
                    'tg_design_style' => 'layout-1'
                ]                 
            ]
        );

        $this->add_control(
            'tg_button_show',
            [
                'label' => esc_html__( 'Show Button', 'tpcore' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'tpcore' ),
                'label_off' => esc_html__( 'Hide', 'tpcore' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'tg_btn_text',
            [
                'label' => esc_html__('Button Text', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Let’s Talk', 'tpcore'),
                'title' => esc_html__('Enter button text', 'tpcore'),
                'label_block' => true,
                'condition' => [
                    'tg_button_show' => 'yes'
                ],
            ]
        );

        $this->add_control(
            'tg_btn_link_type',
            [
                'label' => esc_html__('Button Link Type', 'tpcore'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '1' => 'Custom Link',
                    '2' => 'Internal Page',
                ],
                'default' => '1',
                'label_block' => true,
                'condition' => [
                    'tg_button_show' => 'yes'
                ],
            ]
        );
        $this->add_control(
            'tg_btn_link',
            [
                'label' => esc_html__('Button link', 'tpcore'),
                'type' => Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__('https://your-link.com', 'tpcore'),
                'show_external' => false,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'condition' => [
                    'tg_btn_link_type' => '1',
                    'tg_button_show' => 'yes'
                ],
                'label_block' => true,
            ]
        );
        $this->add_control(
            'tg_btn_page_link',
            [
                'label' => esc_html__('Select Button Page', 'tpcore'),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'options' => tp_get_all_pages(),
                'condition' => [
                    'tg_btn_link_type' => '2',
                    'tg_button_show' => 'yes'
                ]
            ]
        );
        $this->end_controls_section();

		// TAB_STYLE
		$this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Style', 'tpcore' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'text_transform',
			[
				'label' => __( 'Text Transform', 'tpcore' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => __( 'None', 'tpcore' ),
					'uppercase' => __( 'UPPERCASE', 'tpcore' ),
					'lowercase' => __( 'lowercase', 'tpcore' ),
					'capitalize' => __( 'Capitalize', 'tpcore' ),
				],
				'selectors' => [
					'{{WRAPPER}} .cs-hero_title' => 'text-transform: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
    ?>

    <?php if ( $settings['tg_design_style']  == 'layout-2' ):

        if ( !empty($settings['tg_image']['url']) ) {
            $tg_image = !empty($settings['tg_image']['id']) ? wp_get_attachment_image_url( $settings['tg_image']['id'], $settings['tg_image_size_size']) : $settings['tg_image']['url'];
            $tg_image_alt = get_post_meta($settings["tg_image"]["id"], "_wp_attachment_image_alt", true);
        }

        if ( !empty($settings['tg_image02']['url']) ) {
            $tg_image02 = !empty($settings['tg_image02']['id']) ? wp_get_attachment_image_url( $settings['tg_image02']['id'], $settings['tg_image_size02_size']) : $settings['tg_image02']['url'];
            $tg_image_alt02 = get_post_meta($settings["tg_image02"]["id"], "_wp_attachment_image_alt", true);
        }

        if ( !empty($settings['tg_image03']['url']) ) {
            $tg_image03 = !empty($settings['tg_image03']['id']) ? wp_get_attachment_image_url( $settings['tg_image03']['id'], $settings['tg_image_size03_size']) : $settings['tg_image03']['url'];
            $tg_image_alt03 = get_post_meta($settings["tg_image03"]["id"], "_wp_attachment_image_alt", true);
        }
         // Link
        if ('2' == $settings['tg_btn_link_type']) {
            $this->add_render_attribute('tg-button-arg', 'href', get_permalink($settings['tg_btn_page_link']));
            $this->add_render_attribute('tg-button-arg', 'target', '_self');
            $this->add_render_attribute('tg-button-arg', 'rel', 'nofollow');
            $this->add_render_attribute('tg-button-arg', 'class', 'cs_semi_bold cs_accent_color cs_text_btn');
        } else {
            if ( ! empty( $settings['tg_btn_link']['url'] ) ) {
                $this->add_link_attributes( 'tg-button-arg', $settings['tg_btn_link'] );
                $this->add_render_attribute('tg-button-arg', 'class', 'cs_semi_bold cs_accent_color cs_text_btn');
            }
        }

        $this->add_render_attribute('title_args', 'class', 'cs_font_24 cs_accent_color_2 cs_accent_color_2_hover cs_text_btn cs_type_2 cs_semi_bold');       

		?>

          <!-- Start Hero Section -->
            <section class="cs_hero cs_style_2 cs_filled_bg" data-src="<?php echo esc_url( $tg_image02 ); ?>">
              <div class="container">
                <div class="row align-items-center">
                  <div class="col-lg-6">
                    <div class="cs_hero_info cs_pr_20">
                     <?php if ( !empty($settings['tp_section_title_show']) ) : ?>
                         <?php if (!empty($settings['tg_sub_title'])) : ?>
                          <h4 class="cs_hero_meta cs_font_48 cs_white_blue_text_2 cs_semi_bold cs_primary_font mb-0"><?php echo tp_kses( $settings['tg_sub_title'] ); ?><br>
                          </h4>
                          <?php endif; ?>
                          <?php if (!empty($settings['tg_title2'])) : ?> 
                          <h1 class="cs_hero_title cs_font_92 cs_black wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="0.2s">
                              <?php echo tp_kses( $settings['tg_title2'] ); ?>
                          </h1>
                         <?php endif; ?>
                         <?php if (!empty($settings['tg_designation_text'])) : ?>
                          <h4 class="cs_hero_subtitle cs_font_36 cs_semi_bold cs_primary_font cs_white_blue_text_2">
                            <?php echo tp_kses( $settings['tg_designation_text'] ); ?>
                          </h4>
                         <?php endif; ?>
                         <?php if (!empty($settings['tg_description'])) : ?>
                          <p class="cs_hero_text">
                            <?php echo tp_kses( $settings['tg_description'] ); ?>
                        </p>
                        <?php endif; ?>
                     <?php endif; ?>
                      <div class="cs_social_btns d-flex">

                        <?php foreach ($settings['tg_social_list'] as $item) :
                        if ( !empty($item['reviewer_image']['url']) ) {
                            $tg_reviewer_image = !empty($item['reviewer_image']['id']) ? wp_get_attachment_image_url( $item['reviewer_image']['id'], $item['reviewer_image_size_size']) : $item['reviewer_image']['url'];
                        }
                         ?>
                        <a class="cs_accent_color_2" href="<?php echo esc_url( $item['tg_social_url'] ); ?>">
                            <img src="<?php echo esc_url($tg_reviewer_image); ?>" />
                        </a>
                        <?php endforeach; ?>

                      </div>
                     <?php if ( !empty($settings['tp_button_layout_show']) ) : ?>
                      <div class="cs_btns">
                        <?php if (!empty($settings['tg_download_btn_text'])) : ?>
                            <a href="<?php echo esc_url( $settings['tg_download_btn_url'] ); ?>" class="cs_btn cs_style_1" download><span><?php echo esc_html( $settings['tg_download_btn_text'] ); ?></span></a>
                        <?php endif; ?>
                        <?php if (!empty($settings['tg_btn_text2'])) : ?>
                            <a class="cs_font_24 cs_accent_color_2 cs_accent_color_2_hover cs_text_btn cs_type_2 cs_semi_bold"
                          href="<?php echo esc_url( $settings['tg_btn_text2_url'] ); ?>"><?php echo esc_html( $settings['tg_btn_text2'] ); ?></a>
                        <?php endif; ?>
                      </div>
                      <?php endif; ?>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="cs_hero_image_box cs_filled_bg"
                    data-src="<?php echo esc_url( $tg_image03 ); ?>">
                    <?php if (!empty( $settings['tg_image'] )) : ?>
                    <div class="cs_imagebox_img w-100"><img src="<?php echo esc_url($tg_image); ?>" alt="<?php echo esc_url($tg_image_alt); ?>"></div>
                    <?php endif; ?>
                    <?php if (!empty($settings['tg_experience_title'])) : ?>
                      <div
                        class="cs_happy_client position-absolute cs_white_bg d-flex align-items-center cs_radius_20 cs_gap_15">
                        <?php if (!empty($settings['tg_experience_years'])) : ?>
                        <div class="cs_font_36 cs_semi_bold cs_accent_color_2"><span class="odometer"
                            data-count-to="<?php echo esc_html( $settings['tg_experience_years'] ); ?>"></span><span>+</span></div>
                        <?php endif; ?>
                        <div>
                          <h5 class="mb-0 cs_normal experience-title-area"><?php echo esc_html( $settings['tg_experience_title'] ); ?></h5>
                        <?php if (!empty($settings['tg_experience_subtitle'])) : ?>
                          <p class="mb-0 cs_font_16"><?php echo esc_html( $settings['tg_experience_subtitle'] ); ?></p>
                        <?php endif; ?>
                        </div>

                      </div>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <!-- Start Hero Section -->

        <?php else:

            if ( !empty($settings['tg_image']['url']) ) {
                $tg_image = !empty($settings['tg_image']['id']) ? wp_get_attachment_image_url( $settings['tg_image']['id'], $settings['tg_image_size_size']) : $settings['tg_image']['url'];
                $tg_image_alt = get_post_meta($settings["tg_image"]["id"], "_wp_attachment_image_alt", true);
            }

            if ( !empty($settings['tg_image02']['url']) ) {
                $tg_image02 = !empty($settings['tg_image02']['id']) ? wp_get_attachment_image_url( $settings['tg_image02']['id'], $settings['tg_image_size02_size']) : $settings['tg_image02']['url'];
                $tg_image_alt02 = get_post_meta($settings["tg_image02"]["id"], "_wp_attachment_image_alt", true);
            }

            // Link
            if ('2' == $settings['tg_btn_link_type']) {
                $this->add_render_attribute('tg-button-arg', 'href', get_permalink($settings['tg_btn_page_link']));
                $this->add_render_attribute('tg-button-arg', 'target', '_self');
                $this->add_render_attribute('tg-button-arg', 'rel', 'nofollow');
                $this->add_render_attribute('tg-button-arg', 'class', 'cs_semi_bold cs_accent_color cs_text_btn');
            } else {
                if ( ! empty( $settings['tg_btn_link']['url'] ) ) {
                    $this->add_link_attributes( 'tg-button-arg', $settings['tg_btn_link'] );
                    $this->add_render_attribute('tg-button-arg', 'class', 'cs_semi_bold cs_accent_color cs_text_btn');
                }
            }

            $this->add_render_attribute('title_args', 'class', 'cs_hero_title cs_font_92 cs_extra_bold cs_link cs_gradient_text_2');
         ?>

        <!-- Start Hero Section -->
        <section class="cs_hero cs_style_1 cs_filled_bg" data-src="<?php echo esc_url( $tg_image02 ); ?>">
          <div class="cs_hero_box">
            <?php if (!empty( $settings['tg_image'] )) : ?>
                <img src="<?php echo esc_url($tg_image); ?>" alt="<?php echo esc_url($tg_image_alt); ?>">
            <?php endif; ?>
            <?php if ( !empty($settings['tp_section_title_show']) ) : ?>
            <div class="cs_hero_box_in wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">
             <?php
                if ( !empty($settings['tg_title' ]) ) :
                    printf( '<%1$s %2$s>%3$s</%1$s>',
                    tag_escape( $settings['tg_title_tag'] ),
                    $this->get_render_attribute_string( 'title_args' ),
                    tp_kses( $settings['tg_title' ] )
                );
            endif;
            ?>
              <p class="cs_hero_subtitle cs_font_24">
                <?php if (!empty($settings['tg_sub_title'])) : ?>
                    <?php echo esc_html( $settings['tg_sub_title'] ); ?>
                <?php endif; ?>
                <a <?php echo $this->get_render_attribute_string( 'tg-button-arg' ); ?> ><?php echo $settings['tg_btn_text']; ?></a>
              </p>
            </div>
            <?php endif; ?>
          </div>
          <div class="container cs_hero_info d-flex justify-content-between">
            <div class="cs_hero_left">
              <ul class="cs_mp_0">
                <?php if (!empty($settings['tg_designation_name'])) : ?>
                <li class="cs_hero_meta d-flex align-items-center">
                  <div>
                    <div class="cs_dot cs_accent_color cs_font_20 cs_semi_bold"><?php echo esc_html( $settings['tg_designation_name'] ); ?></div>
                    <?php if (!empty($settings['tg_designation_location'])) : ?>
                    <span class="cs_white_color cs_opacity_06"><?php echo esc_html( $settings['tg_designation_location'] ); ?></span>
                    <?php endif; ?>
                  </div>
                </li>
                <?php endif; ?>
                <?php if (!empty($settings['tg_profile_email'])) : ?>
                <li class="cs_hero_meta d-flex align-items-center">
                  <div>
                    <?php if (!empty($settings['tg_profile_email_subtitle'])) : ?>
                    <div class="cs_dot cs_white_color cs_opacity_06"><?php echo esc_html( $settings['tg_profile_email_subtitle'] ); ?></div>
                    <?php endif; ?>
                    <span class="cs_white_color"><?php echo esc_html( $settings['tg_profile_email'] ); ?></span>
                  </div>
                </li>
                <?php endif; ?>
              </ul>
              <div class="cs_height_75 cs_height_lg_50"></div>
              <div class="cs_social_btns d-flex cs_gap_30">

                <?php foreach ($settings['tg_social_list'] as $item) :
                if ( !empty($item['reviewer_image']['url']) ) {
                    $tg_reviewer_image = !empty($item['reviewer_image']['id']) ? wp_get_attachment_image_url( $item['reviewer_image']['id'], $item['reviewer_image_size_size']) : $item['reviewer_image']['url'];
                }
                 ?>
                <a class="cs_accent_color_2" href="<?php echo esc_url( $item['tg_social_url'] ); ?>">
                    <img src="<?php echo esc_url($tg_reviewer_image); ?>" />
                </a>
                <?php endforeach; ?>

              </div>
            </div>
            <div>
            <?php if (!empty($settings['tg_client_satisfaction'])) : ?>
              <div class="cs_funfact cs_style_1 text-end">
                <?php if (!empty($settings['tg_client_satisfaction_number'])) : ?>
                <h2 class="cs_funfact_number cs_font_24 cs_white_color cs_semi_bold m-0">
                  <span class="odometer" data-count-to="<?php echo esc_html( $settings['tg_client_satisfaction_number'] ); ?>"></span>%
                </h2>
                <?php endif; ?>
                <div class="cs_white_color cs_opacity_06"><?php echo esc_html( $settings['tg_client_satisfaction'] ); ?></div>
              </div>
            <?php endif; ?>
            <?php if (!empty($settings['tg_project_title'])) : ?>
              <div class="cs_funfact cs_style_1 text-end">
                <?php if (!empty($settings['tg_project_number'])) : ?>
                <h2 class="cs_funfact_number cs_font_24 cs_white_color cs_semi_bold m-0">
                  <span class="odometer" data-count-to="<?php echo esc_html( $settings['tg_project_number'] ); ?>"></span>+
                </h2>
               <?php endif; ?>
                <div class="cs_white_color cs_opacity_06"><?php echo esc_html( $settings['tg_project_title'] ); ?></div>
              </div>
             <?php endif; ?>
             <?php if (!empty($settings['tg_experience_title'])) : ?>
              <div class="cs_funfact cs_style_1 text-end">
               <?php if (!empty($settings['tg_experience_years'])) : ?>
                <h2 class="cs_funfact_number cs_font_24 cs_white_color cs_semi_bold m-0">
                  <span class="odometer" data-count-to="<?php echo esc_html( $settings['tg_experience_years'] ); ?>"></span>+
                </h2>
                <?php endif; ?>
                <div class="cs_white_color cs_opacity_06"><?php echo esc_html( $settings['tg_experience_title'] ); ?></div>
              </div>
             <?php endif; ?>
            </div>
          </div>
        </section>
        <!-- Start Hero Section -->

        <?php endif; ?>

    <?php
	}

}

$widgets_manager->register( new TG_Hero_Banner() );