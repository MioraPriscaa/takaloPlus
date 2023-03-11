<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Echange extends CI_Model
{
    public function echanges()
    {
        $data = array();
        $sql = "SELECT * FROM Echanges WHERE dateAcceptation IS NULL ORDER BY dateAcceptation  ";
        $query = $this->db->query($sql);
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    public function echangee($idEchange)
    {
        $data = array();
        $sql = "SELECT * FROM Echanges WHERE idEchange = %s ORDER BY dateAcceptation  ";
        $sql=sprintf($sql, $idEchange);
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function  propositions()
    {
        $idMembre1 = $_SESSION['connected']['idMembre'];
        $data = array();
        $sql = " SELECT  e.idEchange,idMembre1,idMembre2,dateDemande,dateAcceptation,etat,idObjet1,idObjet2 FROM Echanges e JOIN DetailEchange d ON e.idEchange = d.idEchange  WHERE dateAcceptation IS NULL AND idMembre2 = %s AND etat !=10 OREDR BY dateAcceptation ";
        $sql = sprintf($sql, $idMembre1);

        $query = $this->db->query($sql);
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    public function modePaiements(){
        $data = array();
        $sql = "SELECT * FROM ModePaiements ";
        $query = $this->db->query($sql);
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    


}
