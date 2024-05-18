<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Answer_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function submit_answer($data)
    {
        return $this->db->insert('answers', $data);
    }

    public function get_answers_by_question($question_id)
    {
        $this->db->where('question_id', $question_id);
        $query = $this->db->get('answers');
        return $query->result_array();
    }
}
