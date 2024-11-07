<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Template
{
	var $template_data = array();

	function set($name, $value)
	{
		$this->template_data[$name] = $value;
	}

	function load($template = '', $view = '', $view_data = array(), $return = FALSE)
	{
		$this->CI = &get_instance();
		$this->set('contents', $this->CI->load->view($view, $view_data, TRUE));
		return $this->CI->load->view($template, $this->template_data, $return);
	}

	function add_script($script)
	{
		if (!isset($this->template_data['additional_js'])) {
			$this->template_data['additional_js'] = '';
		}
		$this->template_data['additional_js'] .= $script . "\n";
	}

	function add_style($style)
	{
		if (!isset($this->template_data['additional_css'])) {
			$this->template_data['additional_css'] = '';
		}
		$this->template_data['additional_css'] .= $style . "\n";
	}

	function print_scripts()
	{
		if (isset($this->template_data['additional_js'])) {
			echo $this->template_data['additional_js'];
		}
	}

	function print_styles()
	{
		if (isset($this->template_data['additional_css'])) {
			echo $this->template_data['additional_css'];
		}
	}
}



/* End of file Template.php */
/* Location: ./system/application/libraries/Template.php */