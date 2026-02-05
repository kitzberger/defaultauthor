<?php

declare(strict_types=1);

namespace Kitzberger\Defaultauthor\Form\FormDataProvider;

use TYPO3\CMS\Backend\Form\FormDataProviderInterface;
use TYPO3\CMS\Core\Authentication\BackendUserAuthentication;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

/**
 * Set default author/email values based on currently logged-in backend user.
 */
class SetDefaultAuthorValues implements FormDataProviderInterface
{
    private const SUPPORTED_TABLES = [
        'pages' => ['author', 'author_email'],
        'sys_note' => ['author', 'email'],
    ];

    public function addData(array $result): array
    {
        if ($result['command'] !== 'new') {
            return $result;
        }

        $backendUser = $this->getBackendUser();
        if ($backendUser === null) {
            return $result;
        }

        $tableName = $result['tableName'];

        // Handle configured tables
        $tableConfig = self::SUPPORTED_TABLES[$tableName] ?? null;
        if ($tableConfig !== null) {
            [$authorField, $emailField] = $tableConfig;
            $result = $this->setAuthorDefaults($result, $authorField, $emailField, $backendUser);
        }

        // Handle EXT:news if loaded
        if ($tableName === 'tx_news_domain_model_news' && ExtensionManagementUtility::isLoaded('news')) {
            $result = $this->setAuthorDefaults($result, 'author', 'author_email', $backendUser);
        }

        return $result;
    }

    private function setAuthorDefaults(
        array $result,
        string $authorField,
        string $emailField,
        BackendUserAuthentication $backendUser
    ): array {
        $columns = $result['processedTca']['columns'] ?? [];

        if (isset($columns[$authorField]) && empty($result['databaseRow'][$authorField])) {
            $result['databaseRow'][$authorField] = $backendUser->user['realName'] ?? '';
        }

        if (isset($columns[$emailField]) && empty($result['databaseRow'][$emailField])) {
            $result['databaseRow'][$emailField] = $backendUser->user['email'] ?? '';
        }

        return $result;
    }

    private function getBackendUser(): ?BackendUserAuthentication
    {
        return $GLOBALS['BE_USER'] ?? null;
    }
}
