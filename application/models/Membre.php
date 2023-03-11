<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Membre extends CI_Model
{

    public function membres()
    {
        $data = array();
        $sql = "select * from Membres order by idMembre desc ";
        $query = $this->db->query($sql);
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    public function mesObjets($idCategorie, $idMembre)
    {
        $monId = $_SESSION['connected']['idMembre'];

        $data = array();
        $sql = '';
        if ($idCategorie != 0) {
            $sql = " SELECT r.*,l.dateLike,l.dislike,l.class from Rendue r
            left join likes l on r.idObjet = l.idObjet and l.idMembre = %s
            where r.idMembre = %s 
            and idCategorie = %s
            ORDER BY DateHeurePublication desc , dateAcquis desc  ";
            $sql = sprintf($sql, $monId, $idMembre, $idCategorie);
        } else {
            $sql = " SELECT r.*,l.dateLike,l.dislike,l.class from Rendue r
            left join likes l on r.idObjet = l.idObjet and l.idMembre = %s
            where r.idMembre = %s
            ORDER BY DateHeurePublication desc , dateAcquis desc  ";
            $sql = sprintf($sql, $monId, $idMembre);
        }

        $query = $this->db->query($sql);
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    public function Ilikes($idCategorie)
    {

        $idMembre = $_SESSION['connected']['idMembre'];

        $data = array();
        $sql = '';
        if ($idCategorie != '*') {
            $sql = "SELECT r.*,l.dateLike,l.dislike,l.class from Rendue r
            left join likes l on r.idObjet = l.idObjet and l.idMembre = %s
            where l.class is not null and l.dislike != 1
            and idCategorie = %s
            ORDER BY DateHeurePublication desc , dateAcquis desc ";
            $sql = sprintf($sql, $idMembre, $idMembre, $idCategorie);
        } else {
            $sql = " SELECT r.*,l.dateLike,l.dislike,l.class from Rendue r
            left join likes l on r.idObjet = l.idObjet and l.idMembre = %s
            where l.class is not null and l.dislike != 1
            ORDER BY DateHeurePublication desc , dateAcquis desc ";
            $sql = sprintf($sql, $idMembre, $idMembre);
        }

        $query = $this->db->query($sql);
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    public function mesCartesDemandesEchanges()
    {
        $cartes = array();
        $echanges = $this->Membre->mesDemandeEchanges();
        foreach ($echanges as $echange) {
            $carte = array();
            $sesObjets = array();
            $detailEchanges = $this->Membre->detailEchanges($echange['idEchange']);
            $idObjet = $detailEchanges[0]['idObjet2'];
            $monObjet = $this->Objet->objett($idObjet);
            foreach ($detailEchanges as $detailEchange) {
                $sonObjet = $this->Objet->objett($detailEchange['idObjet1']);
                $sesObjets[] = $sonObjet;
            }
            $carte['idEchange'] = $echange['idEchange'];
            $carte['monObjet'] = $monObjet;
            $carte['sesObjets'] = $sesObjets;
            $cartes[] = $carte;
        }
        return $cartes;
    }

    public function CarteDemandesEchanges($idEchange)
    {
        $carte = array();
        $sesObjets = array();
        $detailEchanges = $this->Membre->detailEchanges($idEchange);
        $idObjet = $detailEchanges[0]['idObjet2'];
        $monObjet = $this->Objet->objett($idObjet);
        foreach ($detailEchanges as $detailEchange) {
            $sonObjet = $this->Objet->objett($detailEchange['idObjet1']);
            $sesObjets[] = $sonObjet;
        }
        $carte['idEchange'] = $idEchange;
        $carte['monObjet'] = $monObjet;
        $carte['sesObjets'] = $sesObjets;
        return $carte;
    }


    public function mesDemandeEchanges()
    {
        $etat = 10;
        $data = array();
        $idMembre = $_SESSION['connected']['idMembre'];
        $sql = " SELECT * from Echanges where idMembre2 = %s and dateAcceptation is  null and etat = %d ";
        $sql = sprintf($sql, $idMembre, $etat);
        $query = $this->db->query($sql);
        foreach ($query->result_array() as $result) {
            $data[] = $result;
        }
        return $data;
    }

    public function mesDetailEchanges()
    {
        $data = array();
        $idMembre = $_SESSION['connected']['idMembre'];
        $sql = "SELECT * from Details_echanges where idMembre2 = %s ";
        $sql = sprintf($sql, $idMembre);
        $query = $this->db->query($sql);
        foreach ($query->result_array() as $result) {
            $data[] = $result;
        }
        return $data;
    }

    public function detailEchanges($idEchange)
    {
        $data = array();
        $idMembre = $_SESSION['connected']['idMembre'];
        $sql = " SELECT * from Details_echanges where idEchange = %s ";
        $sql = sprintf($sql, $idEchange);
        $query = $this->db->query($sql);
        foreach ($query->result_array() as $result) {
            $data[] = $result;
        }
        return $data;
    }
    public function paiements()
    {
    }

    public function demandeReservations()
    {
    }

    public function demander_echange($idMembre2, $mesobjets, $idObjetAdemander, $quantite1, $quantite2)
    {
        $etat = 10;
        $idMembre1 = $_SESSION['connected']['idMembre'];
        $sql = " INSERT INTO Echanges VALUES (NULL,%s,%s,now(),null,%d) ";
        $sql = sprintf($sql, $idMembre1, $idMembre2, $etat);
        $this->db->query($sql);
        $lastid = sprintf("SELECT max(idEchange) as idEchange  from Echanges where idMembre1 = %s and idMembre2  = %s and etat = %d group by dateDemande order by idEchange desc limit 1 ", $idMembre1, $idMembre2, $etat);
        $query = $this->db->query($lastid);
        $res = $query->row_array();
        $idEchange = $res['idEchange'];

        foreach ($mesobjets as $monobjet) {
            $this->Membre->insertDetailEchange($idEchange, $monobjet, $idObjetAdemander, $quantite1, $quantite2);
        }
    }
    public function insertDetailEchange($idEchange, $idObjet1, $idObjet2, $quantite1, $quantite2)
    {
        $sql = "INSERT into DetailEchanges values (%s,%s,%s,%s,%s) ";
        $sql = sprintf($sql, $idEchange, $idObjet1, $idObjet2, $quantite1, $quantite2);
        $this->db->query($sql);
    }

    public function sendExchangeRequest($data, $idObjets1, $idObjets2)
    {
        $this->db->insert('echanges', $data);
        $idMembre1 = $data['idMembre1'];
        $idMembre2 = $data['idMembre2'];

        $details = array();
        $actualExchangeIdQuery = sprintf("select idEchange from Echanges where  idMEmbre1 = %s AND idMembre2 = %s ORDER BY datedemande desc limit 1", $idMembre1, $idMembre2);
        $exchangeIds = $this->db->query($actualExchangeIdQuery)->result();
        $actualExchangeId = $exchangeIds[0]->idEchange;

        foreach ($idObjets1 as $key => $idObjet1) {
            if ($key == 0) {
                $details[] = array('idEchange' => $actualExchangeId, 'idObjet1' => $idObjet1, 'idObjet2' => $idObjets2);
            } else {
                $details[] = array('idEchange' => $actualExchangeId, 'idObjet1' => $idObjet1, 'idObjet2' => $idObjets2);
            }
        }

        foreach ($details as $key => $detail) {
            $this->db->insert('detailEchange', $detail);
        }
    }

    public function accepter_echange($idEchange)
    {
        $sql = "UPDATE Echanges SET dateAcceptation = NOW() , etat = 20 WHERE idEchange = %s  ";
        $sql = sprintf($sql, $idEchange);
        $carte = $this->Membre->CarteDemandesEchanges($idEchange);
        $monObjet = $carte['monObjet'];
        $sesObjets = $carte['sesObjets'];
        $monId = $monObjet['idMembre'];
        $sonId = $sesObjets[0]['idMembre'];

        foreach ($sesObjets as $sonObjet) {
            $this->Membre->insertProprio($monId, $sonObjet['idObjet']);
        }
        $this->Membre->insertProprio($sonId, $monObjet['idObjet']);
        $this->db->query($sql);
    }

    public function refuser_echange($idEchange)
    {
        $sql = "UPDATE Echanges SET dateAcceptation = NOW() ,etat = -2 WHERE idEchange = %s  ";
        $sql = sprintf($sql, $idEchange);
        $this->db->query($sql);
    }

    public function annuller($idEchange)
    {
        $sql = "UPDATE Echanges SET dateAcceptation = NOW() , etat = -1 WHERE idEchange = %d  ";
        $sql = sprintf($sql, $idEchange);
        $this->db->query($sql);
    }

    public function like($idObjet)
    {
        $idMembre = $_SESSION['connected']['idMembre'];

        $check = "SELECT * from Likes  where idMembre = %s and idObjet = %s ";
        $check = sprintf($check, $idMembre, $idObjet);
        $result = $this->db->query($check);

        if (count($result->row_array()) > 0) {
            $sql = "UPDATE Likes set dislike = 0, class = default where idMembre = %s and idObjet = %s ";
        } else {
            $sql = "INSERT INTO Likes values(%s,%s,now(),default,default) ";
        }
        $sql = sprintf($sql, $idMembre, $idObjet);
        $this->db->query($sql);
    }

    public function dislike($idObjet)
    {
        $idMembre = $_SESSION['connected']['idMembre'];
        $sql = "UPDATE Likes set dislike = 1, class ='' where idMembre = %s and idObjet = %s ";
        $sql = sprintf($sql, $idMembre, $idObjet);
        $this->db->query($sql);
    }


    public function insertObjet($idCategorie, $titre, $descri, $prix, $images)
    {
        $photo = $images['name'][0];
        $sql = "INSERT INTO Objets VALUES (null,%s,NOW(),'%s','%s','%s')";
        $sql = sprintf($sql, $idCategorie, $titre, $descri, $photo);
        $this->db->query($sql);
        $lastid = sprintf("SELECT max(idObjet) as idObjet  from Objets where idCategorie = %s and titre  = '%s' and descri = '%s' ", $idCategorie, $titre, $descri);
        $query = $this->db->query($lastid);
        $res = $query->row_array();
        $idObjet = $res['idObjet'];
        $idMembre = $_SESSION['connected']['idMembre'];

        $this->Membre->insertPrix($prix, $idMembre, $idObjet);
        $this->Membre->insertProprio($idMembre, $idObjet);
        $this->Membre->setImages($images, $idObjet, $idMembre);
    }


    public function setImages($images, $idObjet, $idMembre)
    {
        $directory = FCPATH . 'assets/images';

        foreach ($images['name'] as $key => $name) {
            $tmp_photo = $images['tmp_name'][$key];
            $image = $images['name'][$key];

            $error = $images['error'][$key];

            if ($error === 0) {
                $sql = "INSERT INTO Images VALUES (%s,%s,'%s',now())";
                $sql = sprintf($sql, $idObjet, $idMembre, $image);

                $this->db->query($sql);

                move_uploaded_file($tmp_photo, $directory . $image);
            }
        }
    }

    public function insertProprio($idMembre, $idObjet)
    {
        $sql = " INSERT into Proprio values (%s,%s,now(),default) ";
        $sql = sprintf($sql, $idMembre, $idObjet);
        $this->db->query($sql);
    }

    public function insertPrix($prix, $idMembre, $idObjet)
    {
        $sql = " INSERT into Prix values (%s,%s,%s,now()) ";
        $sql = sprintf($sql, $idMembre, $idObjet, $prix);
        $this->db->query($sql);
    }

    public function nombre_echanges_effectuer($idMembre)
    {
        $sql = "SELECT count(idEchange) as nombre from Echanges where idMembre1 = %s or idMembre2 = %s ";
        $sql = sprintf($sql, $idMembre, $idMembre);
        $query = $this->db->query($sql);
        $row  = $query->row_array();
        return $row['nombre'];
    }
}
