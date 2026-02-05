<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Default Author',
    'description' => 'Defaults the author/email fields in pages, sys_notes and news to the info from the currently logged in user',
    'category' => 'be',
    'version' => '13.0.0',
    'state' => 'stable',
    'author' => 'Philipp Kitzberger',
    'author_email' => 'typo3@kitze.net',
    'constraints' => [
        'depends' => [
            'typo3' => '13.4.0-13.4.99',
        ],
        'conflicts' => [],
        'suggests' => [
            'news' => '',
            'sys_note' => '',
        ],
    ],
];
