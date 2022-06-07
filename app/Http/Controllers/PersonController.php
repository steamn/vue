<?php

namespace App\Http\Controllers;


class PersonController extends Controller
{
   public function __invoke()
   {
       $persons = [
           [
               'id' => 1,
               'name' => 'Ivan',
               'age' => 23,
               'job' => 'developer',
           ],
           [
               'id' => 2,
               'name' => 'Vasya',
               'age' => 18,
               'job' => 'driver',
           ],
           [
               'id' => 3,
               'name' => 'Vaha',
               'age' => 31,
               'job' => 'php',
           ],
           [
               'id' => 4,
               'name' => 'Anzor',
               'age' => 24,
               'job' => 'cleaner',
           ],

       ];
       return $persons;
   }
}
