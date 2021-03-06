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
 * Tag class HeadStyleAmp4adsBoilerplate.
 *
 * @package ampproject/amp-toolbox.
 *
 * @property-read string $tagName
 * @property-read string $specName
 * @property-read bool $mandatory
 * @property-read bool $unique
 * @property-read string $mandatoryParent
 * @property-read array<array> $attrs
 * @property-read array<string> $attrLists
 * @property-read string $specUrl
 * @property-read array $cdata
 * @property-read array<string> $htmlFormat
 * @property-read string $descriptiveName
 */
final class HeadStyleAmp4adsBoilerplate extends Tag implements Identifiable
{
    /**
     * ID of the tag.
     *
     * @var string
     */
    const ID = 'head > style[amp4ads-boilerplate]';
    /**
     * Array of spec rules.
     *
     * @var array
     */
    const SPEC = [SpecRule::TAG_NAME => Element::STYLE, SpecRule::SPEC_NAME => 'head > style[amp4ads-boilerplate]', SpecRule::MANDATORY => \true, SpecRule::UNIQUE => \true, SpecRule::MANDATORY_PARENT => Element::HEAD, SpecRule::ATTRS => [Attribute::AMP4ADS_BOILERPLATE => [SpecRule::MANDATORY => \true, SpecRule::VALUE => [''], SpecRule::DISPATCH_KEY => 'NAME_VALUE_PARENT_DISPATCH']], SpecRule::ATTR_LISTS => [AttributeList\NonceAttr::ID], SpecRule::SPEC_URL => 'https://amp.dev/documentation/guides-and-tutorials/learn/a4a_spec/?format=ads#boilerplate', SpecRule::CDATA => [SpecRule::CDATA_REGEX => '\\s*body\\s*{\\s*visibility:\\s*hidden;?\\s*}\\s*', SpecRule::DOC_CSS_BYTES => \false], SpecRule::HTML_FORMAT => [Format::AMP4ADS], SpecRule::DESCRIPTIVE_NAME => 'head > style[amp4ads-boilerplate]'];
}
