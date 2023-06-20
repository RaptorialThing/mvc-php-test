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

 return  $web = [
            "/users/create" => ["http"=>"post","path"=>"/users/create","controller"=>"MvcExample\Controllers\UserController","method"=>"create"],
            "/users/new/:id" => ["http"=>"get","path"=>"/users/new/:id","controller"=>"UserController","method"=>"new"],
            "/users/:id" => ["http"=>"get","path"=>"/users/:id","controller"=>"UserController","method"=>"get"],
            "/users/edit/:id" => ["http"=>"get","path"=>"/users/edit/:id","controller"=>"UserController","method"=>"edit"],
            "/users/:id" => ["http"=>"put","path"=>"/users/:id","controller"=>"UserController","method"=>"update"],
            "/users/:id" => ["http"=>"delete","path"=>"/users/:id","controller"=>"UserController","method"=>"delete"]
  ];
