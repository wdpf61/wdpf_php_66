<?php
echo Page::title(["title"=>"Edit Customer"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"customer", "text"=>"Manage Customer"]);
echo Page::context_open();
echo Form::open(["route"=>"customer/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$customer->id"]);
	echo Form::input(["label"=>"Name","type"=>"text","name"=>"name","value"=>"$customer->name"]);
	echo Form::input(["label"=>"Mobile","type"=>"text","name"=>"mobile","value"=>"$customer->mobile"]);
	echo Form::input(["label"=>"Email","type"=>"text","name"=>"email","value"=>"$customer->email"]);
	echo Form::input(["label"=>"Address","type"=>"textarea","name"=>"address","value"=>"$customer->address"]);
	echo Form::input(["label"=>"Photo","type"=>"file","name"=>"photo","value"=>$customer->photo]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
