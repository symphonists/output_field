<?php

if (!defined('__IN_SYMPHONY__')) die('<h2>Symphony Error</h2><p>You cannot directly access this file</p>');

require_once(TOOLKIT . '/fields/field.input.php');

class FieldOutput extends FieldInput
{
    /*------------------------------------------------------------------------*/
    /* DEFINITION & SETTINGS
    /*------------------------------------------------------------------------*/

    /**
     * CONSTRUCT
     *
     * Constructor for the Field object
     *
     * http://www.getsymphony.com/learn/api/2.4/toolkit/field/#__construct
     *
     * @since version 1.0.0
     */

    public function __construct()
    {
        // call the parent constructor
        parent::__construct();

        // set the name of the field
        $this->_name = __('Text Output');
    }

    /*------------------------------------------------------------------------*/
    /* DATA SOURCE
    /*------------------------------------------------------------------------*/

    /**
     * APPEND FORMATTED ELEMENT
     *
     * Appends data into the XML tree of a Data Source
     *
     * http://www.getsymphony.com/learn/api/2.4/toolkit/field/#appendFormattedElement
     *
     * @since version 1.0.0
     */

    public function appendFormattedElement(XMLElement &$wrapper, $data, $encode = false, $mode = NULL, $entry_id = NULL)
    {
        include(TOOLKIT . '/util.validators.php');

        if ($this->get('apply_formatting') == 'yes' && isset($data['value_formatted'])) {
            $value = $data['value_formatted'];
        } else {
            $value = $data['value'];
        }

        $value = General::sanitize($value);

        // E-Mail
        if ($this->get('validator') == $validators['email']) {
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
