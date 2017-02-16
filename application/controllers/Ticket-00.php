<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @name Ticket.php
 * @author Somkit Thap-arsa
 */
class Ticket extends CI_Controller
{
    public $urgently = 'normal';

    function __construct()
    {
        parent::__construct();

        if(empty($this->session->userdata('id')))
        {
            $this->session->set_flashdata('flash_data', 'You don\'t have access!');
            redirect('login');
        }
    }

    public function index()
    {
        $query  = $this->db->get('ticket');
        $data['records'] = $query->result();
        $this->db->close();

        $this->load->view('ticket', $data);
    }

    // List picked ticket
    public function my_picked()
    {
        // setup basic page property
        $data['page_title'] = "OPENTicket 1.0 | My Picked Ticket";
        $data['active_menu'] = "ticket";

        // build the query
        // query all ticket
        $this->db->from('ticket');
        //$this->db->join('user', 'user.id = ticket.create_by', 'left');
        $this->db->order_by('create_datetime', 'desc');
        $this->db->where('is_active', 1);
        $query  = $this->db->get();
        $data['records'] = $query->result();
    }

    // Show detail of the ticket
    public function details()
    {
        $data['page_title'] = "OPENTicket 1.0 | Ticket Listing";
        $data['active_menu'] = "ticket";

        // query this ticket
        $this->db->from('ticket');
        $this->db->where('id', $this->uri->segment('3'));
        $query = $this->db->get();
        $data['records'] = $query->result();

        // load the view
        $this->load->view('head', $data);
        $this->load->view('aside', $data);
        $this->load->view('body_ticket_details', $data);
        $this->load->view('footer');

    }

    // Book the ticket when staff "Pick Ticket"
    public function pick()
    {
        // check for duplicate records
        // that mean this staff already pick once
        $this->db->from('pick');
        $this->db->where('ticket_id', $this->input->post('ticket_id'));
        $this->db->where('user_id', $this->session->userdata('id'));

        // if not exist then insert the new one
        if($this->db->count_all_results() < 1)
        {
            $data = array(
                'ticket_id' => $this->input->post('ticket_id'),
                'user_id'   => $this->session->userdata('id')
            );

            $this->db->insert("pick", $data);
        }

        // go back home
        redirect('/home', 'refresh');

    }

    // Function Add New Ticket
    // Create by SKT
    public function add_new()
    {

      // Check urgently field
      if($this->input->post('urgently') == 'on')
      {
          $this->urgently = 'urgent';
      }

      // Check attached
      // Upload it into DB

      // Check Due due_date
      switch($this->input->post('due')) {
        case "3h":
          $due_date = 'NOW() + INTERVAL 3 HOUR';
          break;
        case "6h":
          $due_date = 'NOW() + INTERVAL 6 HOUR';
          break;
        case "24h":
          $due_date = 'NOW() + INTERVAL 1 DAY';
          break;
        case "3d":
          $due_date = 'NOW() + INTERVAL 3 DAY';
          break;
        case "7d":
          $due_date = 'NOW() + INTERVAL 7 DAY';
          break;
      }


      // Save them all into DB
      $data = array(
          'create_by'   => $this->session->userdata('id'),
          'subject'     => $this->input->post('ticket_subject'),
          'details'     => $this->input->post('ticket_details'),
          //'due_date'    => $due_date,
          'urgently'    => $this->urgently
      );

      // ci automatically escape all for security reason
      // so ... have to force to
      // do not escape this var
      $this->db->set('due_date', $due_date, FALSE);
      $this->db->insert("ticket", $data);

      // use helpers loadded via autoload.config
      redirect('/home', 'refresh');

    }
}
