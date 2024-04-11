<?php

defined('BASEPATH') OR exit('Ação não permitida');

class Core_model extends CI_Model{

    public function get_all($table = NULL, $condition = NULL)
    {
        if($table && $this->db->table_exists($table)){

            if(is_array($condition)){

                $this->db->where($condition);

            }

            return $this->db->get($table)->result();

        }else{
            return FALSE;
        }
    }

    public function get_by_id($table = NULL, $condition = NULL)
    {
        if($table && $this->db->table_exists($table) && is_array($condition)){

           
            $this->db->where($condition);
            $this->db->limit(1);

            return $this->db->get($table)->result();

        }else{
            return FALSE;
        }  

    }

    public function get_by_voluntario(){
        $this->db->select('*');
        $this->db->from('pessoa p');             
        $this->db->where('p.voluntario', 1);       
        $this->db->order_by('p.id');       

        $query = $this->db->get();       
            
        if ($query->num_rows() >= 1) {            
            return $query->result();
        }
        return false;
    }
        

    public function insert($table = NULL, $data = NULL){

        if($table && $this->db->table_exists($table) && is_array($data)){

            $this->db->insert($table, $data);

            if($this->db->affected_rows() > 0){

                $this->session->set_flashdata('sucesso', 'Dados salvos com sucesso');
            }else{

                $this->session->set_flashdata('error', 'Não foi possível salvar os dados');
            }
        }else{

            return FALSE;
        }

    }

    public function update($table = NULL, $data = NULL, $condition = NULL)
    {
        if($table && $this->db->table_exists($table) && is_array($data) && is_array($condition)){

           if($this->db->update($table, $data, $condition)){

              $this->session->set_flashdata('sucesso', 'Dados atualizados com sucesso!');  
           }else{
                $this->session->set_flashdata('error', 'Não foi possível atualizar os dados!'); 
           }

        }else{
            return FALSE;
        }  
    }  
    
    
    public function AlterarSenha($table = NULL, $data = NULL, $condition = NULL)
    {
        if($table && is_array($data) && is_array($condition)){
           if($this->db->update($table, $data, $condition)){
           
            return TRUE;
           }else{

            return FALSE;
           }
        }
    } 
    
    public function getAnimais(){
        $this->db->select('*');
        $this->db->from('animal a');
        $this->db->where('a.excluido', 0);                      
        $this->db->order_by('a.id');   

        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->result();
            //return $query->row();
        }
        return false;
    }

    public function delete($table = NULL, $condition = NULL)
    {
        if($table && $this->db->table_exists($table) && is_array($condition)){

            if($this->db->delete($table, $condition)){

                $this->session->set_flashdata('sucesso', 'Dados excluídos com sucesso!');  
            }else{

                $this->session->set_flashdata('error', 'Não foi possível excluir os dados!');
            }

        }
    }

    public function selecionar_nome($email){

        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email', $email);        
        $this->db->where('users.active', 1);

        $query = $this->db->get();
        if($query->num_rows() >= 1) {
            return $query->row();
        }
        return false;   
        
    }

      
    public function totUsers(){
        $query = $this->db->query('select * from users u 
        where u.active = 1');

        return (int) $query->num_rows();  

    }   

     public function getPessoas(){
        $this->db->select('*');
        $this->db->from('pessoa p');             
        $this->db->where('p.excluido', 0);       
        $this->db->order_by('p.id');       

        $query = $this->db->get();       
            
        if ($query->num_rows() >= 1) {            
            return $query->result();
        }
        return false;
    }   
    
}   
    
    


    
    


    


