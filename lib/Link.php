<?php

namespace Sabre\WebFinger;

use JsonSerializable;

/**
 * This is a concrete Link object.
 *
 * @copyright Copyright (C) 2015 fruux GmbH. (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Link implements LinkInterface, JsonSerializable
{
    /**
     * Relationship type.
     *
     * @var string
     */
    protected $rel;

    /**
     * Target URI.
     *
     * @var string
     */
    protected $href;

    /**
     * List of titles, by language tag.
     *
     * @var string[]
     */
    protected $titles;

    /**
     * List of additional properties.
     *
     * @var array
     */
    protected $properties;

    /**
     * Constructor.
     *
     * @param string   $rel
     * @param string   $href
     * @param string[] $titles
     */
    public function __construct($rel, $href, array $titles = [], array $properties = [])
    {
        $this->rel = $rel;
        $this->href = $href;
        $this->titles = $titles;
        $this->properties = $properties;
    }

    /**
     * Returns the relationship type.
     *
     * This should return a simple string such as "child", "homepage", "me",
     * etc. Any non-standard relationship type should be expressed as a URI.
     *
     * @return string
     */
    public function getRel()
    {
        return $this->rel;
    }

    /**
     * Returns the target of the link, as a URI.
     *
     * @return string
     */
    public function getHref()
    {
        return $this->href;
    }

    /**
     * Returns 0 or more titles for the link.
     *
     * The returned data is an array, whose keys are language tags (or the
     * string "und" for unknown) and its values the title in the respective
     * language.
     *
     * @return string[]
     */
    public function getTitles()
    {
        return $this->titles;
    }

    /**
     * The properties object is a list of additional properties whoses values
     * convey additional information about the link.
     *
     * The names should be expressed as URIs and its values should be strings
     * or null.
     *
     * @return array
     */
    public function getProperties()
    {
        return $this->properties;
    }

    /**
     * Returns the JRD representation of this link.
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        return array_filter([
            'rel' => $this->getRel(),
            'href' => $this->getHref(),
            'titles' => $this->getTitles(),
            'properties' => $this->getProperties(),
            ], function ($item) {
                return (bool) $item;
            }
        );
    }
}
