<?php 
class UserModel extends CI_Model {
    public function getByEmail($email){
        $this->db->where('email',$email);
        $query= $this->db->get('users');
        return $query->row();
    }
    public function supprimer($id){
        
        $this->db->where("id", $id);
        return $this->db->delete("users");
        
    }
    public function getAll(){
        $this->db->where('role !=', 'admin');
        $query= $this->db->get('users');
        return $query->result();
    }
    public function getById($id){
        $this->db->where('id',$id);
        $query= $this->db->get('users');
        return $query->row();
    }
    public function modifierUser($data,$id){
        return $this->db->update('users',$data,['id'=>$id]);
        
    }
    
    public function check($data)
    {
        $this->db->select('*');
        $this->db->where('email',$data['email']);
        $this->db->where('mot_de_passe',$data['mot_de_passe']);
        $this->db->from('users');
        $this->db->limit(1);
        $query=$this->db->get();
        if($query->num_rows()==1){
            $this->session->set_userdata('email',$data['email']);
            return true;
            
        }
        else {return false;}
    } 
    public function loginUser($data)
        {
            $this->db->select('*');
            $this->db->where('email',$data['email']);
            $this->db->from('users');
            $this->db->limit(1);
            $query=$this->db->get();
            if($query->num_rows()==1){
                $user = $query->row();
                if (password_verify($data['mot_de_passe'], $user->mot_de_passe)) {
                    return $user;
                }
            }
            return false;
        }
        
    
    public function registerUser($data)
    {
        return $this->db->insert('users',$data);
    }

}




?>