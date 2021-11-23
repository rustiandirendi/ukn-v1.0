<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mileadilan extends CI_Controller {

	private $idInvitation = "2"; /* Id Invitatio cek admin */

	function __construct(){
        parent::__construct();
        $this->load->model('invitation/M_Invitation');
    }

    public function index()
	{
		$data = array(
				'rsvp'	=> null,
				'id_guest'	=> 0,
				'id_invitation'	=> $this->idInvitation,	
				'name_guest'    => "",
				'address_guest' => ""
			);
		$this->load->view('invitation/mileadilan',$data);
	}

	public function guest($name)
	{
		$str = explode("-" , $name);
		$name_invite = implode(" ",$str);
		$data = array(
				'rsvp'	=> null,				
				'id_guest'	=> 0,
				'id_invitation'	=> $this->idInvitation,
				'name_guest'    => ucwords($name_invite),
				'address_guest' => "Di Tempat"
			);
		$this->load->view('invitation/mileadilan',$data);
	}

	public function get_guest($kode_guest)
	{
		$id_guest = $this->M_Invitation->IdGuest($kode_guest);
		$rsvp = $this->M_Invitation->CekRsvp($id_guest);
		$where = array('kode_guest' => $kode_guest);
		$dataquery = $this->M_Invitation->get_guest_name($where)->result();
		foreach ($dataquery as $query) {
			$data = array(
				'rsvp'	=> $rsvp,
				'kode_guest' => $kode_guest,
				'id_invitation'	=> $this->idInvitation,
				'id_guest'	=> $query->id_guest,		
				'name_guest'    => $query->name_guest,
				'address_guest' => $query->address_guest
			);
		}
		$this->load->view('invitation/mileadilan',$data);
	}


}

/* End of file Mileadilan.php */
/* Location: ./application/controllers/invitation/Mileadilan.php */