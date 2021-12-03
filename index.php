<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <form class="w-50 offset-3 anil_form">
        <input type="hidden" name="action" value="registrationdata">
        <h1 class="text-center mt-5 ">Registration Form</h1>
        <div class="mb-3">
            <label for="fullname" class="form-label">Full Name</label>
            <input type="text" name="fullname" class="form-control" id="fullname" aria-describedby="emailHelp">
            <div id="emailHelp"  class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="photo" class="form-label">Photo</label>
            <input type="file" name="photo" class="form-control" id="photo">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
    <br>
    <br>
    <hr>
    <br>
    <br>
    <form class="w-50 offset-3 anil_form">
        <input type="hidden" name="action" value="productdata">
        <h1 class="text-center mt-5 ">Product Form</h1>
        <div class="mb-3">
            <label for="fullname" class="form-label">Product Name</label>
            <input type="text" name="fullname" class="form-control" id="fullname" aria-describedby="emailHelp">
            <div id="emailHelp"  class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="photo" class="form-label">Photo</label>
            <input type="file" name="photo" class="form-control" id="photo">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script>
        //1. Check for page
        $(document).ready(function(){
            //alert('okokokokokokoko');
            //$('css_selector').action();
            $('form.anil_form').submit(function(e){ //e = event
                e.preventDefault();


                //alert('okokokokokokokokokok');
                //$.ajax({name:value, name:value, ... })
                var formData = new FormData(this);

                $.ajax({
                    url:"http://localhost/FileUploadingWithAjax2/api.php", //Kaha
                    type:"POST",//Kese
                    data:formData,  // Kya bhejna
                    
                    cache:false,
                    contentType: false,
                    processData: false,

                    success:function(result,status,xhr){
                        console.log(result);
                        if(result == 1){
                            alert('File uploaded successfully');
                        }
                        if(result == 2){
                            alert('Product uploaded successfully');
                        }
                        if(result == 406){
                            alert('Please Upload image(png or jpg or jpeg) file only');
                        }
                    }
                }); //JS Object  {P:V,function}
            });
        });
    </script>
</body>

</html>