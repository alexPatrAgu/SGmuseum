<?php

namespace App\Models;

use CodeIgniter\Model;

class MuseumModel extends Model
{
    protected $table = 'museums'; // Nombre de la tabla
    protected $primaryKey = 'id_mus'; // Clave primaria
    protected $allowedFields = ['museum_name']; // Campos permitidos para inserción/actualización

    // Método para listar museos
    public function listMuseums()
    {
        $museums = $this->db->query("SELECT * FROM museums");
        return $museums->getResult();
    }

    // Método para insertar datos
    public function insertMuseum($datos)
    {
        $museums = $this->db->table($this->table);
        $museums->insert($datos);

        return $this->db->insertID();
    }

    // Método para obtener un museo por su ID
    public function getMuseum($data)
    {
        $museums = $this->db->table('museums');
        $museums->where($data);
        return $museums->get()->getResultArray();
    }

    // Método para actualizar un museo
    public function updateMuseum($id_mus, $data)
    {
        return $this->db->table('museums')->where('id_mus', $id_mus)->update($data);
    }

    // Método para eliminar un museo
    public function deleteMuseum($id_mus)
    {
        return $this->delete($id_mus);
    }
}
