<?php
require_once '../config.php';

// устанавливаем путь к папке для загрузки
$uploadDir = "../img/work/";
// устанавливаем валидные MYME-types

$types = array("image/gif", "image/png", "image/jpeg", "image/pjpeg", "image/x-png");
// Устанавливаем максимальный размер файла
$file_size = 2097152; // 2МБ
// Получаем данные из глобального массива
$file = $_FILES['files'];
// Массив с результатами отработки скрипта
$data = array();

// Если размер файла больше максимально допустимого
if($file['size'][0] > $file_size){
    echo "Файл слишком большой. Загружать можно только изображения (gif|png|jpg|jpeg) размером до 2МБ";
    exit;
    $data['message'] = "Файл слишком большой. Загружать можно только изображения (gif|png|jpg|jpeg) размером до 2МБ";
    $data['url'] = '';
}

// если MYME-type файла не соответствует допустимому
else if(!in_array($file['type'][0], $types)){
    echo "Загружать можно только изображения (gif|png|jpg|jpeg) размером до 2МБ";
    exit;
    $data['message'] = "Загружать можно только изображения (gif|png|jpg|jpeg) размером до 2МБ";
    $data['url'] = '';
}

// Если ошибок нет
else if($file['error'][0] == 0){


    // получаем имя файла
    $filename = basename($file['name'][0]);
    // получаем расширение файла
    $extension = pathinfo($file['name'][0], PATHINFO_EXTENSION);
    // перемещаем файл из временной папки в  нужную
     // $data['name']=$file['tmp_name'][0].' '. $uploadDir.$filename;
    
    if(move_uploaded_file($file['tmp_name'][0], $uploadDir.'origin_'.$filename)){
        if(img_resize('../img/work/origin_'.$filename, '../img/work/'.$filename, 181, 127)){
            $data['message'] = "ОК";
            $data['url'] = $filename;
            $data['name'] = $filename;
         } else {
            echo "Возникла неизвестная ошибка при загрузке файла";
            exit;
            $data['message'] = "Возникла неизвестная ошибка при загрузке файла";
            $data['url'] = '';
        }
    }
    // ошибка при перемещении файла
    else {
        echo "Возникла неизвестная ошибка при загрузке файла";
        exit;
        $data['message'] = "Возникла неизвестная ошибка при загрузке файла";
        $data['url'] = '';
    }
      
}


// Выводим результат в JSON и заверщаем в скрипт
echo json_encode($data);
exit;