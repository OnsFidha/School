<?php 

class ParentEleve extends CI_Model {
      
    public function updateParent($data,$id){
        return $this->db->update('parent', $data,['id'=>$id]); 
    }

    public function getParentById($id){
        $query = $this->db->get_where('parent',['id'=>$id]);
        return $query->row();        
    }

    public function getParents(){
        $query= $this->db->get('parent');
        return $query->result();
    }

    public function insertParent($data){
        return $this->db->insert('parent', $data);
    }
    public function insertpe($data){
         $this->db->insert('parent', $data);
         return $id = $this->db->insert_id();
    }
    public function getByIdUser($id){
        $this->db->where('id_user',$id);
        $query= $this->db->get('parent');
        return $query->row();
    }

    public function deleteParent($id){
        return $this->db->delete('parent',['id'=>$id]);
    }
    
   
}