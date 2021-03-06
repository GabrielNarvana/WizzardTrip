<?php
if ( ! defined( 'ABSPATH' ) ) {
	die();
}

/**
 * Class Forminator_Calculation
 *
 * @since 1.7
 */
class Forminator_Calculation extends Forminator_Field {

	/**
	 * @var string
	 */
	public $name = '';

	/**
	 * @var string
	 */
	public $slug = 'calculation';

	/**
	 * @var string
	 */
	public $type = 'calculation';

	/**
	 * @var int
	 */
	public $position = 11;

	/**
	 * @var array
	 */
	public $options = array();

	/**
	 * @var string
	 */
	public $category = 'standard';

	/**
	 * @var bool
	 */
	public $is_input = false;

	/**
	 * @var bool
	 */
	public $has_counter = false;

	/**
	 * @var string
	 */
	public $icon = 'sui-icon-calculator';

	public $is_calculable = true;

	/**
	 * Forminator_Text constructor.
	 *
	 * @since 1.7
	 */
	public function __construct() {
		parent::__construct();

		$this->name = __( 'Calculations', 'forminator' );
	}

	/**
	 * Field defaults
	 *
	 * @since 1.7
	 * @return array
	 */
	public function defaults() {
		return array(
			'field_label' => __( 'Calculations', 'forminator' ),
		);
	}

	/**
	 * Field front-end markup
	 *
	 * @since 1.7
	 *
	 * @param $field
	 * @param $settings
	 *
	 * @return mixed
	 */
	public function markup( $field, $settings = array() ) {

		$this->field         = $field;
		$this->form_settings = $settings;

		$this->init_autofill( $settings );

		$html        = '';
		$wrapper     = array();
		$id          = self::get_property( 'element_id', $field );
		$name        = $id;
		$id          = $id . '-field';
		$required    = self::get_property( 'required', $field, false );
		$value       = esc_html( self::get_post_data( $name, self::get_property( 'default_value', $field ) ) );
		$label       = esc_html( self::get_property( 'field_label', $field, '' ) );
		$description = self::get_property( 'description', $field, '' );
		$design      = $this->get_form_style( $settings );
		$formula     = self::get_property( 'formula', $field, '', 'str' );
		$is_hidden   = self::get_property( 'hidden', $field, false, 'bool' );
		$suffix      = self::get_property( 'suffix', $field );
		$prefix      = self::get_property( 'prefix', $field );
		$precision   = $this->get_calculable_precision( array(), $field );

		$number_attr = array(
			'type'            => 'number',
			'name'            => $name,
			'value'           => $value,
			'id'              => $id,
			'class'           => 'forminator-calculation',
			'data-formula'    => $formula,
			'data-required'   => $required,
			'data-precision'  => $precision,
			'data-is-hidden'  => $is_hidden,
			'disabled'        => 'disabled', // mark as disabled so this value won't send to backend later
		);

		if ( empty( $prefix ) && empty( $suffix ) ) {
			$number_attr['class'] .= ' forminator-input';
		}

		if ( ! empty( $prefix ) || ! empty( $suffix ) ) {
			$wrapper = array(
				'<div class="forminator-input forminator-input-with-prefix">',
				sprintf( '<span class="forminator-suffix">%s</span></div>', $suffix ),
				'',
				$prefix,
			);
		}

		$html .= '<div class="forminator-field">';

			$html .= self::create_input(
				$number_attr,
				$label,
				$description,
				$required,
				$design,
				$wrapper
			);

		$html .= '</div>';

		return apply_filters( 'forminator_field_calculation_markup', $html, $id, $required, $value );
	}

	/**
	 * Return field inline validation rules
	 *
	 * @since 1.7
	 * @return string
	 */
	public function get_validation_rules() {
		return '';
	}

	/**
	 * Return field inline validation errors
	 *
	 * @since 1.7
	 * @return string
	 */
	public function get_validation_messages() {
		return '';
	}

	/**
	 * Sanitize data
	 *
	 * @since 1.7
	 *
	 * @param array        $field
	 * @param array|string $data - the data to be sanitized
	 *
	 * @return array|string $data - the data after sanitization
	 */
	public function sanitize( $field, $data ) {
		// Sanitize
		$data = forminator_sanitize_field( $data );

		return apply_filters( 'forminator_field_calculation_sanitize', $data, $field );
	}

