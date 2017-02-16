<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @name: Ticket Model
 * @author: Somkit T.
 */
class Ticket_model extends CI_Model
{

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Add new ticket
    public function add_new($data, $due_date) {
        // ci automatically escape all for security reason
        // so ... have to force to
        // do not escape this var
        $this->db->set('due_date', $due_date, FALSE);
        $this->db->insert("ticket", $data);
        return $this->db->insert_id();
    }

    // return details of this ticket
    public function details($ticket_id) {
        $this->db->from('ticket');
        $this->db->where('id', $ticket_id);
        $query = $this->db->get();
        return $query->result();
    }

    // return number of ticket that you have picked
    public function count_picked($user_id) {
        $this->db->where('user_id', $user_id);
        $this->db->where('active', 1);
        $this->db->from('task');
        return $this->db->count_all_results();
    }

    // list tickets all
    public function list_all_acitve() {
        $this->db->select('ticket.id as id, ticket.urgent as urgent, ticket.priority as priority');
        $this->db->select('user.fname as fname, user.lname as lname, ticket.end_user as end_user');
        $this->db->select('ticket.subject as subject, ticket.details as details');
        $this->db->select('ticket.due_date as due_date');
        $this->db->from('ticket');
        $this->db->where('is_active', 1);
        $this->db->join('user', 'user.id = create_by');
        $this->db->order_by('ticket.id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    // this function be called when staff pick the ticket
    public function pick($data) {
        // check if this guy alreay pick this ticket
            return $this->db->insert("task", $data);
    }

    // return data array of my picked ticket
    public function my_picked($user_id) {
        // join between pick and ticket
        // where pick.active=1
        $this->db->select('task.id as task_id, ticket.id as ticket_id, ticket.urgent as urgent, ticket.priority as priority');
        $this->db->select('ticket.subject as subject, ticket.details as details, ticket.due_date as due_date');
        $this->db->select('ticket.end_user as end_user, ticket.state_level as ticket_state, task.state_level as task_state');
        $this->db->select('state_task.note as task_state_note');
        $this->db->from('task');
        $this->db->where('active', 1);
        //$this->db->where('state_level', 1);
        $this->db->where('user_id', $user_id);
        $this->db->join('ticket', 'ticket.id = task.ticket_id');
        $this->db->join('state_task', 'state_task.level = task.state_level');
        $this->db->order_by('task.id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_state($ticket_id) {
        $this->db->select('state_level');
        //$this->db->select('state_ticket.level as t_level');
        $this->db->from('ticket');
        //$this->db->join('state_ticket', 'state_ticket.id = state_ticket_id');
        $this->db->where('ticket.id', $ticket_id);
        $query = $this->db->get();
        //$this->db->get_where('ticket', array('ticket.id' => $ticket_id));
        return $query->row('state_level');
    }

    public function change_state_to($ticket_id, $new_state){
        // update record
        $this->db->where('id', $ticket_id);
        $this->db->update('ticket', array(
            'state_level' => $new_state
        ));
        return true;
    }

    // check if this ticket already pick by a user return true else return false
    public function already_pick($user_id, $ticket_id){
        $query = $this->db->get_where('task', array('user_id' => $user_id, 'ticket_id' => $ticket_id));
        if($query->num_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    // close connection
    function __destruct() {
        $this->db->close();
    }
}
