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

namespace ArkEcosystem\Crypto\Deserialisers;

/**
 * This is the deserialiser class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class DelegateResignation extends AbstractDeserialiser
{
    /**
     * Handle the deserialisation of "delegate resignation" data.
     *
     * @return object
     */
    public function deserialise(): object
    {
        return $this->parseSignatures($this->assetOffset);
    }
}
