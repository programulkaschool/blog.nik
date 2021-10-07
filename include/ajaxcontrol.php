<?php
require ('../config/config.php');

var_dump($connection);
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
      echo $_POST ['object_input'] ['name'];
      echo $_POST ['object_input_aj'] ['nickname'];
      echo $_POST  ['object_input_aj'] ['text'];
      echo $_POST ['page_id_aj'];
    } else {
        echo'<span style="color: red; font-weight: bold;">'.$error[0].'</span><hr>';
    }

}
if (isset($_POST['id_del_ajax'])) {
    mysqli_query($connection, "DELETE FROM `articles` WHERE `id` =".$_POST['id_del_ajax']);
}

if (isset($_POST['chek_ajax']) && isset($_POST['id_on_ajax'])) {
    mysqli_query($connection, "UPDATE `articles` SET `post_look` =". $_POST['chek_ajax']." WHERE `id`=".$_POST['id_on_ajax']);

}


if (isset($_POST['tt_ajax'])) {
    mysqli_query($connection, "INSERT INTO `articles_categories` (`title`) VALUES ('".$_POST ['tt_ajax']."')");

}

if (isset($_POST['upd']) && isset($_POST['id_upd'])) {
    mysqli_query($connection, "UPDATE `articles_categories` SET `title` ='". $_POST['upd']."' WHERE `id`=".$_POST['id_upd']);



}
if (isset($_POST['id_delete'])) {
    mysqli_query($connection, "DELETE FROM `articles_categories` WHERE `id` =".$_POST['id_delete']);
}



if (isset($_POST['add_titl']) && isset($_POST['add_text'])  && isset($_POST['add_id'])) {

    mysqli_query($connection, "INSERT INTO `articles` (`img`, `title`, `text`, `categoria_id`, `pubdata`, `views`, `post_look`) VALUES ('','".$_POST['add_titl']."', '".$_POST['add_text']."', '".$_POST['add_id']."',CURRENT_TIMESTAMP, '0', '1')");
}