	/**
	 * @since 1.7
	 * @inheritdoc
	 */
	public function get_calculable_value( $submitted_data, $field_settings ) {
		$formula = self::get_property( 'formula', $field_settings, '', 'str' );

		/**
		 * Filter formula being used on calculable value of calculation field
		 *
		 * @since 1.7
		 *
		 * @param string $formula
		 * @param array  $submitted_data
		 * @param array  $field_settings
		 *
		 * @return string|int|float formula, or hardcoded value
		 */
		$formula = apply_filters( 'forminator_field_calculation_calculable_value', $formula, $submitted_data, $field_settings );

		if ( empty( $formula ) ) {
			return 0.0;
		}

		return $formula;
	}

	/**
	 *
	 * @since 1.7
	 * @inheritdoc
	 */
	public function get_calculable_precision( $submitted_data, $field_settings ) {
		$precision = self::get_property( 'precision', $field_settings, 2, 'num' );

		/**
		 * Filter precision being used on calculable value
		 *
		 * @since 1.7
		 *
		 * @param int|float $precision
		 * @param array     $submitted_data
		 * @param array     $field_settings
		 *
		 * @return int|float number precision casted into integer later
		 */
		$precision = apply_filters( 'forminator_field_calculation_calculable_precision', $precision, $submitted_data, $field_settings );

		$precision = (int) $precision;

		return $precision;
	}

	/**
	 * Get default error message
	 *
	 * @since 1.7
	 *
	 * @return string
	 */
	public static function default_error_message() {
		$message = __( 'Failed to calculate field.', 'forminator' );

		/**
		 * Filter default error message
		 *
		 * @since 1.7
		 *
		 * @param string $message
		 *
		 * @return string
		 */
		$message = apply_filters( 'forminator_field_calculation_default_error_message', $message );

		return $message;
	}

	/**
	 * Get converted formula
	 * replace variable with submitted data
	 * expand nested calculation
	 *
	 * @since 1.7
	 *
	 * @param array                        $submitted_data
	 * @param array                        $field_settings
	 *
	 * @param Forminator_Form_Model $custom_form
	 *
	 * @return string
	 */
	public function get_converted_formula( $submitted_data, $field_settings, $custom_form, $hidden_fields = array() ) {
		$formula           = $this->get_calculable_value( $submitted_data, $field_settings );
		$converted_formula = forminator_calculator_maybe_replace_fields_on_formula( $formula, $submitted_data, $custom_form, $hidden_fields );

		/**
		 * Filter converted formula from calculation field
		 *
		 * @since 1.7
		 *
		 * @param string                       $converted_formula
		 * @param array                        $field_settings
		 * @param array                        $submitted_data
		 * @param Forminator_Form_Model $custom_form
		 */
		$converted_formula = apply_filters( 'forminator_field_calculation_converted_formula', $converted_formula, $field_settings, $submitted_data, $custom_form );

		return $converted_formula;
	}

	/**
	 * Get calculated value
	 *
	 * @since 1.7
	 *
	 * @param string $converted_formula
	 * @param array  $submitted_data
	 * @param array  $field_settings
	 *
	 * @return double
	 * @throws Forminator_Calculator_Exception
	 */
	public function get_calculated_value( $converted_formula, $submitted_data, $field_settings ) {
		$has_paypal = false;
		$precision = $this->get_calculable_precision( $submitted_data, $field_settings );

		$calculator = new Forminator_Calculator( $converted_formula );
		$calculator->set_is_throwable( true );

		$result = $calculator->calculate();

		$result = floatval( $result );

		// Check if has paypal
		foreach ( $submitted_data as $key => $val ) {
			if ( false !== strpos( $key, 'paypal-' ) ) {
				$has_paypal = true;
			}
		}

		if ( $has_paypal ) {
			$result = round( $result, $precision, PHP_ROUND_HALF_DOWN );
		} else {
			$result = round( $result, $precision );
		}

		if ( is_finite( $result ) && $precision > 0 ) {
			$result = number_format( $result, $precision, '.', ',' );
		}

		/**
		 * Filter Calculated value of calculation field
		 *
		 * @since 1.7
		 *
		 * @param double $result
		 * @param string $converted_formula
		 * @param array  $submitted_data
		 * @param array  $field_settings
		 */
		$result = apply_filters( 'forminator_field_calculation_calculated_value', $result, $converted_formula, $submitted_data, $field_settings );

		return $result;
	}
}
