sabre/webfinger
===============

Trigger CI

This project is a very simple implementation of [WebFinger][5]. [WebFinger][5]
is defined by [RFC7033][6] and describes a simple protocol to find out
information about resources.

To use this project, take a look at `example.php` in the root of this project.

All that's required is to implement a callback, that returns an instance of
`ResourceInterface`.

To be compliant with WebFinger, you should run your server on
`/.well-known/webfinger`.

Installation
------------

Make sure you have [composer][1] installed, and then run:

    composer require sabre/webfinger


Build status
------------

| branch | status |
| ------ | ------ |
| master | [![Build Status](https://travis-ci.org/sabre-io/webfinger.png?branch=master)](https://travis-ci.org/sabre-io/webfinger) |


Questions?
----------

Head over to the [sabre/dav mailinglist][2], or you can also just open a ticket
on [GitHub][3].


Made at fruux
-------------

This library is being developed by [fruux][4]. Drop us a line for commercial
services or enterprise support.

[1]: http://getcomposer.org/
[2]: http://groups.google.com/group/sabredav-discuss
[3]: https://github.com/fruux/sabre-webfinger/issues/
[4]: https://fruux.com/
[5]: https://webfinger.net/
[6]: https://tools.ietf.org/html/rfc7033
