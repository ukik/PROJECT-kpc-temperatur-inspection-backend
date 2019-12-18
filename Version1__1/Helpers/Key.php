<?php

if (!function_exists('Faker')) {
    function Faker(){
        return \Faker\Factory::create();
    }
}

if (!function_exists('Uuid')) {
    function Uuid(){
        return Faker()->uuid;
    }
}


