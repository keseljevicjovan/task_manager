<?php

return [
    '/' => ['HomeController', 'index'],

    '/projects' => ['ProjectController', 'index'],
    '/projects/create' => ['ProjectController', 'create'],
    '/projects/show' => ['ProjectController', 'show'],

    '/tasks' => ['TaskController', 'index'],
    '/tasks/create' => ['TaskController', 'create'],
    '/tasks/show' => ['TaskController', 'show'],

    '/teams' => ['TeamController', 'index'],
    '/teams/create' => ['TeamController', 'create'],
    '/teams/show' => ['TeamController', 'show'],

    '/about' => ['PageController', 'about'],
];
