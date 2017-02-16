<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @name Ticket.php
 * @author Somkit Thap-arsa
 */
class Ticket extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // Load ticket model
        $this->load->model("Ticket_model", "ticket");
        // Load Logging Model
        $this->load->model("Logging_model", "logging");

        if(empty($this->session->userdata('id')))
        {
            $this->session->set_flashdata('flash_data', 'You don\'t have access!');
            redirect('login');
        }
    }

    // it should be something else ex. profile, dashboard etc.
    // for now is listing all ticket
    public function index()
    {
        $data['count_my_pticket'] = $this->ticket->count_picked($this->session->userdata('id'));
        // data passing to view
        $data['page_title'] = "OPENTicket 1.0 | Ticket Listing";
        $data['active_menu'] = "ticket";

        // request data to model
        $data['records'] = $this->ticket->list_all_acitve();

        // load the view
        $this->load->view('head', $data);
        $this->load->view('aside', $data);
        $this->load->view('body_ticket', $data);
        $this->load->view('footer');
    }

    // List picked ticket
    public function my_picked()
    {
        // setup basic page property
        $data['page_title'] = "OPENTicket 1.0 | Ticket Listing";
        $data['active_menu'] = "ticket";

        $data['count_my_pticket'] = $this->ticket->count_picked($this->session->userdata('id'));

        // load data from model
        $data['records'] = $this->ticket->my_picked($this->session->userdata('id'));

        // load the view
        $this->load->view('head', $data);
        $this->load->view('aside', $data);
        $this->load->view('body_my_picked', $data);
        $this->load->view('footer');
    }

    // Show detail of the ticket
    public function details()
    {
        // load data from model
        // count no of picked ticket
        $data['count_my_pticket'] = $this->ticket->count_picked($this->session->userdata('id'));

        $data['page_title'] = "OPENTicket 1.0 | Ticket Listing";
        $data['active_menu'] = "ticket";

        // query this ticket
        $data['records'] = $this->ticket->details($this->uri->segment('3'));

        // load the view
        $this->load->view('head', $data);
        $this->load->view('aside', $data);
        $this->load->view('body_ticket_details', $data);
        $this->load->view('footer');

    }

    // Book the ticket when staff "Pick Ticket"
    public function pick()
    {
        $ticket_id  = $this->input->post('ticket_id');
        $t_state    = $this->ticket->get_state($ticket_id);
        $user_id    = $this->session->userdata('id');

        if(!$this->ticket->already_pick($user_id, $ticket_id)){
            // check state of the ticket
            if($t_state < 4) {

                // prepare data
                $data = array(
                    'ticket_id'     => $ticket_id,
                    'user_id'       => $user_id,
                    'state_level'   => 1
                );

                if($this->ticket->pick($data)) {
                    // success loop
                    if($t_state < 2) {
                        $this->ticket->change_state_to($ticket_id, 2);
                    }

                    // ------------------------------
                    // logging
                    $data = array(
                        'ticket_id'     => $ticket_id,
                        'user_id'       => $user_id,
                        'state_level'   => 2,
                        'details'       => 'PICK TICKET'
                    );
                    $this->logging->ticket($data);

                    echo "Success: You picked it.";
                } else {
                    // fail loop
                    echo "Error: CODE3310";
                }
            }else{
                echo "Error: You can not pick this ticket on current state.";
            }

        }else{
            echo "Error: You already pick this ticket.";
        }


    }


    // Function Add New Ticket
    // Create by SKT
    public function add_new()
    {
        // Check urgently field
        $user_id = $this->session->userdata('id');
        $urgent = ($this->input->post('urgent') == 'on') ? 1 : 0;

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
            'create_by'   => $user_id,
            'subject'     => $this->input->post('ticket_subject'),
            'details'     => $this->input->post('ticket_details'),
            'state_level'       => 1,
            //'due_date'    => $due_date,
            'urgent'    => $urgent
        );

        // use save in model
        // this must return insert_id
        $ticket_id = $this->ticket->add_new($data, $due_date);

        // logging
        // ------------------------------
        // logging
        $data = array(
            'ticket_id'     => $ticket_id,
            'user_id'       => $user_id,
            'state_level'   => 1,
            'details'       => 'CREATE TICKET'
        );
        $this->logging->ticket($data);
        //$this->logging->ticket($ticket_id, $state_level, $who, $note);
        // use helpers loadded via autoload.config
        redirect('/ticket', 'refresh');

    }
}
