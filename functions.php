<?php

$programs = selectAll('programs');

function dbCheckError($query){
    $errInfo = $query->errorInfo();
    if ($errInfo[0] !== PDO::ERR_NONE){
        echo $errInfo[2];
        exit();
    }
    return true;
}

function get_categories (){
    
    global $link;
    
    $sql = 'SELECT * FROM `categories`';
    
    $result = mysqli_query($link, $sql);
    
    $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    return $categories;
}

function get_posts() {
    
    global $link;
    
    $sql = "SELECT * FROM posts ORDER BY post_id DESC LIMIT 3";
    
    $result = mysqli_query($link, $sql);
    
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    return $posts;
}

function get_posts1() {
    
    global $link;
    
    $sql = "SELECT * FROM posts ORDER BY post_id DESC";
    
    $result = mysqli_query($link, $sql);
    
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    return $posts;
}

function get_programs() {

    global $link;

    $sql = "SELECT * FROM programs ORDER BY program_id DESC";

    $result = mysqli_query($link, $sql);

    $programs = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $programs;
}

function get_form_of_training() {

    global $link;

    $sql = "SELECT * FROM form_of_training ORDER BY form_of_training_id";

    $result = mysqli_query($link, $sql);

    $form_of_trainings = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $form_of_trainings;
}

function get_programs1() {

    global $link;

    $sql = "SELECT * FROM programs1 ORDER BY program_id DESC";

    $result = mysqli_query($link, $sql);

    $programs1 = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $programs1;
}

function get_partners() {

    global $link;

    $sql = "SELECT * FROM partners ORDER BY id_img_partners";

    $result = mysqli_query($link, $sql);

    $partners = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $partners;
}

function get_contacts() {

    global $link;

    $sql = "SELECT * FROM contacts ORDER BY contact_id";

    $result = mysqli_query($link, $sql);

    $contacts = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $contacts;
}

function get_password1() {

    global $link;
  
    $sql = "SELECT * FROM users WHERE password";
  
    $result = mysqli_query($link, $sql);
  
    $password1 = mysqli_fetch_all($result, MYSQLI_ASSOC);
  
    return $password1;
}

function get_staffs() {

    global $link;

    $sql = "SELECT * FROM staff ORDER BY staff_id";

    $result = mysqli_query($link, $sql);

    $staffs = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $staffs;
}

function get_plans() {

    global $link;

    $sql = "SELECT * FROM plans ORDER BY plan_id";

    $result = mysqli_query($link, $sql);

    $plans = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $plans;
}

function get_documents() {

    global $link;

    $sql = "SELECT * FROM documents ORDER BY document_id";

    $result = mysqli_query($link, $sql);

    $documents = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $documents;
}

function get_program_by_id($program_id) {
    
    global $link;
    
    $sql = 'SELECT * FROM programs WHERE program_id = '.$program_id;
    
    $result = mysqli_query($link, $sql);
    
    $program = mysqli_fetch_assoc($result);
    
    return $program;
}

function get_program1_by_id($program1_id) {
    
    global $link;
    
    $sql = 'SELECT * FROM programs1 WHERE program_id = '.$program1_id;
    
    $result = mysqli_query($link, $sql);
    
    $program = mysqli_fetch_assoc($result);
    
    return $program;
}

function get_description_by_program($program_id) {

    global $link;
    
    $id_description = mysqli_real_escape_string($link, $program_id);
    
    $sql = 'SELECT * FROM `description` WHERE program_id = "'.$program_id.'"';
    
    $result = mysqli_query($link, $sql);
    
    $descriptions = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    return $descriptions;
}

function get_description_by_program1($program_id) {

    global $link;
    
    $id_description = mysqli_real_escape_string($link, $program_id);
    
    $sql = 'SELECT * FROM `description1` WHERE program_id = "'.$program_id.'"';
    
    $result = mysqli_query($link, $sql);
    
    $descriptions = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    return $descriptions;
}

function get_photos_on_slider() {

    global $link;

    $sql = "SELECT * FROM photo_on_slider";

    $result = mysqli_query($link, $sql);

    $photos_on_slider = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $photos_on_slider;
}



function protect_page(){
        if (logged_in() === false ) {
            echo "<script>alert('Авторизируйтесь или зарегистрируйтесь для просмотра данной страници!');location.href='Login.php';</script>"; // можете сделать редирект на какую старницу
        }

    }

   function logged_in(){
        return(isset($_SESSION['username'])) ? true : false;
    }
    
function protect_page1(){
        if (logged_in1() === true ) {
            echo "<script>alert('Вы уже авторизованы');location.href='index.php';</script>"; // можете сделать редирект на какую старницу
        }

    }

   function logged_in1(){
        return(isset($_SESSION['username'])) ? true : false;
    }
    
function search($text, $table1){
    $text = trim(strip_tags(stripcslashes(htmlspecialchars($text))));
    global $pdo;
    $sql = "SELECT 
        p.*
        FROM $table1 AS p 
        WHERE p.name LIKE '%$text%'";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}

// Функция запроса на получение данных из одной таблицы
function selectAll($table, $params = []){
    global $pdo;
    $sql = "SELECT * FROM $table";

    if(!empty($params)){
        $i = 0;
        foreach ($params as $key => $value){
            if (!is_numeric($value)){
                $value = "'".$value."'";
            }
            if ($i === 0){
                $sql = $sql . " WHERE $key=$value";
            }else{
                $sql = $sql . " AND $key=$value";
            }
            $i++;
        }
    }

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}
