<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends CI_Controller{

    private $data;

    function __construct()
    {
        parent::__construct();
       $this->load->helper(array("form","url"));
       $this->data["title"]="文件上传";
    }
    public function index(){
        $this->data["error"]="";
        $this->load->view("upload_page",$this->data);
    }
    public function uploadFile(){

        echo "upload file";
        //"."表示应用根目录
        //echo dirname(".");
        //echo dirname(__FILE__);
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '1000';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload())
        {
            $this->data["error"]=  $this->upload->display_errors();
            $this->load->view('upload_page', $this->data);
        }
        else
        {
            $img_url=base_url("/uploads/".$this->upload->file_name);
            echo $img_url;
            $this->data["img_url"]=$img_url;
            $this->data["upload_data"] = $this->upload->data();
            $this->load->view('upload_page', $this->data);
        }
    }
}
