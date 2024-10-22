<?php
namespace TPCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Multim Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class TP_FAQ extends Widget_Base {

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
		return 'tp-faq';
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
		return __( 'FAQ', 'tpcore' );
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


		// tp_section_title
        $this->start_controls_section(
            'tp_section_title',
            [
                'label' => esc_html__('Title & Content', 'tpcore'),
            ]
        );

        $this->add_control(
            'tp_section_title_show',
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
                'default' => esc_html__('FAQ’s', 'tpcore'),
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
                'default' => tp_kses('Frequently <b>asked question</b>', 'tpcore'),
                'placeholder' => esc_html__('Type Heading Text', 'tpcore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_description',
            [
                'label' => esc_html__('Description', 'tpcore'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => tp_kses('Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.', 'tpcore'),
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

        // Contact Form group
        $this->start_controls_section(
            '_TG_contact_form2',
            [
                'label' => esc_html__('Contact Form', 'tpcore'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
        'contact_shortCode',
            [
                'label' => __( 'Contact Short Code', 'tpcore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__('[Add your short code]', 'tpcore'),
                'label_block' => true,
                'default' => __('','tpcore'),
            ]
        );

        $this->end_controls_section();

        // Accordion
		$this->start_controls_section(
            '_accordion',
            [
                'label' => esc_html__( 'FAQ', 'tpcore' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'accordion_title', [
                'label' => esc_html__( 'FAQ Title', 'tpcore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Do you design illustration website?' , 'tpcore' ),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'accordion_description',
            [
                'label' => esc_html__('Description', 'tpcore'),
                'description' => tp_get_allowed_html_desc( 'intermediate' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesent voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui.', 'tpcore' ),
            ]
        );

        $this->add_control(
            'accordions',
            [
                'label' => esc_html__( 'Repeater FAQ', 'tpcore' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'accordion_title' => esc_html__( 'Are you available for freelance work?', 'tpcore' ),
                        'accordion_description' => esc_html__( 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. ', 'tpcore' ),
                    ],
                    [
                        'accordion_title' => esc_html__( 'Are you available for freelance work?', 'tpcore' ),
                         'accordion_description' => esc_html__( 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. ', 'tpcore' ),                       
                    ],
                    [
                        'accordion_title' => esc_html__( 'Are you available for freelance work?', 'tpcore' ),
                         'accordion_description' => esc_html__( 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. ', 'tpcore' ),                       
                    ],
                    [
                        'accordion_title' => esc_html__( 'Are you available for freelance work?', 'tpcore' ),
                         'accordion_description' => esc_html__( 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. ', 'tpcore' ),                       
                    ],
                    [
                        'accordion_title' => esc_html__( 'Are you available for freelance work?', 'tpcore' ),
                        'accordion_description' => esc_html__( 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. ', 'tpcore' ),                        
                    ],
                ],
                'title_field' => '{{{ accordion_title }}}',
            ]
        );

        $this->end_controls_section();

        // Style
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

    <section>
      <div class="cs_height_90 cs_height_lg_90"></div>
      <div class="cs_height_150 cs_height_lg_80"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 offset-lg-2">
            <?php if(!empty( $settings['tp_section_title_show'] )) : ?>
            <div class="cs_section_heading cs_style_1 text-center">
                <?php if (!empty($settings['tg_sub_title'])) : ?>
              <p class="cs_section_subtitle cs_center cs_accent_color_2 cs_font_16 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">
                <span><?php echo esc_html( $settings['tg_sub_title'] ); ?></span>
                <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M17.7546 7.74905C17.1131 8.09364 17.076 8.18291 17.2611 9.1908C17.878 12.5974 14.8553 18.2114 8.43958 16.6548C6.83568 16.2721 6.51483 16.2975 5.24406 17.012C3.93626 17.7393 3.94864 17.7393 4.12137 16.4889C4.33111 14.8941 4.30639 14.7027 3.76353 13.9499C1.12323 10.3392 2.0856 5.10801 5.82397 2.69659C10.7344 -0.480363 14.5961 1.01242 16.3481 4.66145C16.8416 5.69491 17.1871 5.86077 18.3098 5.63113C18.8157 5.52905 18.8157 5.2356 18.3098 4.38076C14.4482 -2.12626 4.72588 -0.799338 1.49338 4.53386C-0.357295 7.5832 -0.406626 11.6788 2.38172 14.9196C2.8629 15.4809 2.91224 16.0806 2.61613 17.6627C2.32002 19.2576 2.93693 19.3852 5.46618 18.2624L7.0454 17.5606L8.2175 17.8924C10.5863 18.5686 13.0539 18.2496 15.3857 16.9482C16.3605 16.4123 18.1001 14.3837 18.9391 11.2323C19.6423 8.54017 19.1365 7.02184 17.7546 7.74905Z" fill="#342EAD"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M8.99893 4.04285C7.53821 4.24926 6.15685 5.20191 6.02454 7.13897C5.92927 8.58382 5.93986 8.5944 7.3265 8.3139C8.49614 8.07573 8.43262 8.13925 8.43262 7.25011C8.43262 6.49328 8.64432 6.06459 9.22121 5.76821C10.502 5.11723 11.4229 6.832 11.4229 7.37184C11.4229 7.96461 10.9995 8.27685 9.66577 8.6632C8.57552 8.98075 8.22623 9.43063 8.18386 10.5579C8.17328 10.8914 8.13627 11.156 8.09921 11.1983C7.93515 11.3994 8.50672 11.5847 9.11536 11.5318C10.9413 11.3677 10.9148 11.3836 10.8142 10.6955C10.7508 10.2669 10.7931 10.2033 11.2271 10.071C12.275 9.75345 12.873 9.15013 13.1906 8.09162C14.0215 5.36069 12.1956 3.59828 8.99893 4.04285ZM10.7084 4.36041C11.8992 4.53506 13.0107 6.07518 12.8042 7.27658C12.6137 8.38801 12.0103 9.07075 10.809 9.52059C10.2268 9.7376 10.0415 10.0128 10.0363 10.6585V11.0184C9.39059 11.0819 9.34822 11.0819 8.92482 11.1454C8.99893 9.58411 8.89307 9.42531 10.8249 8.74789C12.0369 8.32448 12.3015 7.31363 11.5129 6.13868C10.248 4.25455 6.99307 5.50358 7.61229 7.63647C7.63876 7.73701 7.65464 7.82701 7.64405 7.83759C7.62817 7.85344 6.94013 8.00693 6.88721 8.00693C6.88191 8.00693 6.84487 7.35596 6.81312 7.13367C6.53261 5.22308 8.55967 4.05344 10.7084 4.36041ZM8.69727 12.1351C7.74461 12.5691 7.70755 13.7334 8.63374 14.0669C10.4808 14.7337 12.1533 13.6382 11.1106 12.4474C10.8037 12.0875 9.2371 11.8864 8.69727 12.1351ZM10.0522 12.4527C10.4755 12.5162 10.846 12.8549 10.846 13.1724C10.846 13.7599 9.40648 14.051 8.88781 13.5694C8.63374 13.3312 8.54909 12.2251 10.0522 12.4527Z" fill="#342EAD"/>
                  </svg>
              </p>
              <?php endif; ?>

                 <?php
                    if ( !empty($settings['tg_title' ]) ) :
                        printf( '<%1$s %2$s>%3$s</%1$s>',
                            tag_escape( $settings['tg_title_tag'] ),
                            $this->get_render_attribute_string( 'title_args' ),
                            tp_kses( $settings['tg_title' ] )
                        );
                    endif;
                ?>            
              <div class="cs_height_20 cs_height_lg_20"></div>
               <?php if ( !empty($settings['tg_description']) ) : ?>  
              <p class="m-0"><?php echo tp_kses( $settings['tg_description'] ); ?></p>
                <?php endif; ?>
              <div class="cs_height_40 cs_height_lg_40"></div>
            </div>
            <?php endif; ?>
            <div class="cs_form cs_style_1 cs_white_bg cs_radius_10">
                <?php echo do_shortcode( $settings['contact_shortCode'] ) ?>
            </div>
            <div class="cs_faq_wrap">
            <?php foreach ( $settings['accordions'] as $item) : ?> 
              <div class="cs_faq cs_style_1 cs_radius_10">
                <h4 class="cs_faq_title cs_semi_bold cs_font_20"><?php echo esc_html($item['accordion_title']); ?></h4>
                <p class="cs_faq_text m-0"><?php echo tp_kses($item['accordion_description']); ?></p>
              </div>
            <?php endforeach; ?>

            </div>
          </div>
        </div>
      </div>
      <div class="cs_height_125 cs_height_lg_55"></div>
    </section>


	<?php
	}

}

$widgets_manager->register( new TP_FAQ() );