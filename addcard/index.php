<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Mobile Templates</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700"
    rel="stylesheet">

  <!-- Bootstrap CSS File -->


  <link rel="stylesheet" href="style/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="style/custome2.css?v=version2">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- jQuery Validation Plugin -->
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.min.js"></script>

  <script src="js/bootstrap.min.js"></script>

  <script type="text/javascript">
    /*
    all this code in validateform() should not be like this
    */
    function validateform() {
      var number = document.myform.number.value;
      var year = document.myform.year.value;
      var month = document.myform.month.value;
      var csv = document.myform.csv.value;
      var userid = document.myform.userid.value;

      if (number == null || number == "") {
        alert("Name can't be blank");
        return false;
      } else if (year == null || year == "") {
        alert("year can't be blank");
        return false;
      } else if (month == null || month == "") {
        alert("month can't be blank");
        return false;
      } else if (csv == null || csv == "") {
        alert("csv can't be blank");
        return false;
      } else if (userid == null || userid == "") {
        alert("userid can't be blank");
        return false;
      }
    }
  </script>
</head>

<body>
  <div class="section">
    <div class="container">
      <div class="row">
        <div class="col-sm-3">

        </div>
        <div class="col-sm-6 main-body">
          <img src="" alt="">
          <h2 class="heading">Attach Card</h2>
          <p class="description">plese enter the details for the card that will <br> pay out the monthely donations</p>

          <form action="addcard.php" method="POST" name="myform" class="form-signin" role="form">
            <input type="text" class="form-custome" name="number" id="loginnumber" value="24242424242424242424"
              placeholder="CARD NUMBER">
            <input type="text" class="form-custome" name="year" id="loginyear" value="12/21" placeholder=" YEAR/MONTH">
            <input type="text" class="form-custome" name="cvs" id="logincsv" value="123" placeholder=" CVS">
            <input type="text" class="form-custome" name="userid" id="loginuserid" value="123" placeholder=" Userid">
            <button id="submit" class="btn btn-lg btn-primary btn-block" type="submit"><b>ATTACH CARD</b></button>
          </form>
          <p class="description-end">we employ multilevel safegurads including TLS<br> encryption to protect your data
          </p>
          <button class="btn-end " type="submit">powereb by<b> STRIPE</b></button>
        </div>
        <div class="col-sm-3">

        </div>

      </div>
    </div>
  </div>
  <script>
  
  
      /*
    
    This is how you initialize jquery in web page on document.ready event handler 
*/
  
    $(document).ready(function () {
      // to check page is loading jquery



      $(".form-signin").submit(function (e) {
        e.preventDefault();

        // get form action url
        var postUrl = $(".form-signin").attr("action");

        // get all form fields data 
        var postData = $(".form-signin").serialize();

        // check form post data coming
        //alert(postData);

        // ready to make ajax call
        $.ajax({
          url: postUrl,
          type: "POST",
          data: postData,
          //dataType: "json",
          success: function (response) {
            // server response from .php page will be received inside this 
            // call back section of the success function
            console.log(response);
            alert(response);
          },
          error: function (err) {
            // if server side code has error response, then this call back 
            // function will be called.
            alert("Whoops! Something went wrong. Please check logs");
          }
        });
      });


    });
    </script>

</body>

</html>