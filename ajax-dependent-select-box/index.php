<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>

    <div class="container bg-success p-5">
        <div class="row justify-content-centre">
            <div class="col">
                <h1>DEPENDENT SELECT BOX</h1>
            </div>
        </div>
        <div class="row justify-content-between mt-2">
            <div class="col-md-4">
                <h2>Countries</h2>
                <select class="form-control" id="country">
                    <option value="">Select Country</option>
                </select>
            </div>
            <div class="col-md-4">
                <h2>Cities</h2>
                <select class="form-control" id="city">

                </select>
            </div>
        </div>
    </div>


    <script src="js/jquery.js"></script>
    <script>
        $(document).ready(function() {
            function loadData(type, category_id) {
                $.ajax({
                    url: "load-select.php",
                    type: "POST",
                    data: {
                        type: type,
                        id: category_id
                    },
                    success: function(data) {
                        if (type == "cityData") {
                            $("#city").html(data);
                        } else {
                            $("#country").append(data);
                        }
                    }
                })
            }
            loadData()

            $("#country").on("change", function() {
                var country = $("#country").val();
                if(country != ""){
                    loadData("cityData", country)
                }else{
                    $("#city").html("");
                }
                
            })
        })
    </script>
</body>

</html>