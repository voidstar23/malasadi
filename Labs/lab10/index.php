

<?php

    include 'inc/header.php';



    include 'dbConnection.php';

function getAllPets(){
        
      $conn = getDatabaseConnection('pets');
      
      $sql = "SELECT id, name, type FROM pets ORDER BY name";
      
      $stmt = $conn->prepare($sql);  
      $stmt->execute();
      $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $records;  
    }







    $petList = getAllPets();
    
    $Petsnumber=0;
    
    //print_r($petList);
    
    foreach ($petList as $pet) {
        $Petsnumber++;
      
        
    }




?>
        <input type="hidden" id="petnum" value="<?php echo $Petsnumber ?>">
       
       
      <script > 
 $(document).ready(function(){



var k=0;
    var i=$("#petnum").val();
    
    
    
    while (k<i) {
   
   
   k++;
    
    
      $.ajax({


          
                    type: "GET",
                    url: "api/getPetInfo.php",
                    dataType: "json",
                    data: { "id": k},
                    success: function(data,status) {
                       //alert(data.breed);
                       //log.console(data.pictureURL);
                       
            
                       $("#car").append("<div class='item'> <img src='img/" + data.pictureURL +"' style='width:100%;' >  </div>");
                       
                  
                       i++;
                         
                       
                      // $("#car").append("<div class='item'> <img src='https://images.pexels.com/photos/257840/pexels-photo-257840.jpeg?auto=compress&cs=tinysrgb&h=350' style='width:100%;'   >  </div>");
                       
                       
                       
                          
                       
                       
                       
                       
                    
                    },
                    complete: function(data,status) { //optional, used for debugging purposes
                    //alert(status);
                    }
                    
                });//ajax
    
    
  
    
    }

}); //document ready
</script>

 
       
       
       
        <!-- Add Carousel here -->
        
        
        
        
        
        <div class="container">
  <h2></h2>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
      <li data-target="#myCarousel" data-slide-to="4"></li>
      <li data-target="#myCarousel" data-slide-to="5"></li>
      <li data-target="#myCarousel" data-slide-to="6"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" id="car">

      <div class="item active">
        <img src="http://olsenvet.com/wp-content/uploads/2014/10/53dc0374ce93c.png.jpeg" alt="Los Angeles" style="width:100%;">
        <div class="carousel-caption">
          <h3></h3>
          <p></p>
        </div>
      </div>

   
  </div>
    

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev" id="next">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>








        <br>
        
        <a href="pets.php"  class="btn btn-outline-primary" role="button" aria-pressed="true"> Adopt Now! </a>
        
        
        <br>
        

<?php

    include 'inc/footer.php';

?>