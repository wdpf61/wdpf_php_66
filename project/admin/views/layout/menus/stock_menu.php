<?php
	echo Menu::item([
		"name"=>"Stock",
		"icon"=>"nav-icon fa fa-wrench",
		"route"=>"#",
		"links"=>[
			["route"=>"stock/create","text"=>"Create Stock","icon"=>"far fa-circle nav-icon"],
			["route"=>"stock","text"=>"Manage Stock","icon"=>"far fa-circle nav-icon"],
		]
	]);
