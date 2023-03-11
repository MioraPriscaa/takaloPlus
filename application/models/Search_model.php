<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Search_model extends CI_Model
{
    function fetch_data($query)
    {
        // $query = 
        $idMembre = $_SESSION['connected']['idMembre'];

        $this->db->select(" * ");
        
        $this->db->from("Rendue r ");
        $this->db->join('likes l', sprintf('r.idObjet = l.idObjet and l.idMembre = %s', $idMembre), 'left');
        if ($query != '') {
            $this->db->like('nom', $query);
            $this->db->or_like('prenom', $query);
            $this->db->or_like('email', $query);
            $this->db->or_like('libele', $query);
            $this->db->or_like('DateHeurePublication', $query);
            $this->db->or_like('titre', $query);
            $this->db->or_like('descri', $query);
            $this->db->or_like('dateAcquis', $query);
            $this->db->or_like('prix', $query);
            $this->db->or_like('datePose', $query);

        }
        $this->db->where(sprintf('r.idMembre != %s', $idMembre));
        $this->db->order_by('DateHeurePublication', 'desc');
        $this->db->order_by('dateAcquis', 'desc');

        $data =array();
         $result =  $this->db->get();
         foreach ($result->result_array() as $row) {
             $data[] = $row;
         }
 
         // echo json_encode($data);
         return $data;
    }
}
