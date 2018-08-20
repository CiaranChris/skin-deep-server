<?php

namespace App;

abstract class WidgetArgs {
    /**
     * Helper function to get an ACF field for the given widget
     */
    public function get_acf_field( $field ) {
        return get_field( $field , 'widget_' . $this->args['widget_id'] );
    }
}