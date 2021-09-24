<?php
//var_dump($_POST['text']);
require ('/config/config.php');

if (isset($_POST['object_input_aj'])) {
    $error = array();
    if ($_POST ['object_input_aj'] ['name'] == '') {
        $error [] = 'Введіть Ім\'я';
    }
    if ($_POST ['object_input_aj'] ['nickname'] == '') {
        $error [] = 'Введіть Нік';
    }
    if ($_POST  ['object_input_aj'] ['text'] == '') {
        $error [] = 'Введіть Текст комментария';
    }
    if ($_POST ['page_id_aj'] == ''){
        $error [] = 'NONE';
    }
        if (empty($error)) {
        mysqli_query($connection, "INSERT INTO `comments` (`name`, `author`, `text`, `date`, `articles_id`) VALUES ('".$_POST ['object_input_aj']['name']."', '".$_POST ['object_input_aj']['nickname']."', '".$_POST ['object_input_aj']['text']."', NOW() , '".$_POST ['page_id_aj']."')");
        echo '<span style="color: #00d118; font-weight: bold;">Комент добавлений</span><hr>';
      //  echo $_POST ['object_input'] ['name'];
    } else {
        echo'<span style="color: red; font-weight: bold;">'.$error[0].'</span><hr>';
    }
}

?>

