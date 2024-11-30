<?php

return [
    "group" => "Inquilinos",
    "title" => "Inquilinos",
    "single" => "Inquilino",
    "columns" => [
        "id" => "ID",
        "name" => "Nombre",
        "unique_id" => "ID Único",
        "domain" => "Dominio",
        "email" => "Correo Electrónico",
        "phone" => "Teléfono",
        "password" => "Contraseña",
        "passwordConfirmation" => "Confirmar Contraseña",
        "is_active" => "Activo",
        "created_at" => "Creado En",
        "updated_at" => "Actualizado En",
    ],
    "desc" => [
        "name" => "Nombre del inquilino tal como nombre de la empresa o nombre personal",
        "unique_id" => "Identificador único del inquilino, use solo letras minúsculas, números y guiones",
        "domain" => "Nombre de dominio para acceder al sitio web del inquilino y al panel de administración",
        "email" => "Una dirección de correo electrónico válida",
        "phone" => "Un número de teléfono válido",
        "password" => "Contraseña de acceso mínimo 8 caracteres, incluyendo mayúsculas, minúsculas y números",
        "passwordConfirmation" => "Confirmar la contraseña ingresada anteriormente",
        "is_active" => "El estado de la cuenta del inquilino",
    ],
    "actions" => [
        "view" => "Ver",
        "login" => "Iniciar Sesión",
        "password" => "Cambiar Contraseña",
        "edit" => "Editar",
        "delete" => "Eliminar",
    ],
    "domains" => [
        "title" => "Dominios",
        "single" => "Dominio",
        "columns" => [
            "domain" => "Dominio",
            "full" => "Dominio Completo",
        ],
    ],
    "sections" => [
        "details" => "Detalles de Configuración",
        "settings" => "Otros ajustes",
    ],

];
