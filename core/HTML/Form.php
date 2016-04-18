<?php

namespace Core\HTML;

/**
 * Class Form
 * Allows generation of a form
 */
class Form
{
    /**
     * @var string tag used to surround inputs
     */
    public $surround = 'p';
    /**
     * @var array data used by the form
     */
    protected $data;

    /**
     * Form constructor.
     * @param array $data data used by the form
     */
    public function __construct($data = array())
    {
        $this->data = $data;
    }

    /**
     * @param $name string
     * @return string
     */
    public function input($name, $label, $options = [])
    {
        $type = isset($options['type']) ? $options['type'] : 'text';
        return $this->surround(
            '<input type ="' . $type . '" name="' . $name . '" value="' . $this->getValue($name) . '">'
        );
    }

    /**
     * @param $html string HTML Code to surround
     * @return string
     */
    protected function surround($html)
    {
        return "<{$this->surround}>$html</{$this->surround}>";
    }

    /**
     * @param $index string index of the value needed to be returned
     * @return null
     */
    protected function getValue($index)
    {
        if (is_object($this->data)) {
            return $this->data->$index;
        }
        return isset($this->data[$index]) ? $this->data[$index] : null;
    }

    /**
     * @return string returns a button for a form
     */
    public function submit()
    {
        return $this->surround('<button type="submit">Envoyer</button>');
    }
}