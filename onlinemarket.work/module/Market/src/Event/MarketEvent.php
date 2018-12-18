<?php
namespace Market\Event;

use Zend\EventManager\Event;

class MarketEvent extends Event
{
    const EVENT_POST_VALID   = 'market-post-valid';
    const EVENT_POST_INVALID = 'market-post-invalid';
    const ERROR_POST         = 'ERROR: unable to post to the online market';
    const SUCCESS_POST       = 'SUCCESS: successfully posted to the online market';
}
