<?php

namespace Sabre\WebFinger;

/**
 * The Link interface represents a single link from some URI to another.
 *
 * @copyright Copyright (C) 2015 fruux GmbH. (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
interface LinkInterface
{
    /**
     * Returns the relationship type.
     *
     * This should return a simple string such as "child", "homepage", "me",
     * etc. Any non-standard relationship type should be expressed as a URI.
     *
     * @return string
     */
    public function getRel();

    /**
     * Returns the target of the link, as a URI.
     *
     * @return string
     */
    public function getHref();

    /**
     * Returns 0 or more titles for the link.
     *
     * The returned data is an array, whose keys are language tags (or the
     * string "und" for unknown) and its values the title in the respective
     * language.
     *
     * @return string[]
     */
    public function getTitles();

    /**
     * The properties object is a list of additional properties whoses values
     * convey additional information about the link.
     *
     * The names should be expressed as URIs and its values should be strings
     * or null.
     *
     * @return array
     */
    public function getProperties();
}
