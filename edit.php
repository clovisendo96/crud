<?php
// including the database connection file
include_once("class/crud.php");
 
$crud = new Crud();
 
//getting id from url
$id = $crud->escape_string($_GET['id']);
 
//selecting data associated with this particular id
$result = $crud->getData("SELECT * FROM users WHERE id=$id");
 
foreach ($result as $res) {
    $name = $res['name'];
    $age = $res['age'];
    $email = $res['email'];
}
?>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Editar</title>
    <link rel="stylesheet" href="styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
</head>
 
<body>
    <div id='cssmenu'>
    <ul>
        <li><a href='index.php'><span>Home</span></a></li>
        <li><a href='add.html'><span>Adicionar Pessoa</span></a></li>
        <li class="active"><a href='#'><span>Editando</span></a></li>
    </ul>
    </div><br />
    
    <form name="form1" method="post" action="save.php">
        <table border="0">
            <tr>
                <td>Nome</td>
                <td><input type="text" name="name" value="<?php echo $name;?>" required="true"></td>
            </tr>
            <tr>
                <td>Idate</td>
                <td><input type="text" name="age" value="<?php echo $age;?>" required="true"></td>
            </tr>
            <tr>
                <td>E-Mail</td>
                <td><input type="text" name="email" value="<?php echo $email;?>" required="true"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Editar"></td>
            </tr>
        </table>
    </form>
</body>
</html>