<?php
class ImagemService
{

    private static string $pastaPublica = __DIR__ . "/../../../publica/";

    public static function salvar($FILES)
    {
 

        //https://www.w3schools.com/php/php_file_upload.asp

        $target_dir = self::$pastaPublica;

        $nomeOriginal = $FILES['imagens']['name']; // Nome original

        // Pega a extensão do arquivo
        $extensao = pathinfo($nomeOriginal, PATHINFO_EXTENSION);

        // Define um novo nome — pode ser o que quiser
        // Exemplo: "foto_2025_11_06_1530.jpg"
        $novoNome = "imagem_" . date("Ymd_His") . "." . $extensao;

        // Caminho final
        $target_file = $target_dir . $novoNome;

        $uploadOk = 1;
        //$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($FILES["imagens"]["tmp_name"]);

        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($FILES["imagens"]["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars(basename($FILES["imagens"]["name"])) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }


        return $novoNome;


    }
}
