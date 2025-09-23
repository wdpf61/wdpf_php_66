<?php
echo Page::title(["title"=>"Edit District"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"district", "text"=>"Manage District"]);
echo Page::context_open();
echo Form::open(["route"=>"district/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$district->id"]);
	echo Form::input(["label"=>"Name","type"=>"text","name"=>"name","value"=>"$district->name"]);
	echo Form::input(["label"=>"Division","name"=>"division_id","table"=>"divisions","value"=>"$district->division_id"]);
	echo Form::input(["label"=>"Inactive","type"=>"checkbox","name"=>"inactive","value"=>"$district->inactive","checked"=>$district->inactive?"checked":""]);
	echo Form::input(["label"=>"Photo","type"=>"file","name"=>"photo","value"=>$district->photo]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
