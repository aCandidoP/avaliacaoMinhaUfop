<?php
    $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=avaliacao;','postgres','123321', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);