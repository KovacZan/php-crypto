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

namespace ArkEcosystem\Crypto\Serialisers;

/**
 * This is the serialiser class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class DelegateResignation extends AbstractSerialiser
{
    /**
     * Handle the serialisation of "delegate resignation" data.
     *
     * @return string
     */
    public function serialise(): string
    {
        return $this->bytes;
    }
}
