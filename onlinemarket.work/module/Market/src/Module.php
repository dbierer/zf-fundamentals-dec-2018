<?php
namespace Market;

class Module
{
	public function getConfig()
	{
		return include __DIR__ . '/../config/module.config.php';
	}
	public function getServiceConfig()
	{
		return [
			'services' => [
				'categories' => [
					__CLASS__,
				],
				'test' => __FILE__,
			],
		];
	}
}



