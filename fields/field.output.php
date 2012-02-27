<?php

	/**
	 * @package output_field
	 */
	/**
	 * Advanced data source output for input fields.
	 */
	if (!defined('__IN_SYMPHONY__')) die('<h2>Symphony Error</h2><p>You cannot directly access this file</p>');

	require_once(TOOLKIT . '/fields/field.input.php');

	class FieldOutput extends FieldInput {

		public function __construct(){
			parent::__construct();
			$this->_name = __('Text Output');
			$this->_required = true;
			
			$this->set('required', 'no');
		}


	/*-------------------------------------------------------------------------
		Output:
	-------------------------------------------------------------------------*/

		/**
		 * @see http://symphony-cms.com/learn/api/2.3/toolkit/field/#appendFormattedElement
		 */
		function appendFormattedElement(&$wrapper, $data, $encode=false){
			
			include(TOOLKIT . '/util.validators.php');

			if($this->get('apply_formatting') == 'yes' && isset($data['value_formatted'])) $value = $data['value_formatted'];
			else $value = $data['value'];
			
			$value = General::sanitize($value);

			// E-Mail
			if($this->get('validator') == $validators['email']) {
				$mail = explode('@', $value);
				$attributes = array(
					'alias' => $mail[0],
					'domain' => $mail[1],
					'hash' => md5(strtolower($value))
				);
 			}
 			
 			// URI
			elseif($this->get('validator') == $validators['URI']) {
				$attributes = parse_url($value);
			}
			
			// Other input
 			else {
				$attributes = array(
					'handle' => $data['handle']
				);
 			}
			
			$wrapper->appendChild(new XMLElement($this->get('element_name'), ($encode ? General::sanitize($value) : $value), $attributes));
		}
		
	}
