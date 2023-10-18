<?php
require_once "method.php";
$std = new Student();
$request_method=$_SERVER["REQUEST_METHOD"];
switch ($request_method) {
   case 'GET':
         if(!empty($_GET["id"]))
         {
            $id=intval($_GET["id"]);
            $std->get_std($id);
         }
         else
         {
            $std->get_stds();
         }
         break;
   case 'POST':
         if(!empty($_GET["id"]))
         {
            $id=intval($_GET["id"]);
            $std->update_std($id);
         }
         else
         {
            $std->insert_std();
         }
         break;
   case 'DELETE':
          $id=intval($_GET["id"]);
            $std->delete_std($id);
            break;
   case 'PUT':
         if(!empty($_GET["id"]))
         {
            $id=intval($_GET["id"]);
            $std->get_std($id);
         }
         else
         {
            $std->update_stds();
         }
         break;
   default:
         break;
      break;
}
?>
