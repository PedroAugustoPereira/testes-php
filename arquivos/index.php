<?php

   
    require_once("config.php");
    
    //FUNÇÃO QUE LÊ O ARQUIVO
    /*
    $filename = "usuarios.csv";
   $file = "";

   if(!file_exists($filename)){
        $sql = new Sql();
        $usuarios = $sql->select("SELECT * FROM tb_susuarios ORDER BY id");
        $data = array();

        foreach($usuarios[0] as $key => $value){
            array_push($data, $key);
        }

        $file = fopen($filename, "w+");
        fwrite($file, implode(",", $data) . "\r\n");

        
        foreach($usuarios as $row){
            
            $data = array();

            foreach($row as $key => $value){
                array_push($data, $value);
            }

            fwrite($file, implode(",", $data) . "\r\n");
        }

        fclose($file);
   }


   $file = fopen($filename, "r");

   $headers = explode(",", fgets($file)); //pega só a primeira linha 


   $data = array();
   while($row = fgets($file)){
        
        $rowData = explode(",", $row);
        $linha = array();

        for($i = 0 ; $i < count($headers) ; $i++){

            $linha[$headers[$i]] = $rowData[$i];

        }

        array_push($data, $linha);
   }

   fclose($file);

   echo json_encode($data);
   */


   //LENDO ARQUIVO COM FILE_GET_CONTENTS



   /*
   $filename = "dog.jpg";


   $base64 =  base64_encode(file_get_contents($filename));

   

   $fileinfo = new finfo(FILEINFO_MIME_TYPE);

   $mimetype = $fileinfo->file($filename);

   //echo "data:".  $mimetype   .";base64," . $base64;

   echo base64_decode($base64);
   */



   //UPLOAD DE ARQUIVO

   /*
   if($_SERVER['REQUEST_METHOD'] === "POST"){
        $file = $_FILES["fileUpload"];

        if($file["error"]){
            throw new Exception("Error: " . $file["error"]);
        }

        $dirUploads = "uploads";

        if(!is_dir($dirUploads)){
            mkdir($dirUploads);
        }

        if(move_uploaded_file($file["tmp_name"], $dirUploads . DIRECTORY_SEPARATOR . $file["name"])){
            echo "Upload realizado com sucesso";
        }
        else{
            throw new Exception("Não foi possível fazer o Upload");
        }
   }*/
?>


<!--
FORM UPLOAD

<form action=""  method="POST" enctype="multipart/form-data">
   <input type="file" name="fileUpload">

   <button type="submit">SEND</button>

</form>-->


<?php 

   //DOWNLOAD DE ARQUIVOS DA WEB

   /*
   $link = "https://hermes.digitalinnovation.one/courses/cover/05e93d7b-2580-4ae6-b3f0-e429fc854b15_cover.png";


   $content = file_get_contents($link);
   $parse = parse_url($link);

   $basename = basename($parse["path"]);

   $file = fopen($basename, "w+");

   fwrite($file,  $content);

   fclose($file);*/


   //MOVER ARQUIVOS
   /*
   $dir1 = "folder1";
   $dir2 = "folder2";

   if(!is_dir($dir1)) mkdir($dir1);
   if(!is_dir($dir2)) mkdir($dir2);


   $filename = "README.txt";
   if(!file_exists($dir1 . DIRECTORY_SEPARATOR . $filename)){
        $file = fopen($dir1 . DIRECTORY_SEPARATOR . $filename, 'w+');
        $fwrite($file, date("d-m-Y H:i:s"));
        fclose($file);
   }


   rename($dir1 . DIRECTORY_SEPARATOR . $filename, $dir2 . DIRECTORY_SEPARATOR . $filename);
   */



   // CURL PEGAR CEP

   $cep = "95622970";
   $link = "https://viacep.com.br/ws/$cep/json/";


   $ch = curl_init($link);

   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

   $response = curl_exec($ch);

   curl_close($ch);

   $data = json_decode($response, true);

   print_r($data);

?>