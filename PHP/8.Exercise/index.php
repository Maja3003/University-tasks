<?php
/*
Ćwiczenie 1: System Zarządzania Użytkownikami
Założenia:
Stwórz system zarządzania użytkownikami, który będzie posiadał następujące funkcjonalności:
    Utwórz klasę abstrakcyjną User, która będzie miała właściwości username i email.
    Utwórz klasę Customer, dziedziczącą po User, dodającą dodatkową właściwość balance (saldo użytkownika).
    Utwórz klasę Admin, dziedziczącą po User, która będzie miała dodatkową metodę promoteToAdmin, pozwalającą na awans użytkownika do roli administratora.
Zadanie:
    Stwórz interfejs UserManagement, który będzie definiował metody do dodawania użytkownika, usuwania użytkownika i wyświetlania listy użytkowników.
    Utwórz klasę UserManager, implementującą interfejs UserManagement. Klasa ta powinna przechowywać listę użytkowników i umożliwiać dodawanie, usuwanie 
    oraz wyświetlanie użytkowników w formie tabeli HTML.
Wymagania na stronie:
    Formularz dodawania nowego użytkownika (z polem na nazwę użytkownika, email i typ użytkownika - czy to klient czy administrator).
    Wyświetlenie listy użytkowników w tabeli HTML z możliwością usuwania użytkowników (dla administratora) i awansowania użytkowników do roli administratora.
*/

session_start();
abstract class User{
    public string $username;
    public string $email;

    public function __construct($username, $email){
        $this->username=$username;
        $this->email=$email;
    }

    public function GetUsername(){
        return $this->username;
    }

    public function GetEmail(){
        return $this->email;
    }
}

class Customer extends User{
    public float $balance;

    public function __construct($username, $email, $balance){
        parent::__construct($username, $email);
        $this->balance=$balance;
    }
}

class Admin extends User{
    public function PromoteToAdmin(){
        // Implementacja awansowania użytkownika do roli administratora
        // (np. zmiana w bazie danych lub inna operacja)
        return "Użytkownik {$this->GetUsername()} został awansowany na administratora.";
    } 
}

interface UserManagement{
    function AddUser($username, $email, $type);
    function DeleteUser($username);
    function DisplayUsers();
}

class UserManager implements UserManagement{
    private $users = [];

    function AddUser($username, $email, $type){
        if ($type=="customer"){
            $user = new Customer($username, $email, 0);
        } elseif ($type=="admin"){
            $user = new Admin($username, $email);
        } else{
            return "Nieprawidłowy typ użytkownika";
        }

        $this->users[$username] = $user;
        return "Użytkownik {$username} został dodany.";
    }

    function DeleteUser($username){
        if (isset($this->users[$username])) {    //jesli taki uzytkownik istnieje
            unset($this->users[$username]);      //usun zmienne
            return "Użytkownik {$username} został usunięty.";
        } else {
            return "Użytkownik {$username} nie istnieje.";
        }
    }

    function DisplayUsers(){
        $html = '<h3>Lista Użytkowników</h3>';
        $html .= '<table id="tabela" border="1" cellpadding="10">';
        $html .= '<tr><td>Username</td><td>Email</td><td>Type</td></tr>';
        foreach ($this->users as $username => $user) {
            $html .= "<tr><td>{$username}</td><td>{$user->GetEmail()}</td><td>";
            if ($user instanceof Admin) {
                $html .= "Admin</td>";
            } elseif ($user instanceof Customer) {
                $html .= "Customer</td>";
            }
            $html .= "</tr>";
        }
    
        $html .= '</table>';
        return $html;
    }
}

$UserManager = new UserManager();
echo $UserManager->AddUser('Marek', 'asds', 'customer');
echo $UserManager->AddUser('Emil', 'Emil@gmail.com', 'customer');
echo $UserManager->DisplayUsers();
