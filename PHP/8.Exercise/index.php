<?php
/*Ćwiczenie 1: System Zarządzania Użytkownikami

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