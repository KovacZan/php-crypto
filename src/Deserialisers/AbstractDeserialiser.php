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

use ArkEcosystem\Crypto\Crypto;

/**
 * This is the deserialiser class.
 *
 * @author Brian Faust <brian@ark.io>
 */
abstract class AbstractDeserialiser
{
    /**
     * @var string
     */
    protected $hex;

    /**
     * @var string
     */
    protected $binary;

    /**
     * @var int
     */
    protected $assetOffset;

    /**
     * @var object
     */
    protected $transaction;

    /**
     * Create a new deserialiser instance.
     *
     * @param string $hex
     * @param string $binary
     * @param int    $assetOffset
     * @param object $transaction
     */
    public function __construct(string $hex, string $binary, int $assetOffset, object $transaction)
    {
        $this->hex         = $hex;
        $this->binary      = $binary;
        $this->assetOffset = $assetOffset;
        $this->transaction = $transaction;
    }

    /**
     * Handle the deserialisation of transaction data.
     *
     * @param int    $assetOffset
     * @param object $transaction
     *
     * @return object
     */
    abstract public function deserialise(): object;

    /**
     * Parse the signatures of the given transaction.
     *
     * @param int $startOffset
     *
     * @return object
     */
    protected function parseSignatures(int $startOffset): object
    {
        return Crypto::parseSignatures($this->hex, $this->transaction, $startOffset);
    }
}
