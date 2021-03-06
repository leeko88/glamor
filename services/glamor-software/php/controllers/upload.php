<?php
    session_start();
    $pasta = "../../../../images/glamor-software/perfil/";
    
    /* formatos de imagem permitidos */
    $permitidos = array(".jpg",".jpeg",".gif",".png", ".bmp");
    
    if(isset($_POST)){
        $nome_imagem    = $_FILES['imageUpload']['name'];
        $tamanho_imagem = $_FILES['imageUpload']['size'];
        
        /* pega a extensão do arquivo */
        $ext = strtolower(strrchr($nome_imagem,"."));
        
        /*  verifica se a extensão está entre as extensões permitidas */
        if(in_array($ext,$permitidos)){
            
            /* converte o tamanho para KB */
            $tamanho = round($tamanho_imagem / 1024);
            
            if($tamanho < 1024){ //se imagem for até 1MB envia
                //$nome_atual = md5(uniqid(time())).$ext; //nome que dará a imagem
                $tmp = $_FILES['imageUpload']['tmp_name']; //caminho temporário da imagem
                $caminhoServer = $pasta.'emp_id_'.$_SESSION['user_id'].'.jpg';
                /* se enviar a foto, insere o nome da foto no banco de dados */
                if(move_uploaded_file($tmp, $caminhoServer)){
                }else{
                    echo "Falha ao enviar";
                }
            }else{
                echo "Tamanho máximo 1MB";
            }
        }else{
            echo "Formato invalido";
        }
    }else{
        echo "Selecione a imagem";
        exit;
    }
   
?>
