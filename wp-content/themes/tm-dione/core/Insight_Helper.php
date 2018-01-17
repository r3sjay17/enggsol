<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Helper funtions
 *
 * @package   InsightFramework
 */
class Insight_Helper {

	public static function label($label, $section, $priority, $desc = '') {
		return array(
			'type'     => 'custom',
			'settings' => 'tm_label_' . $section . '_' . $priority,
			'section'  => $section,
			'priority' => $priority,
			'default'  => '<div class="group_title">' . $label . '</div>',
			'description' => $desc,
		);
	}

}
