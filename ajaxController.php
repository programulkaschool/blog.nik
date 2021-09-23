<?php
require('config/config.php');

if (isset($_POST['my_input_object'])) {
    $error = array();
    if ($_POST['my_input_object']['name'] == '') {
        $error [] = 'Введіть Ім\'я';
    }
    if ($_POST['my_input_object']['nickname'] == '') {
        $error [] = 'Введіть Нік';
    }
    if ($_POST['page_id'] == '') {
        $error [] = 'NONE ID';
    }
   /* if (empty($error)) {
        echo '<span style="color: #00d118; font-weight: bold;">Комент добавлений</span><hr>';
        echo $_POST['my_input_object']['name'];
    }*/

    if (empty($error)) {
    mysqli_query($connection, "INSERT INTO `comments` (`name`, `author`, `text`, `date`, `articles_id`) VALUES ('".$_POST['my_input_object']['name']."', '".$_POST['my_input_object']['nickname']."', '".$_POST['my_input_object']['text']."', NOW() , '".$_POST['page_id']."')");

    echo '<span style="color: #00d118; font-weight: bold;">Комент добавлений</span><hr>';
    } else {
    echo'<span style="color: red; font-weight: bold;">'.$error[0].'</span><hr>';
    }
}



