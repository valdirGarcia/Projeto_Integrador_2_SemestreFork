<?php

class Message{

    private $url;

    public function __construct($url){
    $this->url = $url;     //setando variavel 
    }
 
    public function setMessage($msg, $type, $redirect = "index.php") {
     
        $_SESSION["msg"]= $msg;
        $_SESSION["type"] = $type;
        
        if($redirect != "back"){         //redirecionando de volta a pagina anterior caso algo malicioso tente ser feito         
            header("Location: $this->url" . $redirect);
        } else{
            header("Location: " . $_SERVER["HTTP_REFERER"]);//referencia da ultima url que o usuario estava
        }


    }

    public function getMessage() {

        if(!empty($_SESSION["msg"])){
            return [
                "msg"=> $_SESSION["msg"],
                "type"=>$_SESSION["type"]
            ];
        }else{
            return false;
        }
       
    }
    
    public function clearMessage() {
        
        $_SESSION["msg"]= "";
        $_SESSION["type"] = "";
       
    }
} 