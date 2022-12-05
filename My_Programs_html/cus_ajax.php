<?php
    include("connection.php");
    $sqlb="select distinct Type from products";
   if($_POST['Brand']==""){
    $rb=mysqli_query($con,$sqlb) or die("Query Unsuccessful!");

    $str="";

    while($card=mysqli_fetch_array($rb)){
      $Type=$card['Type'];
      $str .= "<option value='$Type'>$Type</option>";
    }
}
else if(($_POST['Brand']=="brndData")){
    $sqlb="select  Brand from products where Type='$Type'";
   
    $rb=mysqli_query($con,$sqlb);
    while($card=mysqli_fetch_array($rb)){
      $Brand=$card['Brand'];
      echo "<option value='$Brand'>$Brand</option>";
    }
}
    echo $str;
    ?>


<script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript">

    $(document).ready(function(){
      function lddta(tp, ct){
$.ajax({
  url: "cus_lptp.php",
  type: "POST",
  data: {typ: tp, id: ct},
  //dataType: "dataType",
  success: function (data) {
    if(tp=="typ"){
      $("brnd").html(data);
    }
    else{
    $("typ").append(data);
  }
  }
});
}
      lddta();
      $("typ").on("change",function(){
        var typ =   $("typ").val();

        lddta("brndData", typ)
      })
    });
  </script>

    
    
    
    