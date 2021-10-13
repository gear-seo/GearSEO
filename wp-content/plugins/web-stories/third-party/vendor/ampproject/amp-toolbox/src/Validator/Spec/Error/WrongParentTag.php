<?php

/**
 * DO NOT EDIT!
 * This file was automatically generated via bin/generate-validator-spec.php.
 */
namespace Google\Web_Stories_Dependencies\AmpProject\Validator\Spec\Error;

use Google\Web_Stories_Dependencies\AmpProject\Validator\Spec\Error;
use Google\Web_Stories_Dependencies\AmpProject\Validator\Spec\SpecRule;
/**
 * Error class WrongParentTag.
 *
 * @package ampproject/amp-toolbox.
 *
 * @property-read string $format
 * @property-read int $specificity
 */
final class WrongParentTag extends Error
{
    /**
     * Code of the error.
     *
     * @var string
     */
    const CODE = 'WRONG_PARENT_TAG';
    /**
     * Array of spec data.
     *
     * @var array<array>
     */
    const SPEC = [SpecRule::FORMAT => 'The parent tag of tag \'%1\' is \'%2\', but it can only be \'%3\'.', SpecRule::SPECIFICITY => 9];
}
