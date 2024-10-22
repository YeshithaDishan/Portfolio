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
 * Portm Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class TG_Portfolio extends Widget_Base {

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
		return 'portfolio-list';
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
		return __( 'Portfolio', 'tpcore' );
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
                    'layout-3' => esc_html__('Layout 3', 'tpcore'),                   
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
                    'tp_design_style' => ['layout-1','layout-2'],
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
                'condition' => [
                    'tp_design_style' => ['layout-1','layout-2'],
                ]                 
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
                'default' => esc_html__('Portfolio', 'tpcore'),
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
                'default' => tp_kses('<b>My latest</b><br><span>Projects</span>', 'tpcore'),
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


        // project_section_area
        $this->start_controls_section(
            '_tg_project_section',
            [
                'label' => esc_html__('Project List', 'tpcore'),                
            ]
        );


        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'reviewer_image',
            [
                'label' => esc_html__( 'Project Image', 'tpcore' ),
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
            'tg_project_button_text',
            [
                'label' => esc_html__('Button Text', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('View work', 'tpcore'),
                'placeholder' => esc_html__('Type Button Text', 'tpcore'),
                'label_block' => true,
            ]
        ); 

        $repeater->add_control(
        'select_post',
            [
                'label' => __( 'Select a Post', 'tpcore' ),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'default' => 'none',
                'options' => $this->get_all_portfolio(),
            ]
        );

        $this->add_control(
            'tg_project_list',
            [
                'label' => esc_html__('About Detail List', 'tpcore'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
            ]
        );

        $this->end_controls_section();    

        // tg_btn_button_group
        $this->start_controls_section(
            'tg_btn_button_group',
            [
                'label' => esc_html__('Button', 'tpcore'),
                 'condition' => [
                    'tp_design_style' => ['layout-1','layout-2'],
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
                'default' => esc_html__('View All Project', 'tpcore'),
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


    // Get All Portfolio
    public function get_all_portfolio() {

        $wp_query = get_posts([
            'post_type' => 'portfolio',
            'orderby' => 'date',
            'posts_per_page' => -1,
        ]);

        $options = ['none' => 'None'];
        foreach(  $wp_query as $portfolios ){
            $options[$portfolios->ID] = $portfolios->post_name;
        }

        return $options;
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

        $this->add_render_attribute('title_args', 'class', 'cs_section_title cs_font_48 cs_semi_bold common-heading-title-style2');

        if ( !empty($settings['tg_image04']['url']) ) {
            $tg_image04 = !empty($settings['tg_image04']['id']) ? wp_get_attachment_image_url( $settings['tg_image04']['id'], $settings['tg_image_size04_size']) : $settings['tg_image04']['url'];
            $tg_image_alt04 = get_post_meta($settings["tg_image04"]["id"], "_wp_attachment_image_alt", true);
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

        <!-- Start Portfolio Section -->
        <section class="cs_filled_bg cs_100_bg" data-src="<?php echo esc_url( $tg_image04 ); ?>">
          <div class="cs_height_150 cs_height_lg_80"></div>
          <div class="container">
            <div class="cs_isotop cs_isotop_col_2 cs_has_gutter_80">
              <div class="cs_grid_sizer"></div>
              <?php if( !empty($settings['tg_section_title_show']) ) : ?> 
              <div class="cs_isotop_item">
                <div class="cs_portfolio cs_style_2">
                  <div class="cs_section_heading cs_style_1">
                    <?php if (!empty($settings['tg_sub_title'])) : ?>
                    <p class="cs_section_subtitle cs_accent_color_2 cs_font_16 wow fadeInRight" data-wow-duration="0.8s" data-wow-delay="0.2s">
                      <span><?php echo esc_html( $settings['tg_sub_title'] ); ?></span>
                      <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M4.19081 0.0804121C2.96402 0.280944 3.78977 1.09487 4.80423 1.23643C5.65354 1.35439 7.28135 1.35439 10.7848 1.34259C15.0549 1.3308 16.8833 1.37797 17.1546 1.49593C17.827 1.80263 18.1219 2.98224 18.3107 6.17896C18.3814 7.31138 18.523 9.01 18.6291 9.95368C18.9594 12.9853 18.6527 13.2802 14.7719 13.4335C13.2738 13.4925 11.3274 13.6104 10.4545 13.693C6.37308 14.0823 3.83693 14.0115 2.42141 13.4453C1.24181 12.9734 1.30081 12.596 1.26542 11.8056C1.18285 10.2722 1.21823 7.14621 1.37157 4.30338C1.50133 1.92058 1.65467 1.44875 2.42141 1.09487C2.89325 0.882538 2.72812 0.634828 2.13831 0.65842C1.25361 0.705604 0.569457 1.0005 0.439701 2.38063C0.274556 4.07926 -0.775323 13.4099 1.11204 14.2002C2.35062 14.7193 4.50929 15.2265 5.3586 15.2265C5.9484 15.2265 5.92485 15.8871 5.33505 16.064C3.9785 16.4533 4.93396 17.397 6.72695 17.4677C10.3601 17.5857 15.6684 17.2908 15.7155 16.9487C15.7627 16.6066 14.996 15.8281 14.5949 15.8281C14.4652 15.8281 14.3826 15.6747 14.3826 15.4506C14.3826 15.1321 14.3826 14.6839 14.7482 14.6839C16.3171 14.6839 17.1546 14.6131 17.6265 14.5069C19.9267 14.0115 20.0211 12.4544 19.9975 11.5461C19.9149 7.8304 19.2189 4.27981 19.2189 3.44229C19.2071 1.99138 18.3578 0.564051 16.5413 0.304539C15.8335 0.092211 5.4058 -0.12012 4.19081 0.0804121ZM10.3484 7.29958C10.2068 7.14623 8.83846 5.62455 8.46099 5.23528C7.98915 4.75164 7.50549 4.90497 6.49103 5.83686C5.97201 6.32049 5.15809 7.04007 4.67446 7.45293C2.99942 8.86845 2.86966 9.50543 4.24979 9.50543C4.72163 9.50543 4.94579 9.34027 6.34951 7.90116C8.1661 6.03739 8.00095 6.04919 9.58161 7.58267C10.6433 8.60892 10.5135 8.62074 12.2357 7.27599C13.722 5.89586 14.5713 4.97576 15.6448 3.90232C16.7064 2.84068 15.0785 2.35704 14.2174 3.08839C13.203 3.92591 10.3601 7.28778 10.3484 7.29958ZM14.1702 6.74517C13.9579 7.28779 14.0641 10.9092 14.3 11.1333C14.878 11.7113 15.2319 10.4727 15.1965 8.01912C15.1729 6.66258 14.5123 5.84868 14.1702 6.74517ZM7.34037 8.21967C6.97469 9.18695 7.28136 11.8293 8.02451 11.6995C8.76766 11.5697 8.26045 8.65611 8.0953 8.23145C7.98914 7.92476 7.45833 7.91298 7.34037 8.21967ZM12.1413 8.49096C11.9408 8.73868 11.7403 10.5671 11.87 11.0625C12.0941 11.9472 13.026 11.5579 13.026 10.5789C13.026 8.93923 12.6014 7.93655 12.1413 8.49096ZM5.42939 9.75316C5.25245 9.9301 5.32322 11.2512 5.53554 11.5343C5.91302 12.0534 6.2433 11.7231 6.2433 10.8148C6.23151 9.87112 5.83046 9.34029 5.42939 9.75316ZM9.49901 9.75316C9.19232 10.0599 9.40464 11.322 9.78211 11.4989C10.3837 11.7703 10.5843 11.0271 10.2186 9.8475C10.1596 9.63517 9.67596 9.57621 9.49901 9.75316ZM12.5424 14.8844C13.0143 15.0142 12.8373 15.4388 12.8845 15.8281L7.43471 15.9224C7.43471 15.8871 7.52912 14.9552 7.52912 15.0142C7.90659 15.0024 11.3628 14.8608 11.8347 14.8254C12.0234 14.8018 12.3537 14.8372 12.5424 14.8844Z"
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
                </div>
              </div>
            <?php endif; ?>
            <?php foreach ($settings['tg_project_list'] as $item) :
                if ( !empty($item['reviewer_image']['url']) ) {
                    $tg_reviewer_image = !empty($item['reviewer_image']['id']) ? wp_get_attachment_image_url( $item['reviewer_image']['id'], $item['reviewer_image_size_size']) : $item['reviewer_image']['url'];
                    $tg_reviewer_image_alt = get_post_meta($item["reviewer_image"]["id"], "_wp_attachment_image_alt", true);
                }
             ?>
             <?php
                $args = new \WP_Query( array(
                    'post_type' => 'portfolio',
                    'post_status' => 'publish',
                    'post__in' => [
                        $item['select_post']
                    ]
                ));

                /* Start the Loop */
                while ( $args->have_posts() ) : $args->the_post();
            ?>            
              <div class="cs_isotop_item">
                <div class="cs_portfolio cs_style_2 cs_radius_20 position-relative">
                  <div class="cs_browser cs_style_1">
                    <div class="cs_btns">
                      <span></span><span></span><span></span>
                    </div>
                    <div class="cs_input_filed w-100"></div>
                  </div>
                  <a href="<?php the_permalink(); ?>" class="cs_portfolio_thumbnail cs_zoom">
                    <img class="cs_zoom_in w-100" src="<?php echo esc_url($tg_reviewer_image); ?>" alt="<?php echo esc_url($tg_reviewer_image_alt); ?>">
                  </a>
                  <div class="cs_portfolio_info w-100 cs_white_color cs_medium position-absolute">
                    <h2 class="cs_font_28 cs_white_color cs_medium mb-0"><?php the_title(); ?></h2>  
                    <a href="<?php the_permalink(); ?>"
                      class="cs_font_16 cs_white_color_hover d-inline-flex align-items-center cs_gap_15 cs_medium">
                      <span class="cs_text_btn cs_secondary_font cs_type_1 text-uppercase"><?php echo esc_html( $item['tg_project_button_text'] ); ?></span>
                      <svg width="5" height="9" viewBox="0 0 5 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 0L5 4.5L0 9L0 0Z" fill="currentColor" />
                      </svg>
                    </a>
                  </div>
                </div>
              </div>
              <?php endwhile; wp_reset_postdata(); ?>
             <?php endforeach; ?>
             <?php if( !empty($settings['tg_btn_text']) ) : ?>
              <div class="cs_isotop_item">
                <div class="cs_portfolio cs_style_2 text-center cs_radius_20 overflow-hidden wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">
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
              </div>
            <?php endif; ?>
            </div>
          </div>
          <div class="cs_height_150 cs_height_lg_80"></div>
        </section>
        <!-- End Portfolio Section -->

        <?php elseif ( $settings['tp_design_style']  == 'layout-3' ):  ?>

            <!-- Start Porfolio Section -->
            <section>
              <div class="cs_height_150 cs_height_lg_80"></div>
              <div class="container">
                <div class="cs_isotop cs_isotop_col_3">
                  <div class="cs_grid_sizer"></div>
                <?php foreach ($settings['tg_project_list'] as $item) :
                    if ( !empty($item['reviewer_image']['url']) ) {
                        $tg_reviewer_image = !empty($item['reviewer_image']['id']) ? wp_get_attachment_image_url( $item['reviewer_image']['id'], $item['reviewer_image_size_size']) : $item['reviewer_image']['url'];
                        $tg_reviewer_image_alt = get_post_meta($item["reviewer_image"]["id"], "_wp_attachment_image_alt", true);
                    }
                 ?>
                 <?php
                    $args = new \WP_Query( array(
                        'post_type' => 'portfolio',
                        'post_status' => 'publish',
                        'post__in' => [
                            $item['select_post']
                        ]
                    ));

                    /* Start the Loop */
                    while ( $args->have_posts() ) : $args->the_post();
                ?>   
                  <div class="cs_isotop_item cs_zoom">
                    <a href="<?php the_permalink(); ?>" class="cs_portfolio cs_style_1">
                      <div class="cs_portfolio_thumbnail">
                        <img class="cs_zoom_in w-100" src="<?php echo esc_url($tg_reviewer_image); ?>" alt="<?php echo esc_url($tg_reviewer_image_alt); ?>">
                      </div>
                      <div class="cs_portfolio_info cs_white_color cs_medium position-absolute">
                        <h2 class="cs_font_28 cs_white_color cs_medium mb-0"><?php the_title(); ?></h2>
                        <div class="cs_font_16 cs_gap_15 d-inline-flex cs_medium align-items-center">
                          <span class="cs_text_btn cs_secondary_font cs_type_1 text-uppercase"><?php echo esc_html( $item['tg_project_button_text'] ); ?></span>
                          <svg width="5" height="9" viewBox="0 0 5 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0L5 4.5L0 9L0 0Z" fill="currentColor" />
                          </svg>
                        </div>       
                      </div>
                    </a>
                  </div>
                <?php endwhile; wp_reset_postdata(); ?>
                <?php endforeach; ?>
                </div>
              </div>
              <div class="cs_height_150 cs_height_lg_80"></div>
            </section>
            <!-- End Porfolio Section -->


        <?php else: ?>

        <!-- Start Portfolio Section -->
        <section class="cs_100_bg" data-src="<?php echo esc_url( $tg_image04 ); ?>">
          <div class="cs_height_150 cs_height_lg_80"></div>
          <div class="container">
            <div class="cs_grid_3">
              <div class="cs_grid_item">
                <div class="cs_portfolio cs_style_1">
                  <?php if( !empty($settings['tg_section_title_show']) ) : ?>  
                  <div class="cs_section_heading cs_style_1">
                    <?php if (!empty($settings['tg_sub_title'])) : ?>
                    <p class="cs_section_subtitle cs_violet_text cs_font_16 wow fadeInRight" data-wow-duration="0.8s" data-wow-delay="0.2s">
                      <span><?php echo esc_html( $settings['tg_sub_title'] ); ?></span>
                      <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M4.19081 0.0804121C2.96402 0.280944 3.78977 1.09487 4.80423 1.23643C5.65354 1.35439 7.28135 1.35439 10.7848 1.34259C15.0549 1.3308 16.8833 1.37797 17.1546 1.49593C17.827 1.80263 18.1219 2.98224 18.3107 6.17896C18.3814 7.31138 18.523 9.01 18.6291 9.95368C18.9594 12.9853 18.6527 13.2802 14.7719 13.4335C13.2738 13.4925 11.3274 13.6104 10.4545 13.693C6.37308 14.0823 3.83693 14.0115 2.42141 13.4453C1.24181 12.9734 1.30081 12.596 1.26542 11.8056C1.18285 10.2722 1.21823 7.14621 1.37157 4.30338C1.50133 1.92058 1.65467 1.44875 2.42141 1.09487C2.89325 0.882538 2.72812 0.634828 2.13831 0.65842C1.25361 0.705604 0.569457 1.0005 0.439701 2.38063C0.274556 4.07926 -0.775323 13.4099 1.11204 14.2002C2.35062 14.7193 4.50929 15.2265 5.3586 15.2265C5.9484 15.2265 5.92485 15.8871 5.33505 16.064C3.9785 16.4533 4.93396 17.397 6.72695 17.4677C10.3601 17.5857 15.6684 17.2908 15.7155 16.9487C15.7627 16.6066 14.996 15.8281 14.5949 15.8281C14.4652 15.8281 14.3826 15.6747 14.3826 15.4506C14.3826 15.1321 14.3826 14.6839 14.7482 14.6839C16.3171 14.6839 17.1546 14.6131 17.6265 14.5069C19.9267 14.0115 20.0211 12.4544 19.9975 11.5461C19.9149 7.8304 19.2189 4.27981 19.2189 3.44229C19.2071 1.99138 18.3578 0.564051 16.5413 0.304539C15.8335 0.092211 5.4058 -0.12012 4.19081 0.0804121ZM10.3484 7.29958C10.2068 7.14623 8.83846 5.62455 8.46099 5.23528C7.98915 4.75164 7.50549 4.90497 6.49103 5.83686C5.97201 6.32049 5.15809 7.04007 4.67446 7.45293C2.99942 8.86845 2.86966 9.50543 4.24979 9.50543C4.72163 9.50543 4.94579 9.34027 6.34951 7.90116C8.1661 6.03739 8.00095 6.04919 9.58161 7.58267C10.6433 8.60892 10.5135 8.62074 12.2357 7.27599C13.722 5.89586 14.5713 4.97576 15.6448 3.90232C16.7064 2.84068 15.0785 2.35704 14.2174 3.08839C13.203 3.92591 10.3601 7.28778 10.3484 7.29958ZM14.1702 6.74517C13.9579 7.28779 14.0641 10.9092 14.3 11.1333C14.878 11.7113 15.2319 10.4727 15.1965 8.01912C15.1729 6.66258 14.5123 5.84868 14.1702 6.74517ZM7.34037 8.21967C6.97469 9.18695 7.28136 11.8293 8.02451 11.6995C8.76766 11.5697 8.26045 8.65611 8.0953 8.23145C7.98914 7.92476 7.45833 7.91298 7.34037 8.21967ZM12.1413 8.49096C11.9408 8.73868 11.7403 10.5671 11.87 11.0625C12.0941 11.9472 13.026 11.5579 13.026 10.5789C13.026 8.93923 12.6014 7.93655 12.1413 8.49096ZM5.42939 9.75316C5.25245 9.9301 5.32322 11.2512 5.53554 11.5343C5.91302 12.0534 6.2433 11.7231 6.2433 10.8148C6.23151 9.87112 5.83046 9.34029 5.42939 9.75316ZM9.49901 9.75316C9.19232 10.0599 9.40464 11.322 9.78211 11.4989C10.3837 11.7703 10.5843 11.0271 10.2186 9.8475C10.1596 9.63517 9.67596 9.57621 9.49901 9.75316ZM12.5424 14.8844C13.0143 15.0142 12.8373 15.4388 12.8845 15.8281L7.43471 15.9224C7.43471 15.8871 7.52912 14.9552 7.52912 15.0142C7.90659 15.0024 11.3628 14.8608 11.8347 14.8254C12.0234 14.8018 12.3537 14.8372 12.5424 14.8844Z"
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
                 <?php endif; ?>
                </div>
                <div class="cs_height_60 cs_height_lg_30"></div>
              </div>

            <?php foreach ($settings['tg_project_list'] as $item) :
                if ( !empty($item['reviewer_image']['url']) ) {
                    $tg_reviewer_image = !empty($item['reviewer_image']['id']) ? wp_get_attachment_image_url( $item['reviewer_image']['id'], $item['reviewer_image_size_size']) : $item['reviewer_image']['url'];
                    $tg_reviewer_image_alt = get_post_meta($item["reviewer_image"]["id"], "_wp_attachment_image_alt", true);
                }
             ?>
             <?php
                $args = new \WP_Query( array(
                    'post_type' => 'portfolio',
                    'post_status' => 'publish',
                    'post__in' => [
                        $item['select_post']
                    ]
                ));

                /* Start the Loop */
                while ( $args->have_posts() ) : $args->the_post();
            ?>                 
              <div class="cs_grid_item">
                <a href="<?php the_permalink(); ?>" class="cs_portfolio cs_style_1 cs_zoom position-relative">
                  <div class="cs_portfolio_thumbnail">
                    <img class="cs_zoom_in w-100" src="<?php echo esc_url($tg_reviewer_image); ?>" alt="<?php echo esc_url($tg_reviewer_image_alt); ?>">
                  </div>
                  <div class="cs_portfolio_info cs_white_color cs_medium position-absolute">
                    <h2 class="cs_font_28 cs_white_color cs_medium mb-0"><?php the_title(); ?></h2>
                    <div class="cs_font_16 cs_gap_15 d-inline-flex cs_medium align-items-center">
                      <span class="cs_text_btn cs_secondary_font cs_type_1 text-uppercase"><?php echo esc_html( $item['tg_project_button_text'] ); ?></span>
                      <svg width="5" height="9" viewBox="0 0 5 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 0L5 4.5L0 9L0 0Z" fill="currentColor" />
                      </svg>
                    </div>
                  </div>
                </a>
              </div>
              <?php endwhile; wp_reset_postdata(); ?>
                <?php endforeach; ?>

                <?php if( !empty($settings['tg_btn_text']) ) : ?>
              <div class="cs_grid_item">
                <div class="cs_portfolio_btn_wrap text-center wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">
                  <a <?php echo $this->get_render_attribute_string( 'tg-button-arg' ); ?> 
                    href="/portfolio-details">
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
              </div>
             <?php endif; ?>
            </div>
          </div>
          <div class="cs_height_150 cs_height_lg_80"></div>
        </section>
        <!-- End Portfolio Section -->

        <?php endif; ?>

    <?php
	}
}

$widgets_manager->register( new TG_Portfolio() );