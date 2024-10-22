<?php
namespace TPCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Repeater;
use \Elementor\Utils;

use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Typography;
Use \Elementor\Core\Schemes\Typography;
use \Elementor\Group_Control_Background;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Multim Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class TG_Fact extends Widget_Base {

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
		return 'tp-fact';
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
		return __( 'Fact', 'tpcore' );
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

        // _tg_image
        $this->start_controls_section(
            '_tg_bg_section',
            [
                'label' => esc_html__('Section Background', 'tpcore'),
            ]
        );

        $this->add_control(
            'tg_bg',
            [
                'label' => esc_html__( 'Choose Background Image', 'tpcore' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'tg_bg_size',
                'default' => 'full',
                'exclude' => [
                    'custom'
                ]
            ]
        );

        $this->end_controls_section();

        // Fact group
        $this->start_controls_section(
            'tg_fact',
            [
                'label' => esc_html__('Fact List', 'tpcore'),
                'description' => esc_html__( 'Control all the style settings from Style tab', 'tpcore' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'tg_title',
            [
                'label' => esc_html__('Title', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => tp_kses('Our fun fact', 'tpcore'),
                'placeholder' => esc_html__('Type Heading Text', 'tpcore'),
                'label_block' => true
            ]
        );

        $this->add_control(
            'tg_description',
            [
                'label' => esc_html__('Description', 'tpcore'),
                'description' => tp_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Sed ut perspiciatis unde omnis iste natus error voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis.', 'tpcore'),
                'placeholder' => esc_html__('Type section description here', 'tpcore'),
                'condition' => [
                    'tg_design_style' => 'layout-1',
                ]
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'image',
            [
                'type' => Controls_Manager::MEDIA,
                'label' => __( 'Team Image', 'tpcore' ),
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'tg_fact_number', [
                'label' => esc_html__('Number', 'tpcore'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('280', 'tpcore'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'tg_fact_plus',
            [
                'label' => esc_html__('Fact Plus', 'tpcore'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('+', 'tpcore'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'tg_fact_desc',
            [
                'label' => esc_html__('Fact Description', 'tpcore'),
                'description' => tp_get_allowed_html_desc( 'intermediate' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Global Happy Clients', 'tpcore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_fact_list',
            [
                'label' => esc_html__('Fact Lists', 'tpcore'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'tg_fact_number' => esc_html__('10', 'tpcore'),
                        'tg_fact_desc' => esc_html__('Years Of Experience', 'tpcore'),
                    ],
                    [
                        'tg_fact_number' => esc_html__('910', 'tpcore'),
                        'tg_fact_desc' => esc_html__('Happy Clients', 'tpcore'),
                    ],
                    [
                        'tg_fact_number' => esc_html__('1200', 'tpcore'),
                        'tg_fact_desc' => esc_html__('Projects Done Successfully', 'tpcore'),
                    ],                    
                ],
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

            if ( !empty($settings['tg_bg']['url']) ) {
                $tg_bg_url = !empty($settings['tg_bg']['id']) ? wp_get_attachment_image_url( $settings['tg_bg']['id'], $settings['tg_bg_size_size']) : $settings['tg_bg']['url'];
                $tg_bg_alt = get_post_meta($settings["tg_bg"]["id"], "_wp_attachment_image_alt", true);
            }

		?>

        <!-- Start Funfact Section -->
        <section class="cs_funfact_2_wrap">
          <div class="cs_funfact_bg cs_filled_bg" data-src="<?php echo esc_url($tg_bg_url); ?>"></div>
          <div class="container">
            <div class="row cs_gap_40">

                <?php foreach( $settings['tg_fact_list'] as $item ) : 

                if ( !empty($item['image']['url']) ) {
                    $tp_counter_image_url = !empty($item['image']['id']) ? wp_get_attachment_image_url( $item['image']['id'], $settings['thumbnail_size']) : $item['image']['url'];
                    $tp_counter_image_alt = get_post_meta($item["image"]["id"], "_wp_attachment_image_alt", true);
                }
                ?>
              <div class="col-lg-4 cs_mt_40">
                <div class="cs_funfact cs_style_2 text-center">
                  <div class="cs_funfact_in cs_filled_bg" data-src="<?php echo esc_url($tp_counter_image_url); ?>">
                    <h3 class="cs_funfact_number cs_font_48 cs_semi_bold cs_center m-0 overflow-hidden">
                      <span>
                        <span class="odometer" data-count-to="<?php echo tp_kses( $item['tg_fact_number'] ); ?>"></span><?php echo tp_kses( $item['tg_fact_plus'] ) ?>
                      </span>
                    </h3>
                    <div class=" cs_funfact_text cs_font_24 cs_center m-0"><span><?php echo tp_kses( $item['tg_fact_desc'] ); ?></span></div>
                  </div>
                  <div class="cs_overlay">
                    <svg xmlns="http://www.w3.org/2000/svg" width="355" height="165" viewBox="0 0 355 165" fill="none">
                      <g filter="url(#filter_03)">
                        <path d="M24 16.221L308.426 16L311 113L27.5399 111.377L24 16.221Z"
                          fill="url(#paint0_01)" fill-opacity="0.01" shape-rendering="crispEdges" />
                      </g>
                      <defs>
                        <filter id="filter_03" x="0" y="0" width="355" height="165" filterUnits="userSpaceOnUse"
                          color-interpolation-filters="sRGB">
                          <feFlood flood-opacity="0" result="BackgroundImageFix" />
                          <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                            result="hardAlpha" />
                          <feOffset dx="10" dy="18" />
                          <feGaussianBlur stdDeviation="17" />
                          <feComposite in2="hardAlpha" operator="out" />
                          <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.5 0" />
                          <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_260_814" />
                          <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_260_814" result="shape" />
                        </filter>
                        <linearGradient id="paint0_01" x1="-5.2411" y1="15.7916" x2="285.862" y2="-28.9565"
                          gradientUnits="userSpaceOnUse">
                          <stop stop-color="white" offset="1" />
                          <stop offset="0.121176" stop-color="#E3DFFF" />
                          <stop offset="1" stop-color="#CFDFF9" />
                        </linearGradient>
                      </defs>
                    </svg>
                  </div>
                </div>
              </div>
             <?php endforeach; ?>

            </div>
          </div>
        </section>
        <!-- Start Funfact Section -->


    <?php
	}
}

$widgets_manager->register( new TG_Fact() );