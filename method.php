<?php
require_once "connection.php";
class Student 
{

   public  function get_stds()
   {
      global $mysqli;
      $query="SELECT * FROM t_students";
      $data=array();
      $result=$mysqli->query($query);
      while($row=mysqli_fetch_object($result))
      {
         $data[]=$row;
      }
      $response=array(
                     'status' => 1,
                     'message' =>'Get List Students Successfully.',
                     'data' => $data
                  );
      header('Content-Type: application/json');
      echo json_encode($response);
   }

   public function get_std($id=0)
   {
      global $mysqli;
      $query="SELECT * FROM t_students";
      if($id != 0)
      {
         $query.=" WHERE id=".$id." LIMIT 1";
      }
      $data=array();
      $result=$mysqli->query($query);
      while($row=mysqli_fetch_object($result))
      {
         $data[]=$row;
      }
      $response=array(
                     'status' => 1,
                     'message' =>'Get Students Successfully.',
                     'data' => $data
                  );
      header('Content-Type: application/json');
      echo json_encode($response);
   }


   public function insert_std()
      {
         global $mysqli;
         $arrcheckpost = array('studentid' => '', 'student_name' => '', 'gender' => '', 'address' => '', 'major'   => '', 'phone'   => '', 'tuition_fee'   => '');
         $hitung = count(array_intersect_key($_POST, $arrcheckpost));
         if($hitung == count($arrcheckpost)){
          
               $result = mysqli_query($mysqli, "INSERT INTO t_students SET
               student_id = '$_POST[student_id]',
               student_name = '$_POST[student_name]',
               gender = '$_POST[gender]',
               address = '$_POST[address]',
               major = '$_POST[major]',
               phone = '$_POST[phone]',
               tuition_fee = '$_POST[jurusan]'");
                
               if($result)
               {
                  $response=array(
                     'status' => 1,
                     'message' =>'Mahasiswa Added Successfully.'
                  );
               }
               else
               {
                  $response=array(
                     'status' => 0,
                     'message' =>'Students Addition Failed.'
                  );
               }
         }else{
            $response=array(
                     'status' => 0,
                     'message' =>'Parameter Do Not Match'
                  );
         }
         header('Content-Type: application/json');
         echo json_encode($response);
      }
 
   function update_std($id)
      {
         global $mysqli;

         $arrcheckpost = array('studentid' => '', 'student_name' => '', 'gender' => '', 'address' => '', 'major'   => '', 'phone'   => '', 'tuition_fee'   => '');
         $hitung = count(array_intersect_key($_POST, $arrcheckpost));
         if($hitung == count($arrcheckpost)){
              $result = mysqli_query($mysqli, "UPDATE t_students SET
               student_id = '$_POST[student_id]',
               student_name = '$_POST[student_name]',
               gender = '$_POST[gender]',
               address = '$_POST[address]',
               major = '$_POST[major]',
               phone = '$_POST[phone]',
               tuition_fee = '$_POST[jurusan]'
              WHERE id='$id'");
            if($result)
            {
               $response=array(
                  'status' => 1,
                  'message' =>'Students Updated Successfully.'
               );
            }
            else
            {
               $response=array(
                  'status' => 0,
                  'message' =>'Students Updation Failed.'
               );
            }
         }else{
            $response=array(
                     'status' => 0,
                     'message' =>'Parameter Do Not Match'
                  );
         }
         header('Content-Type: application/json');
         echo json_encode($response);
      }

   function delete_std($id)
   {
      global $mysqli;
      $query="DELETE FROM t_students WHERE id=".$id;
      if(mysqli_query($mysqli, $query))
      {
         $response=array(
            'status' => 1,
            'message' =>'Students Deleted Successfully.'
         );
      }
      else
      {
         $response=array(
            'status' => 0,
            'message' =>'Students Deletion Failed.'
         );
      }
      header('Content-Type: application/json');
      echo json_encode($response);
   }
}
 
?>
