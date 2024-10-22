<?php
	/**
	 * Portm Footer full Widget
	 *
	 *
	 * @author 		ThemeDox
	 * @category 	Widgets
	 * @package 	Portm/Widgets
	 * @version 	1.0.0
	 * @extends 	WP_Widget
	 */
	add_action('widgets_init', 'Portm_info_Widget');
	function Portm_info_Widget() {
		register_widget('Portm_info_Widget');
	}


	class Portm_info_Widget  extends WP_Widget{

		public function __construct(){
			parent::__construct('Portm_info_Widget',esc_html__('Portm Main Footer Widget','tpcore'),array(
				'description' => esc_html__('Portm Footer 2 Style Widget','tpcore'),
			));
		}

		public function widget($args, $instance){
			extract($args);
			extract($instance);

			print $before_widget;
		?>


	      <div class="cs_footer_cta">
			<?php if( !empty($title) ): ?>
	        <h2 class="cs_font_92 cs_gradient_text_2 cs_semi_bold"><?php print $title; ?></h2>
			<?php endif; ?>
			<?php if( !empty($btn_text) ): ?>
	        <a href="<?php print esc_url($btn_url); ?>" class="cs_btn cs_style_1 cs_primary_font"><span><?php print esc_html($btn_text); ?></span></a>
			<?php endif; ?>
	      </div>

            <?php print $after_widget; ?>

		<?php
		}


		/**
		 * widget function.
		 *
		 * @see WP_Widget
		 * @access public
		 * @param array $instance
		 * @return void
		 */
		public function form($instance){

			$title  = isset($instance['title'])? $instance['title']:'';

			$btn_url  = isset($instance['btn_url'])? $instance['btn_url']:'';
			$btn_text  = isset($instance['btn_text'])? $instance['btn_text']:'';

			?>
			<p>
				<label for="title"><?php esc_html_e('Title:','tpcore'); ?></label>
			</p>
			<input class="widefat" type="text" id="<?php print esc_attr($this->get_field_id('title')); ?>"  name="<?php print esc_attr($this->get_field_name('title')); ?>" value="<?php print esc_attr($title); ?>">

			<p>
				<label for="title"><?php esc_html_e('Button Text:','tpcore'); ?></label>
			</p>
			<input class="widefat" type="text" id="<?php print esc_attr($this->get_field_id('btn_text')); ?>"  name="<?php print esc_attr($this->get_field_name('btn_text')); ?>" value="<?php print esc_attr($btn_text); ?>">


			<p>
				<label for="title"><?php esc_html_e('Button Url:','tpcore'); ?></label>
			</p>
			<input class="widefat" type="text" id="<?php print esc_attr($this->get_field_id('btn_url')); ?>"  name="<?php print esc_attr($this->get_field_name('btn_url')); ?>" value="<?php print esc_attr($btn_url); ?>">

			<p></p>

			<?php
		}

		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

			$instance['btn_text'] = ( ! empty( $new_instance['btn_text'] ) ) ? strip_tags( $new_instance['btn_text'] ) : '';
			$instance['btn_url'] = ( ! empty( $new_instance['btn_url'] ) ) ? strip_tags( $new_instance['btn_url'] ) : '';


			return $instance;
		}
	}