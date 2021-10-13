<?php

/**
 * DO NOT EDIT!
 * This file was automatically generated via bin/generate-validator-spec.php.
 */
namespace Google\Web_Stories_Dependencies\AmpProject\Validator\Spec\Tag;

use Google\Web_Stories_Dependencies\AmpProject\Attribute;
use Google\Web_Stories_Dependencies\AmpProject\Format;
use Google\Web_Stories_Dependencies\AmpProject\Tag as Element;
use Google\Web_Stories_Dependencies\AmpProject\Validator\Spec\AttributeList;
use Google\Web_Stories_Dependencies\AmpProject\Validator\Spec\Identifiable;
use Google\Web_Stories_Dependencies\AmpProject\Validator\Spec\SpecRule;
use Google\Web_Stories_Dependencies\AmpProject\Validator\Spec\Tag;
/**
 * Tag class AmphtmlNomoduleEngineScript.
 *
 * @package ampproject/amp-toolbox.
 *
 * @property-read string $tagName
 * @property-read string $specName
 * @property-read string $mandatoryAlternatives
 * @property-read bool $unique
 * @property-read string $mandatoryParent
 * @property-read array<array> $attrs
 * @property-read array<string> $attrLists
 * @property-read string $specUrl
 * @property-read array<bool> $cdata
 * @property-read array<string> $htmlFormat
 * @property-read array<string> $satisfies
 * @property-read array<string> $requires
 * @property-read array<string> $enabledBy
 * @property-read string $descriptiveName
 */
final class AmphtmlNomoduleEngineScript extends Tag implements Identifiable
{
    /**
     * ID of the tag.
     *
     * @var string
     */
    const ID = 'amphtml nomodule engine script';
    /**
     * Array of spec rules.
     *
     * @var array
     */
    const SPEC = [SpecRule::TAG_NAME => Element::SCRIPT, SpecRule::SPEC_NAME => 'amphtml nomodule engine script', SpecRule::MANDATORY_ALTERNATIVES => 'amphtml engine script', SpecRule::UNIQUE => \true, SpecRule::MANDATORY_PARENT => Element::HEAD, SpecRule::ATTRS => [Attribute::SRC => [SpecRule::MANDATORY => \true, SpecRule::VALUE => ['https://cdn.ampproject.org/v0.js'], SpecRule::DISPATCH_KEY => 'NAME_VALUE_DISPATCH']], SpecRule::ATTR_LISTS => [AttributeList\NonceAttr::ID, AttributeList\AmphtmlNomoduleEngineAttrs::ID], SpecRule::SPEC_URL => 'https://amp.dev/documentation/guides-and-tutorials/learn/spec/amphtml/#required-markup', SpecRule::CDATA => [SpecRule::WHITESPACE_ONLY => \true], SpecRule::HTML_FORMAT => [Format::AMP], SpecRule::SATISFIES => ['amphtml nomodule engine script'], SpecRule::REQUIRES => ['amphtml module engine script'], SpecRule::ENABLED_BY => [Attribute::TRANSFORMED], SpecRule::DESCRIPTIVE_NAME => 'amphtml nomodule engine script'];
}
