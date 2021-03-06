<?php

/**
 * DO NOT EDIT!
 * This file was automatically generated via bin/generate-validator-spec.php.
 */
namespace Google\Web_Stories_Dependencies\AmpProject\Validator\Spec\Error;

use Google\Web_Stories_Dependencies\AmpProject\Validator\Spec\Error;
use Google\Web_Stories_Dependencies\AmpProject\Validator\Spec\SpecRule;
/**
 * Error class InvalidDoctypeHtml.
 *
 * @package ampproject/amp-toolbox.
 *
 * @property-read string $format
 * @property-read int $specificity
 */
final class InvalidDoctypeHtml extends Error
{
    /**
     * Code of the error.
     *
     * @var string
     */
    const CODE = 'INVALID_DOCTYPE_HTML';
    /**
     * Array of spec data.
     *
     * @var array<array>
     */
    const SPEC = [SpecRule::FORMAT => 'Invalid or missing doctype declaration. Should be \'!doctype html\'.', SpecRule::SPECIFICITY => 128];
}
