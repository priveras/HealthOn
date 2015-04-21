<?php

class Main_model extends CI_Model{

	public function can_log_in()
	{
		$this->db->where('username', $this->input->post('username'));
		$this->db->where('password', md5($this->input->post('password')));

		$query = $this->db->get('admins');

		if($query->num_rows() == 1)
		{
			$row = $query->row();

			$this->session->set_userdata('admin_id', $row->id);
			$this->session->set_userdata('admin_full_name', $row->full_name);
			$this->session->set_userdata('admin_permission', $row->permission);

			return true;
		}
		else
		{
			return false;
		}
	}

	public function get_clients()
	{
		$this->db->select('*');
		$this->db->from('clients');
		$this->db->join('clients_program', 'clients_program.client_id = clients.id');
		$this->db->order_by('full_name', 'asc'); 

		$query = $this->db->get();

		return $query->result_array();
	}

	public function add_to_db($table, $data)
	{
		$this->db->insert($table, $data);
		$last_id = $this->db->insert_id();

		return $last_id;
	}

	public function add_client_program_to_db($client_id, $program)
	{
		$data = array(
			'client_id' => $client_id,
			'program' => $program
			);

		$this->db->insert('clients_program', $data);
	}

	public function update_client_program_to_db($client_id, $program)
	{
		$data = array(
			'client_id' => $client_id,
			'program' => $program
			);
		$this->db->where('client_id', $client_id);
		$this->db->where('program', $program);
		$this->db->update('clients_program', $data);
	}

	public function get_client($client_id)
	{
		$this->db->where('id', $client_id);
		$query = $this->db->get('clients');

		return $query->result_array();
	}

	public function add_payment_to_db($table, $data_payment)
	{
		$this->db->insert($table, $data_payment);
	}

	public function update_to_db($table, $data, $post_id)
	{
		$this->db->where('id', $post_id);
		$this->db->update($table, $data);
	}

	public function update_payment_to_db($table, $data_payment, $post_id)
	{
		$this->db->where('appointment_id', $post_id);
		$this->db->update($table, $data_payment);
	}

	public function get_appointments($client_id)
	{
		$this->db->select('*');
		$this->db->from('appointments');
		$this->db->where('appointments.client_id', $client_id);
		$this->db->order_by("appointments.datetime", "asc"); 
		$this->db->join('payments', 'payments.appointment_id = appointments.id');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function get_appointment($client_id, $post_id)
	{
		$this->db->select('*');
		$this->db->from('appointments');
		$this->db->where('appointments.client_id', $client_id);
		$this->db->where('appointments.id', $post_id);
		$this->db->join('payments', 'payments.appointment_id = appointments.id');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function get_appointments_day()
	{
		$date = date('Y-m-d');
		$sql = sprintf("SELECT a.datetime, a.client_id, a.category, c.id, c.full_name, cp.program, cp.client_id
			FROM  appointments a
			JOIN clients c ON c.id = a.client_id
			JOIN clients_program cp ON cp.client_id = a.client_id
			WHERE CAST(datetime as DATE) = '" . $date . "' ");

		$query = $this->db->query($sql);

		return $query->result_array();

	}

	public function get_calendar()
	{
		$this->db->select('*');
		$this->db->from('appointments');
		$this->db->join('clients', 'clients.id = appointments.client_id');
		$this->db->join('clients_program', 'clients_program.id = appointments.client_id');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function get_team()
	{
		$query = $this->db->get('admins');

		return $query->result_array();
	}

	public function get_total_clients()
	{
		$query = $this->db->get('clients');
		return $query->num_rows();
	}
}





