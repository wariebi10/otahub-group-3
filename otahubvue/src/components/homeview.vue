<template>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title></title>
  </head>
  <body id="homeview">
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="../assets/caro3.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5 style="font-size: 50px;">OTUKPO <span style="color: red;">TECH </span> ACADEMY</h5>
          <p style="color: blue;">A Place To Learn Coding</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="../assets/caro2.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5 style="font-size: 50px;">OTUKPO <span style="color: red;">TECH </span> ACADEMY</h5>
          <p style="color: blue;">A Place To Learn Coding</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="../assets/caro1.jpg" class="d-block w-100" alt="..."> 
        <div class="carousel-caption d-none d-md-block">
          <h5 style="font-size: 50px;">OTUKPO <span style="color: red;">TECH </span> ACADEMY</h5>
          <p style="color: blue;">A Place To Learn Coding</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  </body>
</html>
</template>

<script>
      export default {
    name: "firstComponent",
      data(){
        return{

        }
      }  
    }
</script>

<style scoped>
  .home{
    text-align: center;
    color: white;
  }
  .homes{
    background-image: url(../assets/school2.jpg);
    color: white;
    background-repeat: no-repeat;
    background-size: cover;
  }
</style>