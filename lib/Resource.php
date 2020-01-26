<?php

namespace Sabre\WebFinger;

use JsonSerializable;

/**
 * The default implementation of a Resource.
 *
 * @copyright Copyright (C) 2015 fruux GmbH. (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Resource implements ResourceInterface, JsonSerializable
{
    /**
     * subject.
     *
     * @var string
     */
    protected $subject;

    /**
     * aliases.
     *
     * @var string[]
     */
    protected $aliases;

    /**
     * properties.
     *
     * @var string
     */
    protected $properties;

    /**
     * links.
     *
     * @var Link[]
     */
    protected $links;

    /**
     * Constructor.
     *
     * @param string   $subject
     * @param string[] $aliases
     * @param Link[]   $links
     *
     * @return void
     */
    public function __construct($subject, array $aliases = [], array $properties = [], array $links = [])
    {
        $this->subject = $subject;
        $this->aliases = $aliases;
        $this->properties = $properties;
        $this->links = $links;
    }

    /**
     * The value of the subject is a URI that describes the entity.
     *
     * It may be different from the actual resource being requested, in cases
     * where the canonical resource URI changed.
     *
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * The "aliases" array is an array of zero or more URI strings that
     * identify the same entity as the "subject" URI.
     *
     * @return array
     */
    public function getAliases()
    {
        return $this->aliases;
    }

    /**
     * The "properties" object comprises zero or more name/value pairs whose
     * names are URIs (referred to as "property identifiers") and whose values
     * are strings or null.  Properties are used to convey additional
     * information about the subject.
     *
     * @return array
     */
    public function getProperties()
    {
        return $this->properties;
    }

    /**
     * The links array has a number of member objects, each representing a
     * single link or relation from the subject.
     *
     * return LinkInterface[]
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * Returns the JRD representation of this link.
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        return array_filter([
            'subject' => $this->getSubject(),
            'aliases' => $this->getAliases(),
            'properties' => $this->getProperties(),
            'links' => $this->getLinks(),
            ], function ($item) {
                return (bool) $item;
            }
        );
    }
}
