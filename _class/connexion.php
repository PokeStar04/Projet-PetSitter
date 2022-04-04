<?php

class Connexion {

    private $valid;

    private $err_mail;
    private $err_mdp;

    public function verif_connexion($mail,$mdp){

        global $DB;
        
        $mail = $_POST['mail'];
        $mdp = $_POST['mdp'];



        $this->valid = (boolean) true;
    
    
        //Gestion message d'erreur
            if (empty($mail)){
            $this->valid=false;
            $this->err_mail = "Ce champ ne peut être vide";
            }
            if (empty($mdp)){
                $this->valid=false;
                $this->err_mdp = "Ce champ ne peut être vide";
                }
    
    
    
    
    
            if($this->valid){
                //verifier qu'il y a pas déjà le même mail
                $req = $DB ->prepare("SELECT mdp FROM utilisateur WHERE mail = ?");
                $req -> execute(array($mail));
                $req = $req->fetch();
                require_once('close.php');
                //Si ma requete contient un information au niveau de mdp 
                if(isset($req['mdp'])){
                        if (!password_verify($mdp,$req['mdp'])){

                                $this->valid=false; 
                                $this->err_mail = "Cette adresse ou mot de passe est incorect";
                        }


                    // if($mdp !== $req['mdp']){
                    //     
                
                    
                    
                }else{
                    $this->valid=false; 
                    $this->err_mail = "Cette adresse ou mot de passe est incorect";
                   
                }
    
    
            }
    
    
    
    
    
            if ($this->valid){
    
                $req = $DB ->prepare("SELECT * FROM utilisateur WHERE mail = ?");
                $req -> execute(array($mail));
                $req_connexion = $req->fetch();
                require_once('close.php');
      
    
    
                if(isset($req_connexion['id'])){
                
                $_SESSION['id']= $req_connexion['id'];
                $_SESSION['nom']= $req_connexion['nom'];
                $_SESSION['prenom']= $req_connexion['prenom'];
                $_SESSION['naissance']= $req_connexion['naissance'];
                $_SESSION['mail']= $req_connexion['mail'];
                $_SESSION['telephone']= $req_connexion['telephone'];
                $_SESSION['photo']= $req_connexion['photo'];
                $_SESSION['pays']= $req_connexion['pays'];
                $_SESSION['ville']= $req_connexion['ville'];
                $_SESSION['postal']= $req_connexion['postal'];
                $_SESSION['rue']= $req_connexion['rue'];
                $_SESSION['mdp']= $req_connexion['mdp '];
    
                header('Location: /');
               
               
               
               
                }else{
                    $this->valid=false; 
                    $this->err_mail = "Cette adresse ou mot de passe est incorect";
                }
    
                $preparedRequest->execute();
            
                header('Location: connexion.php');
                 //insert to dans la bd
            }
            return [$this->err_mail,$this->err_mdp];
        }
        
    }




?>