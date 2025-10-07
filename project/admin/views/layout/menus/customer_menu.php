<?php
	echo Menu::item([
		"name"=>"Customer",
		"icon"=>"nav-icon fa fa-wrench",
		"route"=>"#",
		"links"=>[
			["route"=>"customer/create","text"=>"Create Customer","icon"=>"far fa-circle nav-icon"],
			["route"=>"customer","text"=>"Manage Customer","icon"=>"far fa-circle nav-icon"],
		]
	]);
