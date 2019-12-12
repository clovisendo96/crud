<?php
//including the database connection file
include_once("class/crud.php");
 
$crud = new Crud();
 
//fetching data in descending order (lastest entry first)
$query = "SELECT * FROM users ORDER BY id DESC";
$result = $crud->getData($query);
//echo '<pre>'; print_r($result); exit;
?>
 
<html>
<head>
    <meta charset="UTF-8" />    
    <title>Crud</title>
    <link rel="stylesheet" href="styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
</head>
 
<body>
<div id='cssmenu'>
<ul>
   <li class="active"><a href='index.php'><span>Home</span></a></li>
   <li><a href='add.html'><span>Adicionar Pessoa</span></a></li>
</ul>
</div><br />
 
    <table width='80%' border=0>
 
    <tr bgcolor='#CCCCCC'>
        <td>Nome</td>
        <td>Idade</td>
        <td>E-Mail</td>
        <td>Opções</td>
    </tr>
    <?php
    foreach ($result as $key => $res) {
    //while($res = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$res['name']."</td>";
        echo "<td>".$res['age']." anos</td>";
        echo "<td>".$res['email']."</td>";    
        echo "<td><a href=\"edit.php?id=$res[id]\">Editar</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Confirmar exclusão de usuário?')\">Deletar</a></td>";        
    }
    ?>
    </table>
</body>
</html>