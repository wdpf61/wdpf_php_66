<?php
echo Page::title(["title"=>"Show Stock"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"stock", "text"=>"Manage Stock"]);
echo Page::context_open();
echo Stock::html_row_details($id);
echo Page::context_close();
echo Page::body_close();
