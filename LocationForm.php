<?php 
include './php/config/autoload.php';

extract($_POST);
$locationData = $user->get_location();
//print_r($locationData);
if($locationData){
        
         $location = new location($locationData['location_id'],$locationData['address'],$locationData['country'],$locationData['latitude'],$locationData['longitude'],$locationData['user_id']);
         if(isset($submit)){

                $location->address = $address;
                $location->country = $country;
                $location->latitude  = $latitude;
                $location->longitude = $longitude;
                
                $result = $user->update_location($location);
                if($result){
                        echo "Your location is updated";
                }
         }
}else{
        $location = new location();
       
        if(isset($submit)){
          $location->address = $address;
          $location->country = $country;
          $location->latitude  = $latitude;
          $location->longitude = $longitude;
          
          $result = $user->create_location($location);
          if($result){
                  echo "Your location is here";
          }
        }
}


?>



<!doctype html>
<html lang="en">                             
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Location Form</title>
  </head>
  <body>
  <?php include './layouts/navbar.php'; ?>
  <div class="container mt-5">
    <form method="POST">
     <div class="row justify-content-center">
        <div class="col-md-8">
         <div class="card ">
            <div class="card-header pt-2">
                <h1>Location Form</h1>
  
                <div class="form-group">
    
                 <input type="text" class="form-control" name="address" value="<?=$location->address ?>" placeholder="address" ><br>

                </div>
                 <div class="form-group">                         
                      <input type="text" class="form-control" name="country" value="<?=$location->country ?>" placeholder="country" ><br>

                 </div>
                 <div class="form-group">                             

                       <input type="text" class="form-control" name="latitude" value="<?=$location->latitude ?>" placeholder="latitude" ><br>

                 </div>
                 <div class="form-group">                             

                       <input type="text" class="form-control" name="longitude" value="<?=$location->longitude ?>" placeholder="longitude" ><br>

                 </div>
                   

                 <input value="update" type="submit" class="btn btn-primary" name="submit"></input>
                         
                  </div>
                 
                   
             </div>
          </div>
        </div>
    </div>
  </form>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
  <!-- 
    <script>
function myMap() {
var mapProp= {
  center:new google.maps.LatLng(,),
  zoom:5,
};
var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>
-->
  </body>
</html>