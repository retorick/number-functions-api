<?php
class Output {
    protected $_data;

    public function output($outmode = 'text')
    {
        $host = $_SERVER['HTTP_HOST'];
        $outmode = substr($host, 0, strpos($host, '.'));

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
        $callback = $_GET['callback'];
        print $callback . "($output)";
    }

    private function _output_default()
    {
        $output = $this->_data;
        
        print '<pre>';
        print_r($output);
        print '</pre>';
    }
}

?>

