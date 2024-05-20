<?php
class Answer_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_answers($question_id)
    {
        $query = $this->db->get_where('answers', array('question_id' => $question_id));
        return $query->result_array();
    }

    public function submit_answer($data)
    {
        return $this->db->insert('answers', $data);
    }

    public function upvote_answer($answer_id)
    {
        $this->db->set('upvotes', 'upvotes+1', FALSE);
        $this->db->where('id', $answer_id);
        return $this->db->update('answers');
    }

    public function downvote_answer($answer_id)
    {
        $this->db->set('downvotes', 'downvotes+1', FALSE);
        $this->db->where('id', $answer_id);
        return $this->db->update('answers');
    }
}
