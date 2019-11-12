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

namespace ArkEcosystem\Tests\Crypto\Transactions\Deserializers;

use ArkEcosystem\Tests\Crypto\TestCase;
use ArkEcosystem\Crypto\Transactions\Deserializer;
use ArkEcosystem\Crypto\Transactions\Types\MultiPayment;

/**
 * This is the multi payment deserializer test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @covers \ArkEcosystem\Crypto\Transactions\Deserializers\MultiPayment
 */
class MultiPaymentTest extends TestCase
{
    /** @test */
    public function it_should_deserialize_the_transaction_signed_with_a_passphrase()
    {
        $transaction = $this->getTransactionFixture('multi_payment', 'multi-payment-sign');

        $this->assertTransaction($transaction);
    }

    private function assertTransaction(array $fixture): MultiPayment
    {
        return $this->assertDeserialized($fixture, [
            'version',
            'network',
            'type',
            'nonce',
            'senderPublicKey',
            'fee',
            'asset',
            'signature',
            'secondSignature',
            'amount',
            'id',
        ]);
    }
}
