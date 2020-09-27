@extends('components.newfile')
@section('content1')
<div class="container">
                <br>
                <h1>
                    Your Appointments:
                </h1>
                <hr color="black" width="320px">
                <br>
                <h2>
                    Your next appointment:
                </h2>
                <hr color="black" width="420px">
                <br>
                <p class="lead">
                   You have no appointments!
                </p>
              
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <script>
                    $(document).ready(function () {
                    $("button.newbutton").click(function () {
                    $("form").toggle();
                     });
                    });
                </script>
                <button class="newbutton" onclick="makeapp()">Make or Edit Appointment</button>

                <form>
                <div>
                    <br>
                <h4>Choose New Appointment</h4>
                <hr color="black" width="320px">
               
               
        <input name="country" list="countries" placeholder="Time" />
        <datalist id="countries">
            <option value="10:30">
            <option value="11:00">
            <option value="11:30">
            
        </datalist>
    
           <button type="submit" class="newbutton">Save</button>
              </div>
              <textarea id="w3review" name="w3review" rows="4" cols="50">
                  Add extra Information
              </textarea>
              <br> <button class="newbutton">Cancel Appointment</button>
                </form> 

        
         

  
                
    </div>
@endsection
