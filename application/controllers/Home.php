<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function objets($id = '*')
    {
        $data['title'] = "objets";
        $categorie = $this->Objet->categories();
        $data['categories'] = $categorie;
        $objets = $this->Objet->objets($id);
        $data['objets'] = $objets;

        $this->load->view('templates/header', $data);
        $this->load->view('pages/home', $data);
        $this->load->view('templates/footer');
    }


    public function ajax($id = '*')
    {
        $objets = $this->Objet->objets($id);
        header('Content-Type: application/json');
        echo json_encode($objets);
    }
    

    public function mesObjets($id, $idMembre)
    {
        $data['title'] = "Mes objets";
        $categorie = $this->Objet->categories();
        $data['categories'] = $categorie;
        $objets = $this->Membre->mesObjets($id, $idMembre);
        $data['transactions']  = $this->Membre->nombre_echanges_effectuer($idMembre);
        $data['objets'] = $objets;
        $this->load->view('templates/header', $data);
        $this->load->view('pages/mesObjets', $data);
        $this->load->view('templates/footer');
    }

    public function Ilikes($id = '*')
    {
        $data['title'] = "objets";
        $categorie = $this->Objet->categories();
        $data['categories'] = $categorie;
        $objets = $this->Membre->Ilikes($id);
        $data['objets'] = $objets;
        $this->load->view('templates/header', $data);
        $this->load->view('pages/home', $data);
        $this->load->view('templates/footer');
    }

    public function details($idObjet)
    {
        $monId = $_SESSION['connected']['idMembre'];

        $objets = $this->Objet->objett($idObjet);
        $images = $this->Objet->images($idObjet);
        $modes = $this->Echange->modePaiements();
        $mesObjets = $this->Membre->mesObjets(0,$monId);
        $data['title'] = "details";
        $data['objet'] = $objets;
        $data['images'] = $images;
        $data['mesObjets'] = $mesObjets;
        $data['idObjetDemande'] = $idObjet;
        $data['modePaiements'] = $modes;
        $this->load->view('templates/header', $data);
        $this->load->view('pages/choix', $data);
        $this->load->view('templates/footer');
    }

    public function notifications()
    {
        $data['title'] = "notifications";
        $mesCartesDemandesEchanges = $this->Membre->mesCartesDemandesEchanges();
        $data['cartes'] = $mesCartesDemandesEchanges;
        $this->load->view('templates/header', $data);
        $this->load->view('pages/notifications', $data);
        $this->load->view('templates/footer');
    }

    public function like()
    {
        $this->Membre->like($this->input->post('idObjet'));
    }
    public function dislike()
    {
        $this->Membre->dislike($this->input->post('idObjet'));
    }
}
