<?php
require '../../config/db.php';
class teacherModel
{
    private $PDO;
    public function __construct()
    {
        $conn = new db();
        $this->PDO = $conn->connection();
    }

    public function insert($name_teacher, $email, $doc_type, $doc_number, $category, $hobbies)
    {
        // Usar una consulta preparada
        $sql = "INSERT INTO teachers (name_teacher, email, doc_type, doc_number, category, hobbies) VALUES (:name_teacher, :email, :doc_type, :doc_number, :category, :hobbies)";
        $stmt = $this->PDO->prepare($sql);

        // Enlazar los valores a los marcadores de posición
        $stmt->bindParam(':name_teacher', $name_teacher, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':doc_type', $doc_type, PDO::PARAM_INT);
        $stmt->bindParam(':doc_number', $doc_number, PDO::PARAM_STR);
        $stmt->bindParam(':category', $category, PDO::PARAM_INT);
        $stmt->bindParam(':hobbies', $hobbies, PDO::PARAM_STR);

        // Ejecutar la consulta
        return ($stmt->execute()) ? $this->PDO->lastInsertId() : false;
    }


    public function show($id_teacher)
    {
        // Usar una consulta preparada para evitar problemas de seguridad y sintaxis
        $sql = "SELECT * FROM teachers WHERE id_teacher = :id LIMIT 1;";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':id', $id_teacher, PDO::PARAM_INT);
        return ($stmt->execute()) ? $stmt->fetch() : false;
    }

    public function index()
    {
        $stmt = $this->PDO->prepare("SELECT * FROM teachers");
        return ($stmt->execute()) ? $stmt->fetchAll() : false;
    }

    public function update($id_teacher, $name_teacher, $email, $doc_type, $doc_number, $category, $hobbies){
        $sql = "UPDATE teachers SET name_teacher = :name_teacher, email = :email, doc_type = :doc_type, doc_number = :doc_number, category = :category, hobbies = :hobbies WHERE id_teacher = :id;";
        $stmt = $this->PDO->prepare($sql);

        // Enlazar los valores a los marcadores de posición
        $stmt->bindParam(':id', $id_teacher, PDO::PARAM_INT);
        $stmt->bindParam(':name_teacher', $name_teacher, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':doc_type', $doc_type, PDO::PARAM_INT);
        $stmt->bindParam(':doc_number', $doc_number, PDO::PARAM_STR);
        $stmt->bindParam(':category', $category, PDO::PARAM_INT);
        $stmt->bindParam(':hobbies', $hobbies, PDO::PARAM_STR);

        return ($stmt->execute()) ? $id_teacher: false;
    }

    public function delete($id_teacher){
        $sql = "DELETE FROM teachers WHERE id_teacher = :id_teacher";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':id_teacher', $id_teacher, PDO::PARAM_INT); // Corregir el nombre del marcador de posición
        return ($stmt->execute()) ? true : false;
    }
    
}
