<?php

/**
 * Created by PhpStorm.
 * User: benki
 * Date: 28.03.2017
 * Time: 22:19
 */
class WC_Your_Shipping_Method extends WC_Shipping_Method
{
    /**
     * Constructor for your shipping class
     *
     * @access public
     * @return void
     */
    public function __construct() {
        $this->id                 = 'your_shipping_method';
        $this->title       = __( 'Your Shipping Method' );
        $this->method_description = __( 'Description of your shipping method' ); //
        $this->enabled            = "yes"; // This can be added as an setting but for this example its forced enabled
        $this->init();
    }

    /**
     * Init your settings
     *
     * @access public
     * @return void
     */
    function init() {
        // Load the settings API
        $this->init_form_fields(); // This is part of the settings API. Override the method to add your own settings
        $this->init_settings(); // This is part of the settings API. Loads settings you previously init.

        // Save settings in admin if you have any defined
        add_action( 'woocommerce_update_options_shipping_' . $this->id, array( $this, 'process_admin_options' ) );
    }

    /**
     * calculate_shipping function.
     *
     * @access public
     * @param mixed $package
     * @return void
     */
    public function calculate_shipping( $package ) {

        $rate = array(
            'id'       => $this->id,
            'label'    => "Label for the rate",
            'cost'     => '10.99',
            'calc_tax' => 'per_item'
        );

// Register the rate
        $this->add_rate( $rate );
    }
}