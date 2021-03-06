<?php

/**
 * DO NOT EDIT!
 * This file was automatically generated via bin/generate-validator-spec.php.
 */
namespace Google\Web_Stories_Dependencies\AmpProject\Validator\Spec\Error;

use Google\Web_Stories_Dependencies\AmpProject\Validator\Spec\Error;
use Google\Web_Stories_Dependencies\AmpProject\Validator\Spec\SpecRule;
/**
 * Error class InlineStyleTooLong.
 *
 * @package ampproject/amp-toolbox.
 *
 * @property-read string $format
 * @property-read int $specificity
 */
final class InlineStyleTooLong extends Error
{
    /**
     * Code of the error.
     *
     * @var string
     */
    const CODE = 'INLINE_STYLE_TOO_LONG';
    /**
     * Array of spec data.
     *
     * @var array<array>
     */
    const SPEC = [SpecRule::FORMAT => 'The inline style specified in tag \'%1\' is too long - it contains %2 bytes whereas the limit is %3 bytes.', SpecRule::SPECIFICITY => 35];
}
