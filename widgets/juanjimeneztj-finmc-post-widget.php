<?php
namespace JuanJimenezTJFinMCPost\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class JuanJimenezTJ_FinMC_Post extends Widget_Base {

	public function get_name() {
		return 'JuanJimenezTJ-FinMC-Post';
	}

	public function get_title() {
		return __( 'Juan Jimenez FinMC Post', 'juanjimeneztj-elementor-finmc-post' );
	}

	public function get_icon() {
		return 'eicon-post-list';
	}

	public function get_categories() {
		return [ 'general' ];
	}

	public function get_script_depends() {
		return [ 'juanjimeneztj-elementor-finmc-post' ];
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Content', 'juanjimeneztj-finmc-post' ),
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'juanjimeneztj-finmc-post' ),
				'type' => Controls_Manager::TEXT,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Style', 'juanjimeneztj-finmc-post' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'text_transform',
			[
				'label' => __( 'Text Transform', 'juanjimeneztj-finmc-post' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => __( 'None', 'juanjimeneztj-finmc-post' ),
					'uppercase' => __( 'UPPERCASE', 'juanjimeneztj-finmc-post' ),
					'lowercase' => __( 'lowercase', 'juanjimeneztj-finmc-post' ),
					'capitalize' => __( 'Capitalize', 'juanjimeneztj-finmc-post' ),
				],
				'selectors' => [
					'{{WRAPPER}} .title' => 'text-transform: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		echo '<div class="title">';
		echo $settings['title'];
		echo '</div>';
	}

	protected function _content_template() {
		?>
		<div class="title">
			{{{ settings.title }}}
		</div>
		<?php
	}
}
