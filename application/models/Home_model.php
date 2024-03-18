<?php

defined('BASEPATH') OR exit('Ação não permitida');

class Home_model extends CI_Model{

 public function totContas(){
            $query = $this->db->query('select * from mensalidades m
            where m.ativa = 1');
            
            return (int) $query->num_rows();            

        }

    public function totUsers(){
            $query = $this->db->query('select * from users u 
            where u.active = 1');

            return (int) $query->num_rows();  

    }

    public function valorContas(){
       
        $this->db->select("FORMAT(SUM(valor),2,'de_DE') as total_mensalidades");

        return $this->db->get('mensalidades')->row();       
        
    }

}