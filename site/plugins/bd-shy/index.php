<?php

Kirby::plugin('bd/kirby-shy', [
	'hooks' => [
		'kirbytags:before' => function ($text, $data, $options) {
			return Str::replace($text, "(-)", "&shy;");
		}
	]
]);