<?php

namespace Ensa\Mvc\Controller;
class Error404Controller implements Controller
{
    public function processaRequisicao($pdo)
    {
        http_response_code(404);
    }
}