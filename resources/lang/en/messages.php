<?php

return [
    "group" => "Settings",
    "title" => "Tenants",
    "single" => "Tenant",
    "columns" => [
        "id" => "ID",
        "name" => "Name",
        "unique_id" => "Unique ID",
        "domain" => "Domain",
        "email" => "Email",
        "phone" => "Phone",
        "password" => "Password",
        "passwordConfirmation" => "Password Confirmation",
        "is_active" => "Is Active",
        "created_at" => "Created At",
        "updated_at" => "Updated At",
        "role" => "Role",
    ],
    "desc" => [
        "name" => "Tenant name like company name or personal name",
        "unique_id" => "Unique Tenant slug, use only lowercase letters, numbers, and hyphens",
        "domain" => "Domain name to access the tenant website and admin panel",
        "email" => "A valid email address",
        "phone" => "A valid telephone number",
        "password" => "Access password minimum 8 characters, including uppercase, lowercase, and numbers",
        "passwordConfirmation" => "Confirm the password entered previously",
        "is_active" => "The account status of the tenant",
        "role" => "User role in the system",
    ],
    "actions" => [
        "view" => "Open Tenant",
        "login" => "Login To Tenant",
        "password" => "Change Password",
        "edit" => "Edit",
        "delete" => "Delete",
    ],
    "domains" => [
        "title" => "Domains",
        "single" => "Domain",
        "columns" => [
            "domain" => "Domain",
            "full" => "Full Domain",
        ],
    ],
    "sections" => [
        "details" => "Setup Details",
        "settings" => "Other Adjustments",
    ],

];
