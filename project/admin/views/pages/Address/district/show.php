<?php
echo Page::title(["title"=>"Show District"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"district", "text"=>"Manage District"]);
echo Page::context_open();
echo District::html_row_details($id);
echo Page::context_close();
echo Page::body_close();
