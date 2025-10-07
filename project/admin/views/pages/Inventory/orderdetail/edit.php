<?php
echo Page::title(["title"=>"Edit OrderDetail"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"orderdetail", "text"=>"Manage OrderDetail"]);
echo Page::context_open();
echo Form::open(["route"=>"orderdetail/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$orderdetail->id"]);
	echo Form::input(["label"=>"Order","name"=>"order_id","table"=>"orders","value"=>"$orderdetail->order_id"]);
	echo Form::input(["label"=>"Product","name"=>"product_id","table"=>"products","value"=>"$orderdetail->product_id"]);
	echo Form::input(["label"=>"Qty","type"=>"text","name"=>"qty","value"=>"$orderdetail->qty"]);
	echo Form::input(["label"=>"Price","type"=>"text","name"=>"price","value"=>"$orderdetail->price"]);
	echo Form::input(["label"=>"Vat","type"=>"text","name"=>"vat","value"=>"$orderdetail->vat"]);
	echo Form::input(["label"=>"Discount","type"=>"text","name"=>"discount","value"=>"$orderdetail->discount"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
