<?php
	echo Menu::item([
		"name"=>"District",
		"icon"=>"nav-icon fa fa-wrench",
		"route"=>"#",
		"links"=>[
			["route"=>"district/create","text"=>"Create District","icon"=>"far fa-circle nav-icon"],
			["route"=>"district","text"=>"Manage District","icon"=>"far fa-circle nav-icon"],
		]
	]);
