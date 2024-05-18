<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Questions extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('question_model');
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index()
    {
        if (!$this->session->userdata('user_id')) {
            redirect('users/login');
        }

        $data['questions'] = $this->question_model->get_questions();
        $this->load->view('templates/header');
        $this->load->view('questions/index', $data);
        $this->load->view('templates/footer');
    }

    public function submit()
    {
        if (!$this->session->userdata('user_id')) {
            redirect('users/login');
        }

        $question = $this->input->post('question');
        $data = array(
            'question' => $question,
            'user_id' => $this->session->userdata('user_id'),
            'created_at' => date('Y-m-d H:i:s')
        );

        $this->question_model->submit_question($data);
        redirect('questions');
    }

    public function upvote($question_id)
    {
        if (!$this->session->userdata('user_id')) {
            redirect('users/login');
        }

        $this->question_model->upvote_question($question_id);
        echo json_encode(array('status' => 'success'));
    }

    public function downvote($question_id)
    {
        if (!$this->session->userdata('user_id')) {
            redirect('users/login');
        }

        $this->question_model->downvote_question($question_id);
        echo json_encode(array('status' => 'success'));
    }
}
