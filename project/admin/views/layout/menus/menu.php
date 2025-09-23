<?php
              $folder="views/layout/menus";

              //include "{$folder}/table_menu.php";

              foreach (glob("{$folder}/*_menu.php") as $filename)
              {
                if("{$folder}/table_menu.php"==$filename)continue;
                  include $filename;
              }
          
          ?>