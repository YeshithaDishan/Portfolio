<?php
namespace TPCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Background;
use TPCore\Elementor\Controls\Group_Control_TPBGGradient;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Control_Media;
use \Elementor\Group_Control_Css_Filter;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Typography;
Use \Elementor\Core\Schemes\Typography;
use \Elementor\Group_Control_Box_Shadow;



if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Multim Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class tg_brand extends Widget_Base {

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
		return 'brand';
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
		return __( 'Brand', 'tpcore' );
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
                'condition' => [
                    'tg_design_style' => ['layout-2'],
                ]                
            ]
        );

        $this->add_control(
            'tg_image04',
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
                'name' => 'tg_image_size04',
                'default' => 'full',
                'exclude' => [
                    'custom'
                ]
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
                'default' => esc_html__('Happy Client', 'tpcore'),
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
                'default' => tp_kses('I work with over 150+ <b>happy clients</b>', 'tpcore'),
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
                'default' => esc_html__('Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.', 'tpcore'),
                'placeholder' => esc_html__('Type section description here', 'tpcore'),            
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

		$this->start_controls_section(
            'tg_brand_section',
            [
                'label' => __( 'Brand Item Row One', 'tpcore' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'tg_brand_image',
            [
                'type' => Controls_Manager::MEDIA,
                'label' => __( 'Image', 'tpcore' ),
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'name',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__( 'Brand Name', 'tpcore' ),
                'default' => esc_html__( 'Rise', 'tpcore' ),
                'placeholder' => esc_html__( 'Type a name', 'tpcore' ),
            ]
        );

        $this->add_control(
            'tg_brand_slides',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => esc_html__( 'Brand Item Row One', 'tpcore' ),
                'default' => [
                    [
                        'tg_brand_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'tg_brand_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'tg_brand_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                ]
            ]
        );


        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'medium_large',
                'separator' => 'before',
                'exclude' => [
                    'custom'
                ]
            ]
        );

        $this->end_controls_section();

		$this->start_controls_section(
            'tg_brand_section2',
            [
                'label' => __( 'Brand Item Row One', 'tpcore' ),
                'tab' => Controls_Manager::TAB_CONTENT,
                 'condition' => [
                    'tg_design_style' => ['layout-1'],
                ]                   
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'tg_brand_image2',
            [
                'type' => Controls_Manager::MEDIA,
                'label' => __( 'Hover Image', 'tpcore' ),
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'name2',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__( 'Brand Name', 'tpcore' ),
                'default' => esc_html__( 'Pinpoint', 'tpcore' ),
                'placeholder' => esc_html__( 'Type a name', 'tpcore' ),
            ]
        );

        $this->add_control(
            'tg_brand_slides2',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => esc_html__( 'Brand Item Row One', 'tpcore' ),
                'default' => [
                    [
                        'tg_brand_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'tg_brand_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'tg_brand_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'medium_large',
                'separator' => 'before',
                'exclude' => [
                    'custom'
                ]
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
					'{{WRAPPER}} .title' => 'text-transform: {{VALUE}};',
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
		?>

        <?php if ( $settings['tg_design_style']  == 'layout-2' ):

        if ( !empty($settings['tg_image04']['url']) ) {
            $tg_image04 = !empty($settings['tg_image04']['id']) ? wp_get_attachment_image_url( $settings['tg_image04']['id'], $settings['tg_image_size04_size']) : $settings['tg_image04']['url'];
            $tg_image_alt04 = get_post_meta($settings["tg_image04"]["id"], "_wp_attachment_image_alt", true);
        }   

         ?>

        <!-- Start Brand Section -->
            <section class="cs_filled_bg" data-src="<?php echo esc_url( $tg_image04 ); ?>">
              <div class="cs_height_145 cs_height_lg_80"></div>
              <div class="container">
                <?php if( !empty($settings['tg_section_title_show']) ) : ?>
                <div class="cs_section_heading cs_style_1 text-center">
                 <?php if (!empty($settings['tg_sub_title'])) : ?>
                  <p class="cs_section_subtitle cs_center cs_accent_color_2 cs_font_16 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">
                    <span><?php echo esc_html( $settings['tg_sub_title'] ); ?></span>
                    <svg width="23" height="20" viewBox="0 0 23 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M5.63864 4.46024C5.74235 4.77137 5.82303 5.07098 5.82303 5.12859C5.82303 5.17469 5.43122 5.22079 4.94724 5.22079C4.20975 5.22079 2.4006 5.42821 1.50178 5.6241C1.19065 5.69324 0.418574 6.30397 0.165061 6.69576C-0.249779 7.31802 0.176573 9.39223 0.787309 9.71488C0.983206 9.81859 0.994774 9.85315 0.833448 10.1643C0.418608 10.9594 0.718203 12.1578 1.57093 13.0797C1.98577 13.5291 2.0434 13.6559 2.0434 14.1283C2.0434 14.8428 2.36603 15.4305 3.11504 16.1103C3.48379 16.4445 3.77188 16.8132 3.81798 17.0091C4.30196 18.9912 7.36716 19.7056 12.23 18.9681C14.8458 18.5763 14.8804 18.5648 15.1108 18.7953C15.4796 19.141 15.929 19.2677 16.7586 19.2677C17.4501 19.2677 17.5538 19.3023 17.7612 19.5673C18.0608 19.9476 18.8444 20.0859 19.8354 19.9476C20.2157 19.89 20.7342 19.8439 20.9993 19.8439C21.7368 19.8439 21.9903 19.5904 21.6331 19.2216C21.3795 18.9566 21.2643 18.922 20.4807 18.922C19.1671 18.922 19.2592 19.3138 18.9712 12.6994C18.902 11.2129 18.8213 9.27699 18.7752 8.40122C18.683 6.44226 18.5563 6.56902 20.6074 6.6612C22.382 6.74187 22.7277 6.6612 22.3359 6.22331C21.8519 5.68171 20.3309 5.33602 18.4756 5.33602H18.0838C17.9225 5.33602 17.7727 5.40516 17.669 5.52039C17.5653 5.63562 17.5077 5.78542 17.5077 5.94675C17.5192 6.20026 17.5307 6.41921 17.5307 6.38464L16.1479 6.40768C14.7882 6.43073 14.7651 6.43073 14.7767 6.68424C14.7882 7.02994 14.6845 7.01841 13.8894 6.53443C13.1634 6.09655 12.8523 5.65867 11.2505 2.82393C10.7089 1.85597 10.248 1.18762 9.83312 0.73821C8.18528 -1.05943 4.40565 0.519258 5.63864 4.46024ZM8.32361 0.807347C8.65779 1.07238 9.02653 1.83292 9.41833 3.07744C10.225 5.63562 12.0341 7.47936 14.5347 8.28599L14.8804 8.40122C14.9034 9.12719 15.0187 14.9349 15.0532 17.0437L13.9239 17.1129C12.7716 17.1935 9.56813 17.6545 8.55408 17.8964C7.02147 18.2537 5.25839 17.4355 5.25839 16.3754C5.25839 16.191 5.20078 16.0412 5.14316 16.0412C4.38262 16.0412 3.21878 14.0822 3.65666 13.5521C3.7258 13.4715 3.58751 13.2756 3.29943 12.9875C2.56194 12.2846 2.45821 11.9965 2.53888 10.8326C2.60802 9.86468 2.59652 9.83011 2.33148 9.64573C1.55942 9.13871 1.4096 7.53697 2.08948 7.09908C2.26233 6.98385 3.13807 6.85709 4.70524 6.70728C7.88568 6.40768 7.68978 6.63815 7.18276 3.81493C6.74487 1.55636 7.3326 0.0122374 8.32361 0.807347ZM17.6114 18.0001C17.5998 18.0001 16.5628 18.0001 16.5973 18.0001L16.1709 7.62915C16.194 7.62915 17.3579 7.62915 17.3118 7.62915C17.4616 13.2641 17.2657 11.0285 17.6114 18.0001Z"
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
                  <div class="cs_height_70 cs_height_lg_40"></div>
                </div>
                <?php endif; ?> 
                <div class="cs_brands cs_style_1 cs_type_1">
                    <?php foreach ($settings['tg_brand_slides'] as $item) :

                        if ( !empty($item['tg_brand_image']['url']) ) {
                            $tg_brand_image_url = !empty($item['tg_brand_image']['id']) ? wp_get_attachment_image_url( $item['tg_brand_image']['id'], $settings['thumbnail_size']) : $item['tg_brand_image']['url'];
                            $tg_brand_image_alt = get_post_meta($item["tg_brand_image"]["id"], "_wp_attachment_image_alt", true);
                        }

                    ?>
                <?php if ( !empty($item['tg_brand_image']['url']) ) : ?>
                  <div class="cs_brand overflow-hidden cs_radius_10 text-center brand-image-area">
                    <div class="cs_brand_logo_wrap cs_center cs_brand_bg_1">
                      <img class="cs_brand_logo" src="<?php echo esc_url($tg_brand_image_url); ?>" alt="<?php echo esc_attr($tg_brand_image_alt); ?>">
                    </div>
                    <?php if( !empty($item['name']) ) : ?>
                    <p class="m-0 cs_white_bg"><?php echo esc_html( $item['name'] ); ?></p>
                    <?php endif; ?>
                  </div>
                <?php endif; ?>
                 <?php endforeach; ?>
                </div>
              </div>
              <div class="cs_height_150 cs_height_lg_80"></div>
            </section>
            <!-- End Brand Section -->


       <?php else: ?>

	    <!-- Start Brand Section -->
	    <section>
	      <div class="cs_height_150 cs_height_lg_75"></div>
	      <div class="container">
	        <div class="row">
	        <?php if( !empty($settings['tg_section_title_show']) ) : ?>
	          <div class="col-lg-4">
	            <div class="cs_section_heading cs_style_1">
	            <?php if (!empty($settings['tg_sub_title'])) : ?>
	              <p class="cs_section_subtitle cs_accent_color_2 cs_font_16 wow fadeInRight" data-wow-duration="0.8s" data-wow-delay="0.2s">        
	                <span><?php echo esc_html( $settings['tg_sub_title'] ); ?></span>
	                <svg width="23" height="20" viewBox="0 0 23 20" fill="none" xmlns="http://www.w3.org/2000/svg">
	                  <path fill-rule="evenodd" clip-rule="evenodd"
	                    d="M5.63864 4.46024C5.74235 4.77137 5.82303 5.07098 5.82303 5.12859C5.82303 5.17469 5.43122 5.22079 4.94724 5.22079C4.20975 5.22079 2.4006 5.42821 1.50178 5.6241C1.19065 5.69324 0.418574 6.30397 0.165061 6.69576C-0.249779 7.31802 0.176573 9.39223 0.787309 9.71488C0.983206 9.81859 0.994774 9.85315 0.833448 10.1643C0.418608 10.9594 0.718203 12.1578 1.57093 13.0797C1.98577 13.5291 2.0434 13.6559 2.0434 14.1283C2.0434 14.8428 2.36603 15.4305 3.11504 16.1103C3.48379 16.4445 3.77188 16.8132 3.81798 17.0091C4.30196 18.9912 7.36716 19.7056 12.23 18.9681C14.8458 18.5763 14.8804 18.5648 15.1108 18.7953C15.4796 19.141 15.929 19.2677 16.7586 19.2677C17.4501 19.2677 17.5538 19.3023 17.7612 19.5673C18.0608 19.9476 18.8444 20.0859 19.8354 19.9476C20.2157 19.89 20.7342 19.8439 20.9993 19.8439C21.7368 19.8439 21.9903 19.5904 21.6331 19.2216C21.3795 18.9566 21.2643 18.922 20.4807 18.922C19.1671 18.922 19.2592 19.3138 18.9712 12.6994C18.902 11.2129 18.8213 9.27699 18.7752 8.40122C18.683 6.44226 18.5563 6.56902 20.6074 6.6612C22.382 6.74187 22.7277 6.6612 22.3359 6.22331C21.8519 5.68171 20.3309 5.33602 18.4756 5.33602H18.0838C17.9225 5.33602 17.7727 5.40516 17.669 5.52039C17.5653 5.63562 17.5077 5.78542 17.5077 5.94675C17.5192 6.20026 17.5307 6.41921 17.5307 6.38464L16.1479 6.40768C14.7882 6.43073 14.7651 6.43073 14.7767 6.68424C14.7882 7.02994 14.6845 7.01841 13.8894 6.53443C13.1634 6.09655 12.8523 5.65867 11.2505 2.82393C10.7089 1.85597 10.248 1.18762 9.83312 0.73821C8.18528 -1.05943 4.40565 0.519258 5.63864 4.46024ZM8.32361 0.807347C8.65779 1.07238 9.02653 1.83292 9.41833 3.07744C10.225 5.63562 12.0341 7.47936 14.5347 8.28599L14.8804 8.40122C14.9034 9.12719 15.0187 14.9349 15.0532 17.0437L13.9239 17.1129C12.7716 17.1935 9.56813 17.6545 8.55408 17.8964C7.02147 18.2537 5.25839 17.4355 5.25839 16.3754C5.25839 16.191 5.20078 16.0412 5.14316 16.0412C4.38262 16.0412 3.21878 14.0822 3.65666 13.5521C3.7258 13.4715 3.58751 13.2756 3.29943 12.9875C2.56194 12.2846 2.45821 11.9965 2.53888 10.8326C2.60802 9.86468 2.59652 9.83011 2.33148 9.64573C1.55942 9.13871 1.4096 7.53697 2.08948 7.09908C2.26233 6.98385 3.13807 6.85709 4.70524 6.70728C7.88568 6.40768 7.68978 6.63815 7.18276 3.81493C6.74487 1.55636 7.3326 0.0122374 8.32361 0.807347ZM17.6114 18.0001C17.5998 18.0001 16.5628 18.0001 16.5973 18.0001L16.1709 7.62915C16.194 7.62915 17.3579 7.62915 17.3118 7.62915C17.4616 13.2641 17.2657 11.0285 17.6114 18.0001Z"
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
	              <div class="cs_height_25 cs_height_lg_10"></div>
	              <?php if ( !empty($settings['tg_description']) ) : ?>
	              <p class="mb-0"><?php echo tp_kses( $settings['tg_description'] ); ?>
	              </p>
				<?php endif; ?> 
	            </div>
	            <div class="cs_height_lg_30"></div>
	          </div>
			<?php endif; ?>
	          <div class="col-lg-7 offset-lg-1">

	            <div class="cs_brands cs_style_1 cs_ml_30">
	                <?php foreach ($settings['tg_brand_slides'] as $item) :

	                    if ( !empty($item['tg_brand_image']['url']) ) {
	                        $tg_brand_image_url = !empty($item['tg_brand_image']['id']) ? wp_get_attachment_image_url( $item['tg_brand_image']['id'], $settings['thumbnail_size']) : $item['tg_brand_image']['url'];
	                        $tg_brand_image_alt = get_post_meta($item["tg_brand_image"]["id"], "_wp_attachment_image_alt", true);
	                    }

	                ?>
				<?php if ( !empty($item['tg_brand_image']['url']) ) : ?>
	              <div class="cs_brand overflow-hidden cs_radius_10 text-center brand-image-area">
	                <div class="cs_brand_logo_wrap cs_center cs_brand_bg_1">
	                  <img class="cs_brand_logo" src="<?php echo esc_url($tg_brand_image_url); ?>" alt="<?php echo esc_attr($tg_brand_image_alt); ?>">
	                </div>
					<?php if( !empty($item['name']) ) : ?>
	                <p class="m-0 cs_white_bg"><?php echo esc_html( $item['name'] ); ?></p>
	                 <?php endif; ?>
	              </div>
	              <?php endif; ?>
				<?php endforeach; ?>

	            </div>

	            <div class="cs_height_50 cs_height_lg_30"></div>

	            <div class="cs_brands cs_style_1 cs_mr_30">

	                <?php foreach ($settings['tg_brand_slides2'] as $item) :

	                	if ( !empty($item['tg_brand_image2']['url']) ) {
	                        $tg_brand_image_url2 = !empty($item['tg_brand_image2']['id']) ? wp_get_attachment_image_url( $item['tg_brand_image2']['id'], $settings['thumbnail_size']) : $item['tg_brand_image2']['url'];
	                        $tg_brand_image_alt2 = get_post_meta($item["tg_brand_image2"]["id"], "_wp_attachment_image_alt", true);
	                    }

	                ?>
				<?php if ( !empty($item['tg_brand_image2']['url']) ) : ?>
	              <div class="cs_brand overflow-hidden cs_radius_10 text-center brand-image-area2">
	                <div class="cs_brand_logo_wrap cs_center cs_brand_bg_4">
	                  <img class="cs_brand_logo" src="<?php echo esc_url($tg_brand_image_url2); ?>" alt="<?php echo esc_attr($tg_brand_image_alt2); ?>">
	                </div>
					<?php if( !empty($item['name2']) ) : ?>
	                	<p class="m-0 cs_white_bg"><?php echo esc_html( $item['name2'] ); ?></p>
					<?php endif; ?>
	              </div>
				<?php endif; ?>
				<?php endforeach; ?>

	            </div>

	          </div>
	        </div>
	      </div>
	      <div class="cs_height_150 cs_height_lg_80"></div>
	    </section>
	    <!-- End Brand Section -->

        <?php endif; ?>


	<?php
	}
}

$widgets_manager->register( new tg_brand() );