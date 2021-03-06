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

namespace ArkEcosystem\Tests\Crypto\Concerns;

use Illuminate\Support\Arr;
use ArkEcosystem\Crypto\Transactions\Serializer;
use ArkEcosystem\Crypto\Transactions\Transaction;
use ArkEcosystem\Crypto\Transactions\Deserializer;

trait Deserialize
{
    protected function assertDeserialized(array $expected, array $keys, int $network = 30): object
    {
        $actual = Deserializer::new($expected['serialized'])->deserialize();

        $this->assertSame(1, $actual->version);
        $this->assertSame($network, $actual->network);
        $this->assertSame($expected['serialized'], Serializer::new($actual->toArray())->serialize()->getHex());
        $this->assertSameTransactions($expected, $actual, $keys);
        $this->assertTrue($actual->verify());

        return $actual;
    }

    protected function object_to_array(object $value): array
    {
        return json_decode(json_encode($value), true);
    }

    protected function assertSameTransactions(array $expected, Transaction $actual, array $keys): void
    {
        $expected = Arr::only($expected['data'], $keys);
        $actual = Arr::only($this->object_to_array($actual), $keys);

        ksort($expected);
        ksort($actual);

        if (isset($actual['asset']['multisignature'])) {
            ksort($expected['asset']['multisignature']);
            ksort($actual['asset']['multisignature']);
        }

        $this->assertSame($expected, $actual);
    }
}
