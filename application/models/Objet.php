<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Objet extends CI_Model
{

    public function objets($id)
    {
        $idMembre = $_SESSION['connected']['idMembre'];

        $data = array();
        $sql = '';
        if ($id != '*') {
            $sql = " SELECT r.*,l.dateLike,l.dislike,l.class from Rendue r
            left join likes l on r.idObjet = l.idObjet and l.idMembre = %s
            where r.idMembre != %s 
            and idCategorie = %s
            ORDER BY DateHeurePublication desc , dateAcquis desc ";
            $sql = sprintf($sql, $idMembre, $idMembre, $id);
        } else {
            $sql = " SELECT r.*,l.dateLike,l.dislike,l.class from Rendue r
            left join likes l on r.idObjet = l.idObjet and l.idMembre = %s
            where r.idMembre != %s
            ORDER BY DateHeurePublication desc , dateAcquis desc ";
            $sql = sprintf($sql, $idMembre, $idMembre);
        }

        $query = $this->db->query($sql);
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }

        // echo json_encode($data);
        return $data;
    }

    public function objett($idObjet)
    {
        $idMembre = $_SESSION['connected']['idMembre'];
        $sql = "SELECT r.*,l.dateLike,l.dislike,l.class from Rendue r
        left join likes l on r.idObjet = l.idObjet and l.idMembre = %s
        where r.idObjet = %s ";
        $sql = sprintf($sql,$idMembre, $idObjet);
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function categories()
    {
        $data = array();
        $sql = "SELECT * FROM Categories ORDER BY libele ";
        $query = $this->db->query($sql);
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    public function uploadImage($temp, $file)
    {
        $upload_img = base_url('assets/images');
        move_uploaded_file($temp, $upload_img . $file);
    }

    // public function insertObjet($idCategorie, $titre, $descri, $photo, $tmp_photo)
    // {

    //     $sql = "INSERT INTO Objets VALUES (NULL,%s,NOW(),'%s','%s','%s')";
    //     $sql = sprintf($sql, $idCategorie, $titre, $descri, $photo);
    //     $this->db->query($sql);

    //     $upload_img = FCPATH . 'assets/images';
    //     move_uploaded_file($tmp_photo, $upload_img . $photo);
    // }


    public function recherche($titre, $idCategorie)
    {
        $data = array();

        $sql = "SELECT * FROM Objets WHERE titre LIKE '%s%s%s' AND idCategorie = %s ORDER BY DateHeurePublication DESC ";
        $sql = sprintf($sql, '%', $titre, '%', $idCategorie);
        if ($idCategorie == 'tous') {
            $sql = "select * from Objets where titre like '%s%s%s' order by DateHeurePublication desc ";
            $sql = sprintf($sql, '%', $titre, '%');
        }
        $query = $this->db->query($sql);
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    public function parPrix($prix, $taux)
    {

        $max = $prix + ($taux / 100  * $prix);
        $min = $prix - ($taux / 100  * $prix);
        $data = array();
        $sql = "SELECT * FROM Objets WHERE prix BETWEEN %s AND %s ORDER BY  DateHeurePublication DESC";
        $sql = sprintf($sql, $min, $max);
        $query = $this->db->query($sql);
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    public function insertProprio($idMembre, $idObjet)
    {
        $sql = " INSERT INTO Proprio VALUES (%s,%s,NOW()) ";
        $sql = sprintf($sql, $idMembre, $idObjet);
        $this->db->query($sql);
    }

    public function proprio($idObjet)
    {
        $sql = " SELECT * from DernierProprio where idObjet = %s ";
        $sql = sprintf($sql, $idObjet);
        $query = $this->db->query($sql);
        $row = $query->row_array();
        return $row;
    }

    public function historiqueProprio($idObjet)
    {
        $data = array();
        $sql = " SELECT * FROM Membres m JOIN Proprio p ON m.idMembre = p.idMembre  WHERE p.idObjet = %s ORDER BY p.dateAcquis ";
        $sql = sprintf($sql, $idObjet);

        $query = $this->db->query($sql);
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    public function images($idObjet)
    {
        $data = array();
        $sql = " SELECT * from Images where idObjet  = %s and idMembre = ( SELECT idMembre from DernierProprio where idObjet = %s )";
        $sql = sprintf($sql, $idObjet, $idObjet);
        $query = $this->db->query($sql);
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }

}
