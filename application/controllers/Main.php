<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('template');
		$this->load->model('main_model');
		if( ! $this->session->userdata('is_logged_in'))
		{ 
			$allowed = array(
				'home',
				'login_validation',
				);
			if($this->uri->uri_string() != '' && ! in_array($this->router->fetch_method(), $allowed))
			{
				redirect('');
			}
		}
	}

	public function index()
	{
		$this->home();
	}


	public function home()
	{
		$this->load->view('login');
	}

	public function logout()
	{
		unset($this->session->userdata); 
		$this->session->sess_destroy();
		redirect('');
	}

	public function dashboard()
	{
		$data['appointments'] = $this->main_model->get_appointments_day();
		$data['team'] = $this->main_model->get_team();
		$data['clients'] = $this->main_model->get_total_clients();
		$this->load->view('html');
		$this->load->view('dashboard', $data);
	}

	public function calendar()
	{
		$this->load->view('html');
		$this->load->view('calendar');
	}

	// public function clients()
	// {
	// 	$data['clients'] = $this->main_model->get_clients();
	// 	$this->load->view('html');
	// 	$this->load->view('clients', $data);
	// }

	public function clients()
	{
		$this->load->view('html');
		$this->load->view('clients_angular');
	}

	public function add_client()
	{
		$this->load->view('html');
		$this->load->view('add_client');
	}

	public function detail($client_id, $program, $source)
	{
		$data['client'] = $this->main_model->get_client($client_id);
		$data['appointments'] = $this->main_model->get_appointments($client_id);
		$data['program'] = $program;
		$data['source'] = $source;
		$this->load->view('html');
		$this->load->view('detail', $data);	
	}

	public function add_view($client_id, $program, $view)
	{
		$data['client'] = $this->main_model->get_client($client_id);
		$data['appointments'] = $this->main_model->get_appointments($client_id);
		$data['program'] = $program;
		$this->load->view('html');
		$this->load->view($view, $data);	
	}

	public function edit_view($client_id, $program, $view, $post_id)
	{
		$data['client'] = $this->main_model->get_client($client_id);
		$data['appointment'] = $this->main_model->get_appointment($client_id, $post_id);
		$data['program'] = $program;
		$this->load->view('html');
		$this->load->view($view, $data);	
	}

	public function edit_client_view($client_id, $program)
	{
		$data['client'] = $this->main_model->get_client($client_id);
		$data['program'] = $program;
		$this->load->view('html');
		$this->load->view('edit_client', $data);		
	}

	public function login_validation()
	{

		$this->form_validation->set_rules('username', 'Username', 'required|trim|callback_validate_credentials');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if($this->form_validation->run())
		{
			$this->session->set_userdata('is_logged_in', 1);
			redirect('main/clients');
		}
		else
		{
			$this->session->set_userdata('error', 'Esos datos no son validos');
			redirect('');
		}
	}

	public function validate_credentials()
	{
		if($this->main_model->can_log_in())
		{
			return true;
		}
		else
		{
			$this->form_validation->set_message('validate_credentials', 'Incorrect username/password.');
			return false;
		}
	}

	public function add_client_to_db()
	{
		$this->form_validation->set_rules('full_name', 'Nombre completo', 'required|trim');
		$this->form_validation->set_rules('address', 'Dirección', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[clients.email]');
		$this->form_validation->set_rules('phone', 'Teléfono', 'trim');
		$this->form_validation->set_rules('cellphone', 'Celular', 'trim');
		$this->form_validation->set_rules('name_invoice', 'Nombre', 'trim');
		$this->form_validation->set_rules('address_invoice', 'Nombre', 'trim');
		$this->form_validation->set_rules('rfc', 'RFC', 'trim');
		$this->form_validation->set_rules('program', 'Dirección', 'required|trim');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_message('is_unique', 1);

		if($this->form_validation->run())
		{
			if($this->input->post('program') != 'error')
			{
				$data = array(
				'full_name' => $this->input->post('full_name'),
				'address' => $this->input->post('address'),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
				'cellphone' => $this->input->post('cellphone'),
				'name_invoice' => $this->input->post('rfc'),
				'address_invoice' => $this->input->post('rfc'),
				'rfc' => $this->input->post('rfc'),
				);

				$program = $this->input->post('program');

				$client_id = $this->main_model->add_to_db('clients', $data);
				$this->main_model->add_client_program_to_db($client_id, $program);
				redirect('main/detail/' . $client_id . '/'. $program . '/' . 'clients');
				
			}
			else
			{
				$this->session->set_userdata('error', 'Es necesario escoger un programa');
				$this->add_client();
			}
		}
		else
		{
			$this->session->set_userdata('error', 'Se deben de llenar todos los campos');
			$this->add_client();
		}
	}

	public function add_appointments_to_db($client_id)
	{
		$program = $this->input->post('program');
		$view = $this->input->post('view');

		$this->form_validation->set_rules('datetime', 'Fecha y hora', 'required|trim');
		$this->form_validation->set_rules('address', 'Ubicación', 'required|trim');
		$this->form_validation->set_rules('delivery_date', 'Fecha de envío', 'required|trim');
		$this->form_validation->set_rules('therapist', 'Terapeuta', 'required|trim');
		$this->form_validation->set_rules('payment_status', 'Estatus', 'required|trim');
		$this->form_validation->set_rules('days', 'Días', 'required|trim');
		$this->form_validation->set_rules('comments', 'Especificaciones', 'required|trim');
		$this->form_validation->set_rules('type', 'Tipo', 'required|trim');


		if($this->form_validation->run())
		{
			if($this->input->post('type') == "Primera Vez" || $this->input->post('type') == "Seguimiento")
			{
				$payment = 200;
			}
			else
			{
				$payment = $this->input->post('payment');
			}
		
			$data = array(
				'category' => $this->input->post('category'),
				'client_id' => $client_id,
				'datetime' => $this->input->post('datetime'),
				'address' => $this->input->post('address'),
				'delivery_date' => $this->input->post('delivery_date'),
				'therapist' => $this->input->post('therapist'),
				'comments' => $this->input->post('comments'),
				'days' => $this->input->post('days'),
				'type' => $this->input->post('type'),
				);

			$last_id = $this->main_model->add_to_db('appointments', $data);

			$data_payment = array(
				'client_id' => $client_id,
				'appointment_id' => $last_id,
				'datetime' => $this->input->post('datetime'),
				'category' => $this->input->post('category'),
				'payment' => $payment,
				'payment_status' => $this->input->post('payment_status'),
				'payment_type' => $this->input->post('payment_type'),
				);
			$this->main_model->add_payment_to_db('payments', $data_payment);

			if($this->input->post('category') == 'intolerance' || $this->input->post('category') == 'juices')
			{

				// $config = Array(
				// 	'protocol' => 'smtp',
				// 	'smtp_host' => 'box1017.bluehost.com',
				// 	'smtp_port' => 465,
				// 	'smtp_user' => 'hello@ondetox.mx',
				// 	'smtp_pass' => 'ondetox2015',
				// 	'charset'   => 'utf-8'
				// );
		
				$this->load->library('email');
				$this->email->set_newline("\r\n");

				$this->email->from('hello@ondetox.mx', 'healthON');
				$this->email->to('daniela@ondetox.mx'); 
				// $this->email->cc('pablo@bipe.co'); 
				$this->email->subject('Email Test');
				$this->email->message('Testing the email class.');	
				$this->email->send();
				// echo $this->email->print_debugger();
			}

			redirect('main/detail/' . $client_id . '/'. $program . '/' . 'clients');
		}
		else
		{
			$this->session->set_userdata('error', 'Se deben de llenar todos los campos');
			$this->add_view($client_id, $program, $view);
		}
	}

	public function update_appointments_to_db($client_id)
	{
		$program = $this->input->post('program');
		$view = $this->input->post('view');

		$this->form_validation->set_rules('datetime', 'Fecha y hora', 'required|trim');
		$this->form_validation->set_rules('address', 'Ubicación', 'required|trim');
		$this->form_validation->set_rules('delivery_date', 'Fecha de envío', 'required|trim');
		$this->form_validation->set_rules('therapist', 'Terapeuta', 'required|trim');
		$this->form_validation->set_rules('payment_status', 'Estatus', 'required|trim');
		$this->form_validation->set_rules('days', 'Días', 'required|trim');
		$this->form_validation->set_rules('comments', 'Especificaciones', 'required|trim');
		$this->form_validation->set_rules('type', 'Tipo', 'required|trim');
		$this->form_validation->set_rules('post_id', 'Post Id', 'required|trim');


		if($this->form_validation->run())
		{
			$data = array(
				'datetime' => $this->input->post('datetime'),
				'address' => $this->input->post('address'),
				'delivery_date' => $this->input->post('delivery_date'),
				'therapist' => $this->input->post('therapist'),
				'comments' => $this->input->post('comments'),
				'days' => $this->input->post('days'),
				'type' => $this->input->post('type'),
				);

			$post_id = $this->input->post('post_id');

			$last_id = $this->main_model->update_to_db('appointments', $data, $post_id);

			$data_payment = array(
				'datetime' => $this->input->post('datetime'),
				'category' => $this->input->post('category'),
				'payment' => $this->input->post('payment'),
				'payment_status' => $this->input->post('payment_status'),
				'payment_type' => $this->input->post('payment_type'),
				);
			$this->main_model->update_payment_to_db('payments', $data_payment, $post_id);

			redirect('main/detail/' . $client_id . '/'. $program . '/' . 'clients');
		}
		else
		{
			$this->session->set_userdata('error', 'Se deben de llenar todos los campos');
			$this->add_view($client_id, $program, $view);
		}
	}

	public function update_client_to_db()
	{
		$this->form_validation->set_rules('full_name', 'Nombre completo', 'required|trim');
		$this->form_validation->set_rules('address', 'Dirección', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim');
		$this->form_validation->set_rules('phone', 'Teléfono', 'trim');
		$this->form_validation->set_rules('cellphone', 'Celular', 'trim');
		$this->form_validation->set_rules('rfc', 'RFC', 'trim');
		$this->form_validation->set_rules('program', 'Dirección', 'required|trim');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_message('is_unique', 1);

		if($this->form_validation->run())
		{
			if($this->input->post('program') != 'error')
			{
				$data = array(
				'full_name' => $this->input->post('full_name'),
				'address' => $this->input->post('address'),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
				'cellphone' => $this->input->post('cellphone'),
				'rfc' => $this->input->post('rfc'),
				);

				$client_id = $this->input->post('client_id');

				$program = $this->input->post('program');

				$this->main_model->update_to_db('clients', $data, $client_id);
				$this->main_model->update_client_program_to_db($client_id, $program);
				redirect('main/detail/' . $client_id . '/'. $program . '/' . 'clients');
				
			}
			else
			{
				$this->session->set_userdata('error', 'Es necesario escoger un programa');
				$this->add_client();
			}
		}
		else
		{
			$this->session->set_userdata('error', 'Se deben de llenar todos los campos');
			$this->add_client();
		}
	}

	public function json_calendar()
	{
		$query = $this->main_model->get_calendar();
		$i = 0;
		foreach ($query as $row) {
			switch ($row['category']) {
				case 'intolerance':
					$category = "Toma de Intolerancia para ";
					$color = '#f0ad4e';
					break;
				
				case 'juices':
					$category = "Entregar Jugos a ";
					$color = '#5bc0de';
					break;

				case 'consultation':
					$category = "Consulta con ";
					$color = '#428bca';
					break;
				case 'cavitation':
					$category = "Cavitación para ";
					$color = '#5cb85c';
					break;
			}
			$data[$i] = array(
				'title' => $category . $row['full_name'],
				'start' => $row['datetime'],
				'allDay' => false,
				'url' => base_url('main/detail/' . $row['client_id'] . '/' . $row['program'] . '/' . 'calendar'),
				'color' => $color
				);
			$i++;
		}

		echo json_encode($data);
	}

	public function json_calendar_delivery()
	{
		$query = $this->main_model->get_calendar();
		$i = 0;
		foreach ($query as $row) {
			$data[$i] = array(
				'title' =>  'Enviar intolerancia a ' . $row['full_name'],
				'start' => $row['delivery_date'],
				'allDay' => false,
				'url' => base_url('main/detail/' . $row['client_id'] . '/' . $row['program'] . '/' . 'calendar'),
				'color' => '#d9534f'
				);
			$i++;
		}

		echo json_encode($data);
	}

	public function json_clients()
	{
		$query = $this->main_model->get_clients();
		echo json_encode($query);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */