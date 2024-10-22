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
class TG_Services extends Widget_Base {

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
        return 'services';
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
        return __( 'Services', 'tpcore' );
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
                'default' => esc_html__('Services', 'tpcore'),
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
                'default' => tp_kses('How can <b>I help you</b>', 'tpcore'),
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
                'default' => esc_html__('We help you to create innovations and we transform ideas into reality. The innovation is often identified with new technology. Most of the innovative projects however is not based on revolutionary technological solutions. The innovation is often about changing the meaning of what a product or a service is and what it offers its users. This is the core of design.', 'tpcore'),
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


        // _tg_about2_section
        $this->start_controls_section(
            '_tg_service1_section',
            [
                'label' => esc_html__('Service List', 'tpcore'),                
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
            'tg_about_designation_title',
            [
                'label' => esc_html__('Designation Title', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Web UI/UX Design', 'tpcore'),
                'placeholder' => esc_html__('Type Designation Title', 'tpcore'),
                'label_block' => true,
            ]
        );

         $repeater->add_control(
            'tg_about_designation_text',
            [
                'label' => esc_html__('Service Content', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo
                  ligula eget dolor.', 'tpcore'),
                'placeholder' => esc_html__('Type Service Content', 'tpcore'),
                'label_block' => true,
            ]
        );       

         $repeater->add_control(
            'tg_about_project_text',
            [
                'label' => esc_html__('Project Content', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('21 Projects', 'tpcore'),
                'placeholder' => esc_html__('Type Project Content', 'tpcore'),
                'label_block' => true,
            ]
        );

          $repeater->add_control(
            'tg_about_button_text',
            [
                'label' => esc_html__('Button Text', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Explore', 'tpcore'),
                'placeholder' => esc_html__('Type Button Text', 'tpcore'),
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
            'tg_about_progressbar_number',
            [
                'label' => esc_html__('Progressbar Number', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('85', 'tpcore'),
                'placeholder' => esc_html__('Type Progressbar Number', 'tpcore'),
                'label_block' => true,
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
                        'tg_about_designation_title' => esc_html__('Web UI/UX Design', 'tpcore'),
                    ],
                    [
                        'tg_about_designation_title' => esc_html__('Mobile UI/UX Design', 'tpcore'),
                    ],
                    [
                        'tg_about_designation_title' => esc_html__('Branding Design', 'tpcore'),
                    ],                   
                ],
                'title_field' => '{{{ tg_about_designation_title }}}',
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

        if ( !empty($settings['tg_image04']['url']) ) {
            $tg_image04 = !empty($settings['tg_image04']['id']) ? wp_get_attachment_image_url( $settings['tg_image04']['id'], $settings['tg_image_size04_size']) : $settings['tg_image04']['url'];
            $tg_image_alt04 = get_post_meta($settings["tg_image04"]["id"], "_wp_attachment_image_alt", true);
        }   
            $this->add_render_attribute('title_args', 'class', 'cs_section_title cs_font_48 cs_semi_bold common-heading-title-style');
        ?>

    <!-- Start Service Section -->
    <section class="cs_100_bg position-relative" data-src="<?php echo esc_url( $tg_image04 ); ?>">
      <div class="cs_service_shape_1 position-absolute">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/service_shape_1.svg" alt="">
      </div>
      <div class="cs_height_145 cs_height_lg_75"></div>
      <div class="container">
        <?php if(!empty( $settings['tg_section_title_show'] )) : ?>
        <div class="cs_section_heading cs_style_1">
           <?php if (!empty($settings['tg_sub_title'])) : ?> 
          <p class="cs_section_subtitle cs_accent_color_2 cs_font_16 wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="0.2s">
            <span><?php echo esc_html( $settings['tg_sub_title'] ); ?></span>
            <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd"
                d="M8.3165 0.722028C7.59665 0.85855 7.46009 1.00749 7.3608 1.6529C7.28633 2.17419 7.27388 2.1866 7.01329 2.02525C5.33769 0.933026 1.46525 3.71325 2.66918 5.14059C3.30217 5.88533 3.48833 6.25767 3.57521 6.38178C1.5521 6.69201 0.96875 6.64236 0.96875 8.90136C0.96875 10.7755 1.46522 10.6762 3.82344 10.8376C3.61244 11.1355 2.7809 12.4387 2.30925 12.9848C1.8252 13.5433 1.84999 13.6674 2.59469 14.4494C4.76674 16.7455 5.90861 17.1179 7.05048 15.9015C7.5221 15.4051 7.6463 15.492 7.65866 16.3856C7.68349 17.4778 8.94951 17.7881 12.1889 17.4654C14.2245 17.2668 14.0382 17.031 13.8769 15.8643L15.1802 16.4104C16.5082 16.9689 17.0171 16.5966 19.636 13.1337C19.7973 12.9227 19.3133 12.5008 18.9161 12.5008C18.7671 12.5008 18.3699 12.2525 18.0348 11.9546L17.4142 11.4085C17.8487 11.3589 18.5685 11.2596 19.1519 11.1603C19.4497 11.1106 19.6608 10.8624 19.6856 10.5645C19.8097 8.78962 19.8594 8.0325 19.8594 8.04495C19.8718 7.84638 19.7725 7.64771 19.6111 7.53605C19.4249 7.41194 19.1147 7.25055 18.5686 7.1389C17.6997 6.96514 17.6873 7.05198 18.6678 6.00944C19.7228 4.86753 19.7477 4.942 17.8735 3.01819C16.26 1.35502 14.9692 0.833728 14.1748 1.49155L13.7901 1.81425L13.7155 1.50396C13.5294 0.759261 10.4513 0.312435 8.3165 0.722028ZM11.7918 3.30365C11.9034 5.94734 12.3627 6.17074 13.9266 4.35865C15.5526 2.48449 15.3044 2.55895 16.409 3.61395C17.5881 4.731 17.6253 4.55724 15.9993 6.08391C14.1624 7.79673 14.2866 8.15661 16.6199 7.90839C18.3327 7.72218 18.1465 8.10696 17.9728 10.2542C14.8698 10.4528 13.8273 10.4528 15.4656 11.6195C16.744 12.538 17.3149 13.084 17.166 13.2826C17.0915 13.3695 15.5898 15.2313 15.5898 15.2313C15.3912 15.0824 15.0933 14.9583 14.0755 13.9777C12.5861 12.5628 12.0897 12.7738 12.1393 14.8465L12.1766 16.3236C9.64453 16.6711 9.73145 16.8324 9.59489 14.5238C9.54524 13.6799 9.65699 12.1656 7.94417 12.8358C7.17459 13.1337 6.20649 13.9156 5.80931 14.6479C5.63555 14.9706 5.51145 14.921 4.70469 14.3004C3.81104 13.6178 3.78622 13.8163 4.89086 12.5131C5.25079 12.0912 5.61075 11.6071 5.83416 11.2719C6.70298 9.93153 5.39977 9.64603 3.81108 9.64603H3.09116C3.09116 9.64603 3.10358 8.2559 3.21528 7.63534C3.3394 7.63534 4.13374 7.64771 4.89086 7.66017C6.92637 7.68499 6.98845 7.63534 6.08239 6.64236C5.22599 5.71149 4.7419 5.09094 4.44403 4.74341C4.61779 4.58206 3.83589 5.33917 6.09482 3.1423C6.23134 3.29124 6.93879 4.03594 7.62148 4.85511C8.4778 5.88524 9.48323 5.50053 9.48323 4.80547V4.06077C9.4956 1.40467 9.38385 1.59084 10.9106 1.62807L11.7173 1.64049L11.7918 3.30365Z"
                fill="#342EAD" />
            </svg>
          </p>
          <?php endif; ?>
             <?php
                if ( !empty($settings['tg_title']) ) :
                    printf( '<%1$s %2$s>%3$s</%1$s>',
                        tag_escape( $settings['tg_title_tag'] ),
                        $this->get_render_attribute_string( 'title_args' ),
                        tp_kses( $settings['tg_title' ] )
                    );
                endif;
            ?>
        </div>
        <?php endif; ?>
        <div class="cs_height_72 cs_height_lg_62"></div>
        <div class="row cs_gap_40 justify-content-md-center">
        <?php foreach ($settings['tg_about2_list'] as $item) :
            if ( !empty($item['reviewer_image']['url']) ) {
                $tg_reviewer_image = !empty($item['reviewer_image']['id']) ? wp_get_attachment_image_url( $item['reviewer_image']['id'], $item['reviewer_image_size_size']) : $item['reviewer_image']['url'];
                $tg_reviewer_image_alt = get_post_meta($item["reviewer_image"]["id"], "_wp_attachment_image_alt", true);
            }
         ?>
          <div class="col-lg-4 col-md-6 home-service-area">
            <div class="cs_iconbox cs_style_1 cs_transform_up_hover_5 cs_transition_4">
              <div class="cs_iconbox_in">
                <div class="cs_iconbox_icon cs_center rounded-circle cs_white_bg">
                    <img src="<?php echo esc_url($tg_reviewer_image); ?>" alt="<?php echo esc_url($tg_reviewer_image_alt); ?>">
                </div>
                <?php if( !empty($item['tg_about_project_text']) ) : ?>
                <p class="cs_iconbox_mini_title cs_ternary_color text-uppercase cs_font_15"><?php echo esc_html( $item['tg_about_project_text'] ); ?></p>
                <?php endif; ?>
                <?php if( !empty($item['tg_about_designation_title']) ) : ?>
                <h3 class="cs_iconbox_title cs_font_28 cs_medium"><?php echo esc_html( $item['tg_about_designation_title'] ); ?></h3>
                <?php endif; ?>
                <?php if( !empty($item['tg_about_designation_text']) ) : ?>
                <p class="cs_iconbox_subtitle"><?php echo tp_kses( $item['tg_about_designation_text'] ); ?></p>
                <?php endif; ?>
                <?php if( !empty($item['tg_about_project_url']) ) : ?>
                <a href="<?php echo esc_url( $item['tg_about_project_url'] ); ?>" class="cs_iconbox_btn cs_primary_color_hover cs_center_between">
                  <span class="cs_iconbox_btn_text position-relative d-inline-block cs_font_16"><?php echo esc_html( $item['tg_about_button_text'] ); ?></span>
                  <span class="cs_circle_btn cs_style_1 cs_accent_color cs_center rounded-circle">
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
                  </span>
                </a>
                <?php endif; ?>
              </div>
             <?php if( !empty($item['tg_about_progressbar_number']) ) : ?>
              <div class="cs_progressbar cs_style_1 text-center">
                <h3 class="cs_progressbar_head cs_accent_color cs_normal cs_font_14"><?php echo esc_html( $item['tg_about_progressbar_number'] ); ?>%</h3>
                <div class="cs_progress" data-progress="<?php echo esc_html( $item['tg_about_progressbar_number'] ); ?>">
                  <div class="cs_progress_in"></div>
                </div>
              </div>
             <?php endif; ?>
            </div>
          </div>
        <?php endforeach; ?>

        </div>
      </div>
      <div class="cs_height_150 cs_height_lg_20"></div>
    </section>
    <!-- End Service Section -->



        <!-- Start Feature -->
        <section class='d-none'>
          <div class="cs-height_140 cs-height_lg_80"></div>
          <div class="container">
            <div class="row">
              <div
                class="col-lg-6 wow fadeIn"
                data-wow-duration="1s"
                data-wow-delay="0.2s"
              >
                <div class="row">
                  <div class="col-sm-6">
                    <a
                      href="<?php echo esc_url( $settings['tg_services_url04'] ) ?>"
                      class="cs-icon_box cs-style1 cs-hobble"
                    >
                      <div class="cs-icon_box_in cs-hover_layer4">
                        <div class="cs-icon_box_bg cs-accent_bg_2"></div>
                        <div class="cs-hover_layer3">
                          <div class="cs-icon_box_icon cs-center cs-hover_layer3">
                            <?php if ( !empty( $tg_image04 ) ) : ?>
                            <img src="<?php echo esc_url( $tg_image04 ); ?>" alt="<?php echo esc_url( $tg_image_alt04 ); ?>">
                            <?php endif; ?>
                            <div class="cs-icon_box_icon_bg cs-accent_bg_2"></div>
                          </div>
                          <h2 class="cs-icon_box_title cs-bold"><?php echo esc_html( $settings['tg_services_title04'] ) ?></h2>
                          <div class="cs-icon_box_subtitle">
                            <?php echo tp_kses( $settings['tg_description04'] ); ?>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
              <?php if(!empty( $settings['tg_section_title_show'] )) : ?>
              <!-- .col -->
              <div
                class="col-lg-5 offset-lg-1 wow fadeIn"
                data-wow-duration="1s"
                data-wow-delay="0.3s"
              >
                <div class="cs-vertical_middle">
                  <div class="cs-vertical_middle_in">
                    <div class="cs-height_0 cs-height_lg_50"></div>
                    <div class="cs-text_box cs-style1">
                    <?php if (!empty($settings['tg_sub_title'])) : ?>
                      <div class="cs-text_box_subtitle"><?php echo esc_html( $settings['tg_sub_title'] ); ?></div>
                     <?php endif; ?>
                     <?php
                        if ( !empty($settings['tg_title']) ) :
                            printf( '<%1$s %2$s>%3$s</%1$s>',
                                tag_escape( $settings['tg_title_tag'] ),
                                $this->get_render_attribute_string( 'title_args' ),
                                tp_kses( $settings['tg_title' ] )
                            );
                        endif;
                    ?>            
                      <div class="cs-height_25 cs-height_lg_15"></div>
                      <?php if (!empty($settings['tg_description'])) : ?>
                      <div class="cs-text_box_text">
                        <?php echo tp_kses( $settings['tg_description'] ); ?>
                      </div>
                     <?php endif; ?>
                      <div class="cs-height_35 cs-height_lg_35"></div>
                      <div class="cs-text_box_btn">
                        <a <?php echo $this->get_render_attribute_string( 'tg-button-arg' ); ?>
                          ><?php echo $settings['tg_btn_text']; ?></a
                        >
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- .col -->
              <?php endif; ?>
            </div>
          </div>
          <div class="cs-height_140 cs-height_lg_80"></div>
        </section>
        <!-- End Feature -->
 

    <?php
    }
}

$widgets_manager->register( new TG_Services() );