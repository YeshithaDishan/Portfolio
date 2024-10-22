<?php
namespace TPCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Control_Media;
use \Elementor\Group_Control_Box_Shadow;
use TPCore\Elementor\Controls\Group_Control_TPBGGradient;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Multim Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class TP_About extends Widget_Base {

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
		return 'about';
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
		return __( 'About', 'tpcore' );
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
                    'layout-3' => esc_html__('Layout 3', 'tpcore'),
                    'layout-4' => esc_html__('Layout 4', 'tpcore'),                   
                ],
                'default' => 'layout-1',
            ]
        );

        $this->end_controls_section();

        // _tg_image
		$this->start_controls_section(
            '_tg_image',
            [
                'label' => esc_html__('Thumbnail', 'tpcore'),
                'condition' => [
                    'tg_design_style' => ['layout-1','layout-3','layout-4'],
                ]                
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

        $this->end_controls_section();

        // tp_section_title
        $this->start_controls_section(
            'tp_percentage_section',
            [
                'label' => esc_html__('Happy Clients', 'tpcore'),
                'condition' => [
                    'tg_design_style' => ['layout-1','layout-4'],
                ]                 
            ]
        );

        $this->add_control(
            'tg_percentage_show',
            [
                'label' => esc_html__( 'Section Title & Content', 'tpcore' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'tpcore' ),
                'label_off' => esc_html__( 'Hide', 'tpcore' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'tg_happy_client_emoji',
            [
                'label' => esc_html__('Emoji Image Text', 'tpcore'),
                'description' => tp_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('😍', 'tpcore'),
                'placeholder' => esc_html__('Type Emoji Image Text', 'tpcore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_percentage_title',
            [
                'label' => esc_html__('Happy Clients Title', 'tpcore'),
                'description' => tp_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Happy Clients', 'tpcore'),
                'placeholder' => esc_html__('Type Title Text', 'tpcore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_percentage_Number',
            [
                'label' => esc_html__('Happy Clients Number', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('80', 'tpcore'),
                'placeholder' => esc_html__('Type Clients Number', 'tpcore'),
                'label_block' => true,
            ]
        );


        $this->end_controls_section();

        // tp_section_title
        $this->start_controls_section(
            'tp_section_title',
            [
                'label' => esc_html__('Title & Content', 'tpcore'),
            ]
        );

        $this->add_control(
            'tg_section_title_show',
            [
                'label' => esc_html__( 'Section Title & Content', 'tpcore' ),
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
                'description' => tp_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('About Me', 'tpcore'),
                'placeholder' => esc_html__('Type Sub Title Text', 'tpcore'),
                'label_block' => true,
                'condition' => [
                    'tg_design_style' => ['layout-1','layout-2'],
                ]                 
            ]
        );

        $this->add_control(
            'tg_title',
            [
                'label' => esc_html__('Title', 'tpcore'),
                'description' => tp_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => tp_kses('Why you <b>hire me</b> for your <span>next project?</span>', 'tpcore'),
                'placeholder' => esc_html__('Type Heading Text', 'tpcore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_description',
            [
                'label' => esc_html__('Description', 'tpcore'),
                'description' => tp_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.', 'tpcore'),
                'placeholder' => esc_html__('Type section description here', 'tpcore'),
                'condition' => [
                    'tg_design_style' => ['layout-2','layout-3','layout-4'],
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
                'default' => 'h2',
                'toggle' => false,
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
            ]
        );
        $this->end_controls_section();

       // tg_btn_button_group
        $this->start_controls_section(
            'tg_btn_button_group',
            [
                'label' => esc_html__('Button', 'tpcore'),
                 'condition' => [
                    'tg_design_style' => 'layout-2'
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


       // tp_section_tab01
        $this->start_controls_section(
            'tp_section_tab01',
            [
                'label' => esc_html__('Tab 01', 'tpcore'),
                'condition' => [
                    'tg_design_style' => 'layout-1'
                ] 
            ]
        );

        $this->add_control(
            'tg_tab_title1',
            [
                'label' => esc_html__('Tab Title 1', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Myself', 'tpcore'),
                'placeholder' => esc_html__('Type Tab Title 1 Text', 'tpcore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_tab_description1',
            [
                'label' => esc_html__('Tab Description 1', 'tpcore'),
                'description' => tp_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem aenean massa ultricies nec.', 'tpcore'),
                'placeholder' => esc_html__('Type Tab description 1 here', 'tpcore'),
            ]
        );

        $this->add_control(
            'tg_btn_text2',
            [
                'label' => esc_html__('Button Text', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Hire Me', 'tpcore'),
                'placeholder' => esc_html__('Type Button Text', 'tpcore'),
                'label_block' => true, 
            ]
        );

        $this->add_control(
            'tg_btn_text2_url',
            [
                'label' => esc_html__('Button Url', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('#', 'tpcore'),
                'placeholder' => esc_html__('Type Button Url', 'tpcore'),
                'label_block' => true, 
            ]
        );   

        $this->end_controls_section();

       // tp_section_tab02
        $this->start_controls_section(
            'tp_section_tab02',
            [
                'label' => esc_html__('Tab 02', 'tpcore'),
                'condition' => [
                    'tg_design_style' => 'layout-1'
                ]                 
            ]
        );

        $this->add_control(
            'tg_tab_title2',
            [
                'label' => esc_html__('Tab Title 2', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Education', 'tpcore'),
                'placeholder' => esc_html__('Type Tab Title 2 Text', 'tpcore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_tab_description2',
            [
                'label' => esc_html__('Tab Description 2', 'tpcore'),
                'description' => tp_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem aenean massa ultricies nec.', 'tpcore'),
                'placeholder' => esc_html__('Type Tab description 1 here', 'tpcore'),
            ]
        );

        $this->end_controls_section();

       // tp_section_tab03
        $this->start_controls_section(
            'tp_section_tab03',
            [
                'label' => esc_html__('Tab 03', 'tpcore'),
                'condition' => [
                    'tg_design_style' => 'layout-1'
                ]                 
            ]
        );

        $this->add_control(
            'tg_tab_title3',
            [
                'label' => esc_html__('Tab Title 3', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('My tools', 'tpcore'),
                'placeholder' => esc_html__('Type Tab Title 2 Text', 'tpcore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_tab_subtitle3',
            [
                'label' => esc_html__('Tab sub Title', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Skills', 'tpcore'),
                'placeholder' => esc_html__('Type Sub Title Text', 'tpcore'),
                'label_block' => true,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'name',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__( 'Name', 'tpcore' ),
                'default' => esc_html__( 'Design', 'tpcore' ),
                'placeholder' => esc_html__( 'Type a skill name', 'tpcore' ),
            ]
        );

        $repeater->add_control(
            'level',
            [
                'label' => esc_html__( 'Level (Out Of 100)', 'tpcore' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'unit' => '%',
                    'size' => 95
                ],
                'size_units' => ['%'],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'skills',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '<# print((name || level.size) ? (name || "Skill") + " - " + level.size + level.unit : "Skill - 0%") #>',
                'default' => [
                    [
                        'name' => 'HTML',
                        'level' => ['size' => 89, 'unit' => '%']
                    ],
                    [
                        'name' => 'ReactJS',
                        'level' => ['size' => 95, 'unit' => '%']
                    ],
                     [
                        'name' => 'WordPress',
                        'level' => ['size' => 70, 'unit' => '%']
                    ],                   
                ]
            ]
        );


        $this->end_controls_section();

        // _tg_about2_section
        $this->start_controls_section(
            '_tg_about2_section',
            [
                'label' => esc_html__('About Detail', 'tpcore'),
                'condition' => [
                    'tg_design_style' => 'layout-2'
                ]                  
            ]
        );


        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'tg_about_designation_title',
            [
                'label' => esc_html__('Designation Title', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Front-end', 'tpcore'),
                'placeholder' => esc_html__('Type Designation Title', 'tpcore'),
                'label_block' => true,
            ]
        );

         $repeater->add_control(
            'tg_about_designation_text',
            [
                'label' => esc_html__('Designation Content', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Lorem ipsum dolor sit amet, consectetuer', 'tpcore'),
                'placeholder' => esc_html__('Type Designation Content', 'tpcore'),
                'label_block' => true,
            ]
        );       

         $repeater->add_control(
            'tg_about_project_text',
            [
                'label' => esc_html__('Project Content', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('190 Projects', 'tpcore'),
                'placeholder' => esc_html__('Type Project Content', 'tpcore'),
                'label_block' => true,
            ]
        );

          $repeater->add_control(
            'tg_about_project_url',
            [
                'label' => esc_html__('Button Link', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('#', 'tpcore'),
                'placeholder' => esc_html__('Type Button Link', 'tpcore'),
                'label_block' => true,
            ]
        );         

        $repeater->add_control(
            'reviewer_image',
            [
                'label' => esc_html__( 'Reviewer Image', 'tpcore' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
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
               

        $this->add_control(
            'tg_about2_list',
            [
                'label' => esc_html__('About Detail List', 'tpcore'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'tg_about_designation_title' => esc_html__('Front-end', 'tpcore'),
                    ],
                    [
                        'tg_about_designation_title' => esc_html__('Back-end', 'tpcore'),
                    ],
                    [
                        'tg_about_designation_title' => esc_html__('Web architecture', 'tpcore'),
                    ],                   
                ],
                'title_field' => '{{{ tg_about_designation_title }}}',
            ]
        );

        $this->end_controls_section();


        // tp_right_coulmn_section
        $this->start_controls_section(
            'tp_right_coulmn_section',
            [
                'label' => esc_html__('Right Coulmn Content', 'tpcore'),
                'condition' => [
                    'tg_design_style' => 'layout-3'
                ]                 
            ]
        );

        $this->add_control(
            'tg_right_description',
            [
                'label' => esc_html__('Description', 'tpcore'),
                'description' => tp_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis', 'tpcore'),
                'placeholder' => esc_html__('Type description here', 'tpcore'),
            ]
        );


        $this->end_controls_section();

        // tp_right_summary_section
        $this->start_controls_section(
            'tp_right_summary_section',
            [
                'label' => esc_html__('Summary Detail', 'tpcore'),
                'condition' => [
                    'tg_design_style' => ['layout-3','layout-4'],
                ]                 
            ]
        );

        $this->add_control(
            'tg_summary_title1',
            [
                'label' => esc_html__('Summary Heading', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('In summary', 'tpcore'),
                'placeholder' => esc_html__('Type Summary Title', 'tpcore'),
                'label_block' => true,
            ]
        );

        $repeater2 = new \Elementor\Repeater();

        $repeater2->add_control(
            'tg_summary_title',
            [
                'label' => esc_html__('Summary Title', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Nickname', 'tpcore'),
                'placeholder' => esc_html__('Type Summary Title', 'tpcore'),
                'label_block' => true,
            ]
        );

         $repeater2->add_control(
            'tg_summary_content',
            [
                'label' => esc_html__('Summary Content', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('John', 'tpcore'),
                'placeholder' => esc_html__('Type Summary Content', 'tpcore'),
                'label_block' => true,
            ]
        );       

        $this->add_control(
            'tg_summary_list',
            [
                'label' => esc_html__('Summary Content List', 'tpcore'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater2->get_controls(),
                'default' => [
                    [
                        'tg_summary_title' => esc_html__('Nickname', 'tpcore'),
                        'tg_summary_content' => esc_html__( 'John', 'tpcore' ),
                    ],
                    [
                        'tg_summary_title' => esc_html__('Nationality', 'tpcore'),
                        'tg_summary_content' => esc_html__( 'American', 'tpcore' ),
                    ],
                    [
                        'tg_summary_title' => esc_html__('Current Location', 'tpcore'),
                        'tg_summary_content' => esc_html__( 'Deer Trail, CO 80105, United States', 'tpcore' ),
                    ],                   
                ],
                'title_field' => '{{{ tg_summary_title }}}',
            ]
        );


        $this->end_controls_section();




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
					'{{WRAPPER}} .cs_section_title' => 'text-transform: {{VALUE}};',
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

            if ( !empty($settings['tg_image']['url']) ) {
                $tg_image = !empty($settings['tg_image']['id']) ? wp_get_attachment_image_url( $settings['tg_image']['id'], $settings['tg_image_size_size']) : $settings['tg_image']['url'];
                $tg_image_alt = get_post_meta($settings["tg_image"]["id"], "_wp_attachment_image_alt", true);
            }

			$this->add_render_attribute('title_args', 'class', 'cs_section_title cs_font_48 cs_semi_bold common-heading-title-style');

            // Link
            if ('2' == $settings['tg_btn_link_type']) {
                $this->add_render_attribute('tg-button-arg', 'href', get_permalink($settings['tg_btn_page_link']));
                $this->add_render_attribute('tg-button-arg', 'target', '_self');
                $this->add_render_attribute('tg-button-arg', 'rel', 'nofollow');
                $this->add_render_attribute('tg-button-arg', 'class', 'cs_btn cs_style_1');
            } else {
                if ( ! empty( $settings['tg_btn_link']['url'] ) ) {
                    $this->add_link_attributes( 'tg-button-arg', $settings['tg_btn_link'] );
                    $this->add_render_attribute('tg-button-arg', 'class', 'cs_btn cs_style_1');
                }
            }
		?>

        <?php if ( $settings['tg_design_style']  == 'layout-2' ): ?>

        <!-- Start About Section -->
        <section class="position-relative">
          <div class="position-absolute cs_about_shape_3">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/about_shape_2.svg" alt="">
          </div>
          <div class="cs_height_150 cs_height_lg_80"></div>
          <div class="container">
            <div class="row">
            <?php if( !empty($settings['tg_section_title_show']) ) : ?>
              <div class="col-lg-6">
                <div class="cs_pr_50">
                  <div class="cs_section_heading cs_style_1">
                    <?php if (!empty($settings['tg_sub_title'])) : ?>                   
                    <p class="cs_section_subtitle cs_accent_color_2 cs_font_16 wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="0.2s">
                      <span><?php echo esc_html( $settings['tg_sub_title'] ); ?></span>
                      <svg width="34" height="18" viewBox="0 0 34 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M13.164 1.06887C13.1878 2.25431 14.6046 4.16031 15.5689 3.80003C15.9856 3.63732 15.9856 3.463 15.5332 2.19621C14.4498 -0.813889 13.1402 0.115862 13.164 1.06887ZM21.0215 3.75354C20.6882 4.67168 21.843 4.83439 22.6407 3.98598C23.4502 3.11433 24.3193 1.81268 24.7836 0.929407C25.2956 0.0810016 24.2955 -0.349012 23.4621 0.348307C22.474 1.16185 21.2477 3.11433 21.0215 3.75354ZM4.61598 3.0446C3.87784 3.33515 6.35416 6.33363 7.35421 6.35687C8.52093 6.38011 8.61615 6.12443 7.80659 5.06683C6.53272 3.39327 5.46126 2.70757 4.61598 3.0446ZM15.807 7.35636C15.3665 7.78637 14.8426 8.3791 14.6403 8.65803C12.9021 11.1916 12.8783 11.2149 12.0806 10.6221C10.2353 9.274 7.1994 8.35586 7.79467 10.7035C8.16374 12.1214 9.25905 14.7131 9.54478 15.5731C10.2829 17.8394 10.6758 18.2113 11.9854 17.9091C15.2355 17.1421 19.8787 17.1188 23.2003 17.851C24.0217 18.037 24.0693 17.944 24.1527 16.3285C24.3194 13.0628 26.248 9.87833 26.248 8.8556C26.248 7.70502 24.021797C19.8191 12.4817 20.1644 12.749 21.0811 12.319C21.6049 12.0749 22.3311 11.61 23.355 10.9011C23.7598 10.6221 24.0932 10.4246 24.0932 10.4594C24.0932 10.6221 23.3669 13.6671 23.3669 13.6787L21.57 8.56505 20.9978 10.8778L20.6882 11.1103L20.2477 10.8197C19.3429 10.227 18.8905 10.6919 19.4024 11.6573 13.5276C20.1167 13.4695 19.9501 14.2133 21.4382 14.4342C21.593 14.4574 23.1169 14.6434 23.1169 14.6434C23.1169 14.6434 23.0574 15.2942 22.8907 15.6661C22.7121 16.038 22.4145 16.131 21.9264 15.9683C18.1047 14.7363 11.8782 16.2356 11.8663 16.2356C11.6401 16.2704 9.56861 10.9359 9.73528 10.7732C9.75909 10.75 10.0091 10.9011 10.2948 11.1103C13.5211 13.3998 13.8545 13.3301 15.9856 9.99456L16.9856 8.42559L17.3785 8.99507C18.5214 10.657 20.1405 9.92483 19.2357 8.70452C18.9262 8.29775 18.4143 7.6934 17.5928 6.75202C17.2238 6.32201 16.6761 6.50795 15.807 7.35636ZM31.2959 7.18203C30.8673 7.42609 28.6291 9.51805 28.3672 9.9132C27.8076 10.7848 28.9743 10.9824 30.0339 10.1921C31.2721 9.27399 33.0222 7.69341 33.0222 7.48421C33.0341 7.06582 31.8793 6.85661 31.2959 7.18203ZM1.8063 12.749C3.54448 13.1674 4.54451 13.272 4.93739 13.0628C5.58028 12.7257 5.28265 12.4817 3.75877 12.1098C3.6159 12.0749 2.21106 11.6914 1.24672 11.6914C0.556213 11.6914 -0.979555 12.0633 1.8063 12.749Z"
                          fill="#342EAD" />
                      </svg>
                    </p>
                    <?php endif; ?>
                    <?php
                        if ( !empty($settings['tg_title']) ) :
                            printf( '<%1$s %2$s>%3$s</%1$s>',
                                tag_escape( $settings['tg_title_tag'] ),
                                $this->get_render_attribute_string( 'title_args' ),
                                tp_kses( $settings['tg_title'] )
                            );
                        endif;
                    ?>
                  </div>
                  <div class="cs_height_40 cs_height_lg_30"></div>
                  <?php if ( !empty($settings['tg_description']) ) : ?>
                   <p class="m-0"><?php echo tp_kses( $settings['tg_description'] ); ?></p>
                  <?php endif; ?> 
                  <div class="cs_height_25 cs_height_lg_20"></div>
                  <a <?php echo $this->get_render_attribute_string( 'tg-button-arg' ); ?> ><span><?php echo $settings['tg_btn_text']; ?></span></a>                  
                </div>
                <div class="cs_height_lg_30"></div>
              </div>
             <?php endif; ?>
              <div class="col-lg-6">
                <div class="cs_pl_70">
                    <?php foreach ($settings['tg_about2_list'] as $item) :
                        if ( !empty($item['reviewer_image']['url']) ) {
                            $tg_reviewer_image = !empty($item['reviewer_image']['id']) ? wp_get_attachment_image_url( $item['reviewer_image']['id'], $item['reviewer_image_size_size']) : $item['reviewer_image']['url'];
                            $tg_reviewer_image_alt = get_post_meta($item["reviewer_image"]["id"], "_wp_attachment_image_alt", true);
                        }
                     ?>
                  <div class="cs_iconbox cs_style_2 cs_radius_20 cs_transition_4">
                    <div class="cs_iconbox_in">
                      <div class="cs_iconbox_icon cs_center">
                        <img src="<?php echo esc_url($tg_reviewer_image); ?>" alt="<?php echo esc_url($tg_reviewer_image_alt); ?>">
                      </div>
                      <div class="cs_iconbox_info position-relative w-100">
                        <?php if( !empty($item['tg_about_designation_title']) ) : ?>
                         <h3 class="cs_iconbox_title cs_font_28 cs_medium m-0"><?php echo esc_html( $item['tg_about_designation_title'] ); ?></h3>
                        <?php endif; ?>
                        <?php if( !empty($item['tg_about_designation_text']) ) : ?>
                        <p class="cs_iconbox_text"><?php echo tp_kses( $item['tg_about_designation_text'] ); ?></p>
                        <?php endif; ?>
                        <div class="d-flex justify-content-between align-items-center">
                        <?php if( !empty($item['tg_about_project_text']) ) : ?>
                          <span
                            class="cs_letter_spacing_15 cs_ternary_color cs_secondary_font cs_font_15 text-uppercase m-0"><?php echo esc_html( $item['tg_about_project_text'] ); ?></span>
                         <?php endif; ?>
                         <?php if( !empty($item['tg_about_project_url']) ) : ?>
                          <a href="<?php echo esc_url( $item['tg_about_project_url'] ); ?>" class="cs_circle_btn cs_style_1 cs_accent_color_2 cs_center rounded-circle">
                            <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M1 10L10 1" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                              <path d="M1 1H10V10" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            </svg>
                            <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M1 10L10 1" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                              <path d="M1 1H10V10" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            </svg>
                          </a>
                        <?php endif; ?>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
                </div>
              </div>
            </div>
          </div>
          <div class="cs_height_150 cs_height_lg_80"></div>
        </section>
        <!-- End About Section -->

        <?php elseif ( $settings['tg_design_style']  == 'layout-3' ):  ?>

        <!-- Start About Section -->
        <section class="position-relative">
          <div class="cs_height_140 cs_height_lg_70"></div>
          <div class="container">
            <div class="row">
              <div class="col-lg-6">
                <?php
                    if ( !empty($settings['tg_title']) ) :
                        printf( '<%1$s %2$s>%3$s</%1$s>',
                            tag_escape( $settings['tg_title_tag'] ),
                            $this->get_render_attribute_string( 'title_args' ),
                            tp_kses( $settings['tg_title'] )
                        );
                    endif;
                ?>
                <div class="cs_height_20 cs_height_lg_10"></div>
                <?php if ( !empty($settings['tg_description']) ) : ?>
                <p class="mb-0"><?php echo tp_kses( $settings['tg_description'] ); ?>
                </p>
                <?php endif; ?>
                <div class="cs_height_lg_15"></div>
              </div>
                <?php if ( !empty($settings['tg_right_description']) ) : ?>
              <div class="col-lg-5 offset-lg-1 align-self-end">
                <p class="mb-0">
                  <?php echo tp_kses( $settings['tg_right_description'] ); ?>
                </p>
              </div>
            <?php endif; ?>
            </div>
            <div class="cs_height_55 cs_height_lg_30"></div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-6">
                <div class="cs_image_box cs_radius_20 overflow-hidden">
                  <img class="w-100" src="<?php echo esc_url($tg_image); ?>" alt="<?php echo esc_url($tg_image_alt); ?>">
                </div>
                <div class="cs_height_lg_30"></div>
              </div>
              <div class="col-lg-5 offset-lg-1">
                <div class="cs_about cs_style_1 cs_type_1">
                 <?php if ( !empty($settings['tg_summary_title1']) ) : ?>
                  <h4 class="cs_about_subtitle cs_font_36 cs_semi_bold"><?php echo esc_html( $settings['tg_summary_title1'] ); ?></h4>
                <?php endif; ?>
                  <ul class="cs_mp_0 cs_about_summary_list">
                    <?php foreach ($settings['tg_summary_list'] as $item) : ?> 
                    <li>
                    <?php if( !empty($item['tg_summary_title']) ) : ?>
                      <p class="m-0 text-capitalize"><?php echo esc_html( $item['tg_summary_title'] ); ?></p>
                    <?php endif; ?>
                    <?php if( !empty($item['tg_summary_content']) ) : ?>
                      <h5 class="cs_font_20 m-0 cs_semi_bold"><?php echo esc_html( $item['tg_summary_content'] ); ?></h5>
                    <?php endif; ?>
                    </li>
                    <?php endforeach; ?>

                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="cs_height_150 cs_height_lg_80"></div>
        </section>
        <!-- End About Section -->

        <?php elseif ( $settings['tg_design_style']  == 'layout-4' ):  ?>

        <!-- Start About Section -->
        <section class="position-relative">
          <div class="cs_height_150 cs_height_lg_80"></div>
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-6">
                <div class="cs_pr_65">
                  <div class="cs_image_box cs_style_3 position-relative">
                    <div class="cs_imagebox_shape_about_2 position-absolute">
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/about_shape_3.svg" alt="">
                    </div>
                    <div class="cs_image_wrap cs_radius_20 overflow-hidden">
                      <img class="w-100" src="<?php echo esc_url($tg_image); ?>" alt="<?php echo esc_url($tg_image_alt); ?>">
                    </div>
                    <?php if( !empty($settings['tg_percentage_show']) ) : ?>
                    <div
                      class="cs_happy_client position-absolute cs_white_bg d-flex align-items-center cs_radius_20 cs_gap_15">
                      <?php if ( !empty($settings['tg_happy_client_emoji']) ) : ?>
                      <p class="mb-0 cs_emoji_text"><?php echo esc_html( $settings['tg_happy_client_emoji'] ); ?></p>
                      <?php endif; ?>
                      <div>
                        <h3 class="mb-0 cs_font_24 cs_semi_bold cs_accent_color">
                          <span class="odometer" data-count-to="<?php echo esc_html( $settings['tg_percentage_Number'] ); ?>"></span>+
                        </h3>
                        <?php if ( !empty($settings['tg_percentage_title']) ) : ?>
                        <p class="mb-0 cs_font_16 cs_medium"><?php echo esc_html( $settings['tg_percentage_title'] ); ?></p>
                        <?php endif; ?>
                      </div>
                    </div>
                    <?php endif; ?>
                  </div>
                </div>
                <div class="cs_height_lg_40"></div>
              </div>
              <div class="col-lg-6">
                <div class="cs_about cs_style_1 cs_pl_50">

                <?php
                    if ( !empty($settings['tg_title']) ) :
                        printf( '<%1$s %2$s>%3$s</%1$s>',
                            tag_escape( $settings['tg_title_tag'] ),
                            $this->get_render_attribute_string( 'title_args' ),
                            tp_kses( $settings['tg_title'] )
                        );
                    endif;
                ?>

                <?php if ( !empty($settings['tg_description']) ) : ?>
                  <p class="cs_about_text"><?php echo tp_kses( $settings['tg_description'] ); ?></p>
                <?php endif; ?>
                 <?php if ( !empty($settings['tg_summary_title1']) ) : ?>
                  <h4 class="cs_about_subtitle cs_font_36 cs_semi_bold"><?php echo esc_html( $settings['tg_summary_title1'] ); ?></h4>
                <?php endif; ?>
                  <ul class="cs_mp_0 cs_about_summary_list">
                    <?php foreach ($settings['tg_summary_list'] as $item) : ?>
                    <li>
                    <?php if( !empty($item['tg_summary_title']) ) : ?>
                      <p class="m-0 text-capitalize"><?php echo esc_html( $item['tg_summary_title'] ); ?></p>
                    <?php endif; ?>
                    <?php if( !empty($item['tg_summary_content']) ) : ?>
                      <h5 class="cs_font_20 m-0 cs_semi_bold"><?php echo esc_html( $item['tg_summary_content'] ); ?></h5>
                    <?php endif; ?>
                    </li>
                    <?php endforeach; ?>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="cs_height_150 cs_height_lg_80"></div>
        </section>
        <!-- End About Section -->

        <?php else: ?>

        <!-- Start About Section -->
        <section class="position-relative">
          <div class="position-absolute cs_about_shape_2">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/about_shape_2.svg" alt="">
          </div>
          <div class="cs_height_150 cs_height_lg_80"></div>
          <div class="container">
            <div class="row">
              <?php if (!empty( $settings['tg_image']['url'] )) : ?>
              <div class="col-lg-6">
                <div class="cs_image_box cs_style_1 position-relative">
                  <img class="position-absolute cs_about_shape" src="<?php echo get_template_directory_uri(); ?>/assets/img/about_shape_1.svg" alt="About">
                  <img class="w-100" src="<?php echo esc_url($tg_image); ?>" alt="<?php echo esc_url($tg_image_alt); ?>">
                  <?php if( !empty($settings['tg_percentage_show']) ) : ?>
                  <div
                    class="cs_happy_client position-absolute cs_white_bg d-flex align-items-center cs_radius_20 cs_gap_15 wow fadeInRight" data-wow-duration="0.8s" data-wow-delay="0.2s">
                    <?php if ( !empty($settings['tg_happy_client_emoji']) ) : ?>
                    <p class="mb-0 cs_emoji_text"><?php echo esc_html( $settings['tg_happy_client_emoji'] ); ?></p>
                    <?php endif; ?>
                    <div>
                      <h3 class="mb-0 cs_font_24 cs_semi_bold cs_accent_color">
                        <span class="odometer" data-count-to="<?php echo esc_html( $settings['tg_percentage_Number'] ); ?>"></span>+
                      </h3>
                     <?php if ( !empty($settings['tg_percentage_title']) ) : ?>
                      <p class="mb-0 cs_font_16 cs_medium"><?php echo esc_html( $settings['tg_percentage_title'] ); ?></p>
                     <?php endif; ?>
                    </div>
                  </div>
                 <?php endif; ?>
                </div>
              </div>
             <?php endif; ?>
              <div class="col-lg-6">
                <div class="cs_pl_70">
                  <div class="cs_height_40 cs_height_lg_30"></div>
                  <?php if( !empty($settings['tg_section_title_show']) ) : ?>
                  <div class="cs_section_heading cs_style_1">
                    <?php if (!empty($settings['tg_sub_title'])) : ?> 
                    <p class="cs_section_subtitle cs_accent_color_2 cs_font_16">
                      <span><?php echo esc_html( $settings['tg_sub_title'] ); ?></span>
                      <svg width="34" height="18" viewBox="0 0 34 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M13.164 1.06887C13.1878 2.25431 14.6046 4.16031 15.5689 3.80003C15.9856 3.63732 15.9856 3.463 15.5332 2.19621C14.4498 -0.813889 13.1402 0.115862 13.164 1.06887ZM21.0215 3.75354C20.6882 4.67168 21.843 4.83439 22.6407 3.98598C23.4502 3.11433 24.3193 1.81268 24.7836 0.929407C25.2956 0.0810016 24.2955 -0.349012 23.4621 0.348307C22.474 1.16185 21.2477 3.11433 21.0215 3.75354ZM4.61598 3.0446C3.87784 3.33515 6.35416 6.33363 7.35421 6.35687C8.52093 6.38011 8.61615 6.12443 7.80659 5.06683C6.53272 3.39327 5.46126 2.70757 4.61598 3.0446ZM15.807 7.35636C15.3665 7.78637 14.8426 8.3791 14.6403 8.65803C12.9021 11.1916 12.8783 11.2149 12.0806 10.6221C10.2353 9.274 7.1994 8.35586 7.79467 10.7035C8.16374 12.1214 9.25905 14.7131 9.54478 15.5731C10.2829 17.8394 10.6758 18.2113 11.9854 17.9091C15.2355 17.1421 19.8787 17.1188 23.2003 17.851C24.0217 18.037 24.0693 17.944 24.1527 16.3285C24.3194 13.0628 26.248 9.87833 26.248 8.8556C26.248 7.70502 24.0217 8.56505 20.9978 10.8778L20.6882 11.1103L20.2477 10.8197C19.3429 10.227 18.8905 10.6919 19.4024 11.6797C19.8191 12.4817 20.1644 12.749 21.0811 12.319C21.6049 12.0749 22.3311 11.61 23.355 10.9011C23.7598 10.6221 24.0932 10.4246 24.0932 10.4594C24.0932 10.6221 23.3669 13.6671 23.3669 13.6787L21.5573 13.5276C20.1167 13.4695 19.9501 14.2133 21.4382 14.4342C21.593 14.4574 23.1169 14.6434 23.1169 14.6434C23.1169 14.6434 23.0574 15.2942 22.8907 15.6661C22.7121 16.038 22.4145 16.131 21.9264 15.9683C18.1047 14.7363 11.8782 16.2356 11.8663 16.2356C11.6401 16.2704 9.56861 10.9359 9.73528 10.7732C9.75909 10.75 10.0091 10.9011 10.2948 11.1103C13.5211 13.3998 13.8545 13.3301 15.9856 9.99456L16.9856 8.42559L17.3785 8.99507C18.5214 10.657 20.1405 9.92483 19.2357 8.70452C18.9262 8.29775 18.4143 7.6934 17.5928 6.75202C17.2238 6.32201 16.6761 6.50795 15.807 7.35636ZM31.2959 7.18203C30.8673 7.42609 28.6291 9.51805 28.3672 9.9132C27.8076 10.7848 28.9743 10.9824 30.0339 10.1921C31.2721 9.27399 33.0222 7.69341 33.0222 7.48421C33.0341 7.06582 31.8793 6.85661 31.2959 7.18203ZM1.8063 12.749C3.54448 13.1674 4.54451 13.272 4.93739 13.0628C5.58028 12.7257 5.28265 12.4817 3.75877 12.1098C3.6159 12.0749 2.21106 11.6914 1.24672 11.6914C0.556213 11.6914 -0.979555 12.0633 1.8063 12.749Z"
                          fill="#342EAD" />
                      </svg>
                    </p>
                    <?php endif; ?>
                    <?php
                        if ( !empty($settings['tg_title']) ) :
                            printf( '<%1$s %2$s>%3$s</%1$s>',
                                tag_escape( $settings['tg_title_tag'] ),
                                $this->get_render_attribute_string( 'title_args' ),
                                tp_kses( $settings['tg_title'] )
                            );
                        endif;
                    ?>

                  </div>
                  <?php endif; ?>
      
                  <div class="cs_height_40 cs_height_lg_30"></div>

                  <div class="cs_tabs cs_style_1">
                    <ul class="cs_tab_links cs_mp_0">
                    <?php if ( !empty($settings['tg_tab_title1']) ) : ?>
                      <li class="active"><a class="text-uppercase " href="myself"><?php echo esc_html( $settings['tg_tab_title1'] ); ?></a></li>
                    <?php endif; ?>
                    <?php if ( !empty($settings['tg_tab_title2']) ) : ?>
                      <li><a class="text-uppercase " href="education"><?php echo esc_html( $settings['tg_tab_title2'] ); ?></a></li>
                    <?php endif; ?>
                    <?php if ( !empty($settings['tg_tab_title3']) ) : ?>
                      <li><a class="text-uppercase " href="tools"><?php echo esc_html( $settings['tg_tab_title3'] ); ?></a></li>
                    <?php endif; ?>
                    </ul>
                    <div class="cs_tab_body">

                      <div class="cs_tab active" data-id="myself">
                        <?php if ( !empty($settings['tg_tab_description1']) ) : ?>
                        <p class="m-0"><?php echo tp_kses( $settings['tg_tab_description1'] ); ?></p>
                        <?php endif; ?> 
                        <div class="cs_height_30 cs_height_lg_20"></div>
                        <?php if (!empty($settings['tg_btn_text2'])) : ?>
                            <a class="cs_btn cs_style_1" href="<?php echo esc_url( $settings['tg_btn_text2_url'] ); ?>"><span><?php echo esc_html( $settings['tg_btn_text2'] ); ?></span></a>
                        <?php endif; ?>
                      </div>
                    <?php if ( !empty($settings['tg_tab_description2']) ) : ?>
                      <div class="cs_tab" data-id="education">
                        <p class="m-0"><?php echo tp_kses( $settings['tg_tab_description2'] ); ?></p>
                      </div>
                    <?php endif; ?>

                      <div class="cs_tab" data-id="tools">
                        <?php if ( !empty($settings['tg_tab_subtitle3']) ) : ?>
                        <h2 class="cs_font_20 cs_accent_color"><?php echo esc_html( $settings['tg_tab_subtitle3'] ); ?></h2>
                        <?php endif; ?>
                        <?php
                            foreach ( $settings['skills'] as $index => $skill ) : ?>                    
                        <div class="cs_progressbar cs_style_1">
                          <div class="label cs_font_20 cs_primary_color"><?php echo esc_html( $skill['name'] ); ?></div>
                          <h3 class="cs_progressbar_head cs_accent_color cs_normal cs_font_14 text-end"><?php echo esc_attr( $skill['level']['size'] ); ?>%</h3>
                          <div class="cs_progress" data-progress="<?php echo esc_attr( $skill['level']['size'] ); ?>">
                            <div class="cs_progress_in"></div>
                          </div>
                        </div>
                        <?php endforeach; ?>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
          <div class="cs_height_150 cs_height_lg_80"></div>
        </section>
        <!-- End About Section -->

        <?php endif; ?>

    <?php
	}
}

$widgets_manager->register( new TP_About() );