<?php
class Output {
    protected $_debug;
    protected $_data;
    protected $_title;
    protected $_template;
    private $_host;

    public function __construct()
    {
        $this->_title = 'Another Avocational Arithmophile Adventure';
        $this->_template = null;
    }

    public function output()
    {
        $this->_debug = true;
        $this->_host = $_SERVER['HTTP_HOST'];
        $outmode = substr($this->_host, 0, strpos($this->_host, '.'));

        switch ($outmode) {
            case 'json':
                $this->_output_json();
                break;
            default:
                $this->_output_default();
        }
    }

    private function _output_json()
    {
        $output = json_encode($this->_data);
        $callback = isset($_GET['callback']) ? $_GET['callback'] : 'arithmophile';
        print $callback . "($output); console.log(this);";
    }

    private function _output_default()
    {
        global $app;
        $output = array_merge(array('title' => $this->_title, 'data' => $this->_data));
        
        if ($this->_template) {
            $app->render($this->_template, $output);
            if ($this->_debug) {
                print '<pre>';
                print_r($this->_data);
                print '</pre>';
            }
        }
        else {
            print '<pre>';
            print_r($output);
            print '</pre>';
        }
    }
}

?>

