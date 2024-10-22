<?php
namespace TPCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Image_Size;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Multim Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class TP_Blog_Post extends Widget_Base {

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
		return 'blogpost';
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
		return __( 'Blog Post', 'tpcore' );
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
                    'layout-4' => esc_html__('Layout 4', 'tpcore')                    
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
                'default' => esc_html__('Blog Posts', 'tpcore'),
                'placeholder' => esc_html__('Type Sub Title Text', 'tpcore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_title',
            [
                'label' => esc_html__('Title', 'tpcore'),
                'description' => tp_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXT,
                'default' => tp_kses('My Latest <b>articles</b>', 'tpcore'),
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

       // tp_section_title2
        $this->start_controls_section(
            'tp_section_title2',
            [
                'label' => esc_html__('Title & Category Title', 'tpcore'),
                 'condition' => [
                    'tp_design_style' => ['layout-3'],
                ]                 
            ]
        );

        $this->add_control(
            'tg_blogpost_title',
            [
                'label' => esc_html__('Article Title', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Recent Articles', 'tpcore'),
                'placeholder' => esc_html__('Type Article Title Text', 'tpcore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_blogpost_category_title',
            [
                'label' => esc_html__('Categorie Title', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Categories', 'tpcore'),
                'placeholder' => esc_html__('Type Categorie Title Text', 'tpcore'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        // tg_btn_button_group
        $this->start_controls_section(
            'tg_button_group',
            [
                'label' => esc_html__('Button', 'tpcore'),
                 'condition' => [
                    'tp_design_style' => ['layout-1','layout-2'],
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
                'default' => 'Show',
            ]
        );

        $this->add_control(
            'tg_btn_text',
            [
                'label' => esc_html__('Button Text', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('View All', 'tpcore'),
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

        // Blog Query
		$this->start_controls_section(
            'tp_post_query',
            [
                'label' => esc_html__('Blog Query', 'tpcore'),
            ]
        );

        $post_type = 'post';
        $taxonomy = 'category';

        $this->add_control(
            'posts_per_page',
            [
                'label' => esc_html__('Posts Per Page', 'tpcore'),
                'description' => esc_html__('Leave blank or enter -1 for all.', 'tpcore'),
                'type' => Controls_Manager::NUMBER,
                'default' => '3',
            ]
        );

        $this->add_control(
            'category',
            [
                'label' => esc_html__('Include Categories', 'tpcore'),
                'description' => esc_html__('Select a category to include or leave blank for all.', 'tpcore'),
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => tp_get_categories($taxonomy),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'exclude_category',
            [
                'label' => esc_html__('Exclude Categories', 'tpcore'),
                'description' => esc_html__('Select a category to exclude', 'tpcore'),
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => tp_get_categories($taxonomy),
                'label_block' => true
            ]
        );

        $this->add_control(
            'post__not_in',
            [
                'label' => esc_html__('Exclude Item', 'tpcore'),
                'type' => Controls_Manager::SELECT2,
                'options' => tp_get_all_types_post($post_type),
                'multiple' => true,
                'label_block' => true
            ]
        );

        $this->add_control(
            'offset',
            [
                'label' => esc_html__('Offset', 'tpcore'),
                'type' => Controls_Manager::NUMBER,
                'default' => '0',
            ]
        );

        $this->add_control(
            'orderby',
            [
                'label' => esc_html__('Order By', 'tpcore'),
                'type' => Controls_Manager::SELECT,
                'options' => array(
			        'ID' => 'Post ID',
			        'author' => 'Post Author',
			        'title' => 'Title',
			        'date' => 'Date',
			        'modified' => 'Last Modified Date',
			        'parent' => 'Parent Id',
			        'rand' => 'Random',
			        'comment_count' => 'Comment Count',
			        'menu_order' => 'Menu Order',
			    ),
                'default' => 'date',
            ]
        );

        $this->add_control(
            'order',
            [
                'label' => esc_html__('Order', 'tpcore'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'asc' 	=> esc_html__( 'Ascending', 'tpcore' ),
                    'desc' 	=> esc_html__( 'Descending', 'tpcore' )
                ],
                'default' => 'desc',

            ]
        );

        $this->add_control(
            'ignore_sticky_posts',
            [
                'label' => esc_html__( 'Ignore Sticky Posts', 'tpcore' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'tpcore' ),
                'label_off' => esc_html__( 'No', 'tpcore' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'tp_blog_title_word',
            [
                'label' => esc_html__('Title Word Count', 'tpcore'),
                'description' => esc_html__('Set how many word you want to displa!', 'tpcore'),
                'type' => Controls_Manager::NUMBER,
                'default' => '12',
            ]
        );

        $this->add_control(
            'tp_post_content',
            [
                'label' => __('Content', 'tpcore'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'tpcore'),
                'label_off' => __('Hide', 'tpcore'),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->add_control(
            'tp_post_content_limit',
            [
                'label' => __('Content Limit', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '14',
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'tp_post_content' => 'yes'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail', // // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `thumbnail_size` and `thumbnail_custom_dimension`.
                'exclude' => ['custom'],
                'default' => 'cs_zoom_in',
            ]
        );

        $this->end_controls_section();

        // style control
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

            if (get_query_var('paged')) {
                $paged = get_query_var('paged');
            } else if (get_query_var('page')) {
                $paged = get_query_var('page');
            } else {
                $paged = 1;
            }

            // include_categories
            $category_list = '';
            if (!empty($settings['category'])) {
                $category_list = implode(", ", $settings['category']);
            }
            $category_list_value = explode(" ", $category_list);

            // exclude_categories
            $exclude_categories = '';
            if(!empty($settings['exclude_category'])){
                $exclude_categories = implode(", ", $settings['exclude_category']);
            }
            $exclude_category_list_value = explode(" ", $exclude_categories);

            $post__not_in = '';
            if (!empty($settings['post__not_in'])) {
                $post__not_in = $settings['post__not_in'];
                $args['post__not_in'] = $post__not_in;
            }
            $posts_per_page = (!empty($settings['posts_per_page'])) ? $settings['posts_per_page'] : '-1';
            $orderby = (!empty($settings['orderby'])) ? $settings['orderby'] : 'post_date';
            $order = (!empty($settings['order'])) ? $settings['order'] : 'desc';
            $offset_value = (!empty($settings['offset'])) ? $settings['offset'] : '0';
            $ignore_sticky_posts = (! empty( $settings['ignore_sticky_posts'] ) && 'yes' == $settings['ignore_sticky_posts']) ? true : false ;


            // number
            $off = (!empty($offset_value)) ? $offset_value : 0;
            $offset = $off + (($paged - 1) * $posts_per_page);
            $p_ids = array();

            // build up the array
            if (!empty($settings['post__not_in'])) {
                foreach ($settings['post__not_in'] as $p_idsn) {
                    $p_ids[] = $p_idsn;
                }
            }

            $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => $posts_per_page,
                'orderby' => $orderby,
                'order' => $order,
                'offset' => $offset,
                'paged' => $paged,
                'post__not_in' => $p_ids,
                'ignore_sticky_posts' => $ignore_sticky_posts
            );

            // exclude_categories
            if ( !empty($settings['exclude_category'])) {

                // Exclude the correct cats from tax_query
                $args['tax_query'] = array(
                    array(
                        'taxonomy'	=> 'category',
                        'field'	 	=> 'slug',
                        'terms'		=> $exclude_category_list_value,
                        'operator'	=> 'NOT IN'
                    )
                );

                // Include the correct cats in tax_query
                if ( !empty($settings['category'])) {
                    $args['tax_query']['relation'] = 'AND';
                    $args['tax_query'][] = array(
                        'taxonomy'	=> 'category',
                        'field'		=> 'slug',
                        'terms'		=> $category_list_value,
                        'operator'	=> 'IN'
                    );
                }

            } else {
                // Include the cats from $cat_slugs in tax_query
                if (!empty($settings['category'])) {
                    $args['tax_query'][] = [
                        'taxonomy' => 'category',
                        'field' => 'slug',
                        'terms' => $category_list_value,
                    ];
                }
            }

            $filter_list = $settings['category'];

            // The Query
            $query = new \WP_Query($args);

            $this->add_render_attribute('title_args', 'class', 'cs_section_title cs_font_48 cs_semi_bold common-heading-title-style');

            // Link
            if ('2' == $settings['tg_btn_link_type']) {
                $this->add_render_attribute('tg-button-arg', 'href', get_permalink($settings['tg_btn_page_link']));
                $this->add_render_attribute('tg-button-arg', 'target', '_self');
                $this->add_render_attribute('tg-button-arg', 'rel', 'nofollow');
                $this->add_render_attribute('tg-button-arg', 'class', 'cs_accent_color cs_font_16 cs_medium text-uppercase cs_gap_15 d-inline-flex align-items-center');
            } else {
                if ( ! empty( $settings['tg_btn_link']['url'] ) ) {
                    $this->add_link_attributes( 'tg-button-arg', $settings['tg_btn_link'] );
                    $this->add_render_attribute('tg-button-arg', 'class', 'cs_accent_color cs_font_16 cs_medium text-uppercase cs_gap_15 d-inline-flex align-items-center');
                }
            }

            if ( !empty($settings['tg_image04']['url']) ) {
                $tg_image04 = !empty($settings['tg_image04']['id']) ? wp_get_attachment_image_url( $settings['tg_image04']['id'], $settings['tg_image_size04_size']) : $settings['tg_image04']['url'];
                $tg_image_alt04 = get_post_meta($settings["tg_image04"]["id"], "_wp_attachment_image_alt", true);
            }  

        ?>

        <?php if ( $settings['tp_design_style']  == 'layout-2' ): ?>

        <?php if ($query->have_posts()) : ?>
       <!-- Start Blog Section -->
        <section class="cs_filled_bg" data-src="<?php echo esc_url( $tg_image04 ); ?>">
          <div class="cs_height_145 cs_height_lg_75"></div>
          <div class="container">
            <?php if( !empty($settings['tg_section_title_show']) ) : ?>
            <div class="d-md-flex justify-content-between"> 
              <div class="cs_section_heading cs_style_1">
                <?php if( !empty($settings['tg_sub_title']) ) : ?>
                <p class="cs_section_subtitle cs_accent_color_2 cs_font_16 wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="0.2s">
                  <span><?php echo esc_html( $settings['tg_sub_title'] ); ?></span>
                  <svg width="17" height="21" viewBox="0 0 17 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M11.1794 0.136775C10.2881 0.345851 9.66098 0.907053 8.49451 2.56862C8.16439 3.04177 7.83427 3.42691 7.75723 3.42691C7.52618 3.42691 6.88797 3.82302 6.63489 4.37322C6.50283 4.65937 6.24975 5.03346 6.07372 5.22054C5.45753 6.02382 6.2938 6.05681 4.88531 7.87246C2.75059 10.6454 1.89221 12.0209 1.81517 12.7691C1.72715 13.6935 0.186681 18.6012 0.494775 19.4485C0.703801 20.0427 1.40809 20.1637 2.43144 19.8556C4.26904 19.3054 7.55926 16.8846 8.1865 16.3454C8.98977 15.6521 11.2455 11.6688 11.5206 11.6578C11.8287 11.6467 12.4669 11.3386 12.577 11.2286C13.0832 10.7224 14.5247 8.2906 14.6567 7.66336C14.7117 7.39931 14.6346 7.15721 14.6346 6.84911C14.6346 6.66203 14.9098 6.23292 15.449 5.56163C16.5273 4.23018 16.5383 4.19719 15.9001 2.87671C14.7557 0.576917 13.2152 -0.325383 11.1794 0.136775ZM12.621 0.686965C13.5673 0.918049 14.4697 1.71033 15.0088 2.7557C15.526 3.77906 15.4269 4.03213 13.7434 6.08989C13.6994 6.13385 13.5673 5.84779 13.3693 5.55066C12.6099 4.38427 11.3555 3.53695 9.67195 3.36092C9.02277 3.29485 8.86868 3.54792 10.0021 2.00745C10.3983 1.46824 10.6293 1.17113 10.8053 0.984064C11.1025 0.686965 11.7407 0.477898 12.621 0.686965ZM10.0461 4.14217C11.5756 4.63735 12.1148 4.95641 13.0061 6.61798C13.5783 7.68538 13.5233 7.56437 12.8741 8.34562C12.6209 8.65371 12.599 8.65371 12.5219 8.45566C12.2579 7.71838 12.0378 7.32227 11.4106 6.71705C10.2551 5.72669 9.93608 5.99082 10.8714 7.06919C11.9387 8.31262 12.1588 9.02788 11.7517 9.95216C11.5096 10.4914 11.3335 10.6784 11.2785 10.4473C10.5853 7.88344 9.05577 6.79409 7.33918 6.64C6.62392 6.57401 6.52485 6.40895 6.92104 5.9688C7.16307 5.70467 7.51521 5.82576 8.3735 5.9358C8.75864 5.99082 8.78067 5.46265 8.35148 5.35261C7.79031 5.20949 7.60322 5.02249 8.03233 4.36225C8.42852 3.77906 8.80269 3.73501 10.0461 4.14217ZM9.01172 4.67034C8.80269 4.80241 8.74759 5.07751 9.46284 5.33058C10.1451 5.57269 10.4973 5.39657 10.4973 5.08848C10.4973 4.96747 10.4092 4.78038 10.1121 4.71439C9.716 4.61532 9.13281 4.5933 9.01172 4.67034ZM7.93334 7.32227C8.05435 7.39931 8.06541 7.41028 7.65824 8.0155C6.65692 9.50104 6.24975 10.0732 5.95263 10.4143C5.78757 10.6014 5.41348 11.1626 5.11636 11.6578C4.159 13.2864 3.32281 13.8036 2.95962 12.9892C2.82763 12.7032 2.86055 12.373 3.02561 12.1199C3.49876 11.3937 6.06275 7.35526 6.68991 7.1902C7.20711 7.04717 7.74626 7.20126 7.93334 7.32227ZM9.22082 7.97145C10.0351 8.81877 10.1451 9.358 9.50689 10.1392C8.31848 11.6028 6.44781 14.1226 5.69955 14.6618C5.1934 15.025 4.9513 13.9685 5.09442 13.3084C5.28142 12.417 6.02967 11.2176 7.68027 9.04991C8.62658 7.78445 8.79164 7.53138 9.22082 7.97145ZM10.3542 10.6894C10.3872 10.9315 10.5193 11.2616 10.2551 11.6248C10.0681 11.8888 9.46284 12.8902 8.97872 13.6934C8.14245 15.1019 7.04206 16.0373 6.95404 15.7952C6.844 15.4981 7.47116 14.0896 8.05435 13.2864C9.51786 11.3167 10.2111 9.72112 10.3542 10.6894ZM4.23604 14.2106C4.26904 15.08 4.78624 15.4541 5.64453 15.223C6.19473 15.08 6.19473 15.0689 5.97465 15.5861C5.87567 15.8172 5.82065 16.1473 5.84259 16.3234C5.89761 16.6756 5.7766 16.7195 4.92936 17.2588C4.80827 17.3357 4.65418 17.3027 4.57722 17.1817C4.13706 16.5104 3.52078 16.1693 2.82755 16.0593C2.13432 15.9492 2.17837 16.0703 2.38739 14.9699L2.5635 14.0346C2.70654 14.0346 3.23471 14.1556 3.72989 13.9355C3.939 13.8475 4.15908 13.7595 4.15908 13.7595C4.15908 13.7595 4.23604 13.9685 4.23604 14.2106Z"
                      fill="currentColor" />
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
              </div>
            <?php if( !empty($settings['tg_btn_text']) ) : ?>
              <div class="align-self-end">
                <div class="cs_height_25 cs_height_lg_25"></div>
                <a <?php echo $this->get_render_attribute_string( 'tg-button-arg' ); ?> >
                  <span class="cs_text_btn"><?php echo $settings['tg_btn_text']; ?></span>
                  <svg width="5" height="9" viewBox="0 0 5 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 0L5 4.5L0 9L0 0Z" fill="currentColor" />
                  </svg>
                </a>
              </div>
            <?php endif; ?>
            </div>
            <?php endif; ?>
            <div class="cs_height_70 cs_height_lg_30"></div>
            <div class="cs_blog_group_1">
            
                <?php $counter = 1; while ($query->have_posts()) :
                    $query->the_post();
                    global $post;

                    $categories = get_the_category($post->ID);
                ?>
                <?php if ($counter == 1 ) : ?>
              <div class="cs_blog cs_style_3 cs_transition_3 cs_white_bg cs_radius_20 cs_transform_up_hover_3">
                <div class="cs_blog_in">
                  <div class="cs_blog_thumbnail cs_zoom">
                    <a href="<?php the_permalink(); ?>">
                      <?php the_post_thumbnail( $post->ID, $settings['thumbnail_size'] );?>
                    </a>
                  </div>
                  <div class="cs_blog_info">
                    <h3 class="cs_blog_title cs_font_28"><a class="cs_accent_color_2_hover" href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), $settings['tp_blog_title_word'], ''); ?></a></h3>
                    <div class="d-flex justify-content-between align-items-center">

                      <div class="cs_blog_avater d-flex align-items-center">
                        <?php echo get_avatar(get_the_author_meta('ID'), 50) ?>
                        <div class="cs_ml_20">
                          <h2 class="cs_blog_name cs_font_20 cs_semi_bold mb-0"><?php print get_the_author();?></h2>
                          <p class="cs_blog_designation cs_font_16 cs_normal mb-0"><span><?php the_time( 'j' ); ?> </span><span><?php the_time( 'M' ); ?>, <?php the_time( 'Y' ); ?></span></p>
                        </div>
                      </div>

                      <a href="<?php the_permalink(); ?>" class="cs_circle_btn cs_style_1 cs_type_1 cs_accent_color_2 cs_center rounded-circle">
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
                    </div>
                  </div>
                </div>
              </div>
              <?php else : ?>
              <div class="cs_blog cs_style_2 cs_transition_4">
                <a href="<?php the_permalink(); ?>" class="cs_blog_thumbnail cs_zoom">
                  <?php the_post_thumbnail( $post->ID, $settings['thumbnail_size'] );?>
                </a>
                <div class="cs_blog_info">
                  <h2 class="cs_blog_title cs_font_20 cs_semi_bold"><a class="cs_accent_color_2_hover" href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), $settings['tp_blog_title_word'], ''); ?></a></h2>
                  <div class="cs_blog_avater d-flex align-items-center">
                    <?php echo get_avatar(get_the_author_meta('ID'), 50) ?>
                    <div class="cs_ml_20">
                      <h2 class="cs_blog_name cs_font_20 cs_semi_bold mb-0"><?php print get_the_author();?></h2>
                      <p class="cs_blog_designation cs_font_16 cs_normal mb-0"><span><?php the_time( 'j' ); ?> </span><span><?php the_time( 'M' ); ?>, <?php the_time( 'Y' ); ?></span></p>
                    </div>
                  </div>
                  <a href="<?php the_permalink(); ?>" class="cs_circle_btn cs_style_1 cs_type_1 cs_accent_color_2 cs_center rounded-circle">
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
                </div>
              </div>
            <?php endif; ?>
            <?php $counter++; endwhile; wp_reset_query(); ?>              

            </div>
          </div>
          <div class="cs_height_150 cs_height_lg_80"></div>
        </section>
        <!-- End Blog Section -->
        <?php endif; ?>

        <?php elseif ( $settings['tp_design_style']  == 'layout-3' ):  ?>   

        <?php if ($query->have_posts()) : ?>
        <!-- Start Blog Section -->
        <section>
          <div class="cs_height_85 cs_height_lg_50"></div>
          <div class="container">
            <div class="cs_title_search_wrap">
             <?php if( !empty($settings['tg_blogpost_title']) ) : ?>
              <h3 class="cs_title"><?php echo esc_html( $settings['tg_blogpost_title'] ); ?></h3>
             <?php endif; ?>
                <?php portm_search_form(); ?>
            </div>
            <div class="cs_height_60 cs_height_lg_30"></div>
            <div class="row">
              <div class="col-lg-3">
                <div class="cs_category cs_style_1 cs_white_bg cs_radius_10 overflow-hidden">
                <?php if( !empty($settings['tg_blogpost_category_title']) ) : ?>
                  <h4 class="cs_category_title"><?php echo esc_html( $settings['tg_blogpost_category_title'] ); ?></h4>
                <?php endif; ?>
                  <ul class="cs_mp_0">
                    <li class="active"><a href="#">All</a></li>
                    <?php tp_get_all_blogpost_category(); ?>
                  </ul>
                </div>
              </div>
              <div class="col-lg-8 offset-lg-1">
                <div class="cs_height_lg_40"></div>
                <div class="cs_blog_wrap">

                <?php while ($query->have_posts()) :
                    $query->the_post();
                    global $post;

                    $categories = get_the_category($post->ID);
                ?>
                  <div class="cs_blog cs_style_1 cs_transition_4">
                    <div class="flex-none">
                      <a href="<?php the_permalink(); ?>" class="cs_blog_thumbnail cs_zoom">
                      <?php the_post_thumbnail( $post->ID, $settings['thumbnail_size'] );?>
                      </a>
                    </div>
                    <div class="cs_blog_info">
                      <div class="cs_blog_date text-nowrap cs_secondary_color">
                        <div class="cs_font_36 cs_semi_bold cs_primary_font"><?php the_time( 'j' ); ?></div>
                        <span class="cs_font_16 d-inline-block"><?php the_time( 'M' ); ?> <?php the_time( 'Y' ); ?></span>
                      </div>
                      <h2 class="cs_blog_title cs_font_20 cs_semi_bold"><a class="cs_accent_color_2_hover"
                          href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), $settings['tp_blog_title_word'], ''); ?></a></h2>
                      <span class="cs_secondary_color"><?php echo reading_time(); ?></span>
                      <a href="<?php the_permalink(); ?>"
                        class="cs_circle_btn cs_style_1 cs_type_1 cs_accent_color_2 cs_center rounded-circle">
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
                    </div>
                  </div>
                 <?php endwhile; wp_reset_query(); ?>

                </div>
              </div>
            </div>
            
          </div>
          <div class="cs_height_150 cs_height_lg_80"></div>
        </section>
        <!-- End Blog Section -->
        <?php endif; ?>

        <?php elseif ( $settings['tp_design_style']  == 'layout-4' ):  ?>

        <!-- Start Blog Section -->
        <div class="cs_height_90 cs_height_lg_90"></div>
        <div class="cs_height_120 cs_height_lg_80"></div>
        <section>
          <div class="container">
            <?php while ($query->have_posts()) :
                $query->the_post();
                global $post;

                $categories = get_the_category($post->ID);
            ?>
            <div class="cs_blog cs_style_4">
              <div class="row align-items-center">
                <div class="col-lg-6">
                    <a href="<?php the_permalink(); ?>" class="cs_image_box cs_style_4 cs_radius_10 overflow-hidden">
                        <?php the_post_thumbnail( $post->ID, $settings['thumbnail_size'] );?>
                    </a>
                  <div class="cs_height_lg_40"></div>
                </div>
                <div class="col-lg-6">
                  <div class="cs_pl_50">
                    <span class="cs_blog_meta cs_radius_10 cs_font_16 cs_accent_color"><?php echo esc_html($categories[0]->name); ?></span>
                    <h3 class="cs_blog_title cs_font_36 cs_semi_bold"><a class="cs_accent_color_2_hover" href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), $settings['tp_blog_title_word'], ''); ?></a></h3>
                        <?php if (!empty($settings['tp_post_content'])):
                        $tp_post_content_limit = (!empty($settings['tp_post_content_limit'])) ? $settings['tp_post_content_limit'] : '';
                            ?>
                        <p class="cs_blog_text"><?php print wp_trim_words(get_the_excerpt(get_the_ID()), $tp_post_content_limit, ''); ?></p>
                    <?php endif; ?>                    
                    <div class="d-flex justify-content-between align-items-center">
                      <div>
                        <span class="cs_font_16"><span><?php the_time( 'j' ); ?> </span><span><?php the_time( 'M' ); ?>, <?php the_time( 'Y' ); ?></span>
                        <a href="<?php the_permalink(); ?>"
                          class="cs_blog_author_name cs_accent_color_2 cs_accent_color_2_hover cs_text_btn cs_type_2 cs_font_16"><?php print get_the_author();?></a>
                      </div>
                      <a href="<?php the_permalink(); ?>" class="cs_circle_btn cs_style_1 cs_accent_color cs_center rounded-circle">
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
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="cs_height_40 cs_height_lg_30"></div>
            <?php endwhile; wp_reset_query(); ?>
          </div>
        </section>
        <!-- End Blog Section -->


        <?php else: ?>

        <?php if ($query->have_posts()) : ?>
        <!-- Start Blog Section -->
        <section class="cs_100_bg" data-src="<?php echo esc_url( $tg_image04 ); ?>">
          <div class="cs_height_150 cs_height_lg_75"></div>
          <div class="container">
            <div class="row">
            <?php if( !empty($settings['tg_section_title_show']) ) : ?>
              <div class="col-lg-4">
                <div class="cs_section_heading cs_style_1">
                <?php if( !empty($settings['tg_sub_title']) ) : ?>
                  <p class="cs_section_subtitle cs_accent_color_2 cs_font_16 wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="0.2s">
                    <span><?php echo esc_html( $settings['tg_sub_title'] ); ?></span>
                    <svg width="17" height="21" viewBox="0 0 17 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M11.1794 0.136775C10.2881 0.345851 9.66098 0.907053 8.49451 2.56862C8.16439 3.04177 7.83427 3.42691 7.75723 3.42691C7.52618 3.42691 6.88797 3.82302 6.63489 4.37322C6.50283 4.65937 6.24975 5.03346 6.07372 5.22054C5.45753 6.02382 6.2938 6.05681 4.88531 7.87246C2.75059 10.6454 1.89221 12.0209 1.81517 12.7691C1.72715 13.6935 0.186681 18.6012 0.494775 19.4485C0.703801 20.0427 1.40809 20.1637 2.43144 19.8556C4.26904 19.3054 7.55926 16.8846 8.1865 16.3454C8.98977 15.6521 11.2455 11.6688 11.5206 11.6578C11.8287 11.6467 12.4669 11.3386 12.577 11.2286C13.0832 10.7224 14.5247 8.2906 14.6567 7.66336C14.7117 7.39931 14.6346 7.15721 14.6346 6.84911C14.6346 6.66203 14.9098 6.23292 15.449 5.56163C16.5273 4.23018 16.5383 4.19719 15.9001 2.87671C14.7557 0.576917 13.2152 -0.325383 11.1794 0.136775ZM12.621 0.686965C13.5673 0.918049 14.4697 1.71033 15.0088 2.7557C15.526 3.77906 15.4269 4.03213 13.7434 6.08989C13.6994 6.13385 13.5673 5.84779 13.3693 5.55066C12.6099 4.38427 11.3555 3.53695 9.67195 3.36092C9.02277 3.29485 8.86868 3.54792 10.0021 2.00745C10.3983 1.46824 10.6293 1.17113 10.8053 0.984064C11.1025 0.686965 11.7407 0.477898 12.621 0.686965ZM10.0461 4.14217C11.5756 4.63735 12.1148 4.95641 13.0061 6.61798C13.5783 7.68538 13.5233 7.56437 12.8741 8.34562C12.6209 8.65371 12.599 8.65371 12.5219 8.45566C12.2579 7.71838 12.0378 7.32227 11.4106 6.71705C10.2551 5.72669 9.93608 5.99082 10.8714 7.06919C11.9387 8.31262 12.1588 9.02788 11.7517 9.95216C11.5096 10.4914 11.3335 10.6784 11.2785 10.4473C10.5853 7.88344 9.05577 6.79409 7.33918 6.64C6.62392 6.57401 6.52485 6.40895 6.92104 5.9688C7.16307 5.70467 7.51521 5.82576 8.3735 5.9358C8.75864 5.99082 8.78067 5.46265 8.35148 5.35261C7.79031 5.20949 7.60322 5.02249 8.03233 4.36225C8.42852 3.77906 8.80269 3.73501 10.0461 4.14217ZM9.01172 4.67034C8.80269 4.80241 8.74759 5.07751 9.46284 5.33058C10.1451 5.57269 10.4973 5.39657 10.4973 5.08848C10.4973 4.96747 10.4092 4.78038 10.1121 4.71439C9.716 4.61532 9.13281 4.5933 9.01172 4.67034ZM7.93334 7.32227C8.05435 7.39931 8.06541 7.41028 7.65824 8.0155C6.65692 9.50104 6.24975 10.0732 5.95263 10.4143C5.78757 10.6014 5.41348 11.1626 5.11636 11.6578C4.159 13.2864 3.32281 13.8036 2.95962 12.9892C2.82763 12.7032 2.86055 12.373 3.02561 12.1199C3.49876 11.3937 6.06275 7.35526 6.68991 7.1902C7.20711 7.04717 7.74626 7.20126 7.93334 7.32227ZM9.22082 7.97145C10.0351 8.81877 10.1451 9.358 9.50689 10.1392C8.31848 11.6028 6.44781 14.1226 5.69955 14.6618C5.1934 15.025 4.9513 13.9685 5.09442 13.3084C5.28142 12.417 6.02967 11.2176 7.68027 9.04991C8.62658 7.78445 8.79164 7.53138 9.22082 7.97145ZM10.3542 10.6894C10.3872 10.9315 10.5193 11.2616 10.2551 11.6248C10.0681 11.8888 9.46284 12.8902 8.97872 13.6934C8.14245 15.1019 7.04206 16.0373 6.95404 15.7952C6.844 15.4981 7.47116 14.0896 8.05435 13.2864C9.51786 11.3167 10.2111 9.72112 10.3542 10.6894ZM4.23604 14.2106C4.26904 15.08 4.78624 15.4541 5.64453 15.223C6.19473 15.08 6.19473 15.0689 5.97465 15.5861C5.87567 15.8172 5.82065 16.1473 5.84259 16.3234C5.89761 16.6756 5.7766 16.7195 4.92936 17.2588C4.80827 17.3357 4.65418 17.3027 4.57722 17.1817C4.13706 16.5104 3.52078 16.1693 2.82755 16.0593C2.13432 15.9492 2.17837 16.0703 2.38739 14.9699L2.5635 14.0346C2.70654 14.0346 3.23471 14.1556 3.72989 13.9355C3.939 13.8475 4.15908 13.7595 4.15908 13.7595C4.15908 13.7595 4.23604 13.9685 4.23604 14.2106Z"
                        fill="#342EAD" />
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
                  <div class="cs_height_25 cs_height_lg_10"></div>
                    <?php if ( !empty($settings['tg_description']) ) : ?>
                  <p class="mb-0"><?php echo tp_kses( $settings['tg_description'] ); ?>
                  </p>
                <?php endif; ?> 
                  <div class="cs_height_45 cs_height_lg_10"></div>
                 <?php if( !empty($settings['tg_btn_text']) ) : ?>
                  <a <?php echo $this->get_render_attribute_string( 'tg-button-arg' ); ?> >    
                    <span class="cs_text_btn"><?php echo $settings['tg_btn_text']; ?></span>
                    <svg width="5" height="9" viewBox="0 0 5 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M0 0L5 4.5L0 9L0 0Z" fill="currentColor" />
                    </svg>
                  </a>
                 <?php endif; ?>
                </div>
                <div class="cs_height_lg_30"></div>
              </div>
              <?php endif; ?>

              <div class="col-lg-7 offset-lg-1">

            <?php while ($query->have_posts()) :
                $query->the_post();
                global $post;

                $categories = get_the_category($post->ID);
            ?>
                <div class="cs_blog cs_style_1 cs_transition_4">
                  <div class="flex-none">
                    <a href="<?php the_permalink(); ?>" class="cs_blog_thumbnail cs_zoom">
                      <?php the_post_thumbnail( $post->ID, $settings['thumbnail_size'] );?>
                    </a>
                  </div>
                  <div class="cs_blog_info">
                    <div class="cs_blog_date text-nowrap cs_secondary_color">
                      <div class="cs_font_36 cs_semi_bold cs_primary_font"><?php the_time( 'j' ); ?></div>
                      <span class="cs_font_16 d-inline-block"><?php the_time( 'M' ); ?> <?php the_time( 'Y' ); ?></span>
                    </div>
                    <h2 class="cs_blog_title cs_font_20 cs_semi_bold"><a class="cs_accent_color_2_hover" href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), $settings['tp_blog_title_word'], ''); ?></a></h2>
                    <span class="cs_secondary_color"><?php echo reading_time(); ?></span>
                    <a href="<?php the_permalink(); ?>" class="cs_circle_btn cs_style_1 cs_type_1 cs_accent_color_2 cs_center rounded-circle">
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
                  </div>
                </div>
                <?php endwhile; wp_reset_query(); ?>

              </div>
            </div>
          </div>
          <div class="cs_height_150 cs_height_lg_80"></div>
        </section>
        <!-- End Blog Section -->
        <?php endif; ?>

        <?php endif; ?>


       <?php
	}

}

$widgets_manager->register( new TP_Blog_Post() );