<?php
$default_args = array(
	"datetime"        => "",
	"digit_color"     => "",
	"label_color"     => "",
	"element_tag"     => "",
	"duration"        => "duration-3s",
	"text_align"      => "center",
	"custom_class"    => "",
	'style'           => '',
	'css'             => "",
	'day_singular'    => 'Day',
	'days_plural'     => 'Days',
	'week_singular'   => 'Week',
	'weeks_plural'    => 'Weeks',
	'month_singular'  => 'Month',
	'months_plural'   => 'Months',
	'year_singular'   => 'Year',
	'years_plural'    => 'Years',
	'hour_singular'   => 'Hour',
	'hours_plural'    => 'Hours',
	'minute_singular' => 'Minute',
	'minutes_plural'  => 'Minutes',
	'second_singular' => 'Second',
	'seconds_plural'  => 'Seconds',
);

extract( shortcode_atts( $default_args, $atts ) );

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

$uniq      = rand();
$custom_id = 'countdown-' . $uniq;

$style = ( $style != '' ) ? $style : 'style-1';

$css_class .= ' ' . $style;

$delim = $last = '';

if ( $style == 'style-2' ) {
	$last = $delim = '<em>:</em>';
} else {
	$last = $delim = '';
}

?>
<div class="countdown-container">
	<div class="countdown <?php echo esc_attr( $css_class ) ?> <?php echo esc_attr($custom_class); ?>"
	     id="<?php echo esc_attr( $custom_id ) ?>"><?php echo esc_html( $datetime ) ?></div>
</div>
<script>
	jQuery(document).ready(function () {

		var target = new Date(jQuery('#<?php echo esc_attr( $custom_id ) ?>').text());
			var current = new Date();
			if(target.getTime() < current.getTime()) {
				document.getElementById('<?php echo esc_attr( $custom_id ) ?>').innerHTML = "NOW";
				return;
			}

		countdown.resetLabels();
		countdown.setLabels(
			' millisecond| <span><?php echo '' . $second_singular ?></span></span>| <span><?php echo '' . $minute_singular ?></span> | <span><?php echo '' . $hour_singular ?></span> | <span><?php echo '' . $day_singular ?></span> | <span>week</span> | <span>month</span> | <span>year</span> | <span>decade</span> | <span>century</span> | <span>millennium</span>',
			' milliseconds| <span><?php echo '' . $seconds_plural ?></span> | <span><?php echo '' . $minutes_plural ?></span> | <span><?php echo '' . $hours_plural ?></span> | <span><?php echo '' . $days_plural ?></span> | <span>weeks</span> | <span>months</span> | <span>years</span> | <span>decades</span> | <span>centuries</span> | <span>millennia</span>',
			'<?php echo '' . $last ?>',
			'<?php echo '' . $delim ?>',
			'',
			function (n) {
				if (n < 10) {
					return '0' + n.toString();
				}
				return n.toString();
			});
		var timerId<?php echo esc_attr( uniqid() ); ?> =
			countdown(
				new Date(jQuery('#<?php echo esc_attr( $custom_id ) ?>').text()),
				function (ts) {
					if (ts.hours === 0) {
						ts.hours = '0';
					}
					if (ts.minutes === 0) {
						ts.minutes = '0';
					}
					if (ts.seconds === 0) {
						ts.seconds = '0';
					}
					if (ts.days === 0) {
						ts.days = '0';
					}
					document.getElementById('<?php echo esc_attr( $custom_id ) ?>').innerHTML = ts.toHTML("div");
				},
				countdown.DAYS & countdown.HOURS & countdown.MINUTES & countdown.SECONDS);
	});
</script>
<?php if(!empty($label_color)): ?>
	<script>
		jQuery(document).ready(function ($) {
			'use strict';
			var label_color = '<?php echo esc_js($label_color) ?>';
			$('head').append('<style> #<?php echo esc_attr($custom_id) ?> div span, #<?php echo esc_attr($custom_id) ?> em {color: '+label_color+'}</style>');
		});
	</script>
<?php endif; ?>
