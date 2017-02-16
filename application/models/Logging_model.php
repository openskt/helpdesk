<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @name: Ticket Model
 * @author: Somkit T.
 */
class Logging_model extends CI_Model
{

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Logging for ticket
    public function ticket($data) {
        // ci automatically escape all for security reason
        // so ... have to force to
        // do not escape this var
        return $this->db->insert("log_ticket", $data);
        //$this->db->set('due_date', $due_date, FALSE);
        //return $this->db->insert("ticket", $data);
    }

    public function task($data) {
        return $this->db->insert("log_task", $data);
    }

    // close connection
    function __destruct() {
        $this->db->close();
    }
}
