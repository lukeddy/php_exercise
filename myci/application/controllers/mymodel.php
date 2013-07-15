<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MyModel extends CI_Controller{

    private $data;

    function __construct()
    {
       parent::__construct();
       $this->load->helper(array("form","url"));
       $this->load->model('blog/blog_model');
       $this->data["title"]="模型操作";
        //载入模型

    }
    public function index(){
       echo "model";
       $this->load->view("model_view",$this->data);
    }
    public function select(){
        $this->data["title"]="model查询";
        $this->load->view("model_view",$this->data);
    }
}
