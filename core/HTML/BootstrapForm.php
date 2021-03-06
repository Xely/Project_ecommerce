<?php

namespace Core\HTML;

class BootstrapForm extends Form
{
    /**
     * @param $name string
     * @return string
     */
    public function input($name, $label, $options = [])
    {
        $type = isset($options['type']) ? $options['type'] : 'text';
        $label = '<label>' . $label . '</label>';
        if ($type === 'textarea') {
            $input = '<textarea rows="10" name="' . $name . '" class="form-control">' . $this->getValue($name) . '</textarea>';
        } else {
            $input = '<input type ="' . $type . '" name="' . $name . '" value="' . $this->getValue($name) . '" class="form-control">';
        }
        return $this->surround($label . $input);
    }

    /**
     * @param $html string HTML Code to surround
     * @return string
     */
    protected function surround($html)
    {
        return "<div class=\"form-group\">$html</div>";
    }

    public function select($name, $label, $options)
    {
        $label = '<label>' . $label . '</label>';
        $input = '<select name="' . $name . '">';
        foreach ($options as $k => $v) {
            $attributes = '';
            if ($k == $this->getValue($name)) {
                $attributes = ' selected';
            }
            $input .= "<option value='$k'$attributes>$v</option>";
        }
        $input .= '</select>';
        return $this->surround($label . $input);
    }

    public function selectNumber($name, $label = null, $max, $select) {
        if ($label === null ) {
            $label = '';
        } else {
            $label = '<label>' . $label . '</label>';
        }
        $input = '<select style="max-width:40%;" name="' . $name . '">';
        for ($i = 1; $i < $max + 1; $i++) {
            if ($i === $select) {
                $input .= "<option value='$i' data-value='$i' selected>$i</option>";
            } else {
                $input .= "<option value='$i'>$i</option>";
            }
        }
        $input .= '</select>';
        return '<div class="input-field col">' . $input . $label . '</div>';
    }


    /**
     * @return string returns a button for a form
     */
    public function submit($text)
    {
        return $this->surround('<button type="submit" class="btn grey">' . $text . '</button>');
    }
}