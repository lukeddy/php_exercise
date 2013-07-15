<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Email extends CI_Controller
{

    private $data;

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array("form", "url"));
        $this->load->library('email');
        $this->data["title"] = "发送邮件";
    }

    public function index()
    {

        $this->load->view("email_page", $this->data);
    }

    public function sendEmail()
    {
        //获取信息
        $from = $_POST["from"];
        $password = $_POST["password"];
        $to = $_POST["to"];
        $subject = $_POST["subject"];
        $content = $_POST["content"];

        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'smtp.163.com'; //163服务器，之前用了qq服务器死活发不出去，不知道什么原因，可以自己探索
        $config['smtp_user'] = $from; //你的邮箱账号
        $config['smtp_pass'] = $password; //你的邮箱密码
        $config['smtp_port'] = 25; //端口
        $config['wordwrap'] = TRUE;
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $config['priority'] = 1;
        $config['validate'] = TRUE;
        $this->load->library('email');
        $this->email->initialize($config);
        $this->email->from($from, '我是发件人'); //发件人
        $this->email->to($to); //收件人
        $this->email->subject($subject); //主题
        $this->email->message($content); //正文
        $this->email->attach("./uploads/funny.jpg");
        $this->email->attach("./uploads/jmx.jpg");
        if (!$this->email->send()) {
            $this->data['result'] = "邮件发送失败,可能是您的发件人或者密码填写不匹配照成";
        } else {
            $this->data['result'] = '邮件发送成功';
        }
       // echo $this->email->print_debugger();
        $this->load->view('email_page', $this->data);
    }
}