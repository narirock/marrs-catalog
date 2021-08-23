<?php

return [
    "template" => [
        "admin" => "marrs-catalog::admin.layouts.app",
        "front" => "marrs-catalog::front.template"
    ],
    //variaveis para meta tags da index do catalog
    "name" => env('APP_NAME') . " - Catalog",
    "description" => "Descrição pagina geral do catalog",
    "seo_image" => env('APP_URL') . "/site/images/seo.png",
    "guard" => "" //selecione a guard que protege as rotas de admin
];
