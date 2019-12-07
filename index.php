<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dynamic Dependent Select Box using jQuery, Ajax and PHP</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<?php
  include_once 'config.php';
  $query = "SELECT * FROM country Order by country_name";
  $result = $db->query($query);
?>
<div class="container">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
    <form>
        <div class="form-group">
          <label for="email">Country</label>
          <select name="country" id="country" class="form-control" onchange="FetchState(this.value)"  required>
            <option value="">Select Country</option>
          <?php
            if ($result->num_rows > 0 ) {
               while ($row = $result->fetch_assoc()) {
                echo '<option value='.$row['id'].'>'.$row['country_name'].'</option>';
               }
            }
          ?> 
          </select>
        </div>
        <div class="form-group">
          <label for="pwd">State</label>
          <select name="state" id="state" class="form-control" onchange="FetchCity(this.value)"  required>
            <option>Select State</option>
          </select>
        </div>

        <div class="form-group">
          <label for="pwd">City</label>
          <select name="city" id="city" class="form-control">
            <option>Select City</option>
          </select>
        </div>
      </form>
  </div>
  </div>
</div>
<script type="text/javascript">
  function FetchState(id){
    $('#state').html('');
    $('#city').html('<option>Select City</option>');
    $.ajax({
      type:'post',
      url: 'ajaxdata.php',
      data : { country_id : id},
      success : function(data){
         $('#state').html(data);
      }

    })
  }

  function FetchCity(id){ 
    $('#city').html('');
    $.ajax({
      type:'post',
      url: 'ajaxdata.php',
      data : { state_id : id},
      success : function(data){
         $('#city').html(data);
      }

    })
  }

  
</script>
</body>
</html>
