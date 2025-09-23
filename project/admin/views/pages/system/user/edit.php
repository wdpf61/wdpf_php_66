<?php
	$html="";

	echo Page::title(["title"=>"Edit User"]);
	echo Page::body_open();
	echo Page::context_open(["manage"=>"Manage User","route"=>"user"]);


	echo Form::open(["route"=>"edit-user"]);
	echo Form::text(["name"=>"id","type"=>"hidden","value"=>$user->id]);	
	echo Form::text(["label"=>"User Name","name"=>"name","type"=>"text","value"=>$user->name]);	
	echo Form::select(["label"=>"Role","name"=>"role_id","table"=>"roles","value"=>$user->role_id]);	
	echo Form::text(["label"=>"Password","name"=>"password","type"=>"password"]);
	echo Form::text(["label"=>"Email","name"=>"email","type"=>"text","value"=>$user->email]);	
	echo Form::text(["label"=>"Full Name","name"=>"full_name","type"=>"text","value"=>$user->full_name]);
	echo Form::text(["label"=>"Photo","name"=>"photo","type"=>"file","value"=>$user->photo]);
	echo Form::text(["label"=>"Mobile","name"=>"mobile","type"=>"text","value"=>$user->mobile]);	
	echo Form::text(["label"=>"Verify Code","type"=>"text","name"=>"verify_code","value"=>"$user->verify_code"]);
	echo Form::text(["label"=>"Inactive","type"=>"checkbox","name"=>"inactive","value"=>"$user->inactive","checked"=>$user->inactive?"checked":""]);
	
	echo Form::button(["name"=>"update","value"=>"Update","type"=>"submit"]);
	echo Form::close();

	echo Page::context_close();
	echo Page::body_close();

	//echo $html;
?>


