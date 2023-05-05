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
  <body class="aboutUs" id="aboutview">
       <h1 class="head mt-3" style="text-align: center;">About us</h1>
    <div class="row">
      <div class="col md-6">
       <img src="../assets/ota1.png" class="img-fluid mt-5" alt=""> 
      </div>
      <div class="col md-6">
        <h4 class="mission mt-5">{{mission}}</h4>
        <p>{{about}}</p>
         <ul class="ul-check mb-5 list-unstyled success">
          <li v-for="value in list" v-bind:key="value.id">
            {{value}}
          </li>
        </ul>
        <h4 class="mission mt-5">{{conduct}}</h4>
        <p>{{conduct1}}</p>
      </div>
    </div><br><br>
      <div class="row">
      <div class="col md-12">
          <p>{{ota}}</p>
          <h4 class="mission mt-5">{{ourvission}}</h4>
          <p>{{vission}}</p>
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
          about:"Learn coding skills with us in Otukpo and you'll learn with the best: We provide high quality free IT training in small classes with fully functional IT equipment.",
          mission:"OUR MISSION",
          list:['(1) Week long introduction to coding courses','(2) 3 month intensive coding bootcamp','(3) Small class sizes','(4) All equipment provided' ],
          ota:"OTAHUB tech code for computer programs and mobile applications. We also are involved in maintaining, debugging and troubleshooting systems and software to ensure that everything is running smoothly.",
          conduct1:"OTAHUB maintains a Christ-centered environment where Christian principles are integrated throughout all activities. Members of staff and students are required to adhere strictly to these ideals and to the rules and regulations of the school. To sustain the glorious ethical standard for which the school is reputed, any erring member of staff or student is appropriately disciplined. Our well-trained, experienced and qualified educators support the learners to foster a feeling of positive self-worth, quality and academic excellence. We expect that our learners in the future will be able to compete nationally and internationally with their peers in a very competitive world.",
          conduct:"CONDUCT",
          ourvission:"VISSION",
          vission:"The vision for the Otukpo Tech Academy is to improve software for society by being the leading professional body for those aspiring to and engaged in creating, developing and maintaining software, with an international reputation for education, high standards and the calibre of its members"
      
        }
      }  
    }
</script>

<style>
.about{
    text-align: center;
    color: white;
}
.aboutUs{
    color: black;
    background-repeat: no-repeat;
    background-size: cover;
    background-color: darkgrey;
}
.mission{
  text-align: center;
}
</style>
