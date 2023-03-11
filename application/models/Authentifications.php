<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Authentifications extends CI_Model
{

    public function form()
    {
        $this->load->view('pages/login');
    }

    public function valid_login($email, $password)
    {
        $sql = "SELECT * FROM Membres WHERE email ='%s' AND motDePasse = '%s' ";
        $sql = sprintf($sql, $email, $password);

        $query = $this->db->query($sql);
        return $query->result();
    }


    public function inscrire($data)
    {
        $this->db->insert('Membres', $data);
        $email = $data['email'];
        $password = $data['motDePasse'];
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
            redirect('Authentification/login');
        }
    }
}
