<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Layout library
 *
 * @author localdisk
 */
class Layout {

    /**
     * ci
     *
     * @var Codeigniter
     */
    private $_ci;
    /**
     * data
     *
     * @var array
     */
    private $_data = array();
    /**
     * layout
     *
     * @var string
     */
    private $_layout;

    /**
     * constructor
     *
     * @param string $layout
     */
    public function __construct($layout = 'layout/main') {
        $this->_ci = get_instance();
        $this->_layout = $layout;
    }

    /**
     * setLayout
     *
     * @param string $layout
     */
    public function setLayout($layout) {
        $this->_layout = $layout;
        return $this;
    }

    /**
     * write
     *
     * @param string $key
     * @param string $value
     */
    public function write($key, $value) {
        $this->_data[$key] = $value;
        return $this;
    }

    /**
     * render
     *
     * @param  boolean $ret
     * @return string
     */
    public function render($ret = FALSE) {
        if ($ret === TRUE) {
            $out = $this->_ci->load->view($this->_layout, $this->_data, $ret);
            return  $out;
        }
        $this->_ci->load->view($this->_layout, $this->_data);
    }
}