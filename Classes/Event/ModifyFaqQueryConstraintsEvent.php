<?php

declare(strict_types=1);

/*
 * This file is part of the Extension "FAQs" for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace RD\Faq\Event;

use RD\Faq\Domain\Model\Dto\FaqDemand;
use RD\Faq\Domain\Repository\FAQRepository;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;

/**
 * This event is triggered before findDemanded in FAQ repository is executed
 */
final class ModifyFaqQueryConstraintsEvent
{
    public function __construct(
        private array $constraints,
        private readonly QueryInterface $query,
        private readonly FaqDemand $faqDemand,
        private readonly FAQRepository $faqRepository
    ) {
    }

    public function getConstraints(): array
    {
        return $this->constraints;
    }

    public function getQuery(): QueryInterface
    {
        return $this->query;
    }

    public function getFaqDemand(): FaqDemand
    {
        return $this->faqDemand;
    }

    public function getFaqRepository(): FAQRepository
    {
        return $this->faqRepository;
    }

    public function setConstraints(array $constraints): void
    {
        $this->constraints = $constraints;
    }
}
