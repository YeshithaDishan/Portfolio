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
class TG_PORTFOLIO_DETAILS extends Widget_Base {

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
		return 'tg-portfolio-details';
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
		return __( 'Portfolio Details', 'tpcore' );
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
		return [ 'tpcore' ];
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


       // tg_services_01
        $this->start_controls_section(
            'tg_services_01',
            [
                'label' => esc_html__('Overview', 'tpcore'),
            ]
        );

        $this->add_control(
            'tg_services_title01',
            [
                'label' => esc_html__('Title', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Overview', 'tpcore'),
                'placeholder' => esc_html__('Type Title Text', 'tpcore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_image01',
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
                'name' => 'tg_image_size01',
                'default' => 'full',
                'exclude' => [
                    'custom'
                ]
            ]
        );

        $this->add_control(
            'tg_description01',
            [
                'label' => esc_html__('Description', 'tpcore'),
                'description' => tp_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.', 'tpcore'),
                'placeholder' => esc_html__('Type section description here', 'tpcore'),
            ]
        );



        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'info_sub', [
                'label' => esc_html__( 'Info Subject', 'tpcore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Category:' , 'tpcore' ),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'info_text', [
                'label' => esc_html__( 'Info Text', 'tpcore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Artwork' , 'tpcore' ),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'info_list',
            [
                'label' => esc_html__( 'Info Repeater', 'tpcore' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' =>  $repeater->get_controls(),
                'default' => [
                    [
                        'info_sub' => esc_html__( 'Stratagy', 'tpcore' ),
                        'info_text' => esc_html__( 'Company Branding, UX Strategy', 'tpcore' ),
                    ],
                    [
                        'info_sub' => esc_html__( 'Project Type', 'tpcore' ),
                        'info_text' => esc_html__( 'UI/UX Design, Motion Design', 'tpcore' ),
                    ],
                    [
                        'info_sub' => esc_html__( 'Client', 'tpcore' ),
                        'info_text' => esc_html__( 'Envato Elements, Development, Branding', 'tpcore' ),
                    ],

                ],
                'title_field' => '{{{ info_sub }}}',
            ]
        );

        $this->end_controls_section();


       // tg_services_02
        $this->start_controls_section(
            'tg_services_02',
            [
                'label' => esc_html__('Project Challenge', 'tpcore'),
            ]
        );

        $this->add_control(
            'tg_services_title02',
            [
                'label' => esc_html__('Title', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Project Challenge', 'tpcore'),
                'placeholder' => esc_html__('Type Title Text', 'tpcore'),
                'label_block' => true,
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

        $this->add_control(
            'tg_description02',
            [
                'label' => esc_html__('Description', 'tpcore'),
                'description' => tp_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.', 'tpcore'),
                'placeholder' => esc_html__('Type section description here', 'tpcore'),
            ]
        );


        $this->end_controls_section();



       // tg_services_03
        $this->start_controls_section(
            'tg_services_03',
            [
                'label' => esc_html__('Design Research', 'tpcore'),
            ]
        );

        $this->add_control(
            'tg_services_title03',
            [
                'label' => esc_html__('Title', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Design Research', 'tpcore'),
                'placeholder' => esc_html__('Type Title Text', 'tpcore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_image03',
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
                'name' => 'tg_image_size03',
                'default' => 'full',
                'exclude' => [
                    'custom'
                ]
            ]
        );

        $this->add_control(
            'tg_description03',
            [
                'label' => esc_html__('Description', 'tpcore'),
                'description' => tp_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.', 'tpcore'),
                'placeholder' => esc_html__('Type section description here', 'tpcore'),
            ]
        );

        $this->end_controls_section();


       // tg_services_04
        $this->start_controls_section(
            'tg_services_04',
            [
                'label' => esc_html__('Design Approach', 'tpcore'),
            ]
        );

        $this->add_control(
            'tg_services_title04',
            [
                'label' => esc_html__('Title', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Design Approach', 'tpcore'),
                'placeholder' => esc_html__('Type Title Text', 'tpcore'),
                'label_block' => true,
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

        $this->add_control(
            'tg_description04',
            [
                'label' => esc_html__('Description', 'tpcore'),
                'description' => tp_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.', 'tpcore'),
                'placeholder' => esc_html__('Type section description here', 'tpcore'),
            ]
        );


        $this->end_controls_section();


       // tg_services_05
        $this->start_controls_section(
            'tg_services_05',
            [
                'label' => esc_html__('The Solutions', 'tpcore'),
            ]
        );

        $this->add_control(
            'tg_services_title05',
            [
                'label' => esc_html__('Title', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('The Solutions', 'tpcore'),
                'placeholder' => esc_html__('Type Title Text', 'tpcore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_image05',
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
                'name' => 'tg_image_size05',
                'default' => 'full',
                'exclude' => [
                    'custom'
                ]
            ]
        );

        $this->add_control(
            'tg_description05',
            [
                'label' => esc_html__('Description', 'tpcore'),
                'description' => tp_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.', 'tpcore'),
                'placeholder' => esc_html__('Type section description here', 'tpcore'),
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
					'{{WRAPPER}} .cs-section_title' => 'text-transform: {{VALUE}};',
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

            if ( !empty($settings['tg_image01']['url']) ) {
                $tg_image01 = !empty($settings['tg_image01']['id']) ? wp_get_attachment_image_url( $settings['tg_image01']['id'], $settings['tg_image_size01_size']) : $settings['tg_image01']['url'];
                $tg_image_alt01 = get_post_meta($settings["tg_image01"]["id"], "_wp_attachment_image_alt", true);
            }

            if ( !empty($settings['tg_image02']['url']) ) {
                $tg_image02 = !empty($settings['tg_image02']['id']) ? wp_get_attachment_image_url( $settings['tg_image02']['id'], $settings['tg_image_size02_size']) : $settings['tg_image02']['url'];
                $tg_image_alt02 = get_post_meta($settings["tg_image02"]["id"], "_wp_attachment_image_alt", true);
            }


            if ( !empty($settings['tg_image03']['url']) ) {
                $tg_image03 = !empty($settings['tg_image03']['id']) ? wp_get_attachment_image_url( $settings['tg_image03']['id'], $settings['tg_image_size03_size']) : $settings['tg_image03']['url'];
                $tg_image_alt03 = get_post_meta($settings["tg_image03"]["id"], "_wp_attachment_image_alt", true);
            }

            if ( !empty($settings['tg_image04']['url']) ) {
                $tg_image04 = !empty($settings['tg_image04']['id']) ? wp_get_attachment_image_url( $settings['tg_image04']['id'], $settings['tg_image_size04_size']) : $settings['tg_image04']['url'];
                $tg_image_alt04 = get_post_meta($settings["tg_image04"]["id"], "_wp_attachment_image_alt", true);
            }


            if ( !empty($settings['tg_image05']['url']) ) {
                $tg_image05 = !empty($settings['tg_image05']['id']) ? wp_get_attachment_image_url( $settings['tg_image05']['id'], $settings['tg_image_size05_size']) : $settings['tg_image05']['url'];
                $tg_image_alt05 = get_post_meta($settings["tg_image05"]["id"], "_wp_attachment_image_alt", true);
            }            

	?>

    <!--Start Postfolio Details Section-->
    <section>
        <div class="row">
          <div class="col-lg-3">
            <div class="cs_category cs_style_2 cs_white_bg cs_radius_10">
              <div class="cs_social cs_style_1 d-flex align-items-center cs_gap_25">
                <div class="cs_social_title cs_font_20 cs_semi_bold"><?php print esc_html__( 'Share:', 'portm' );?></div>
                <div class="cs_social_wrap d-flex cs_gap_15">
                  <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>"><svg width="9" height="16" viewBox="0 0 9 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.00781 9L8.45219 6.10437H5.67375V4.22531C5.67375 3.43313 6.06188 2.66094 7.30625 2.66094H8.56937V0.195625C8.56937 0.195625 7.42313 0 6.32719 0C4.03906 0 2.54344 1.38688 2.54344 3.8975V6.10437H0V9H2.54344V16H5.67375V9H8.00781Z" fill="#1B74E4"/>
                    </svg>
                    </a>
                  <a href="https://twitter.com/home?status=<?php the_permalink() ?>"><svg width="19" height="15" viewBox="0 0 19 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18.4588 1.76471C17.7794 2.07353 17.0471 2.27647 16.2882 2.37353C17.0647 1.90588 17.6647 1.16471 17.9471 0.273529C17.2147 0.714706 16.4029 1.02353 15.5471 1.2C14.85 0.441177 13.8706 0 12.7588 0C10.6853 0 8.99118 1.69412 8.99118 3.78529C8.99118 4.08529 9.02647 4.37647 9.08823 4.65C5.94706 4.49118 3.15 2.98235 1.28824 0.697059C0.961765 1.25294 0.776471 1.90588 0.776471 2.59412C0.776471 3.90882 1.43824 5.07353 2.46176 5.73529C1.83529 5.73529 1.25294 5.55882 0.741177 5.29412C0.741177 5.29412 0.741177 5.29412 0.741177 5.32059C0.741177 7.15588 2.04706 8.69118 3.77647 9.03529C3.45882 9.12353 3.12353 9.16765 2.77941 9.16765C2.54118 9.16765 2.30294 9.14118 2.07353 9.09706C2.55 10.5882 3.93529 11.7 5.60294 11.7265C4.31471 12.75 2.68235 13.35 0.9 13.35C0.6 13.35 0.3 13.3324 0 13.2971C1.67647 14.3735 3.67059 15 5.80588 15C12.7588 15 16.5794 9.22941 16.5794 4.22647C16.5794 4.05882 16.5794 3.9 16.5706 3.73235C17.3118 3.20294 17.9471 2.53235 18.4588 1.76471Z" fill="#1D9BF0"/>
                    </svg>                    
                    </a>
                  <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink() ?>"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3.58151 16H0.264292V5.31762H3.58151V16ZM1.92111 3.86044C0.860376 3.86044 0 2.98185 0 1.92111C7.59231e-09 1.4116 0.202402 0.92296 0.562681 0.562681C0.92296 0.202403 1.4116 0 1.92111 0C2.43062 0 2.91927 0.202403 3.27955 0.562681C3.63982 0.92296 3.84223 1.4116 3.84223 1.92111C3.84223 2.98185 2.98149 3.86044 1.92111 3.86044ZM15.9968 16H12.6867V10.7999C12.6867 9.56057 12.6617 7.97125 10.962 7.97125C9.23735 7.97125 8.97305 9.31771 8.97305 10.7106V16H5.65941V5.31762H8.84091V6.77479H8.88734C9.3302 5.93549 10.412 5.04976 12.026 5.04976C15.3832 5.04976 16.0004 7.26052 16.0004 10.132V16H15.9968Z" fill="#0A66C2"/>
                    </svg>                    
                    </a>
                </div>
              </div>
              <ul class="cs_mp_0">
                <?php if(!empty( $settings['tg_services_title01'] )) : ?>
                    <li class="active"><a href="#Overview"><?php echo tp_kses( $settings['tg_services_title01'] ) ?></a></li>
                <?php endif; ?>
                <?php if(!empty( $settings['tg_services_title02'] )) : ?>
                    <li><a href="#Project_Challenge"><?php echo tp_kses( $settings['tg_services_title02'] ) ?></a></li>
                <?php endif; ?>
                <?php if(!empty( $settings['tg_services_title03'] )) : ?>
                    <li><a href="#Design_Research"><?php echo tp_kses( $settings['tg_services_title03'] ) ?></a></li>
                <?php endif; ?>
                <?php if(!empty( $settings['tg_services_title04'] )) : ?>             
                    <li><a href="#Design_Approach"><?php echo tp_kses( $settings['tg_services_title04'] ) ?></a></li>
                <?php endif; ?>
                 <?php if(!empty( $settings['tg_services_title05'] )) : ?> 
                    <li><a href="#The_Solutions"><?php echo tp_kses( $settings['tg_services_title05'] ) ?></a></li>
                <?php endif; ?>
              </ul>
            </div>
            <div class="cs_height_lg_30"></div>
          </div>
          <div class="col-lg-9">
            <div class="cs_pl_70">
              <div class="cs_portfoli_details cs_style_1">
                <?php if(!empty( $settings['tg_services_title01'] )) : ?>
                <h2 id='Overview' class="cs_portfolio_title cs_font_48"><?php echo tp_kses( $settings['tg_services_title01'] ) ?></h2>
                <?php endif; ?>
                <?php if(!empty( $settings['tg_description01'] )) : ?>
                <p class="cs_portfolio_text"><?php echo tp_kses( $settings['tg_description01'] ) ?></p>
                <?php endif; ?>
                <div class="cs_portfolio_details_wrap row">
                <?php foreach ( $settings['info_list'] as $item ) : ?>
                    <?php if(!empty( $item['info_sub'] )) : ?>
                      <div class="col-md-4">
                        <h4 class="cs_font_20 m-0"><?php echo tp_kses( $item['info_sub'] ) ?></h4>
                        <?php if(!empty( $item['info_text'] )) : ?>
                        <p class="m-0"><?php echo tp_kses( $item['info_text'] ) ?></p>
                        <?php endif; ?>
                      </div>
                      <?php endif; ?>
                <?php endforeach; ?>
                </div>
                <?php if( !empty($settings['tg_image01']['url']) ) : ?>
                <img class="cs_protfolio_image w-100 cs_radius_10" src="<?php echo esc_url( $tg_image01 ); ?>" alt="<?php echo esc_url( $tg_image_alt01 ); ?>">
                <?php endif; ?>

                <?php if(!empty( $settings['tg_services_title02'] )) : ?>
                <h4 id='Project_Challenge' class="cs_portfolio_title"><?php echo tp_kses( $settings['tg_services_title02'] ) ?></h4>
                <?php endif; ?>

                <?php if( !empty($settings['tg_image02']['url']) ) : ?>
                <img class="cs_protfolio_image w-100 cs_radius_10" src="<?php echo esc_url( $tg_image02 ); ?>" alt="<?php echo esc_url( $tg_image_alt02 ); ?>">
                <?php endif; ?>

                <?php if(!empty( $settings['tg_description02'] )) : ?>
                <p class="cs_portfolio_text"><?php echo tp_kses( $settings['tg_description02'] ) ?></p>
                <?php endif; ?>

                <?php if(!empty( $settings['tg_services_title03'] )) : ?>
                <h4 id='Design_Research' class="cs_portfolio_title"><?php echo tp_kses( $settings['tg_services_title03'] ) ?></h4>
                <?php endif; ?>

                <?php if( !empty($settings['tg_image03']['url']) ) : ?>
                <img class="cs_protfolio_image w-100 cs_radius_10" src="<?php echo esc_url( $tg_image03 ); ?>" alt="<?php echo esc_url( $tg_image_alt03 ); ?>">
                <?php endif; ?>

                <?php if(!empty( $settings['tg_description03'] )) : ?>
                <p class="cs_portfolio_text"><?php echo tp_kses( $settings['tg_description03'] ) ?></p>
                <?php endif; ?>

                <?php if(!empty( $settings['tg_services_title04'] )) : ?>
                <h4 id='Design_Approach' class="cs_portfolio_title"><?php echo tp_kses( $settings['tg_services_title04'] ) ?></h4>
                <?php endif; ?>

                <?php if( !empty($settings['tg_image04']['url']) ) : ?>
                <img class="cs_protfolio_image w-100 cs_radius_10" src="<?php echo esc_url( $tg_image04 ); ?>" alt="<?php echo esc_url( $tg_image_alt04 ); ?>">
                <?php endif; ?>

                <?php if(!empty( $settings['tg_description04'] )) : ?>
                <p class="cs_portfolio_text"><?php echo tp_kses( $settings['tg_description04'] ) ?></p>
                <?php endif; ?>

                <?php if(!empty( $settings['tg_services_title05'] )) : ?>
                <h4 id='The_Solutions' class="cs_portfolio_title"><?php echo tp_kses( $settings['tg_services_title05'] ) ?></h4>
                <?php endif; ?>

                <?php if( !empty($settings['tg_image05']['url']) ) : ?>
                <img class="cs_protfolio_image w-100 cs_radius_10" src="<?php echo esc_url( $tg_image05 ); ?>" alt="<?php echo esc_url( $tg_image_alt05 ); ?>">
                <?php endif; ?>
                
                <?php if(!empty( $settings['tg_description05'] )) : ?>
                <p class="cs_portfolio_text"><?php echo tp_kses( $settings['tg_description05'] ) ?></p>
                <?php endif; ?>

              </div>
            </div>
          </div>
        </div>
      <div class="cs_height_145 cs_height_lg_75"></div>
    </section>
    <!--End Postfolio Details Section-->


    <?php
	}
}

$widgets_manager->register( new TG_PORTFOLIO_DETAILS() );