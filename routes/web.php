<?php

return [
  '/' => ['HomeController', 'index'],

  '/projects' => ['ProjectController', 'index'],
  '/projects/create' => ['ProjectController', 'create'],
  '/projects/show' => ['ProjectController', 'show'],
  '/projects/delete' => ['ProjectController', 'delete'],

  '/tasks' => ['TaskController', 'index'],
  '/tasks/create' => ['TaskController', 'create'],
  '/tasks/show' => ['TaskController', 'show'],
  '/tasks/delete' => ['TaskController', 'delete'],

  '/teams' => ['TeamController', 'index'],
  '/teams/create' => ['TeamController', 'create'],
  '/teams/show' => ['TeamController', 'show'],
  '/teams/delete' => ['TeamController', 'delete'],

  '/about' => ['PageController', 'about'],
];
