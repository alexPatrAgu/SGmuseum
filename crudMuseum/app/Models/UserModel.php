<?php 

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model 
{
    protected $table = 'users'; // Nombre de la tabla
    protected $primaryKey = 'id_user'; // Clave primaria
    protected $allowedFields = ['username', 'email', 'password', 'role']; // Campos permitidos para inserción/actualización

    // Método para listar usuarios
    public function listusers()
    {
        $users = $this->db->query("SELECT * FROM users");
        return $users->getResult();
    }

    // Método para insertar datos
    public function insertar($datos)
    {
        $users = $this->db->table($this->table);
        $users->insert($datos); 

        return $this->db->insertID();
    }

    public function getUser($data){
        $users = $this->db->table('users');
        $users->where($data);
        return $users->get()->getResultArray();
    }



    public function updateUser($id_user, $data)
    {
        return $this->db->table('users')->where('id_user', $id_user)->update($data);
    }



     public function deleteUser($id_user)
    {
        return $this->delete($id_user); 
    }
}
