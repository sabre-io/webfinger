<?php

namespace Sabre\WebFinger;

interface ResourceInterface
{
    /**
     * The value of the subject is a URI that describes the entity.
     *
     * It may be different from the actual resource being requested, in cases
     * where the canonical resource URI changed.
     *
     * @return string
     */
    public function getSubject();

    /**
     * The "aliases" array is an array of zero or more URI strings that
     * identify the same entity as the "subject" URI.
     *
     * @return array
     */
    public function getAliases();

    /**
     * The "properties" object comprises zero or more name/value pairs whose
     * names are URIs (referred to as "property identifiers") and whose values
     * are strings or null.  Properties are used to convey additional
     * information about the subject.
     *
     * @return array
     */
    public function getProperties();

    /**
     * The links array has a number of member objects, each representing a
     * single link or relation from the subject.
     *
     * return LinkInterface[]
     */
    public function getLinks();
}
