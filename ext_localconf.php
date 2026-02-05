<?php

declare(strict_types=1);

use Kitzberger\Defaultauthor\Form\FormDataProvider\SetDefaultAuthorValues;
use TYPO3\CMS\Backend\Form\FormDataProvider\DatabaseRowInitializeNew;

defined('TYPO3') or die();

// Register FormDataProvider to set default author values
$GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['formDataGroup']['tcaDatabaseRecord']
    [SetDefaultAuthorValues::class] = [
        'depends' => [
            DatabaseRowInitializeNew::class,
        ],
    ];
