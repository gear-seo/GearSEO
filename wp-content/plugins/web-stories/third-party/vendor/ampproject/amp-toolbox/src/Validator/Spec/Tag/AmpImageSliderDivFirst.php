<?php

/**
 * DO NOT EDIT!
 * This file was automatically generated via bin/generate-validator-spec.php.
 */
namespace Google\Web_Stories_Dependencies\AmpProject\Validator\Spec\Tag;

use Google\Web_Stories_Dependencies\AmpProject\Attribute;
use Google\Web_Stories_Dependencies\AmpProject\Extension;
use Google\Web_Stories_Dependencies\AmpProject\Format;
use Google\Web_Stories_Dependencies\AmpProject\Tag as Element;
use Google\Web_Stories_Dependencies\AmpProject\Validator\Spec\Identifiable;
use Google\Web_Stories_Dependencies\AmpProject\Validator\Spec\SpecRule;
use Google\Web_Stories_Dependencies\AmpProject\Validator\Spec\Tag;
/**
 * Tag class AmpImageSliderDivFirst.
 *
 * @package ampproject/amp-toolbox.
 *
 * @property-read string $tagName
 * @property-read string $specName
 * @property-read string $mandatoryParent
 * @property-read array<array<bool>> $attrs
 * @property-read string $specUrl
 * @property-read array<string> $htmlFormat
 */
final class AmpImageSliderDivFirst extends Tag implements Identifiable
{
    /**
     * ID of the tag.
     *
     * @var string
     */
    const ID = 'AMP-IMAGE-SLIDER > DIV [first]';
    /**
     * Array of spec rules.
     *
     * @var array
     */
    const SPEC = [SpecRule::TAG_NAME => Element::DIV, SpecRule::SPEC_NAME => 'AMP-IMAGE-SLIDER > DIV [first]', SpecRule::MANDATORY_PARENT => Extension::IMAGE_SLIDER, SpecRule::ATTRS => [Attribute::FIRST => [SpecRule::MANDATORY => \true]], SpecRule::SPEC_URL => 'https://amp.dev/documentation/components/amp-image-slider/', SpecRule::HTML_FORMAT => [Format::AMP]];
}
