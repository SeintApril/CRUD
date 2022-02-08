<?php
    class DB
    {
        protected $pdo;
        public function __construct()
        {
            try {
                $this->pdo = new PDO("mysql:dbname=school;host=127.0.0.1", 'root', '1234');
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (Exception $e){
                die( $e->getMessage());
            }
        }
        public function index()
        {
            $statement = $this->pdo->query("select * from students");

            if ($statement) {
                $students = $statement->fetchAll(PDO::FETCH_OBJ);
                return $students;
            }
        }

        public function show($id)
        {
            $statement = $this->pdo->prepare("select * from students where id= :id");
            $statement->bindParam(":id", $id);

            if ($statement->execute())
            {
                $student = $statement->fetch(PDO::FETCH_OBJ);
                return $student;
            }
        }
        public function store($data)
        {
            $statement = $this->pdo->prepare("
                    INSERT INTO `students` (`name`, `email`, `gender`, `dob`, `age`)
                    VALUES (:name, :email, :gender, :dob, :age)
                ");
            $statement->bindParam(":name", $data['name']);
            $statement->bindParam(":email", $data['email']);
            $statement->bindParam(":gender", $data['gender']);
            $statement->bindParam(":dob", $data['dob']);
            $statement->bindParam(":age", $data['age']);
            if ($statement->execute()) {
                header("Location: show.php?id={$this->pdo->lastInsertId()}");
            }
        }
        public function update($data)
        {
            $statement = $this->pdo->prepare("
            update students 
                set name = :name, email = :email, gender = :gender, dob = :dob, age = :age
                where id = :id
            ");
            $statement->bindParam(":id", $data['id']);
            $statement->bindParam(":name", $data['name']);
            $statement->bindParam(":email", $data['email']);
            $statement->bindParam(":gender", $data['gender']);
            $statement->bindParam(":dob", $data['dob']);
            $statement->bindParam(":age", $data['age']);
            if ($statement->execute())
            {
                header("Location: index.php");
            }
        }
        public function destroy($id)
        {
            $statement = $this->pdo->prepare("
                delete from students where id = :id
             ");
            $statement->bindParam(":id", $id);
            if ($statement->execute()){
                header("Location: index.php");
            }
        }
    }