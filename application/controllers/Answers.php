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
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index($question_id)
    {
        $data['question'] = $this->question_model->get_question_by_id($question_id);
        $data['answers'] = $this->answer_model->get_answers($question_id);

        if (empty($data['question'])) {
            show_404();
        }

        $this->load->view('templates/header');
        $this->load->view('answers/index', $data);
        $this->load->view('templates/footer');
    }

    public function submit($question_id)
    {
        $this->form_validation->set_rules('answer', 'Answer', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->index($question_id);
        } else {
            $answer = $this->input->post('answer');

            $data = array(
                'answer' => $answer,
                'question_id' => $question_id
            );

            if ($this->answer_model->submit_answer($data)) {
                $this->session->set_flashdata('answer_submitted', 'Your answer has been submitted');
                redirect('answers/index/' . $question_id);
            } else {
                $this->session->set_flashdata('submission_failed', 'Answer submission failed, please try again');
                $this->index($question_id);
            }
        }
    }
    public function upvote($answer_id)
    {
        $this->answer_model->upvote_answer($answer_id);
        echo json_encode(array('status' => 'success'));
    }

    public function downvote($answer_id)
    {
        $this->answer_model->downvote_answer($answer_id);
        echo json_encode(array('status' => 'success'));
    }
}
