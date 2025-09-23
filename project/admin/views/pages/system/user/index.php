<?php
if(isset($_POST["delete"])){
	User::delete($_POST["id"]);
}

$page=isset($_GET["page"])?$_GET["page"]:1;

echo Page::title(["title"=>"Manage User"]);
echo Page::body_open();
echo Page::context_open(["create-button"=>"New User","route"=>"create-user"]);
echo User::html_table($page);
echo Page::context_close();
echo Page::body_close();
?>
