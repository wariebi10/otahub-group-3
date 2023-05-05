<template>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  </head>
  <body>
    <div class="oko">
      <div class="container">
        <nav class="container text-white pt-3">
          <div class="branding">
            <img src="../assets/logo1.png" class="image" alt="">
          </div>
          <div class="nav-links">
            <ul>
              <li><a href="#homeview">Home</a></li>
              <li><a href="#aboutview">About</a></li>
              <li><a href="#contactview">Contact</a></li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </body>
  </html>
</template>

<script>
export default {
  name: "firstComponent",
}
</script>

<style>
  .nav-links{
    display: flex;
    flex: 1;
    justify-content: flex-end;
}
nav{
    display: flex;

}
.nav-links li{
    display: inline-block;
    padding-left: 20px;
    margin-bottom: 2px;
}
.nav-links a{
    color: black;
    text-decoration: none;
    justify-content: space-between;
}
.branding{
  color: black;
}
</style>