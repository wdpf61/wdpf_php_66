<?php

class Role
{
    public $id;
    public $name;
    public $created_at;
    public $updated_at;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    function save()
    {
        global $db, $tx;
        $result = $db->query("insert into {$tx}roles(name) values('$this->name')");
        return $result;
    }
    static function display()
    {
        global $db, $tx, $base_url; 
        $result = $db->query("select * from {$tx}roles");
        $html = "
        <table class=\"table table-sm\">
        <thead>
            <tr>
                <th style=\"width: 10px\">Id</th>
                <th>name</th>
                <th>created at</th>
                <th>action</th>
            
            </tr>
        </thead>
        <tbody>
            
            
            ";

            while ($row = $result->fetch_object()) {
                $html .= "
            
            
            <tr class=\"align-middle\">
                <td>$row->id</td>
                <td>$row->name</td>
                <td>$row->created_at</td>
                <td> 
                <a class='btn btn-success'href=\" \">Details</a> | 
                <a class='btn btn-secondary'href=\"{$base_url}/role/edit/$row->id\">Edit</a> | 
                <a class='btn btn-danger' href=\" {$base_url}/role/delete/$row->id\">Delete</a></td>

            </tr>";
            }

            $html .= " </tbody></table>";

            return $html;
    }

    function update(){
        global $db, $tx;
        $result = $db->query("update {$tx}roles set name='$this->name'  where id=$this->id");
        return $result;
    }
    static function search($id){
        global $db, $tx;
        $result = $db->query(" select * from  {$tx}roles where id=$id");
        return $result->fetch_object();
    }
    static function delete($id){
        global $db, $tx;
        $result = $db->query(" delete from {$tx}roles where id=$id");
        return $result;
    }

}








?>


