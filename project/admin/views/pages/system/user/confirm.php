<?php
echo Page::title(["title"=>"Confirm User"]);
echo Page::body_open();
echo Page::context_open();

//FormOpen
echo Form::open(["route"=>"user/delete/$id"]);
echo "Are you sure?";
echo Form::text(["name"=>"id","type"=>"hidden","value"=>$id]);
echo Form::button(["name"=>"create","class"=>"btn btn-danger","value"=>"Delete","type"=>"submit"]);
echo Form::close();
//FormClose

echo Page::context_close();
echo Page::body_close();