<?php
	echo Menu::item([
		"name"=>"Order",
		"icon"=>"nav-icon fa fa-wrench",
		"route"=>"#",
		"links"=>[
			["route"=>"order/create","text"=>"Create Order","icon"=>"far fa-circle nav-icon"],
			["route"=>"order","text"=>"Manage Order","icon"=>"far fa-circle nav-icon"],
		]
	]);
