<?php
	echo Menu::item([
		"name"=>"Orderdetail",
		"icon"=>"nav-icon fa fa-wrench",
		"route"=>"#",
		"links"=>[
			["route"=>"orderdetail/create","text"=>"Create Orderdetail","icon"=>"far fa-circle nav-icon"],
			["route"=>"orderdetail","text"=>"Manage Orderdetail","icon"=>"far fa-circle nav-icon"],
		]
	]);
