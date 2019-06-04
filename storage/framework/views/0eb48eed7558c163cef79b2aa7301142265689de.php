<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script>
        function insert_msg() {
            var xhttp = new XMLHttpRequest();
            var FD= document.getElementById("ajaxForm");
            var _token=FD.elements[0].value;
            var name=FD.elements[2].value;
            var category=FD.elements[3].value;
            var description=FD.elements[4].value;
            var formData = {_token:_token ,name:name, category:category, description:description};
            console.log(formData);
            var FD2  = new FormData();
            for(name in formData) {
                FD2.append(name, formData[name]);

            }
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("update-msg").innerHTML = JSON.parse(this.responseText).response;
                    //setTimeout(document.getElementById("update-msg").innerHTML="",5000);
                }
              };
              xhttp.open("POST", "/update/<?php echo e($data->id); ?>", true);
              //xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
              xhttp.send(FD2);
            }
    </script>
</head>
<body>
    <form id="ajaxForm" method="post" action="#">
        <?php echo csrf_field(); ?>
      <div  class="row">
          <div class="col"></div>
          <div class="col">
          <div class="form-group">
               <label for="name">Id:</label>
               <input type="text" id="id" name="id" class="form-control" value=<?php echo e($data->id); ?> disabled>
           </div>
           <div class="form-group">
               <label for="name">Name:</label>
               <input type="text" id="name" name="name" class="form-control" value=<?php echo e($data->name); ?>>
           </div>
           <div class="form-group">
               <label for="category">Category:</label>
               <input type="text" id="category" name="category" class="form-control" value=<?php echo e($data->category); ?>>
           </div>
           <div class="form-group">
               <label for="description">Description:</label>
               <textarea name="description" id="description" cols="30" rows="5" class="form-control"><?php echo e($data->description); ?></textarea>
            </div>
            <div class="form-group">
                <button class="form-control bg-success text-white" type="button" onclick="insert_msg()">Update</button>
            </div>
        </div>
        <div class="col"></div>
        </div>
    </form>


    <div class="row">
        <div class="col"></div>
        <div class="col">
        <div id="update-msg" class="text-success">

        </div>
        </div>
        <div class="col"></div>
    </div>



        <hr class="bg-danger" style="height:10%;">


    <div class="row">
        <div class="col"></div>
        <div class="col">
        <form method="get" action="/p">
            <div class="form-group">
                <button class="form-control bg-danger text-white" type="submit">View</button>
            </div>
        </form>
        </div>
        <div class="col"></div>
    </div>


<script>
    setInterval(function(){
        document.getElementById("update-msg").innerHTML = " ";
        }, 6000);
</script>
</body>
</html><?php /**PATH C:\xampp\htdocs\Atulsia\resources\views/updateView.blade.php ENDPATH**/ ?>