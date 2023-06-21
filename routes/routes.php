<?php
/*
post /users/create
get /users
get /users/1
put /users/1
delete /users/1

registration.php -> db create new user or error
/users/create

login.php -> get db get user/1 (where email, username) or error, back; get user->posts 
get /posts */

 return  [
            
            "routes" => [
    
                "/users/create" => ["http"=>"post","path"=>"/users/create","controller"=>"MvcExample\Controllers\UserController","method"=>"create"],
                "/users/new/:id" => ["http"=>"get","path"=>"/users/new/:id","controller"=>"MvcExample\Controllers\UserController","method"=>"new"],
                "/users/:id" => ["http"=>"get","path"=>"/users/:id","controller"=>"MvcExample\Controllers\UserController","method"=>"get"],
                "/users/edit/:id" => ["http"=>"get","path"=>"/users/edit/:id","controller"=>"MvcExample\Controllers\UserController","method"=>"edit"],
                "/users/:id" => ["http"=>"put","path"=>"/users/:id","controller"=>"MvcExample\Controllers\UserController","method"=>"update"],
                "/users/:id" => ["http"=>"delete","path"=>"/users/:id","controller"=>"MvcExample\Controllers\UserController","method"=>"delete"],
                "/" => ["http"=>"get","path"=>"/","controller"=>"MvcExample\Controllers\UserController","method"=>"get"]
            ]
  ];
