<?php
namespace Market\Controller\Plugin;

use DateTime;
use DateInterval;
use Zend\Mvc\Controller\Plugin\AbstractPlugin;

class DayWeekMonth extends AbstractPlugin
{
    const DATE_FORMAT = 'l, d M Y';
    public function __invoke()
    {
        $date = new DateTime();
        $new  = clone $date;
        $new->add(new DateInterval('P1D'));
        $dwm['tomorrow'] = $new->format(self::DATE_FORMAT);
        $new  = clone $date;
        $new->add(new DateInterval('P1W'));
        $dwm['week'] = $new->format(self::DATE_FORMAT);
        $new  = clone $date;
        $new->add(new DateInterval('P1M'));
        $dwm['month'] = $new->format(self::DATE_FORMAT);
        return $dwm;
    }
}
