<?php

declare(strict_types=1);

/*
 * This file is part of Ark PHP Crypto.
 *
 * (c) Ark Ecosystem <info@ark.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ArkEcosystem\Crypto\Transactions\Builder;

use ArkEcosystem\Crypto\Transactions\Types\MultiPayment;

/**
 * This is the multi payment transaction class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class MultiPaymentBuilder extends AbstractTransactionBuilder
{
    /**
     * Create a new multi signature transaction instance.
     */
    public function __construct()
    {
        parent::__construct();

        $this->transaction->data['asset'] = ['payments' => []];
    }

    /**
     * Add a new payment to the collection.
     *
     * @param string $recipientId
     * @param int    $amount
     *
     * @return \ArkEcosystem\Crypto\Transactions\Builder\MultiPayment
     */
    public function add(string $recipientId, int $amount): self
    {
        $this->transaction->data['asset']['payments'][] = compact('recipientId', 'amount');

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    protected function getType(): int
    {
        return \ArkEcosystem\Crypto\Enums\Types::MULTI_PAYMENT;
    }

    protected function getTypeGroup(): int
    {
        return \ArkEcosystem\Crypto\Enums\TypeGroup::CORE;
    }

    protected function getTransactionInstance(): object
    {
        return new MultiPayment();
    }
}
