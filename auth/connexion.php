<?php 
    session_start(); // Démarrage de la session
    require_once '../functions.php'; // On inclut la connexion à la base de données

    if(!empty($_POST['email']) && !empty($_POST['password'])) // Si il existe les champs email, password et qu'il sont pas vident
    {
        $email = htmlspecialchars($_POST['email']); 
        $password = htmlspecialchars($_POST['password']);
        
        $email = strtolower($email);
        
        $check = $bdd->query("SELECT * FROM clients WHERE email = '$email'");
        $data = $check->fetchAll();
        $hashedpassword = $data[0];
        $row = $check->rowCount();
        
        if($row > 0)
        {
            if(filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                if(password_verify($password, $hashedpassword['password']))
                {
                    $_SESSION['user'] = $data['id'];
                    header('Location: index.php');
                    die();
                } else
                { 
                    header('Location: index.php?login_err=password'); 
                    die(); 
                }
            } else
            { 
                header('Location: index.php?login_err=email'); 
                die(); 
            }
        } else
        { 
            header('Location: index.php?login_err=already'); 
            die(); 
        }
    } else
    { 
        header('Location: index.php'); 
        die();
    }
    