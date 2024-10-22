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
 * Portm Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class TG_Education_Skills extends Widget_Base {

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
		return 'education-skills';
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
		return __( 'Education Skills', 'tpcore' );
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


        // Background Image
        $this->start_controls_section(
            'tg_section_bg',
            [
                'label' => esc_html__('Background Image', 'tpcore'),
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

        // tg_section_title
        $this->start_controls_section(
            'tg_section_title',
            [
                'label' => esc_html__('Title & Content', 'tpcore'),
            ]
        );

        $this->add_control(
            'tg_title',
            [
                'label' => esc_html__('Title', 'tpcore'),
                'description' => tp_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => tp_kses('I am great in what I do<br> and <b>I am loving it</b>', 'tpcore'),
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
            'tg_align',
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
                'default' => esc_html__('Hire Me', 'tpcore'),
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


       // _tg_education_section
        $this->start_controls_section(
            '_tg_education_section',
            [
                'label' => esc_html__('Education Detail', 'tpcore'),                
            ]
        );

        $this->add_control(
            'tg_education_title',
            [
                'label' => esc_html__('Education Title', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Education', 'tpcore'),
                'placeholder' => esc_html__('Type Education Title', 'tpcore'),
                'label_block' => true,
            ]
        );


        $repeater2 = new \Elementor\Repeater();

        $repeater2->add_control(
            'tg_institute_name',
            [
                'label' => esc_html__('Institute Name', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Harvard University', 'tpcore'),
                'placeholder' => esc_html__('Type Institute Name', 'tpcore'),
                'label_block' => true,
            ]
        );

         $repeater2->add_control(
            'tg_passing_year_degree',
            [
                'label' => esc_html__('Passing Year and Degree', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('MBA in CSE (2015 - 2016)', 'tpcore'),
                'placeholder' => esc_html__('Type Passing Year and Degree Content', 'tpcore'),
                'label_block' => true,
            ]
        );       

        $this->add_control(
            'tg_education_list',
            [
                'label' => esc_html__('About Detail List', 'tpcore'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater2->get_controls(),
                'default' => [
                    [
                        'tg_institute_name' => esc_html__('Harvard University', 'tpcore'),
                        'tg_passing_year_degree' => esc_html__('MBA in CSE (2015 - 2016)', 'tpcore'),
                    ],
                    [
                        'tg_institute_name' => esc_html__('Harvard University', 'tpcore'),
                        'tg_passing_year_degree' => esc_html__('B.Sc in CSE(2010 - 2014)', 'tpcore'),
                    ],
                    [
                        'tg_institute_name' => esc_html__('Harvard University', 'tpcore'),
                        'tg_passing_year_degree' => esc_html__('Secondary School (2002 - 2009)', 'tpcore'),
                    ],                   
                ],
                'title_field' => '{{{ tg_institute_name }}}',
            ]
        );

        $this->end_controls_section();       


       // tp_section_skill
        $this->start_controls_section(
            'tp_section_skill',
            [
                'label' => esc_html__('Skill', 'tpcore'),                
            ]
        );

        $this->add_control(
            'tg_skill_title',
            [
                'label' => esc_html__('Skill Title', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Slills', 'tpcore'),
                'placeholder' => esc_html__('Type Title Text', 'tpcore'),
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
                        'name' => 'Communication',
                        'level' => ['size' => 95, 'unit' => '%']
                    ],
                    [
                        'name' => 'Problem Solving',
                        'level' => ['size' => 70, 'unit' => '%']
                    ],
                     [
                        'name' => 'Web Application',
                        'level' => ['size' => 90, 'unit' => '%']
                    ],
                    [
                        'name' => 'Algorithm & Data Structure',
                        'level' => ['size' => 75, 'unit' => '%']
                    ],                                       
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

        $this->add_render_attribute('title_args', 'class', 'cs_section_title cs_font_48 cs_semi_bold wow fadeInUp common-heading-title-style');
        $this->add_render_attribute('title_args', 'data-wow-duration', '0.8s');
        $this->add_render_attribute('title_args', 'data-wow-delay', '0.2s');

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


        if ( !empty($settings['tg_image04']['url']) ) {
            $tg_image04 = !empty($settings['tg_image04']['id']) ? wp_get_attachment_image_url( $settings['tg_image04']['id'], $settings['tg_image_size04_size']) : $settings['tg_image04']['url'];
            $tg_image_alt04 = get_post_meta($settings["tg_image04"]["id"], "_wp_attachment_image_alt", true);
        }      

	?>


        <!-- Start Slill and Education Section -->
        <section class="cs_100_bg position-relative" data-src="<?php echo esc_url( $tg_image04 ); ?>">
          <div class="cs_slill_shape_1 position-absolute">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/skills_shape_1.svg" alt="skill and education ">
          </div>
          <div class="cs_height_140 cs_height_lg_80"></div>
          <div class="container">
            <div>
              <div class="d-lg-flex justify-content-between">
                <div class="cs_section_heading cs_style_1">
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
                <?php if ( !empty($settings['tg_btn_text']) ) : ?>
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
              <div class="cs_height_70 cs_height_lg_40"></div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="cs_education_wrap">
                <?php if ( !empty($settings['tg_education_title']) ) : ?>
                  <h3 class="cs_font_36 mb-0"><?php echo esc_html( $settings['tg_education_title'] ); ?></h3>
                  <?php endif; ?>
                  <div class="cs_height_25 cs_height_lg_15"></div>

                    <?php foreach ($settings['tg_education_list'] as $item) :
                     ?>
                  <div class="cs_iconbox cs_style_3 cs_type_1 d-flex align-items-center">
                    <div class="cs_iconbox_icon cs_accent_color cs_filled_bg cs_center"
                      data-src="<?php echo get_template_directory_uri(); ?>/assets/img/bg/iconbox_bg_3.svg">
                      <svg width="37" height="32" viewBox="0 0 37 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                          d="M25.7148 26.5142C26.5064 26.1679 27.2705 25.762 28.0006 25.2999V30.8571C28.0006 31.1602 27.8802 31.4509 27.6659 31.6653C27.4515 31.8796 27.1608 32 26.8577 32C26.5546 32 26.2639 31.8796 26.0496 31.6653C25.8353 31.4509 25.7148 31.1602 25.7148 30.8571V26.5142ZM17.2719 9.74253C17.1334 10.0126 17.1052 10.3258 17.1932 10.6163C17.2811 10.9068 17.4783 11.1518 17.7433 11.2997L24.4291 14.8569L26.8577 13.5569L18.829 9.2711C18.559 9.13267 18.2457 9.10445 17.9553 9.19239C17.6648 9.28033 17.4198 9.47755 17.2719 9.74253ZM35.9721 9.2711L18.829 0.128104C18.6605 0.0438581 18.4746 0 18.2862 0C18.0977 0 17.9119 0.0438581 17.7433 0.128104L0.600192 9.2711C0.418457 9.37089 0.266872 9.51768 0.161288 9.69611C0.0557045 9.87454 0 10.0781 0 10.2854C0 10.4927 0.0557045 10.6962 0.161288 10.8747C0.266872 11.0531 0.418457 11.1999 0.600192 11.2997L4.00024 13.0997V20.2141C3.99809 20.7046 4.15889 21.182 4.45739 21.5713C5.58598 23.0856 9.9289 27.9999 18.2862 27.9999C20.8397 28.0212 23.3697 27.5104 25.7148 26.4999V15.5426L24.4291 14.8569L18.2862 18.1284L5.68598 11.414L3.57166 10.2854L18.2862 2.44242L33.0007 10.2854L30.8863 11.414L26.8577 13.5569L27.4006 13.8426C27.5938 13.9542 27.7521 14.1174 27.8577 14.314C27.9527 14.4791 28.0021 14.6665 28.0006 14.8569V25.2999C29.5792 24.3068 30.9717 23.0448 32.1149 21.5713C32.4134 21.182 32.5742 20.7046 32.5721 20.2141V13.0997L35.9721 11.2997C36.1539 11.1999 36.3055 11.0531 36.411 10.8747C36.5166 10.6962 36.5723 10.4927 36.5723 10.2854C36.5723 10.0781 36.5166 9.87454 36.411 9.69611C36.3055 9.51768 36.1539 9.37089 35.9721 9.2711Z"
                          fill="currentColor" />
                      </svg>
                    </div>
                    <?php if( !empty($item['tg_institute_name']) ) : ?>
                    <div class="cs_iconbox_info">
                      <p class="cs_iconbox_text mb-0"><?php echo esc_html( $item['tg_institute_name'] ); ?></p>
                      <h3 class="cs_iconbox_title cs_font_24 cs_semi_bold mb-0"><?php echo esc_html( $item['tg_passing_year_degree'] ); ?></h3>
                    </div>
                    <?php endif; ?>
                  </div>
                <?php endforeach; ?>

                </div>
                <div class="cs_height_lg_40"></div>
              </div>
              <div class="col-lg-6">
                <div class="cs_slill_wrap cs_pl_70">
                <?php if ( !empty($settings['tg_skill_title']) ) : ?>
                  <h3 class="cs_font_36 mb-0"><?php echo esc_html( $settings['tg_skill_title'] ); ?></h3>
                <?php endif; ?>
                  <div class="cs_height_25 cs_height_lg_15"></div>
                    <?php foreach ( $settings['skills'] as $index => $skill ) : ?>   
                      <div class="cs_progressbar cs_style_2">
                        <div class="label cs_font_20 cs_semi_bold"><?php echo esc_html( $skill['name'] ); ?></div>
                        <h3 class="cs_progressbar_head cs_ternary_color cs_normal cs_font_14 text-end"><?php echo esc_attr( $skill['level']['size'] ); ?>%</h3>
                        <div class="cs_progress" data-progress="<?php echo esc_attr( $skill['level']['size'] ); ?>">
                          <div class="cs_progress_in"></div>
                        </div>
                      </div>
                    <?php endforeach; ?>
                </div>
              </div>
            </div>
          </div>
          <div class="cs_height_150 cs_height_lg_80"></div>
        </section>
        <!-- End Slill and Education Section -->



    <?php
	}
}

$widgets_manager->register( new TG_Education_Skills() );