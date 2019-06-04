<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Insert</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script>
        function insert_msg() {
            var xhttp = new XMLHttpRequest();
            var FD= document.getElementById("ajaxForm");
            var _token=FD.elements[0].value;
            var name=FD.elements[1].value;
            var category=FD.elements[2].value;
            var description=FD.elements[3].value;
            var formData = {_token:_token,name:name, category:category, description:description};
            console.log(formData);
            var FD2  = new FormData();
            for(name in formData) {
                FD2.append(name, formData[name]);

            }
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("insert-msg").innerHTML = JSON.parse(this.responseText).response;
                    //setTimeout(document.getElementById("insert-msg").innerHTML="",5000);
                }
              };
              xhttp.open("POST", "/p", true);
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
               <label for="name">Name:</label>
               <input type="text" id="name" name="name" class="form-control">
           </div>
           <div class="form-group">
               <label for="category">Category:</label>
               <input type="text" id="category" name="category" class="form-control">
           </div>
           <div class="form-group">
               <label for="description">Description:</label>
               <textarea name="description" id="description" cols="30" rows="5" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <button class="form-control bg-success text-white" type="reset" onclick="insert_msg()">Insert</button>
            </div>
        </div>
        <div class="col"></div>
        </div>
    </form>

    <div class="row">
        <div class="col"></div>
        <div class="col">
        <div id="insert-msg" class="text-success">

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
        document.getElementById("insert-msg").innerHTML = " ";
        }, 6000);
</script>
</body>
</html><?php /**PATH C:\xampp\htdocs\Atulsia\resources\views/insertView.blade.php ENDPATH**/ ?>