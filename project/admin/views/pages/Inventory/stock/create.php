<?php
echo Page::title(["title"=>"Create Stock"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"stock", "text"=>"Manage Stock"]);
echo Page::context_open();
echo Form::open(["route"=>"stock/save"]);
	echo Form::input(["label"=>"Product","name"=>"product_id","table"=>"products"]);
	echo Form::input(["label"=>"Qty","type"=>"text","name"=>"qty"]);
	echo Form::input(["label"=>"Transaction Type","name"=>"transaction_type_id","table"=>"transaction_types"]);
	echo Form::input(["label"=>"Remark","type"=>"textarea","name"=>"remark"]);
	echo Form::input(["label"=>"Warehouse","name"=>"warehouse_id","table"=>"warehouses"]);
	echo Form::input(["label"=>"Lot","name"=>"lot_id","table"=>"lots"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
