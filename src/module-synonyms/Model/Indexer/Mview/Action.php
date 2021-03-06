<?php
/*
 * This file is part of the App Search Magento module.
 *
 * (c) Elastic
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Elastic\AppSearch\Synonyms\Model\Indexer\Mview;

use Magento\Framework\Indexer\IndexerRegistry;
use Magento\Framework\Mview\ActionInterface;
use Elastic\AppSearch\Synonyms\Model\Indexer;

/**
 * A simple mview action that invalidate the synonyms indexer when something happens in the synonyms table.
 *
 * @package   Elastic\AppSearch\Synonyms\Model\Indexer\Mview
 * @copyright 2019 Elastic
 * @license   Open Software License ("OSL") v. 3.0
 */
class Action implements ActionInterface
{
    /**
     * @var IndexerRegistry
     */
    private $indexerRegistry;

    /**
     * Constructor.
     *
     * @param IndexerRegistry $indexerFactory
     */
    public function __construct(IndexerRegistry $indexerRegistry)
    {
        $this->indexerRegistry = $indexerRegistry;
    }

    /**
     * {@inheritDoc}
     */
    public function execute($ids)
    {
        $indexer = $this->indexerRegistry->get(Indexer::INDEXER_ID);
        $indexer->invalidate();
    }
}
