<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Compte extends CI_Controller
{

    public function ajoutObjet()
    {
        $data['title'] = "ajout d' Objet";
        $categorie = $this->Objet->categories();
        $data['categories'] = $categorie;
        $this->load->view('templates/header');
        $this->load->view('pages/ajoutObjet', $data);
        $this->load->view('templates/footer');
    }


    public function insertObjet()
    {
        $titre =  $this->input->post('titre');
        $descri =  $this->input->post('descri');
        $idCategorie =  $this->input->post('categorie');
        $prix =  $this->input->post('prix');
        $images = $_FILES['sary'];
        $this->Membre->insertObjet($idCategorie, $titre, $descri, $prix, $images);
    }

    public function demander()
    {
        $idObjetAdemander = $this->input->post('idObjetAdemander');
        $Membre2 = $this->Objet->proprio($idObjetAdemander);
        $idMembre2 = $Membre2['idMembre'];
        $mesobjets = $this->input->post('mesobjets');



        // $data = array('idMembre1' => $idMembre1, 'idMembre2' => $idMembre2);
        $quantite1 = 1;
        $quantite2 = 1;
        $this->Membre->demander_echange($idMembre2, $mesobjets, $idObjetAdemander, $quantite1, $quantite2);
    }

    public function accepter_echange($idEchange){
        $this->Membre->accepter_echange($idEchange);
    }

    public function refuser_echange($idEchange){
        $this->Membre->refuser_echange($idEchange);
        
    }
}
