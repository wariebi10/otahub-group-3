<template>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body class="contact" id="contactview">
  <div class="contactUs">
    <h1>{{contactus}}</h1>
    <div class="us">
      <h1>{{home}}</h1>
      <h5>Our Contact Information</h5>
        <ul class="ul-check mb-5 list-unstyled success">
          <li v-for="value in contact" v-bind:key="value.id">
            {{value}}
          </li>
        </ul>

      <div>
       <form action="mailto:admissions@thebackhomeproject.org">
         <div class="container">
            <div class="row mt-2">
                <div class="col md-4">
                    <input type="text" placeholder="First name" class="form-control" required>
                </div>
                <div class="col md-4">
                    <input type="text" placeholder="Second name" class="form-control" required>
                </div>
                <div class="col md-4">
                    <input type="number" placeholder="Phone" class="form-control" required>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col md-4">
                    <input type="email" placeholder="Email" class="form-control" required>
                </div>
            </div><br>
            <a href=""><button type="submit" style="color: blue;" class="btn btn-primary mb-4"> submit </button></a>
          </div>
       </form>
      </div>
    </div>
      <div class="footer">
        <div class="container-fluid pt-5 pb-5">
          <div class="row">
              <div class="col-md-12">Copyright © 2023 All rights reserved</div>
          </div>
        </div>
      </div>
  </div>
</body>
</html>
</template>

  
<script>
  export default {
    name: "firstComponent",
      data(){
        return{
          home:"",
          logo:"",
          contact:['Phone:08035360258','Email:davidokopi777@gmail.com','Address:no;79ijami, Road'],
          contactus:"contact"
        }
      }  
    }
</script>

<style>
  .contact{
    text-align: center;
    color: black;
    background-repeat: no-repeat;
    background-size: cover;
    background-color: darkgrey;
  }
.footer{
  color: white;
  background-color: black;
}

</style>