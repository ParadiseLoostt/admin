<?php

$users = ['Admin','Masha','Dasha'];

$person = [
        'name'=>'Alex',
        'city'=>'Moscow',
        'phones'=>[88888,99999]
];

//var_dump($users,$person);
//print_r($users);

// require - подключает файл ( если его нет то получаем фатальную ошибку, скрипт останавливается )
// require_once - подключает файл 1 раз ( если его нет то получаем фатальную ошибку, скрипт останавливается )
// include - подключает файл ( если его нет то получаем предупреждение, скрипт продолжает свою работу )
// include_once - подключает файл 1 раз ( если его нет то получаем предупреждение, скрипт продолжает свою работу )

include 'component/header.php';

//debug($_GET);

// если есть параметр page

    $page = isset($_GET['page'])? $_GET['page']: '';
    switch($page)
    {
        // other pages
        case 'contact':
        case 'about': 
        case 'admin': 
        case 'registration': 
            //  если такой файл существует
            if (file_exists("pages/$page/index.php") )
            {
                include "pages/$page/index.php";
            }
            else
                // include "pages/404.php";
                redirect('/');
        break;

        // home
        case '':
                include "pages/index.php";
        break;

        default:
                include "pages/404.php";
        break;
    }

require 'component/footer.php';

function redirect($url)
{
    header('Location: /',true,301);
    exit;
}

function debug($data)
{
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}