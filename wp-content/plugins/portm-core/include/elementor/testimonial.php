<?php
namespace TPCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Repeater;
use \Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Multim Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class TG_Testimonial extends Widget_Base {

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
		return 'testimonial';
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
		return __( 'Testimonial', 'tpcore' );
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
            'tp_layout',
            [
                'label' => esc_html__('Design Layout', 'tpcore'),
            ]
        );
        $this->add_control(
            'tp_design_style',
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
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Testimonials', 'tpcore'),
                'placeholder' => esc_html__('Type Sub Title Text', 'tpcore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_title',
            [
                'label' => esc_html__('Title', 'tpcore'),
                'description' => tp_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => tp_kses('What <b>my client</b><br>have to say<br><span>about me</span>', 'tpcore'),
                'placeholder' => esc_html__('Type Heading Text', 'tpcore'),
                'label_block' => true,
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

        // tg_testimonial_video
        $this->start_controls_section(
            'tg_testimonial_video
            ',
            [
                'label' => esc_html__('Video Review', 'tpcore'),
                'condition' => [
                    'tp_design_style' => 'layout-1'
                ]                 
            ]
        );

         $this->add_control(
            'tg_image02',
            [
                'label' => esc_html__( 'Review Image', 'tpcore' ),
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

        $this->add_control(
            'tg_image01',
            [
                'label' => esc_html__( 'Review Image Background', 'tpcore' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'tg_image_size01',
                'default' => 'full',
                'exclude' => [
                    'custom'
                ]
            ]
        );

    
        $this->add_control(
            'tg_services_title01',
            [
                'label' => esc_html__('Title', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Michel Smith', 'tpcore'),
                'placeholder' => esc_html__('Type Services Text', 'tpcore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_services_subtitle01',
            [
                'label' => esc_html__('Sub Title', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Business Owner', 'tpcore'),
                'placeholder' => esc_html__('Type Sub Title Text', 'tpcore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_services_url01',
            [
                'label' => esc_html__('Services URL', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('https://www.youtube.com/embed/TKnufs85hXk?si=kVtRa9p8pdy3tHyv', 'tpcore'),
                'placeholder' => esc_html__('Type Services URL', 'tpcore'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();


        // Review group
        $this->start_controls_section(
            'review_list',
            [
                'label' => esc_html__( 'Review List', 'tpcore' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

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

        $repeater->add_control(
            'review_content',
            [
                'label' => esc_html__( 'Review Content', 'tpcore' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.',
                'placeholder' => esc_html__( 'Type your review content here', 'tpcore' ),
            ]
        );

        $repeater->add_control(
            'reviewer_name', [
                'label' => esc_html__( 'Reviewer Name', 'tpcore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Ahon Monsery' , 'tpcore' ),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'reviewer_designation', [
                'label' => esc_html__( 'Reviewer Designation', 'tpcore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Business Owner' , 'tpcore' ),
                'label_block' => true,
            ]
        );


        $repeater->add_control(
            'reviewer_image2',
            [
                'label' => esc_html__( 'Testimonial Background Img', 'tpcore' ),
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
                'name' => 'reviewer_image_size2',
                'default' => 'thumbnail',
                'exclude' => [
                    'custom'
                ]
            ]
        );



        $this->add_control(
            'reviews_list',
            [
                'label' => esc_html__( 'Review List', 'tpcore' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' =>  $repeater->get_controls(),
                'default' => [
                    [
                        'reviewer_name' => esc_html__( 'Adnan', 'tpcore' ),
                    ],
                    [
                        'reviewer_name' => esc_html__( 'Jone Lee', 'tpcore' ),
                    ],
                    [
                        'reviewer_name' => esc_html__( 'Lucky', 'tpcore' ),
                    ],

                ],
                'title_field' => '{{{ reviewer_name }}}',
            ]
        );

        $this->end_controls_section();


       // tg_btn_button_group
        $this->start_controls_section(
            'tg_btn_button_group',
            [
                'label' => esc_html__('Button', 'tpcore'),
                 'condition' => [
                    'tp_design_style' => 'layout-2'
                ]                 
            ]
        );

        $this->add_control(
            'tg_btn_button_show',
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
                'default' => esc_html__('View All Testmonial', 'tpcore'),
                'title' => esc_html__('Enter button text', 'tpcore'),
                'label_block' => true,
                'condition' => [
                    'tg_btn_button_show' => 'yes'
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
                    'tg_btn_button_show' => 'yes'
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
                    'tg_btn_button_show' => 'yes'
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
                    'tg_btn_button_show' => 'yes'
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
        $this->add_render_attribute('title_args', 'class', 'cs_section_title cs_font_48 cs_semi_bold common-heading-title-style');

            if ( !empty($settings['tg_image01']['url']) ) {
                $tg_image01 = !empty($settings['tg_image01']['id']) ? wp_get_attachment_image_url( $settings['tg_image01']['id'], $settings['tg_image_size01_size']) : $settings['tg_image01']['url'];
                $tg_image_alt01 = get_post_meta($settings["tg_image01"]["id"], "_wp_attachment_image_alt", true);
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
                $this->add_render_attribute('tg-button-arg', 'class', 'cs_portfolio_text_btn d-inline-flex cs_gap_25 align-items-center cs_font_24 cs_accent_color cs_semi_bold');
            } else {
                if ( ! empty( $settings['tg_btn_link']['url'] ) ) {
                    $this->add_link_attributes( 'tg-button-arg', $settings['tg_btn_link'] );
                    $this->add_render_attribute('tg-button-arg', 'class', 'cs_portfolio_text_btn d-inline-flex cs_gap_25 align-items-center cs_font_24 cs_accent_color cs_semi_bold');
                }
            }

		?>

        <?php if ( $settings['tp_design_style']  == 'layout-2' ): ?>

        <!-- Start Testimonial Section -->
        <section class="position-relative">
          <div class="cs_height_145 cs_height_lg_80"></div>
          <div class="container">
            <?php if( !empty($settings['tg_section_title_show']) ) : ?>
            <div class="d-lg-flex justify-content-between">
              <div class="cs_section_heading cs_style_1">
                <?php if( !empty($settings['tg_sub_title']) ) : ?>
                <p class="cs_section_subtitle cs_accent_color_2 cs_font_16 wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="0.2s">
                  <span><?php echo esc_html( $settings['tg_sub_title'] ); ?></span>
                  <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M6.32185 0.162195C5.92711 0.458249 6.20673 1.29707 6.83174 1.70825C7.35805 2.05365 9.61133 2.16878 11.2561 1.95496C15.7627 1.34641 18.2298 2.57997 17.9831 5.2938C17.6377 9.27408 17.5719 12.0866 17.8186 13.4353C18.0982 14.9978 18.0653 14.8826 17.539 14.4879C17.0292 14.1096 15.8614 13.3366 15.2035 12.9254C14.6607 12.5965 13.7232 12.1195 13.5423 12.728C13.2462 13.7313 12.358 15.2774 11.5686 16.33C9.77579 18.7149 6.32185 19.2577 3.36131 18.7478C2.11131 18.534 2.07841 18.1063 2.12775 17.1688C2.29223 13.8136 2.52246 4.86616 2.9172 2.97471C3.11457 2.02076 3.34485 1.85628 4.08498 1.64246C5.38433 1.28062 4.4962 0.655619 2.96659 0.836541C1.89751 0.968121 1.28895 1.36286 0.910659 2.76089C0.334999 4.9484 0.400789 8.92867 0.0060502 17.0702C-0.0926344 18.9781 1.02579 19.636 2.63764 19.8004C3.59159 19.8991 5.03895 19.932 7.47317 19.9649C10.4995 19.9978 12.0126 20.0471 13.0324 19.8991C14.1837 19.7346 14.6936 19.3235 16.0588 18.4188C20.368 15.5241 20.2035 15.7873 20.2199 11.9714C20.2528 3.22142 19.0357 0.984568 14.0686 0.754304C12.6212 0.688514 11.2232 0.524037 10.6969 0.37601C9.3153 -0.00228091 6.71659 -0.133858 6.32185 0.162195ZM9.24946 4.83327C8.0488 4.93195 7.63768 5.82011 8.65742 6.09972C9.49624 6.32998 13.7067 6.37932 15.1048 6.2313C15.96 6.13261 15.6146 5.52406 14.9238 5.228C13.9041 4.78392 11.8153 4.61945 9.24946 4.83327ZM7.17715 8.18854C4.34819 8.32012 5.08831 9.09315 6.33831 9.33986C8.87122 9.83328 15.5982 9.89908 15.5982 9.24118C15.5982 8.33657 12.3745 7.94183 7.17715 8.18854ZM7.19353 13.6984C8.3613 13.6655 10.6969 13.4682 11.1245 13.3366C11.8647 13.1063 10.8449 12.3168 9.56203 12.1359C7.83504 11.8892 7.11129 11.8234 6.70011 11.8563C4.52905 11.9714 5.483 13.7478 7.19353 13.6984ZM17.8021 15.5405C17.6048 15.6886 15.7133 17.5965 13.4436 18.5504C12.5883 18.9123 12.1442 18.8629 12.7034 18.1392C13.1475 17.3333 14.6772 13.9287 15.0555 13.9287C15.2693 13.9451 17.8021 15.5405 17.8021 15.5405Z"
                      fill="currentColor" />
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
            <?php if( !empty($settings['tg_btn_text']) ) : ?>
              <div class="align-self-end">
                <div class="cs_height_25 cs_height_lg_25"></div>
                <a <?php echo $this->get_render_attribute_string( 'tg-button-arg' ); ?> >
                  <span class="cs_text_btn"><?php echo $settings['tg_btn_text']; ?></span>
                  <span class="cs_circle_btn cs_style_1 cs_accent_color cs_center rounded-circle">
                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M1 14L14 1" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                      <path d="M1 1H14V14" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                    </svg>
                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M1 14L14 1" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                      <path d="M1 1H14V14" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                    </svg>
                  </span>
                </a>
              </div>
            <?php endif; ?>
            </div>
            <div class="cs_height_70 cs_height_lg_30"></div>
            <?php endif; ?>
            <div class="row cs_gap_70">
            <?php foreach ($settings['reviews_list'] as $item) :
                if ( !empty($item['reviewer_image']['url']) ) {
                    $tg_reviewer_image = !empty($item['reviewer_image']['id']) ? wp_get_attachment_image_url( $item['reviewer_image']['id'], $item['reviewer_image_size_size']) : $item['reviewer_image']['url'];
                    $tg_reviewer_image_alt = get_post_meta($item["reviewer_image"]["id"], "_wp_attachment_image_alt", true);
                }                      
            ?>
              <div class="col-lg-6">
                <div class="cs_testimonial cs_style_2 cs_radius_20 cs_white_bg cs_transition_3 cs_transform_up_hover_3">
                  <div class="cs_testimonial_in">
                    <div class="cs_testimonial_img overflow-hidden">
                      <img class="h-100 w-100" src="<?php echo esc_url($tg_reviewer_image); ?>" alt="<?php echo esc_url($tg_reviewer_image_alt); ?>g">
                    </div>
                    <div class="cs_testimonial_info">
                      <img class="cs_testimonial_quote" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/Quote.svg" alt="Testmonial Quote">
                        <?php if ( !empty($item['review_content']) ) : ?>
                      <p class="cs_testimonial_text"><?php echo esc_html( $item['review_content'] ); ?></p>
                    <?php endif; ?>
                    <?php if ( !empty($item['reviewer_name']) ) : ?>
                      <div class="cs_testimonial_author">
                        <div class="cs_author_name cs_font_20 cs_semi_bold"><?php echo tp_kses($item['reviewer_name']); ?></div>
                        <?php if ( !empty($item['reviewer_designation']) ) : ?>
                        <div class="cs_author_designation cs_font_16"><?php echo tp_kses($item['reviewer_designation']); ?></div>
                        <?php endif; ?>
                      </div>
                    <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
            </div>
          </div>
          <div class="cs_height_125 cs_height_lg_55"></div>
        </section>
        <!-- End Testimonial Section -->

        <?php else: ?>

            <!-- Start Testimonial Section -->
            <section class="position-relative">
              <div class="cs_testmonial_shape_1 position-absolute">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/testmonial_shape_1.svg" alt="testmonial_shape">
              </div>
              <div class="cs_height_150 cs_height_lg_80"></div>
              <div class="container">
                <div class="cs_isotop cs_isotop_col_2 cs_has_gutter_40">
                  <div class="cs_grid_sizer"></div>
                  <?php if( !empty($settings['tg_section_title_show']) ) : ?>
                  <div class="cs_isotop_item">
                    <div class="cs_section_heading cs_style_1">
                        <?php if( !empty($settings['tg_sub_title']) ) : ?>
                      <p class="cs_section_subtitle cs_accent_color_2 cs_font_16 wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="0.2s">
                        <span><?php echo esc_html( $settings['tg_sub_title'] ); ?></span>
                        <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M6.32185 0.162195C5.92711 0.458249 6.20673 1.29707 6.83174 1.70825C7.35805 2.05365 9.61133 2.16878 11.2561 1.95496C15.7627 1.34641 18.2298 2.57997 17.9831 5.2938C17.6377 9.27408 17.5719 12.0866 17.8186 13.4353C18.0982 14.9978 18.0653 14.8826 17.539 14.4879C17.0292 14.1096 15.8614 13.3366 15.2035 12.9254C14.6607 12.5965 13.7232 12.1195 13.5423 12.728C13.2462 13.7313 12.358 15.2774 11.5686 16.33C9.77579 18.7149 6.32185 19.2577 3.36131 18.7478C2.11131 18.534 2.07841 18.1063 2.12775 17.1688C2.29223 13.8136 2.52246 4.86616 2.9172 2.97471C3.11457 2.02076 3.34485 1.85628 4.08498 1.64246C5.38433 1.28062 4.4962 0.655619 2.96659 0.836541C1.89751 0.968121 1.28895 1.36286 0.910659 2.76089C0.334999 4.9484 0.400789 8.92867 0.0060502 17.0702C-0.0926344 18.9781 1.02579 19.636 2.63764 19.8004C3.59159 19.8991 5.03895 19.932 7.47317 19.9649C10.4995 19.9978 12.0126 20.0471 13.0324 19.8991C14.1837 19.7346 14.6936 19.3235 16.0588 18.4188C20.368 15.5241 20.2035 15.7873 20.2199 11.9714C20.2528 3.22142 19.0357 0.984568 14.0686 0.754304C12.6212 0.688514 11.2232 0.524037 10.6969 0.37601C9.3153 -0.00228091 6.71659 -0.133858 6.32185 0.162195ZM9.24946 4.83327C8.0488 4.93195 7.63768 5.82011 8.65742 6.09972C9.49624 6.32998 13.7067 6.37932 15.1048 6.2313C15.96 6.13261 15.6146 5.52406 14.9238 5.228C13.9041 4.78392 11.8153 4.61945 9.24946 4.83327ZM7.17715 8.18854C4.34819 8.32012 5.08831 9.09315 6.33831 9.33986C8.87122 9.83328 15.5982 9.89908 15.5982 9.24118C15.5982 8.33657 12.3745 7.94183 7.17715 8.18854ZM7.19353 13.6984C8.3613 13.6655 10.6969 13.4682 11.1245 13.3366C11.8647 13.1063 10.8449 12.3168 9.56203 12.1359C7.83504 11.8892 7.11129 11.8234 6.70011 11.8563C4.52905 11.9714 5.483 13.7478 7.19353 13.6984ZM17.8021 15.5405C17.6048 15.6886 15.7133 17.5965 13.4436 18.5504C12.5883 18.9123 12.1442 18.8629 12.7034 18.1392C13.1475 17.3333 14.6772 13.9287 15.0555 13.9287C15.2693 13.9451 17.8021 15.5405 17.8021 15.5405Z"
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
                    <div class="cs_height_75"></div>
                  </div>
                  <?php endif; ?>
                  <div class="cs_isotop_item">
                    <div
                      class="cs_testimonial cs_style_1 cs_radius_10 overflow-hidden cs_filled_bg"
                      data-src="<?php echo esc_url( $tg_image01 ); ?>">
                      <a href="<?php echo esc_url( $settings['tg_services_url01'] ) ?>"
                        class="cs_testmonial_thumbnail position-relative cs_accent_color_2 cs_filled_bg cs_video_open"
                        data-src="<?php echo esc_url( $tg_image02 ); ?>">
                        <div class="position-absolute top-0 start-0 cs_center h-100 w-100">
                          <div class="cs_player cs_style_1 cs_transition_3 cs_center cs_white_bg rounded-circle">
                            <svg width="15" height="18" viewBox="0 0 15 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M0 0V18L14.1429 9L0 0Z" fill="currentColor" />
                            </svg>
                          </div>
                        </div>
                      </a>
                    <?php if( !empty($settings['tg_services_title01']) ) : ?>
                      <div class="cs_testimonial_in">
                        <div class="cs_tastimonial_avater">
                          <h2 class="cs_testmonial_name cs_font_28 cs_medium mb-0"><?php echo esc_html( $settings['tg_services_title01'] ); ?></h2>
                        <?php if( !empty($settings['tg_services_subtitle01']) ) : ?>
                          <p class="cs_testmonial_designation cs_font_16 cs_normal mb-0"><?php echo esc_html( $settings['tg_services_subtitle01'] ); ?></p>
                        <?php endif; ?>
                        </div>
                      </div>
                    <?php endif; ?>
                    </div>
                  </div>

                <?php foreach ($settings['reviews_list'] as $item) :
                    if ( !empty($item['reviewer_image']['url']) ) {
                        $tg_reviewer_image = !empty($item['reviewer_image']['id']) ? wp_get_attachment_image_url( $item['reviewer_image']['id'], $item['reviewer_image_size_size']) : $item['reviewer_image']['url'];
                        $tg_reviewer_image_alt = get_post_meta($item["reviewer_image"]["id"], "_wp_attachment_image_alt", true);
                    }
                    if ( !empty($item['reviewer_image2']['url']) ) {
                        $tg_reviewer_image2 = !empty($item['reviewer_image2']['id']) ? wp_get_attachment_image_url( $item['reviewer_image2']['id'], $item['reviewer_image_size2_size']) : $item['reviewer_image2']['url'];
                        $tg_reviewer_image_alt2 = get_post_meta($item["reviewer_image2"]["id"], "_wp_attachment_image_alt", true);
                    }                        
                ?>
                  <div class="cs_isotop_item">
                    <div class="cs_testimonial cs_style_1 cs_radius_10 overflow-hidden cs_filled_bg"
                      data-src="<?php echo esc_url($tg_reviewer_image2); ?>">
                      <div class="cs_testimonial_in">
                        <div class="cs_testmonial_icon">
                          <svg width="49" height="36" viewBox="0 0 49 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                              d="M18.777 2.44455L19.4939 1H17.8813H8.3525H7.73241L7.45675 1.55545L1.10425 14.3554L1 14.5655V14.8V34V35H2H21.0575H22.0575V34V14.8V13.8H21.0575H13.1414L18.777 2.44455ZM44.187 2.44455L44.904 1H43.2913H33.7625H33.1424L32.8668 1.55545L26.5143 14.3554L26.41 14.5655V14.8V34V35H27.41H46.4675H47.4675V34V14.8V13.8H46.4675H38.5514L44.187 2.44455Z"
                              stroke="#342EAD" stroke-width="2" />
                          </svg>
                        </div>
                        <?php if ( !empty($item['review_content']) ) : ?>
                        <p class="cs_testimonial_text"><?php echo esc_html( $item['review_content'] ); ?></p>
                        <?php endif; ?>
                        <div class="cs_tastimonial_avater d-flex align-items-center">
                          <img src="<?php echo esc_url($tg_reviewer_image); ?>" alt="<?php echo esc_url($tg_reviewer_image_alt); ?>">
                          <div class="cs_ml_20">
                            <?php if ( !empty($item['reviewer_name']) ) : ?>
                            <h2 class="cs_testmonial_name cs_font_20 cs_semi_bold mb-0"><?php echo tp_kses($item['reviewer_name']); ?></h2>
                            <?php endif; ?>
                            <?php if ( !empty($item['reviewer_designation']) ) : ?>
                            <p class="cs_testmonial_designation cs_font_16 cs_normal mb-0"><?php echo tp_kses($item['reviewer_designation']); ?></p>
                            <?php endif; ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                    <?php endforeach; ?>
                </div>
              </div>
              <div class="cs_height_150 cs_height_lg_80"></div>
            </section>
            <!-- End Testimonial Section -->


        <?php endif; ?>

    <?php
	}
}

$widgets_manager->register( new TG_Testimonial() );