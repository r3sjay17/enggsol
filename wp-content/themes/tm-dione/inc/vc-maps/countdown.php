<?php

class WPBakeryShortCode_Countdown extends WPBakeryShortCode {
}

/*** Countdown ***/

$basename = "countdown";

$group_design = esc_html__( 'Design options', 'tm-dione' );
$group_label  = esc_html__( 'Label options', 'tm-dione' );

vc_map( array(
	"name"                      => "Countdown",
	"base"                      => $basename,
	"category"                  => sprintf( esc_html__('by %s', 'tm-dione' ), TM_DIONE_PARENT_THEME_NAME ),
	"icon"                      => "tm-shortcode-ico countdownclock-icon",
	"allowed_container_element" => 'vc_row',
	"params"                    => array(
		array(
			//http://xdsoft.net/jqplugins/datetimepicker/
			"type"        => "datetimepicker",
			"class"       => "",
			'admin_label' => true,
			"heading"     => esc_html__( "Target Time For Countdown", "tm-dione" ),
			"param_name"  => "datetime",
			"value"       => "",
			"description" => esc_html__( "Date and time format (yyyy/mm/dd hh:mm).", "tm-dione" ),
			"settings"    => array(
				'minDate' => 0,
			),
		),
		array(
			"type"       => "colorpicker",
			"class"      => "",
			"heading"    => "Digit Color",
			"param_name" => "digit_color",
		),
		array(
			"type"       => "colorpicker",
			"class"      => "",
			"heading"    => "Label Color",
			"param_name" => "label_color",
		),
		array(
			"type"        => "dropdown",
			'admin_label' => true,
			"class"       => "",
			"heading"     => "Style",
			"param_name"  => "style",
			"value"       => array(
				""         => "",
				"Style 01" => "style-1",
				"Style 02" => "style-2",
			),
			"description" => ""
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Extra class name', 'tm-dione' ),
			'param_name'  => 'custom_class',
			'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'tm-dione' ),
		),
		array(
			"type"       => "textfield",
			"class"      => "",
			"heading"    => "Day (Singular)",
			"param_name" => "day_singular",
			'group'      => $group_label,
		),
		array(
			"type"       => "textfield",
			"class"      => "",
			"heading"    => "Days (Plural)",
			"param_name" => "days_plural",
			'group'      => $group_label,
		),
		array(
			"type"       => "textfield",
			"class"      => "",
			"heading"    => "Week (Singular)",
			"param_name" => "week_singular",
			'group'      => $group_label,
		),
		array(
			"type"       => "textfield",
			"class"      => "",
			"heading"    => "Weeks (Plural)",
			"param_name" => "weeks_plural",
			'group'      => $group_label,
		),
		array(
			"type"       => "textfield",
			"class"      => "",
			"heading"    => "Month (Singular)",
			"param_name" => "month_singular",
			'group'      => $group_label,
		),
		array(
			"type"       => "textfield",
			"class"      => "",
			"heading"    => "Months (Plural)",
			"param_name" => "months_plural",
			'group'      => $group_label,
		),
		array(
			"type"       => "textfield",
			"class"      => "",
			"heading"    => "Year (Singular)",
			"param_name" => "year_singular",
			'group'      => $group_label,
		),
		array(
			"type"       => "textfield",
			"class"      => "",
			"heading"    => "Years (Plural)",
			"param_name" => "years_plural",
			'group'      => $group_label,
		),
		array(
			"type"       => "textfield",
			"class"      => "",
			"heading"    => "Hour (Singular)",
			"param_name" => "hour_singular",
			'group'      => $group_label,
		),
		array(
			"type"       => "textfield",
			"class"      => "",
			"heading"    => "Hours (Plural)",
			"param_name" => "hours_plural",
			'group'      => $group_label,
		),
		array(
			"type"       => "textfield",
			"class"      => "",
			"heading"    => "Minute (Singular)",
			"param_name" => "minute_singular",
			'group'      => $group_label,
		),
		array(
			"type"       => "textfield",
			"class"      => "",
			"heading"    => "Minutes (Plural)",
			"param_name" => "minutes_plural",
			'group'      => $group_label,
		),
		array(
			"type"       => "textfield",
			"class"      => "",
			"heading"    => "Second (Singular)",
			"param_name" => "second_singular",
			'group'      => $group_label,
		),
		array(
			"type"       => "textfield",
			"class"      => "",
			"heading"    => "Seconds (Plural)",
			"param_name" => "seconds_plural",
			'group'      => $group_label,
		),
		array(
			'type'       => 'css_editor',
			'heading'    => esc_html__( 'Css', 'tm-dione' ),
			'param_name' => 'css',
			'group'      => $group_design,
		),
	)
) );
