<?php

/**
 * DO NOT EDIT!
 * This file was automatically generated via bin/generate-validator-spec.php.
 */
namespace Google\Web_Stories_Dependencies\AmpProject\Validator\Spec\AttributeList;

use Google\Web_Stories_Dependencies\AmpProject\Attribute;
use Google\Web_Stories_Dependencies\AmpProject\Validator\Spec\AttributeList;
use Google\Web_Stories_Dependencies\AmpProject\Validator\Spec\Identifiable;
use Google\Web_Stories_Dependencies\AmpProject\Validator\Spec\SpecRule;
/**
 * Attribute list class AmphtmlNomoduleEngineAttrs.
 *
 * @package ampproject/amp-toolbox.
 *
 * @property-read array $async
 * @property-read array<array<string>> $crossorigin
 * @property-read array $nomodule
 * @property-read array<array<string>> $type
 */
final class AmphtmlNomoduleEngineAttrs extends AttributeList implements Identifiable
{
    /**
     * ID of the attribute list.
     *
     * @var string
     */
    const ID = 'amphtml-nomodule-engine-attrs';
    /**
     * Array of attributes.
     *
     * @var array<array>
     */
    const ATTRIBUTES = [Attribute::ASYNC => [SpecRule::MANDATORY => \true, SpecRule::VALUE => ['']], Attribute::CROSSORIGIN => [SpecRule::VALUE => ['anonymous']], Attribute::NOMODULE => [SpecRule::MANDATORY => \true, SpecRule::VALUE => ['']], Attribute::TYPE => [SpecRule::VALUE_CASEI => ['text/javascript']]];
}
