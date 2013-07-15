<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Crud extends CI_Controller
{

    private $data;

    function __construct()
    {
        parent::__construct();
        //加载数据库，如果在autoload中配置，则每次页面加载时自动创建数据库对象
        $this->load->database();
        //加载表单跟url库
        $this->load->helper(array('form', 'url'));
        $this->queryAll();
        $this->data["title"]="CI增删改查实例";
        $this->data["header"]="CodeIgniter增删改查实例";
    }

    public function index()
    {
//        $link = mysql_connect('localhost','root','v*elocIpEd');
//        if (!$link) {
//            die('Could not connect to MySQL: ' . mysql_error());
//        }
//        echo 'Connection OK'; mysql_close($link);
//        $data["isdbconnected"]="数据库链接成功！";

        $this->load->view("crud", $this->data);
    }

    public function insert(){
        $username=$_POST["username"];
        $password=$_POST["password"];
        //echo $username.",".$password;
        //$sql="insert into users(username,password) values('".$username."','".$password."')";
        //$this->db->query($sql);
        $insert_data=array(
            "username"=>$username,
            "password"=>$password
        );
        $this->db->insert("users",$insert_data);
        $this->queryAll();
        $this->data["insert_msg"]="插入成功！";
        $this->load->view("crud", $this->data);
    }
    public function update($id){
        $username=$_POST["username"];
        $password=$_POST["password"];
        echo $id.$username.$password;
        $update_sql="update users set username='".$username."' , password='".$password."' where id=".$id;
        $this->db->query($update_sql);
        $this->data["update_msg"]="修改数据成功！";
        $this->queryAll();
        $this->load->view("crud",$this->data);
    }
    public function del($id){
        echo $id;
        $delete_data=array(
            "id"=>$id
        );
        $this->db->delete("users",$delete_data);
        $this->data["delete_msg"]="删除陈功！";
        $this->queryAll();
        $this->load->view("crud",$this->data);
    }
    private function queryAll(){
        $query=$this->db->query("SELECT id,username, password FROM users");
        $this->data["result"]=$query->result();
        $this->data["result2"]=$query->result_array();
    }
}