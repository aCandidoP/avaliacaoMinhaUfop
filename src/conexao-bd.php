<?php
    $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=avalMinhaUfopDB;','postgres','tinoco', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);