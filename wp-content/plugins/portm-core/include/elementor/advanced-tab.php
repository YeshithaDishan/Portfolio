<?php
namespace TPCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Control_Media;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Multim Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class TG_Advanced_Tab extends Widget_Base {

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
		return 'advanced-tab';
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
		return __( 'Advanced Tab', 'tpcore' );
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

		// tg_section_title
        $this->start_controls_section(
            'tg_section_title',
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
                'default' => esc_html__('Pricing & Packaging', 'tpcore'),
                'placeholder' => esc_html__('Type Heading Text', 'tpcore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_title',
            [
                'label' => esc_html__('Title', 'tpcore'),
                'description' => tp_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => tp_kses('Moments<br> of <b>my life</b>', 'tpcore'),
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


       // tp_section_tab01
        $this->start_controls_section(
            'tp_section_tab01',
            [
                'label' => esc_html__('Tab 01', 'tpcore'),
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
                'default' => tp_kses('Lorem ipsum dolor sit amet, <b>consectetuer adipiscing elit</b>. Cum sociis natoque penatibus et magnis dis parturient montes,<b> nascetur ridiculus</b> mus. Donec quam felis, ultricies nec, <span>pellentesque eu</span>, pretium quis, sem. Nulla consequat massa quis enim.', 'tpcore'),
                'placeholder' => esc_html__('Type Tab description 1 here', 'tpcore'),
            ]
        );

         $this->add_control(
            'gallery1',
            [
                'label' => esc_html__( 'Add Gallery Images', 'tpcore' ),
                'type' => Controls_Manager::GALLERY,
                'show_label' => true,
                'default' => [],
            ]
        ); 

        $this->end_controls_section();

       // tp_section_tab02
        $this->start_controls_section(
            'tp_section_tab02',
            [
                'label' => esc_html__('Tab 02', 'tpcore'),                
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
                'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa deleniti adipisci culpa? Quos sit dolore magnam minima, optio nobis commodi!', 'tpcore'),
                'placeholder' => esc_html__('Type Tab description 2 here', 'tpcore'),
            ]
        );

         $this->add_control(
            'gallery2',
            [
                'label' => esc_html__( 'Add Gallery Images', 'tpcore' ),
                'type' => Controls_Manager::GALLERY,
                'show_label' => true,
                'default' => [],
            ]
        );       

        $this->end_controls_section();

       // tp_section_tab03
        $this->start_controls_section(
            'tp_section_tab03',
            [
                'label' => esc_html__('Tab 03', 'tpcore'),                
            ]
        );

        $this->add_control(
            'tg_tab_title3',
            [
                'label' => esc_html__('Tab Title 3', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('My tools', 'tpcore'),
                'placeholder' => esc_html__('Type Tab Title 3 Text', 'tpcore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_tab_description3',
            [
                'label' => esc_html__('Tab Description 3', 'tpcore'),
                'description' => tp_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => tp_kses('Lorem ipsum dolor sit amet, <b>consectetuer adipiscing elit</b>. Cum sociis natoque penatibus et magnis dis parturient montes,<b> nascetur ridiculus</b> mus. Donec quam felis, ultricies nec, <span>pellentesque eu</span>, pretium quis, sem. Nulla consequat massa quis enim.', 'tpcore'),
                'placeholder' => esc_html__('Type Tab description 3 here', 'tpcore'),
            ]
        );

        $this->add_control(
            'gallery3',
            [
                'label' => esc_html__( 'Add Gallery Images', 'tpcore' ),
                'type' => Controls_Manager::GALLERY,
                'show_label' => true,
                'default' => [],
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


    <!-- Start Gallery Section -->
    <section class="position-relative">
      <div class="cs_service_shape_1 position-absolute">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/service_shape_1.svg" alt="">
      </div>
      <div class="cs_height_150 cs_height_lg_80"></div>
      <div class="container">
        <div class="row cs_tabs cs_style_1">
          <div class="col-lg-4">
            <?php if( !empty($settings['tg_section_title_show']) ) : ?>
            <div class="cs_section_heading cs_style_1">
             <?php if (!empty($settings['tg_sub_title'])) : ?> 
              <p class="cs_section_subtitle cs_accent_color_2 cs_font_16 wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="0.2s">
                <span><?php echo esc_html( $settings['tg_sub_title'] ); ?></span>
                <svg width="23" height="20" viewBox="0 0 23 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M3.97591 14.5618C-0.971171 8.81681 -0.577793 3.06974 4.89025 1.37857C6.56088 0.858827 8.75716 1.23766 10.0143 2.25224L10.659 2.77411L11.539 2.18776C16.6218 -1.25827 23.3933 4.25223 20.9381 9.82952C18.7034 14.9013 10.8697 20.637 9.09113 18.5076C8.56387 17.8715 8.8053 17.7662 10.1306 18.0209C11.3936 18.2634 16.8827 12.8513 18.1731 10.0825C19.7277 6.75962 19.2971 5.02257 16.4256 2.95039C15.2389 2.1019 13.4897 2.59489 12.1834 4.176C11.1518 5.40313 10.0176 5.5552 9.00115 4.12668C6.12036 0.110156 1.92139 3.63334 3.44169 8.7862C4.07799 10.9138 4.70403 11.9614 7.02448 14.7108C8.60384 16.5728 8.65482 16.6628 8.17596 16.9503C7.26361 17.5074 5.75209 16.6451 3.97591 14.5618Z"
                    fill="#342EAD" />
                  <path
                    d="M14.9467 5.0654C14.1851 4.96639 14.7719 4.08671 15.4928 4.29588C16.0891 4.48073 16.9235 4.79201 17.2943 5.68325C17.6984 6.61905 17.0386 7.57974 16.6328 7.49297C16.2739 7.41916 16.1452 7.02459 16.1486 6.20635C16.1521 5.3881 15.7082 5.1644 14.9467 5.0654Z"
                    fill="#342EAD" />
                  <path
                    d="M16.9264 9.85448C15.938 10.1378 15.1442 9.42309 15.564 8.89173C15.8833 8.50455 17.1593 8.40681 17.5481 8.75687C17.8729 9.06399 17.7018 9.62863 16.9264 9.85448Z"
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
            <div class="cs_height_30 cs_height_lg_20"></div>
            <div>
              <ul class="cs_tab_links cs_mp_0">
                <?php if ( !empty($settings['tg_tab_title1']) ) : ?>
                    <li class="active"><a class="text-uppercase " href="travel"><?php echo esc_html( $settings['tg_tab_title1'] ); ?></a></li>
                <?php endif; ?>
                <?php if ( !empty($settings['tg_tab_title2']) ) : ?>
                    <li><a class="text-uppercase " href="creativity"><?php echo esc_html( $settings['tg_tab_title2'] ); ?></a></li>
                <?php endif; ?>
                <?php if ( !empty($settings['tg_tab_title3']) ) : ?>
                    <li><a class="text-uppercase " href="moments"><?php echo esc_html( $settings['tg_tab_title3'] ); ?></a></li>
                <?php endif; ?>
              </ul>
              <div class="cs_tab_body">
                <?php if ( !empty($settings['tg_tab_description1']) ) : ?>
                <div class="cs_tab active" data-id="travel">
                  <p class="m-0 tab-about-color"><?php echo tp_kses( $settings['tg_tab_description1'] ); ?></p>
                </div>
                <?php endif; ?> 
                <?php if ( !empty($settings['tg_tab_description2']) ) : ?>
                <div class="cs_tab" data-id="creativity">
                  <p class="m-0 tab-about-color"><?php echo tp_kses( $settings['tg_tab_description2'] ); ?></p>
                </div>
                <?php endif; ?>
                <?php if ( !empty($settings['tg_tab_description3']) ) : ?>
                <div class="cs_tab" data-id="moments">
                  <p class="m-0 tab-about-color"><?php echo tp_kses( $settings['tg_tab_description3'] ); ?></p>
                </div>
                <?php endif; ?>
              </div>
            </div>
            <div class="cs_height_lg_30"></div>
          </div>
          <div class="col-lg-8">
            <div class="cs_pl_70 cs_tab active" data-id="travel">
              <div class="cs_gallery_grid">
                <?php foreach ( $settings['gallery1'] as $image ) { ?>           
                <div class="cs_gallery cs_style_1">
                  <img class="w-100" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr__('Gallery Image','tpcore') ?>">
                </div>
                <?php } ?>
              </div>
            </div>
            <div class="cs_pl_70 cs_tab" data-id="creativity">
              <div class="cs_gallery_grid">
                <?php foreach ( $settings['gallery2'] as $image ) { ?>  
                <div class="cs_gallery cs_style_1">
                  <img class="w-100" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr__('Gallery Image','tpcore') ?>">
                </div>
                <?php } ?>
              </div>
            </div>
            <div class="cs_pl_70 cs_tab" data-id="moments">
              <div class="cs_gallery_grid">
                <?php foreach ( $settings['gallery3'] as $image ) { ?>
                <div class="cs_gallery cs_style_1">
                  <img class="w-100" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr__('Gallery Image','tpcore') ?>">
                </div>
                <?php } ?>
              </div>

            </div>

          </div>
        </div>
      </div>
      <div class="cs_height_150 cs_height_lg_80"></div>
    </section>
    <!-- End Gallery Section -->




		<?php
	}

}
$widgets_manager->register( new TG_Advanced_Tab() );