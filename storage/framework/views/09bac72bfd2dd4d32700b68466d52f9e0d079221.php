<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script>
        function get_view(id){
            var xhttp = new XMLHttpRequest();

            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("detailed-view").innerHTML = JSON.parse(this.responseText).response;
                }
              };
              xhttp.open("get", "/p/"+id, true);
              //xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
              xhttp.send();
        }

        function delete_data(id){
            var xhttp = new XMLHttpRequest();

            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("delete-msg").innerHTML = JSON.parse(this.responseText).response;
                    setTimeout(location.reload(true),5000)
                }
              };
              xhttp.open("get", "/delete/"+id, true);
              //xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
              xhttp.send();
        }
    </script>
</head>
<body>

   <div class="row">
        <div class="col"></div>
        <div class="col">
            <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>View</th>
                            <th>Delete</th>
                            <th>Update</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                           <th scope="row"><?php echo e($d->id); ?></th>
                           <td><?php echo e($d->name); ?></td>
                            <td><a href="#" onclick="get_view(<?php echo e($d->id); ?>)">view</a></td>
                            <td><a href="#" onclick="delete_data(<?php echo e($d->id); ?>)" >delete</a></td>
                            <td><a href="/p/<?php echo e($d->id); ?>/edit">update</a></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
            </table>
        </div>
        <div class="col"></div>
    </div>

    <div class="row">
        <div class="col"></div>
        <div class="col">
            <div id="detailed-view">



            </div>
        </div>
        <div class="col"></div>
    </div>

    <div class="row">
        <div class="col"></div>
        <div class="col">
            <div id="delete-msg">

            </div>
        </div>
        <div class="col"></div>
    </div>



    <hr class="bg-success" style="height:10%;">


    <div class="row">
        <div class="col"></div>
        <div class="col">
        <form method="get" action="/p/create">
            <div class="form-group">
                <button class="form-control bg-success text-white" type="submit">Insert</button>
            </div>
        </form>
        </div>
        <div class="col"></div>
    </div>
</body>
</html><?php /**PATH C:\xampp\htdocs\Atulsia\resources\views/viewView.blade.php ENDPATH**/ ?>