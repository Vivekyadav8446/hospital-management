<?php
session_start();

?>

<!DOCTYPE html>

<head>
    
    <title>Job Request</title>
</head>
<body>
    <?php 
    
      include("../include/header.php");
    ?>

      <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
            <div class="col-md-2"  style="margin-left: -30px;">


            <?php
            include("sidenav.php");
            ?>


            </div>
            <div class="col-md-10">
                <h5 class="text-center my">Job Request</h5>
                <div id="show"></div>
            </div>
            </div>
        </div>
      </div>

      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        show(); // Load data when the page is ready

        function show(){
            $.ajax({
                url: "ajax_job_request.php",
                method: "POST",
                success: function(data){
                    $("#show").html(data);
                }
            });
        }
       $(document).on('click','.approve',function(){
        var id = $(this).attr("id");
        alert(id);
        $.ajax({
            url:"ajax_approve.php",
            method:"POST",
            data:{id:id},
            success:function(data){
                show();
            }
        });
       });


       $(document).on('click','.reject',function(){
        var id = $(this).attr("id");
        alert(id);
        $.ajax({
            url:"ajax_reject.php",
            method:"POST",
            data:{id:id},
            success:function(data){
                show();
            }
        });
       });
    });

        
</script>

</body>
</html>