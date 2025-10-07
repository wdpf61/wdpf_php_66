<?php
echo Page::title(["title"=>"Show Customer"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"customer", "text"=>"Manage Customer"]);
echo Page::context_open();
echo Customer::html_row_details($id);
echo Page::context_close();
echo Page::body_close();
