<?php defined('SYSPATH') or die('No direct script access.');

class Form extends Kohana_Form {
	
	/**
	 * Creates a checkbox form input.
	 *
	 *     echo Form::checkbox('like_cats', 1, $cats);
	 *     echo Form::checkbox('like_cats', 0, ! $cats);
	 *
	 * @param   string   input name
	 * @param   string   input value
	 * @param   boolean  checked status
	 * @param   array    html attributes
	 * @return  string
	 * @uses    Form::input
	 */
	public static function checkboxes($name, array $options = NULL, $checked = FALSE, array $attributes = NULL)
	{
		
		if (empty($options))
		{
			// There are no options
			return '';
		}
		
		$checkboxes = '';
		foreach ($options as $_value => $_title)
		{
			$attribute = $attributes;
			$attribute['type'] = 'checkbox';
			// Force value to be string
			$_value = (string) $_value;

			if ($_value == $checked)
			{
				$attribute['checked'] = 'checked';
			}
			$checkboxes .= Form::input($name, $_value, $attribute) . $_title. '&nbsp;&nbsp;';
		}
		return $checkboxes;
	}
	/**
	 * Creates a radio form input.
	 *
	 *     echo Form::radio('like_cats', 1, $cats);
	 *     echo Form::radio('like_cats', 0, ! $cats);
	 *
	 * @param   string   input name
	 * @param   string   input value
	 * @param   boolean  checked status
	 * @param   array    html attributes
	 * @return  string
	 * @uses    Form::input
	 */
	public static function radios($name, array $options = NULL, $checked = FALSE, array $attributes = NULL)
	{
		
		if (empty($options))
		{
			// There are no options
			return '';
		}
		
		$radios = '';
		foreach ($options as $_value => $_title)
		{
			$attribute = $attributes;
			$attribute['type'] = 'radio';
			// Force value to be string
			$_value = (string) $_value;

			if ($_value == $checked)
			{
				$attribute['checked'] = 'checked';
			}
			$radios .= '<label>'.Form::input($name, $_value, $attribute) . $_title. '</label>&nbsp;&nbsp;';
		}
		return $radios;
	}
}
