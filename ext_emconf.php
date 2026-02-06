<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Default Author',
    'description' => 'Prefills the author/email fields in pages, sys_notes and news with the currently logged-in user\s information.',
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
