
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>AJAX: Sign Up Page</title>

        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script>
        
            function validateForm() {
                
                return false;
           
            }
            
        </script>
        
        <script>
            
            $(document).ready( function(){
                
                $("#username").change(function()
                {
                    // alert(  $("#username").val() );
                    $.ajax({

                        type: "GET",
                        url: "checkUsername.php",
                        dataType: "json",
                        data: { "username": $("#username").val() },
                        success: function(data,status) {
                        
                            // alert(data.password);
                            
                            if (!data) {  //data == false
                                
                                $("#isAvail").html("Available");
                                $("#isAvail").css('color', 'green');
                                
                            } else {
                                
                                $("#isAvail").html("Unavailable");
                                $("#isAvail").css('color', 'red');
                                
                            }
                        
                        },
                        complete: function(data,status) { //optional, used for debugging purposes
                        //alert(status);
                        }
                        
                    });//ajax
                    
                    
                });
                
                $("#checkPass").change(function() {
                    if($("#checkPass").val() != $("#password").val()){
                        $("#match").html("Passwords Don't Match!");
                        $("#match").css('color', 'red');
                    }
                    else{
                        $("#match").html("");
                        
                    }
                });
                
                $("#state").change(function() {
                    //alert($("#state").val());
                    
                    $.ajax({

                        type: "GET",
                        url: "http://itcdland.csumb.edu/~milara/ajax/countyList.php",
                        dataType: "json",
                        data: { "state": $("#state").val()},
                        success: function(data,status) {
                          
                        //   alert(data[0].county);
                        $("#county").html("<option> - Select One -</option>");
                        for(var i = 0; i < data.length; i++){
                             $("#county").append("<option>" + data[i].county + "</option>");
                        }
                        
                        },
                        complete: function(data,status) { //optional, used for debugging purposes
                        //alert(status);
                        }
                    
                    });//ajax
                    
                    
                    
                });
                
                $("#sub").click(function(){
                    $("#success").html("Success!");
                    $("#success").css('color', 'green');
                });
                
                $("#zipCode").change( function(){  
                    
                    // alert( $("#zipCode").val() );  
                    
                    $.ajax({

                        type: "GET",
                        url: "http://itcdland.csumb.edu/~milara/ajax/cityInfoByZip.php",
                        dataType: "json",
                        data: { "zip": $("#zipCode").val()   },
                        success: function(data,status) {
                          
                            if(data == false){
                                $("#na").html(" Zip Code Not Found");  
                            }
                            else{
                                $("#na").html("");
                                $("#city").html(data.city);
                                $("#lati").html(data.latitude);
                                $("#long").html(data.longitude);
                            }
                        
                        },
                        complete: function(data,status) { //optional, used for debugging purposes
                        //alert(status);
                        }
                        
                    });//ajax
                    
                    
                    
                } );
                
            }   ); //documentReady
            
            
            
        </script>

    </head>

    <body>
    
       <h1> Sign Up Form </h1>
    
        <form onsubmit="return validateForm()">
            <fieldset>
               <legend>Sign Up</legend>
                First Name:  <input type="text"><br> 
                Last Name:   <input type="text"><br> 
                Email:       <input type="text"><br> 
                Phone Number:<input type="text"><br><br>
                Zip Code:    <input type="text" id="zipCode"><span id="na"></span><br>
                City:        <span id="city"></span>
                <br>
                Latitude: <span id="lati"></span>
                <br>
                Longitude: <span id="long"></span>
                <br><br>
                State: 
                <select id="state">
                    <option value="">Select One</option>
                    <option value="ca"> California</option>
                    <option value="ny"> New York</option>
                    <option value="tx"> Texas</option>
                    <option value="va"> Virginia</option>
                </select><br />
                
                Select a County: <select id="county"></select><br>
                
                
                Desired Username: <input type="text" id = "username"><span id="isAvail"></span><br>
                
                Password: <input id="password" type="password"><br>
                
                Type Password Again: <input id="checkPass" type="password"> <span id="match"></span><br>
                
                <input type="submit" value="Sign up!" id="sub"> <span id="success"></span>
                <br />
            </fieldset>
        </form>
      
    </body>
</html>