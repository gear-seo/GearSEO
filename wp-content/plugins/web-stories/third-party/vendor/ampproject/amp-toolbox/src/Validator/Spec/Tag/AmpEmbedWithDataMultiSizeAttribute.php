<?php

/**
 * DO NOT EDIT!
 * This file was automatically generated via bin/generate-validator-spec.php.
 */
namespace Google\Web_Stories_Dependencies\AmpProject\Validator\Spec\Tag;

use Google\Web_Stories_Dependencies\AmpProject\Attribute;
use Google\Web_Stories_Dependencies\AmpProject\Extension;
use Google\Web_Stories_Dependencies\AmpProject\Format;
use Google\Web_Stories_Dependencies\AmpProject\Layout;
use Google\Web_Stories_Dependencies\AmpProject\Protocol;
use Google\Web_Stories_Dependencies\AmpProject\Validator\Spec\AttributeList;
use Google\Web_Stories_Dependencies\AmpProject\Validator\Spec\Identifiable;
use Google\Web_Stories_Dependencies\AmpProject\Validator\Spec\SpecRule;
use Google\Web_Stories_Dependencies\AmpProject\Validator\Spec\Tag;
/**
 * Tag class AmpEmbedWithDataMultiSizeAttribute.
 *
 * @package ampproject/amp-toolbox.
 *
 * @property-read string $tagName
 * @property-read string $specName
 * @property-read array $attrs
 * @property-read array<string> $attrLists
 * @property-read string $specUrl
 * @property-read array<array<string>> $ampLayout
 * @property-read array<string> $disallowedAncestor
 * @property-read array<string> $htmlFormat
 * @property-read array<string> $alsoRequiresTagWarning
 * @property-read array<string> $requiresExtension
 */
final class AmpEmbedWithDataMultiSizeAttribute extends Tag implements Identifiable
{
    /**
     * ID of the tag.
     *
     * @var string
     */
    const ID = 'amp-embed with data-multi-size attribute';
    /**
     * Array of spec rules.
     *
     * @var array
     */
    const SPEC = [SpecRule::TAG_NAME => Extension::EMBED, SpecRule::SPEC_NAME => 'amp-embed with data-multi-size attribute', SpecRule::ATTRS => [Attribute::ALT => [], Attribute::DATA_MULTI_SIZE => [SpecRule::MANDATORY => \true, SpecRule::VALUE => [''], SpecRule::DISPATCH_KEY => 'NAME_VALUE_DISPATCH'], Attribute::JSON => [], Attribute::RTC_CONFIG => [], Attribute::ALWAYS_SERVE_NPA => [], Attribute::BLOCK_RTC => [], Attribute::SRC => [SpecRule::DISALLOWED_VALUE_REGEX => '__amp_source_origin', SpecRule::VALUE_URL => [SpecRule::PROTOCOL => [Protocol::HTTPS], SpecRule::ALLOW_RELATIVE => \true]], Attribute::TYPE => [SpecRule::MANDATORY => \true]], SpecRule::ATTR_LISTS => [AttributeList\ExtendedAmpGlobal::ID], SpecRule::SPEC_URL => 'https://amp.dev/documentation/components/amp-ad/', SpecRule::AMP_LAYOUT => [SpecRule::SUPPORTED_LAYOUTS => [Layout::FILL, Layout::FIXED, Layout::FIXED_HEIGHT, Layout::FLEX_ITEM, Layout::FLUID, Layout::INTRINSIC, Layout::NODISPLAY, Layout::RESPONSIVE]], SpecRule::DISALLOWED_ANCESTOR => ['AMP-APP-BANNER', 'AMP-CAROUSEL', 'AMP-FX-FLYING-CARPET', 'AMP-LIGHTBOX', 'AMP-STICKY-AD'], SpecRule::HTML_FORMAT => [Format::AMP], SpecRule::ALSO_REQUIRES_TAG_WARNING => ['amp-ad extension script'], SpecRule::REQUIRES_EXTENSION => [Extension::AD]];
}
