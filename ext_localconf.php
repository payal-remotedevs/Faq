<?php
defined('TYPO3') || die();
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Routing\Router;

(static function() {
    ExtensionUtility::configurePlugin(
        'Faq',
        'Faqlist',
        [
            \RD\Faq\Controller\FAQController::class => 'list',
            \RD\Faq\Controller\CategoryController::class => 'list'
        ],
        // non-cacheable actions
        [
            \RD\Faq\Controller\FAQController::class => 'list',
            \RD\Faq\Controller\CategoryController::class => 'list'
        ],
        ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT

    );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.faqplugintab {
                header = LLL:EXT:faq/Resources/Private/Language/locallang_db.xlf:faqplugintab.header

                elements {
                    faqlist {
                        iconIdentifier = faq-plugin-faqlist
                        title = LLL:EXT:faq/Resources/Private/Language/locallang_db.xlf:tx_faq_faqlist.name
                        description = LLL:EXT:faq/Resources/Private/Language/locallang_db.xlf:tx_faq_faqlist.description
                        tt_content_defValues {
                            CType = faq_faqlist
                        }
                    }                    
                }
                show = *
            }
       }'
    );
})();

