<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Convertatsiya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <h1 class="text-center">Valyutalar kursi</h1>
    <div class="row mt-5">
        <div class="col-6">
       <div class="input-group mb-3">
<!--           <label for="from">Siz kiritmoqch bolgan davlat valyuta</label>-->

               <select name="" class="form-select" id="from"></select>
               <input type="number" class="form-control current" value="">
           </div>
       </div>
        <div class="col-6">
            <div class="input-group mb-3">

                    <select name="" class="form-select" id="to"></select>
                    <input type="text" class="form-control resolt" >

            </div>
        </div>
    </div>
</div>








<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<script>


    function convert(){
        var currnet=$('.current').val();
        var from=$('#from').val();
        var to=$('#to').val();
        var api_key="73d234092c-e186ce5596-rfvye3";

        fetch(`https://api.fastforex.io/convert?from=${from}&to=${to}&amount=${currnet}&api_key=${api_key}`)
            .then((response)=>{
                 return response.json();
            })
            .then((data)=>{
       $('.resolt').val(data['result'][to]);
        })

    }
    $('select').change(function (){
        convert();
    })
    $(document).ready(function (){
        var api_key="73d234092c-e186ce5596-rfvye3";
        fetch(`https://api.fastforex.io/currencies?api_key=${api_key}`)
            .then((response)=>{
  return response.json();
            })
            .then((data)=>{
            console.log(data)
            var options='';
            $.each(data['currencies'], function (index,value) {
                options += '<option value=' + index + '>';
                options += '(' + index + ')' + value;
                options += '</option>';
            });
            console.log(options);
                $('#from').append(options);
                $('#to').append(options);

        })
    })
</script>
</body>
</html>