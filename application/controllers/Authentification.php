<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Authentification extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->session->userdata('connected')) {
            redirect('Home/objets');
        } else {
            $this->load->view('pages/login');
        }
    }

    public function login()
    {
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('motDePasse', 'Mot De Passe', 'required');

        if ($this->form_validation->run()  == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('Authentification/index');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('motDePasse');
            $session = $this->Authentifications->valid_login($email, $password);
            if (count($session) > 0) {
                $sess_array = array(
                    'idMembre' => $session[0]->idMembre,
                    'email' => $session[0]->email,
                    'isAdmin' => $session[0]->isAdmin,
                    'nom' => $session[0]->nom,
                    'prenom' => $session[0]->prenom,
                    'genre' => $session[0]->genre,
                    'pdp' => $session[0]->pdp,
                    'dateNaissance' => $session[0]->dateNaissance
                );

                $this->session->set_userdata('connected', $sess_array);
                redirect('Authentification/secure');
            } else {
                $this->session->set_flashdata('error', 'something went wrong');
                redirect('Authentification/index');
            }
        }
    }

    public function secure()
    {
        if ($this->session->userdata('connected')) {
            redirect('Home/objets');
        } else {
            redirect('Authentification/login');
        }
    }
    public function deconnexion()
    {
        $this->session->sess_destroy();
        redirect('Authentification/index');
        // redirect(base_url('pages/login'));

    }

    // insertion

    public function inscription()
    {
        $this->load->view('pages/inscription');
    }

    public function insertMembre()
    {
        $prenom = $this->input->post('prenom');
        $nom = $this->input->post('nom');

        $dateNaissance = $this->input->post('dateNaissance');
        $genre = $this->input->post('genre');
        $email = $this->input->post('email');
        $pass = $this->input->post('motDePasse');
        $data = array(
            'nom' => $nom,
            'prenom' => $prenom,
            'dateNaissance' => $dateNaissance,
            'genre' => $genre,
            'email' => $email,
            'motDePasse' => $pass,
            'isAdmin' => 0
        );

        $this->Authentifications->inscrire($data);
    }
}
