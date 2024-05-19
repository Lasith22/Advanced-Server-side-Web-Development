<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Answers extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('answer_model');
        $this->load->model('question_model');
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index($question_id)
    {
        if (!$this->session->userdata('user_id')) {
            redirect('users/login');
        }

        $data['question'] = $this->question_model->get_question_by_id($question_id);
        $data['answers'] = $this->answer_model->get_answers_by_question($question_id);
        $this->load->view('templates/header');
        $this->load->view('answers/index', $data);
        $this->load->view('templates/footer');
    }

    public function submit()
    {
        if (!$this->session->userdata('user_id')) {
            redirect('users/login');
        }

        $question_id = $this->input->post('question_id');
        $answer = $this->input->post('answer');
        $data = array(
            'question_id' => $question_id,
            'user_id' => $this->session->userdata('user_id'),
            'answer' => $answer,
            'created_at' => date('Y-m-d H:i:s')
        );

        $this->answer_model->submit_answer($data);
        redirect('answers/index/' . $question_id);
    }

    public function upvote($answer_id)
    {
        if (!$this->session->userdata('user_id')) {
            redirect('users/login');
        }

        $this->answer_model->upvote_answer($answer_id);
        echo json_encode(array('status' => 'success'));
    }

    public function downvote($answer_id)
    {
        if (!$this->session->userdata('user_id')) {
            redirect('users/login');
        }

        $this->answer_model->downvote_answer($answer_id);
        echo json_encode(array('status' => 'success'));
    }
}
