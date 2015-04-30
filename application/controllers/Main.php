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

	public function commission()
	{
		$this->load->view('html');
		$this->load->view('commission');
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

	public function suppliers()
	{
		$this->load->view('html');
		$this->load->view('suppliers_angular');
	}

	public function add_client()
	{
		$this->load->view('html');
		$this->load->view('add_client');
	}

	public function add_supplier()
	{
		$this->load->view('html');
		$this->load->view('add_supplier');
	}

	public function detail($client_id, $source)
	{
		$data['client'] = $this->main_model->get_client($client_id);
		$data['sessions'] = $this->main_model->get_sessions($client_id);
		$data['source'] = $source;
		$this->load->view('html');
		$this->load->view('detail', $data);	
	}

	public function detail_suppliers($supplier_id, $source)
	{
		$data['supplier'] = $this->main_model->get_supplier($supplier_id);
		$data['source'] = $source;
		$this->load->view('html');
		$this->load->view('detail_suppliers', $data);	
	}

	public function add_view($client_id, $view)
	{
		$data['client'] = $this->main_model->get_client($client_id);
		$data['appointments'] = $this->main_model->get_appointments($client_id);
		$data['session'] = $this->main_model->get_sessions($client_id);
		$this->load->view('html');
		$this->load->view($view, $data);	
	}

	public function add_session($client_id, $program, $view)
	{
		$data['client'] = $this->main_model->get_client($client_id);
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

	public function edit_client_view($client_id)
	{
		$data['client_data'] = $this->main_model->get_client($client_id);
		$this->load->view('html');
		$this->load->view('edit_client', $data);		
	}

	public function edit_supplier_view($supplier_id)
	{
		$data['supplier_data'] = $this->main_model->get_supplier($supplier_id);
		$this->load->view('html');
		$this->load->view('edit_supplier', $data);		
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

	public function edit_payment($payment_id, $client_id)
	{
		$data['client'] = $this->main_model->get_client($client_id);
		$data['payment_data'] = $this->main_model->get_payment_id($payment_id);
		$this->load->view('html');
		$this->load->view('edit_payment', $data);		
	}

	public function edit_session($session_id, $client_id, $program, $view)
	{
		$data['client'] = $this->main_model->get_client($client_id);
		$data['session_data'] = $this->main_model->get_session_id($session_id);
		$data['program'] = $program;
		$data['view'] = $view;
		$this->load->view('html');
		$this->load->view('edit_session', $data);		
	}

	public function payments($client_id)
	{
		$data['client'] = $this->main_model->get_client($client_id);
		$data['payments'] = $this->main_model->get_payments($client_id);
		$this->load->view('html');
		$this->load->view('payments', $data);
	}

	public function sessions($client_id)
	{
		$data['client'] = $this->main_model->get_client($client_id);
		$data['sessions'] = $this->main_model->get_sessions($client_id);
		$this->load->view('html');
		$this->load->view('sessions', $data);	
	}

	public function update_payments_to_db($client_id, $payment_id)
	{
		$this->form_validation->set_rules('billing', 'Require Factura', 'required|trim');
		$this->form_validation->set_rules('program', 'Programa', 'required|trim');
		$this->form_validation->set_rules('payment', 'Pago', 'trim');
		$this->form_validation->set_rules('payment_type', 'Forma de pago', 'trim');	
		$this->form_validation->set_rules('comments', 'Comentarios', 'trim');	

		if($this->form_validation->run())
		{
			if($this->input->post('program') != 'error')
			{
				$data = array(
					'client_id' => $client_id,
					'billing' => $this->input->post('billing'),
					'program' => $this->input->post('program'),
					'payment' => $this->input->post('payment'),
					'payment_type' => $this->input->post('payment_type'),
					'comments' => $this->input->post('comments'),
					);

				$this->main_model->update_to_db('payments', $data, $payment_id);
				redirect('main/payments/' . $client_id);
			}
			else
			{
				$this->session->set_userdata('error', 'Es necesario escoger un programa');
				$this->edit_payment($payment_id, $client_id, 'add_payment');
			}
		}
		else
		{
			$this->session->set_userdata('error', 'Se deben llenar todos los campos');
			$this->edit_payment($payment_id, $client_id, 'add_payment');
		}
	}

	public function add_payment_to_db($client_id)
	{
		$this->form_validation->set_rules('billing', 'Require Factura', 'required|trim');
		$this->form_validation->set_rules('program', 'Programa', 'required|trim');
		$this->form_validation->set_rules('payment', 'Pago', 'trim');
		$this->form_validation->set_rules('payment_type', 'Forma de pago', 'trim');	
		$this->form_validation->set_rules('comments', 'Comentarios', 'trim');	

		if($this->form_validation->run())
		{
			if($this->input->post('program') != 'error')
			{
				$data = array(
					'client_id' => $client_id,
					'billing' => $this->input->post('billing'),
					'program' => $this->input->post('program'),
					'payment' => $this->input->post('payment'),
					'payment_type' => $this->input->post('payment_type'),
					'comments' => $this->input->post('comments'),
					);

				$this->main_model->add_to_db('payments', $data);
				redirect('main/payments/' . $client_id . '/' . 'clients');
			}
			else
			{
				$this->session->set_userdata('error', 'Es necesario escoger un programa');
				$this->add_view($client_id, 'add_payment');
			}
		}
		else
		{
			$this->session->set_userdata('error', 'Se deben llenar todos los campos');
			$this->add_view($client_id, 'add_payment');
		}
	}

	public function add_session_to_db($client_id)
	{
		$this->form_validation->set_rules('datetime', 'Fecha y hora', 'required|trim');
		$this->form_validation->set_rules('therapist', 'Terapeuta', 'required|trim');
		$this->form_validation->set_rules('program', 'Programa', 'trim');
		$this->form_validation->set_rules('status', 'Forma de pago', 'trim');	
		$this->form_validation->set_rules('completed', 'Comentarios', 'trim');	
		$this->form_validation->set_rules('recommended', 'Recomendo', 'trim');	
		$this->form_validation->set_rules('comments', 'Comentarios', 'trim');	
		$this->form_validation->set_rules('zona', 'zona', 'trim');
		$this->form_validation->set_rules('muestra', 'Muestra', 'trim');	
		$this->form_validation->set_rules('dias', 'Dias', 'trim');	
		$this->form_validation->set_rules('entrega', 'Entrega', 'trim');	
		$this->form_validation->set_rules('especificaciones', 'Especificaciones', 'trim');	
		$this->form_validation->set_rules('ricardo', 'Ricardo', 'trim');	
		$this->form_validation->set_rules('llamada', 'Llamada', 'trim');	
		$this->form_validation->set_rules('distancia', 'Distancia', 'trim');	


		if($this->form_validation->run())
		{
			if($this->input->post('program') != 'error')
			{
				$data = array(
					'client_id' => $client_id,
					'datetime' => $this->input->post('datetime'),
					'therapist' => $this->input->post('therapist'),
					'program' => $this->input->post('program'),
					'status' => $this->input->post('status'),
					'completed' => $this->input->post('completed'),
					'recommended' => $this->input->post('recommended'),
					'comments' => $this->input->post('comments'),
					'zona' => $this->input->post('zona'),
					'muestra' => $this->input->post('muestra'),
					'dias' => $this->input->post('dias'),
					'entrega' => $this->input->post('entrega'),
					'especificaciones' => $this->input->post('especificaciones'),
					'ricardo' => $this->input->post('ricardo'),
					'llamada' => $this->input->post('llamada'),
					'distancia' => $this->input->post('distancia'),
					);

				$this->main_model->add_to_db('sessions', $data);
				redirect('main/sessions/' . $client_id . '/' . 'clients');
			}
			else
			{
				$this->session->set_userdata('error', 'Es necesario escoger un programa');
				$this->add_view($client_id, 'add_session');
			}
		}
		else
		{
			$this->session->set_userdata('error', 'Se deben llenar todos los campos');
			$this->add_view($client_id, 'add_session');
		}
	}

	public function update_session_to_db($client_id, $session_id)
	{
		$this->form_validation->set_rules('datetime', 'Fecha y hora', 'required|trim');
		$this->form_validation->set_rules('therapist', 'Terapeuta', 'required|trim');
		$this->form_validation->set_rules('program', 'Programa', 'required|trim');
		$this->form_validation->set_rules('status', 'Forma de pago', 'trim');	
		$this->form_validation->set_rules('completed', 'Comentarios', 'trim');	
		$this->form_validation->set_rules('recommended', 'Recomendo', 'trim');	
		$this->form_validation->set_rules('comments', 'Comentarios', 'trim');	
		$this->form_validation->set_rules('zona', 'zona', 'trim');
		$this->form_validation->set_rules('muestra', 'Muestra', 'trim');	
		$this->form_validation->set_rules('dias', 'Dias', 'trim');	
		$this->form_validation->set_rules('entrega', 'Entrega', 'trim');	
		$this->form_validation->set_rules('especificaciones', 'Especificaciones', 'trim');	
		$this->form_validation->set_rules('ricardo', 'Ricardo', 'trim');	
		$this->form_validation->set_rules('llamada', 'Llamada', 'trim');	
		$this->form_validation->set_rules('distancia', 'Distancia', 'trim');	

		if($this->form_validation->run())
		{
			if($this->input->post('program') != 'error')
			{
				$data = array(
					'client_id' => $client_id,
					'datetime' => $this->input->post('datetime'),
					'therapist' => $this->input->post('therapist'),
					'program' => $this->input->post('program'),
					'status' => $this->input->post('status'),
					'completed' => $this->input->post('completed'),
					'recommended' => $this->input->post('recommended'),
					'comments' => $this->input->post('comments'),
					'zona' => $this->input->post('zona'),
					'muestra' => $this->input->post('muestra'),
					'dias' => $this->input->post('dias'),
					'entrega' => $this->input->post('entrega'),
					'especificaciones' => $this->input->post('especificaciones'),
					'ricardo' => $this->input->post('ricardo'),
					'llamada' => $this->input->post('llamada'),
					'distancia' => $this->input->post('distancia'),
					);

				$this->main_model->update_to_db('sessions', $data, $session_id);
				redirect('main/sessions/' . $client_id . '/' . 'clients');
			}
			else
			{
				$this->session->set_userdata('error', 'Es necesario escoger un programa');
				$this->edit_view($client_id, 'add_session');
			}
		}
		else
		{
			$this->session->set_userdata('error', 'Se deben llenar todos los campos');
			$this->edit_view($client_id, 'add_session');
		}
	}

	public function add_client_to_db()
	{
		$this->form_validation->set_rules('name', 'Nombre completo', 'required|trim');
		$this->form_validation->set_rules('last_name1', 'Apellida Paterno', 'required|trim');
		$this->form_validation->set_rules('last_name2', 'Apellido Materno', 'required|trim');
		$this->form_validation->set_rules('street', 'Calle y número', 'required|trim');
		$this->form_validation->set_rules('interior_number', 'Numero interior', 'required|trim');
		$this->form_validation->set_rules('colonia', 'Colonia', 'required|trim');
		$this->form_validation->set_rules('delegacion', 'Delegacion', 'required|trim');
		$this->form_validation->set_rules('cp', 'CP', 'required|trim');
		$this->form_validation->set_rules('contact_form', 'Forma de contacto', 'trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[clients.email]');
		$this->form_validation->set_rules('phone', 'Teléfono', 'trim');
		$this->form_validation->set_rules('cellphone', 'Celular', 'trim');
		$this->form_validation->set_rules('billing_full_name', 'Nombre', 'trim');
		$this->form_validation->set_rules('billing_address', 'Nombre', 'trim');
		$this->form_validation->set_rules('rfc', 'RFC', 'trim');
		$this->form_validation->set_rules('program', 'Dirección', 'trim');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_message('is_unique', 1);

		if($this->form_validation->run())
		{
			if($this->input->post('program') != 'error')
			{
				$data = array(
				'name' => $this->input->post('name'),
				'last_name1' => $this->input->post('last_name1'),
				'last_name2' => $this->input->post('last_name2'),
				'street' => $this->input->post('street'),
				'interior_number' => $this->input->post('interior_number'),
				'colonia' => $this->input->post('colonia'),
				'delegacion' => $this->input->post('delegacion'),
				'cp' => $this->input->post('cp'),
				'contact_form' => $this->input->post('contact_form'),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
				'cellphone' => $this->input->post('cellphone'),
				'billing_full_name' => $this->input->post('billing_full_name'),
				'billing_address' => $this->input->post('billing_address'),
				'rfc' => $this->input->post('rfc'),
				);

				$program = $this->input->post('program');

				$client_id = $this->main_model->add_to_db('clients', $data);
				$this->main_model->add_client_program_to_db($client_id, $program);
				redirect('main/detail/' . $client_id  . '/' . 'clients');
				
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

	public function add_supplier_to_db()
	{
		$this->form_validation->set_rules('name', 'Nombre completo', 'required|trim');
		$this->form_validation->set_rules('last_name1', 'Apellida Paterno', 'required|trim');
		$this->form_validation->set_rules('last_name2', 'Apellido Materno', 'required|trim');
		$this->form_validation->set_rules('street', 'Calle y número', 'required|trim');
		$this->form_validation->set_rules('interior_number', 'Numero interior', 'required|trim');
		$this->form_validation->set_rules('colonia', 'Colonia', 'required|trim');
		$this->form_validation->set_rules('delegacion', 'Delegacion', 'required|trim');
		$this->form_validation->set_rules('cp', 'CP', 'required|trim');
		$this->form_validation->set_rules('contact_form', 'Forma de contacto', 'trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[suppliers.email]');
		$this->form_validation->set_rules('phone', 'Teléfono', 'trim');
		$this->form_validation->set_rules('cellphone', 'Celular', 'trim');
		$this->form_validation->set_rules('billing_full_name', 'Nombre', 'trim');
		$this->form_validation->set_rules('billing_address', 'Nombre', 'trim');
		$this->form_validation->set_rules('rfc', 'RFC', 'trim');
		$this->form_validation->set_rules('bank', 'Banco', 'trim');
		$this->form_validation->set_rules('sucursal', 'Sucursal', 'trim');
		$this->form_validation->set_rules('cuenta', 'Cuenta', 'trim');
		$this->form_validation->set_rules('clabe', 'Clabe', 'trim');
		$this->form_validation->set_rules('nombre', 'nombre', 'trim');
		$this->form_validation->set_rules('program', 'Dirección', 'trim');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_message('is_unique', 1);

		if($this->form_validation->run())
		{
			if($this->input->post('program') != 'error')
			{
				$data = array(
				'name' => $this->input->post('name'),
				'last_name1' => $this->input->post('last_name1'),
				'last_name2' => $this->input->post('last_name2'),
				'street' => $this->input->post('street'),
				'interior_number' => $this->input->post('interior_number'),
				'colonia' => $this->input->post('colonia'),
				'delegacion' => $this->input->post('delegacion'),
				'cp' => $this->input->post('cp'),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
				'cellphone' => $this->input->post('cellphone'),
				'billing_full_name' => $this->input->post('billing_full_name'),
				'billing_address' => $this->input->post('billing_address'),
				'rfc' => $this->input->post('rfc'),
				'bank' => $this->input->post('bank'),
				'sucursal' => $this->input->post('sucursal'),
				'cuenta' => $this->input->post('cuenta'),
				'clabe' => $this->input->post('clabe'),
				'nombre' => $this->input->post('nombre'),
				);

				$program = $this->input->post('program');

				$supplier_id = $this->main_model->add_to_db('suppliers', $data);
				redirect('main/detail_suppliers/' . $supplier_id . '/'. $program . '/' . 'suppliers');
				
			}
			else
			{
				$this->session->set_userdata('error', 'Es necesario escoger un programa');
				$this->add_supplier();
			}
		}
		else
		{
			$this->session->set_userdata('error', 'Se deben de llenar todos los campos');
			$this->add_supplier();
		}
	}

	public function update_supplier_to_db($supplier_id)
	{
		$this->form_validation->set_rules('name', 'Nombre completo', 'required|trim');
		$this->form_validation->set_rules('last_name1', 'Apellida Paterno', 'required|trim');
		$this->form_validation->set_rules('last_name2', 'Apellido Materno', 'required|trim');
		$this->form_validation->set_rules('street', 'Calle y número', 'required|trim');
		$this->form_validation->set_rules('interior_number', 'Numero interior', 'required|trim');
		$this->form_validation->set_rules('colonia', 'Colonia', 'required|trim');
		$this->form_validation->set_rules('delegacion', 'Delegacion', 'required|trim');
		$this->form_validation->set_rules('cp', 'CP', 'required|trim');
		$this->form_validation->set_rules('contact_form', 'Forma de contacto', 'trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim');
		$this->form_validation->set_rules('phone', 'Teléfono', 'trim');
		$this->form_validation->set_rules('cellphone', 'Celular', 'trim');
		$this->form_validation->set_rules('billing_full_name', 'Nombre', 'trim');
		$this->form_validation->set_rules('billing_address', 'Nombre', 'trim');
		$this->form_validation->set_rules('rfc', 'RFC', 'trim');
		$this->form_validation->set_rules('bank', 'Banco', 'trim');
		$this->form_validation->set_rules('sucursal', 'Sucursal', 'trim');
		$this->form_validation->set_rules('cuenta', 'Cuenta', 'trim');
		$this->form_validation->set_rules('clabe', 'Clabe', 'trim');
		$this->form_validation->set_rules('nombre', 'nombre', 'trim');
		$this->form_validation->set_rules('program', 'Dirección', 'trim');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_message('is_unique', 1);

		if($this->form_validation->run())
		{
			if($this->input->post('program') != 'error')
			{
				$data = array(
				'name' => $this->input->post('name'),
				'last_name1' => $this->input->post('last_name1'),
				'last_name2' => $this->input->post('last_name2'),
				'street' => $this->input->post('street'),
				'interior_number' => $this->input->post('interior_number'),
				'colonia' => $this->input->post('colonia'),
				'delegacion' => $this->input->post('delegacion'),
				'cp' => $this->input->post('cp'),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
				'cellphone' => $this->input->post('cellphone'),
				'billing_full_name' => $this->input->post('billing_full_name'),
				'billing_address' => $this->input->post('billing_address'),
				'rfc' => $this->input->post('rfc'),
				'bank' => $this->input->post('bank'),
				'sucursal' => $this->input->post('sucursal'),
				'cuenta' => $this->input->post('cuenta'),
				'clabe' => $this->input->post('clabe'),
				'nombre' => $this->input->post('nombre'),
				);

				$this->main_model->update_to_db('suppliers', $data, $supplier_id);
				redirect('main/detail_suppliers/' . $supplier_id . '/' . 'suppliers');
				
			}
			else
			{
				$this->session->set_userdata('error', 'Es necesario escoger un programa');
				$this->edit_supplier_view($supplier_id);
			}
		}
		else
		{
			$this->session->set_userdata('error', 'Se deben de llenar todos los campos');
			$this->edit_supplier_view($supplier_id);
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

	public function update_client_to_db($client_id)
	{


		$this->form_validation->set_rules('name', 'Nombre completo', 'required|trim');
		$this->form_validation->set_rules('last_name1', 'Apellida Paterno', 'required|trim');
		$this->form_validation->set_rules('last_name2', 'Apellido Materno', 'required|trim');
		$this->form_validation->set_rules('street', 'Calle y número', 'required|trim');
		$this->form_validation->set_rules('interior_number', 'Numero interior', 'required|trim');
		$this->form_validation->set_rules('colonia', 'Colonia', 'required|trim');
		$this->form_validation->set_rules('delegacion', 'Delegacion', 'required|trim');
		$this->form_validation->set_rules('cp', 'CP', 'required|trim');
		$this->form_validation->set_rules('contact_form', 'Forma de contacto', 'trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim');
		$this->form_validation->set_rules('phone', 'Teléfono', 'trim');
		$this->form_validation->set_rules('cellphone', 'Celular', 'trim');
		$this->form_validation->set_rules('billing_full_name', 'Nombre', 'trim');
		$this->form_validation->set_rules('billing_address', 'Nombre', 'trim');
		$this->form_validation->set_rules('rfc', 'RFC', 'trim');
		$this->form_validation->set_rules('program', 'Dirección', 'trim');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_message('is_unique', 1);

		if($this->form_validation->run())
		{
			if($this->input->post('program') != 'error')
			{
				$data = array(
				'name' => $this->input->post('name'),
				'last_name1' => $this->input->post('last_name1'),
				'last_name2' => $this->input->post('last_name2'),
				'street' => $this->input->post('street'),
				'interior_number' => $this->input->post('interior_number'),
				'colonia' => $this->input->post('colonia'),
				'delegacion' => $this->input->post('delegacion'),
				'cp' => $this->input->post('cp'),
				'contact_form' => $this->input->post('contact_form'),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
				'cellphone' => $this->input->post('cellphone'),
				'billing_full_name' => $this->input->post('billing_full_name'),
				'billing_address' => $this->input->post('billing_address'),
				'rfc' => $this->input->post('rfc'),
				);

				$this->main_model->update_to_db('clients', $data, $client_id);
				redirect('main/detail/' . $client_id . '/' . 'clients');
				
			}
			else
			{
				$this->session->set_userdata('error', 'Es necesario escoger un programa');
				$this->edit_client_view($client_id);
			}
		}
		else
		{
			$this->session->set_userdata('error', 'Neceario llenar nombre, dirreción e email');
			$this->edit_client_view($client_id);
		}
	}

	public function json_calendar()
	{
		$query = $this->main_model->get_calendar();
		$i = 0;
		foreach ($query as $row) {
			switch ($row['program']) {
				case 'OnDetox':
					$category = "OnDetox para ";
					$color = '#f0ad4e';
					break;
				
				case 'Intolerancia':
					$category = "Intolerancia para ";
					$color = '#5bc0de';
					break;

				case 'MiniOnDetox':
					$category = "MiniOnDetox para ";
					$color = '#428bca';
					break;
				case 'Cavitacion':
					$category = "Cavitación para ";
					$color = '#5cb85c';
					break;
				case 'Consulta':
					$category = "Consulta para ";
					$color = '#aaaaaa';
					break;
			}
			$data[$i] = array(
				'title' => $category . $row['name'] . " " . $row['last_name1'] . " con " . $row['therapist'],
				'start' => $row['datetime'],
				'allDay' => false,
				'url' => base_url('main/edit_session/' . $row['session_id'] . '/' . $row['client_id'] . '/' . $row['program'] . '/' . 'calendar'),
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
				'url' => base_url('main/edit_session/' . $row['session_id'] . '/' . $row['client_id'] . '/' . $row['program'] . '/' . 'calendar'),
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

	public function json_suppliers()
	{
		$query = $this->main_model->get_suppliers();
		echo json_encode($query);
	}

	public function add_program_to_db($client_id)
	{
		$data = array(
			'client_id' => $client_id,
			'program' => $this->input->post('program'),
			);

		redirect('main/add_session/' . $client_id  . '/' . $this->input->post('program') . '/' . 'add_session');
	}

	public function session_add_program($client_id)
	{
		$data['client'] = $this->main_model->get_client($client_id);
		$this->load->view('html');
		$this->load->view('session_add_program', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */