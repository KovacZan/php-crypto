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

namespace ArkEcosystem\Tests\Crypto\Networks;

use BitWasp\Bitcoin\Network\Network;
use ArkEcosystem\Crypto\Networks\Testnet;

/**
 * This is the testnet network test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @covers \ArkEcosystem\Crypto\Networks\Testnet
 */
class TestnetTest extends NetworkTestCase
{
    protected $epoch = '2017-03-21T13:00:00.000Z';

    public function getTestSubject()
    {
        return Testnet::new();
    }
}
