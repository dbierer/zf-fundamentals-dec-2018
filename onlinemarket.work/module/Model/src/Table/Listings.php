<?php
namespace Model\Table;

use DateTime;
use DateInterval;
use Zend\Db\Sql\Sql;
use Zend\Db\TableGateway\TableGateway;

/**
 * Listings Table Structure:
CREATE TABLE `listings` (
  `listings_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category` char(16) NOT NULL,
  `title` varchar(128) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_expires` timestamp NULL DEFAULT NULL,
  `description` varchar(4096) DEFAULT NULL,
  `photo_filename` varchar(1024) DEFAULT NULL,
  `contact_name` varchar(255) DEFAULT NULL,
  `contact_email` varchar(255) DEFAULT NULL,
  `contact_phone` varchar(32) DEFAULT NULL,
  `city` varchar(128) DEFAULT NULL,
  `country` char(2) NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `delete_code` char(16) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`listings_id`),
  KEY `title` (`title`),
  KEY `category` (`category`),
  KEY `delete_code` (`delete_code`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8
 */

class Listings extends TableGateway
{
    const TABLE_NAME = 'listings';
    const DATE_FORMAT = 'Y-m-d H:i:s';
    protected $fields = [
        'category',
        'title',
        'date_expires',
        'description',
        'photo_filename',
        'contact_name',
        'contact_email',
        'contact_phone',
        'city',
        'country',
        'price',
        'delete_code',
    ];
    public function findByCategory($category)
    {
        return $this->select(['category' => $category]);
    }
    public function findItemById($id)
    {
        return $this->select(['listings_id' => $id])->current();
    }
    public function findLatest()
    {
        $select = (new Sql($this->getAdapter()))->select();
        $select->from(self::TABLE_NAME);
        $select->order('listings_id DESC');
        $select->limit(1);
        return $this->selectWith($select)->current();
    }
    public function save($data)
    {
        // massage data
        [$data['city'],$data['country']] = explode(',', $data['cityCode']);
        $today = new DateTime('now');
        switch ($data['expires']) {
            case 1 :
                $data['date_expires'] = $today->add('P1D')->format(self::DATE_FORMAT);
                break;
            case 7 :
                $data['date_expires'] = $today->add('P1W')->format(self::DATE_FORMAT);
                break;
            case 30 :
                $data['date_expires'] = $today->add('P1M')->format(self::DATE_FORMAT);
                break;
            default : 
                $data['date_expires'] = NULL;
        }
        $insert = [];
        foreach ($this->fields as $key) {
            if (isset($data[$key])) $insert[$key] = $data[$key];
        }
        return $this->insert($insert);
    }
}
