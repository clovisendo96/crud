<html>
<head>
    <meta charset="UTF-8" />
    <title>Adicionar</title>
</head>
 
<body>
<?php
//including the database connection file
include_once("class/crud.php");
include_once("class/validate.php");
 
$crud = new Crud();
$validation = new Validation();
 
if(isset($_POST['Submit'])) {    
    $name = $crud->escape_string($_POST['name']);
    $age = $crud->escape_string($_POST['age']);
    $email = $crud->escape_string($_POST['email']);
        
    $msg = $validation->check_empty($_POST, array('name', 'age', 'email'));
    $check_age = $validation->is_age_valid($_POST['age']);
    $check_email = $validation->is_email_valid($_POST['email']);
    
    // checking empty fields
    if($msg != null) {
        echo $msg;        
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } elseif (!$check_age) {
        echo 'Adicione uma idade.';
    } elseif (!$check_email) {
        echo 'Adicione um e-mail.';
    }    
    else {
        // if all the fields are filled (not empty)
            
        //insert data to database    
        $result = $crud->executeSQL("INSERT INTO users(name,age,email) VALUES('$name','$age','$email')");
        
        //display success message
        echo "<font color='green'>Cadastro realizado com sucesso.";
        echo "<br/><a href='index.php'>Ver resultado</a>";
    }
}
?>
</body>
</html>