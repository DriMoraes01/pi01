<?php

defined('BASEPATH') OR exit('Ação não permitida');

class Home_model extends CI_Model{

 public function totAnimais(){
            $query = $this->db->query('select * from animal a
            where a.excluido = 0');
            
            return (int) $query->num_rows();            

        }

    public function totUsers(){
            $query = $this->db->query('select * from users u 
            where u.active = 1');

            return (int) $query->num_rows();  

    }

    public function totDoacoes(){
       
        $this->db->select("FORMAT(SUM(valor),2,'de_DE') as valor_doacoes");

        return $this->db->get('doacao')->row();       
        
    }

   public function totVoluntarios(){
        $query = $this->db->query('select * from pessoa p
            where p.voluntario = 1');

        return (int) $query->num_rows(); 

   }

    public function totAdocoes()
    {
        $query = $this->db->query('select * from adocao ad
            where ad.excluido = 0');

        return (int) $query->num_rows();
    }

    public function totResgates(){
        $query = $this->db->query('select * from adocao ad
            where ad.excluido = 0');

        return (int) $query->num_rows();
    }

}