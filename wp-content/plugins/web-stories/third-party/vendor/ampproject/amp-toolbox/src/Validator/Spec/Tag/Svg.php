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
 * Tag class Svg.
 *
 * @package ampproject/amp-toolbox.
 *
 * @property-read string $tagName
 * @property-read array $attrs
 * @property-read array<string> $attrLists
 * @property-read string $specUrl
 * @property-read array<string> $htmlFormat
 */
final class Svg extends Tag implements Identifiable
{
    /**
     * ID of the tag.
     *
     * @var string
     */
    const ID = 'SVG';
    /**
     * Array of spec rules.
     *
     * @var array
     */
    const SPEC = [SpecRule::TAG_NAME => Element::SVG, SpecRule::ATTRS => [Attribute::CONTENTSCRIPTTYPE => [], Attribute::CONTENTSTYLETYPE => [], Attribute::EXTERNALRESOURCESREQUIRED => [], Attribute::HEIGHT => [], Attribute::PRESERVEASPECTRATIO => [], Attribute::VERSION => [SpecRule::VALUE => ['1.0', '1.1']], Attribute::VIEWBOX => [], Attribute::WIDTH => [], Attribute::X => [], Attribute::Y => [], Attribute::ZOOMANDPAN => []], SpecRule::ATTR_LISTS => [AttributeList\SvgConditionalProcessingAttributes::ID, AttributeList\SvgCoreAttributes::ID, AttributeList\SvgPresentationAttributes::ID, AttributeList\SvgStyleAttr::ID], SpecRule::SPEC_URL => 'https://amp.dev/documentation/guides-and-tutorials/learn/spec/amphtml/#svg', SpecRule::HTML_FORMAT => [Format::AMP, Format::AMP4ADS]];
}
