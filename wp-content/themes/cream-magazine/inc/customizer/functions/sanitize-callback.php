<?php

/**
 * Sanitization Function - Multiple Categories
 * 
 * @param $input, $setting
 * @return $input
 */
if( !function_exists( 'cream_magazine_sanitize_multiple_cat_select' ) ) {

    function cream_magazine_sanitize_multiple_cat_select( $input, $setting ) {

        if(!empty($input)){

            $input = array_map('sanitize_text_field', $input);
        }

        return $input;
    } 
}


/**
 * Sanitization Function - Select
 *
 * @param $input
 * @param $setting
 * @return sanitized output
 *
 */
if ( !function_exists('cream_magazine_sanitize_select') ) {

    function cream_magazine_sanitize_select( $input, $setting ) {

        // Ensure input is a slug.
        $input = sanitize_key( $input );
        // Get list of choices from the control associated with the setting.
        $choices = $setting->manager->get_control( $setting->id )->choices;
        // If the input is a valid key, return it; otherwise, return the default.
        return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
    }
}

/**
 * Sanitization Function - Number
 *
 * @param $input
 * @param $setting
 * @return sanitized output
 *
 */
if ( !function_exists('cream_magazine_sanitize_number') ) {

    function cream_magazine_sanitize_number( $input, $setting ) {
        
        $number = absint( $input );
        // If the input is a positibe number, return it; otherwise, return the default.
        return ( $number ? $number : $setting->default );
    }
}



/**
 * Sanitize colors.
 *
 * @since 2.0.0
 * @param string $value The color.
 * @return string
 */
if( ! function_exists( 'cream_magazine_color_sanitize_callback' ) ) {

    function cream_magazine_color_sanitize_callback( $value ) {

        // This pattern will check and match 3/6/8-character hex, rgb, rgba, hsl, & hsla colors.
        $pattern = '/^(\#[\da-f]{3}|\#[\da-f]{6}|\#[\da-f]{8}|rgba\(((\d{1,2}|1\d\d|2([0-4]\d|5[0-5]))\s*,\s*){2}((\d{1,2}|1\d\d|2([0-4]\d|5[0-5]))\s*)(,\s*(0\.\d+|1))\)|hsla\(\s*((\d{1,2}|[1-2]\d{2}|3([0-5]\d|60)))\s*,\s*((\d{1,2}|100)\s*%)\s*,\s*((\d{1,2}|100)\s*%)(,\s*(0\.\d+|1))\)|rgb\(((\d{1,2}|1\d\d|2([0-4]\d|5[0-5]))\s*,\s*){2}((\d{1,2}|1\d\d|2([0-4]\d|5[0-5]))\s*)|hsl\(\s*((\d{1,2}|[1-2]\d{2}|3([0-5]\d|60)))\s*,\s*((\d{1,2}|100)\s*%)\s*,\s*((\d{1,2}|100)\s*%)\))$/';

        \preg_match( $pattern, $value, $matches );

        // Return the 1st match found.
        if ( isset( $matches[0] ) ) {
            if ( is_string( $matches[0] ) ) {
                return $matches[0];
            }
            if ( is_array( $matches[0] ) && isset( $matches[0][0] ) ) {
                return $matches[0][0];
            }
        }

        // If no match was found, return an empty string.
        return '';
    }
}