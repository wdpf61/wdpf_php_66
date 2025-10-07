<?php
echo Page::title(["title"=>"Create OrderDetail"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"orderdetail", "text"=>"Manage OrderDetail"]);
echo Page::context_open();
echo Form::open(["route"=>"orderdetail/save"]);
	echo Form::input(["label"=>"Order","name"=>"order_id","table"=>"orders"]);
	echo Form::input(["label"=>"Product","name"=>"product_id","table"=>"products"]);
	echo Form::input(["label"=>"Qty","type"=>"text","name"=>"qty"]);
	echo Form::input(["label"=>"Price","type"=>"text","name"=>"price"]);
	echo Form::input(["label"=>"Vat","type"=>"text","name"=>"vat"]);
	echo Form::input(["label"=>"Discount","type"=>"text","name"=>"discount"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
