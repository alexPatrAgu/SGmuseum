<?php

namespace App\Controllers;

use App\Models\MuseumModel; // Importar el modelo adecuado para Museos

class MuseumController extends BaseController
{
    // Método para listar los museos
    public function index(): string
    {
        // Crear la instancia de MuseumModel
        $museumModel = new MuseumModel();
        $datos = $museumModel->listMuseums(); // Obtener los museos

        // Obtener el mensaje de la sesión
        $message = session('message');

        // Arreglo de datos a pasar a la vista
        $data = [
            "datos" => $datos,
            "message" => $message
        ]; 

        // Retornar la vista con los datos
        return view('museum_list', $data);
    }

    // Método para crear un nuevo museo
    public function create()
    {
        // Recopilar datos del formulario
        $datos = [
            "museum_name" => $this->request->getPost('museum_name'),
            // Asegúrate de no estar enviando "username" si no es necesario
        ];

        // Instanciar el modelo
        $museumModel = new MuseumModel();
        $respuesta = $museumModel->insert($datos); // Insertar los datos

        // Validar la respuesta y redirigir con el mensaje correspondiente
        if ($respuesta > 0) {
            return redirect()->to(base_url('/museums'))->with('message', '1'); // Cambio a 'message'
        } else {
            return redirect()->to(base_url('/museums'))->with('message', '0'); // Cambio a 'message'
        }
    }

    // Método para actualizar el museo
    public function update($idmus)
    {
        // Obtener los datos del formulario
        $museum_name = $this->request->getPost('museum_name');

        // Validar que el nombre del museo no esté vacío
        if (empty($museum_name)) {
            return redirect()->back()->with('error', 'El nombre del museo es obligatorio.');
        }

        // Preparar los datos para la actualización
        $data = [
            'museum_name' => $museum_name
        ];

        // Instanciar el modelo
        $museumModel = new MuseumModel();

        // Actualizar el museo
        if ($museumModel->update($idmus, $data)) {
            return redirect()->to(base_url('/museums'))->with('success', 'Museo actualizado exitosamente');
        } else {
            return redirect()->back()->with('error', 'Hubo un problema al actualizar el museo.');
        }
    }

    // Método para obtener un museo por su ID
    public function getMuseum($idmus)
    {
        $data = ["id_mus" => $idmus];
        $museumModel = new MuseumModel();
        
        // Obtener los datos del museo
        $respuesta = $museumModel->getMuseum($data); 
        $datos = $respuesta[0];  // Suponiendo que obtienes el primer resultado

        // Pasar los datos completos a la vista
        return view('editmuseum', [
            'datos' => $datos  // Pasa el array completo
        ]);
    }

    // Método para eliminar un museo
    public function delete($id_mus)
    {
        // Instanciar el modelo
        $museumModel = new MuseumModel();

        // Intentar eliminar el registro
        $respuesta = $museumModel->deleteMuseum($id_mus);

        // Verificar si se eliminó correctamente
        if ($respuesta) {
            return redirect()->to(base_url('/museums'))->with('message', '4'); // Eliminación exitosa
        } else {
            return redirect()->to(base_url('/museums'))->with('message', '5'); // Error al eliminar
        }
    }
}
