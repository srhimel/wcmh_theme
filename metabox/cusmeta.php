<?php 



add_action('cmb2_admin_init', 'custom_metaboxes');

function custom_metaboxes(){

	
	$service_metabox = new_cmb2_box(array(
		'id' => 'icon',
		'object_types' => array('services'),
		'title' => 'Add Fontawesome class'
	));

	$service_metabox->add_field(array(
		'id' => 'serviceicon',
		'type' => 'text',
		'name' => 'Service Icon class'
	));
    $domain_details = new_cmb2_box(array(
		'id' => 'newicon',
		'object_types' => array('domaindetails'),
		'title' => 'Add Fontawesome class'
	));

	$domain_details->add_field(array(
		'id' => 'domainicon',
		'type' => 'text',
		'name' => 'Domain Icon class'
	));
    $pricing_table = new_cmb2_box(array(
		'id' => 'price',
		'object_types' => array('pricing'),
		'title' => 'Additional Data'
	));
    $pricing_table->add_field(array(
        'name'             => 'Price',
        'id'               => 'price',
        'type'             => 'text',
    ));
    $pricing_table->add_field(array(
        'name'             => 'Short Description',
        'id'               => 'shortdes',
        'type'             => 'text',
    ));
    $pricing_table->add_field(array(
        'name'             => 'Button Url',
        'id'               => 'btnurl',
        'type'             => 'text',
    ));

	$pricing_table->add_field(array(
        'name'             => 'Want to make it featured?',
        'desc'             => 'Select an option',
        'id'               => 'featured',
        'type'             => 'select',
        'show_option_none' => true,
        'default'          => 'no',
        'options'          => array(
            'no' => __( 'No', 'cmb2' ),
            'yes'   => __( 'Yes', 'cmb2' ))
    ));
    $pricing_table->add_field(array(
        'name'             => 'Want to Add Popular Banner?',
        'desc'             => 'Select an option',
        'id'               => 'tag',
        'type'             => 'select',
        'show_option_none' => true,
        'default'          => '0',
        'options'          => array(
            '0' => __( 'No', 'cmb2' ),
            '1'   => __( 'Yes', 'cmb2' ))
    ));
    $counter_item = new_cmb2_box(array(
		'id' => 'counteritem',
		'object_types' => array('counter'),
		'title' => 'Add Fontawesome class'
	));

	$counter_item->add_field(array(
		'id' => 'countericon',
		'type' => 'text',
		'name' => 'Counter Item Icon class'
	));
    $testimonial = new_cmb2_box(array(
		'id' => 'testimonialitem',
		'object_types' => array('testimonial'),
		'title' => 'Disignation'
	));

	$testimonial->add_field(array(
		'id' => 'designation',
		'type' => 'text',
		'name' => 'User Designation'
	));
    


}
