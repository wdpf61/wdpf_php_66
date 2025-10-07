<?php
echo Page::title(["title"=>"Show OrderDetail"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"orderdetail", "text"=>"Manage OrderDetail"]);
echo Page::context_open();
echo OrderDetail::html_row_details($id);
echo Page::context_close();
echo Page::body_close();
