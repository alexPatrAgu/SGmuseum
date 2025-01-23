<?php 

namespace App\Controllers;

use App\Models\UserModel; // Importar la clase correcta del modelo

class Crud extends BaseController
{
    public function index(): string
    {
        // Crear la instancia de UserModel
        $userModel = new UserModel();
        $datos = $userModel->listusers(); // Obtener los usuarios

        // Obtener el mensaje de la sesión
        $message = session('message');

        // Arreglo de datos a pasar a la vista
        $data = [
            "datos" => $datos,
            "message" => $message
        ]; 

        // Retornar la vista con los datos
        return view('list', $data);
    }

    public function create()
    {
        // Recopilar datos del formulario
        $datos = [
            "username" => $this->request->getPost('username'),
            "email" => $this->request->getPost('email'),
            "password" => $this->request->getPost('password'),
            "role" => $this->request->getPost('role'),
        ];

        // Instanciar el modelo
        $Crud = new UserModel();
        $respuesta = $Crud->insert($datos); // Insertar los datos

        // Validar la respuesta y redirigir con el mensaje correspondiente
        if ($respuesta > 0) {
            return redirect()->to(base_url('/'))->with('message', '1'); // Cambiado a "message"
        } else {
            return redirect()->to(base_url('/'))->with('message', '0'); // Cambiado a "message"
        }
    }

    public function update($iduser)
    {
        // Recopilar datos del formulario
        $data = [
            "username" => $this->request->getPost('username'),
            "email" => $this->request->getPost('email'),
            "role" => $this->request->getPost('role'),
        ];

        // Si se proporciona la contraseña, incluirla en los datos de actualización
        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT); // Encriptar la contraseña
        }

        // Instanciar el modelo
        $Crud = new UserModel();

        // Actualizar el usuario en la base de datos usando el ID
        $response = $Crud->updateUser($iduser, $data);

        // Verificar si la actualización fue exitosa
        if ($response) {
            return redirect()->to(base_url('/'))->with('message', '2'); // Registro actualizado exitosamente
        } else {
            return redirect()->to(base_url('/'))->with('message', '3'); // Error al actualizar el registro
        }
    }

    public function getUser($iduser)
    {
        $data = ["id_user" => $iduser]; 
        $Crud = new UserModel();
        
        $respuesta = $Crud->getUser($data);
        $datos = $respuesta[0]; 
        return view('edit', compact('datos')); 
    }

    public function delete($id_user)
    {
        // Instanciar el modelo
        $userModel = new UserModel();

        // Intentar eliminar el registro
        $respuesta = $userModel->deleteUser($id_user);

        // Verificar si se eliminó correctamente
        if ($respuesta) {
            return redirect()->to(base_url('/'))->with('message', '4'); // Eliminación exitosa
        } else {
            return redirect()->to(base_url('/'))->with('message', '5'); // Error al eliminar
        }
    }
}
