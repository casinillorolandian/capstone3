<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  
<style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
* {
  box-sizing: border-box;
}

/*html, body {
  min-height: 100%;
  height: 100%;
  background-image: url(http://theartmad.com/wp-content/uploads/Dark-Grey-Texture-Wallpaper-5.jpg);
  background-size: cover;
  background-position: top center;
  font-family: helvetica neue, helvetica, arial, sans-serif;
  font-weight: 200;
}*/

html.modal-active, body.modal-active {
  overflow: hidden;
}

#modal-container {
  position: fixed;
  display: table;
  height: 100%;
  width: 100%;
  top: 0;
  left: 0;
  transform: scale(0);
  z-index: 1;
}
#modal-container.one {
  transform: scaleY(0.01) scaleX(0);
  animation: unfoldIn 1s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.one .modal-background .modal {
  transform: scale(0);
  animation: zoomIn 0.5s 0.8s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.one.out {
  transform: scale(1);
  animation: unfoldOut 1s 0.3s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.one.out .modal-background .modal {
  animation: zoomOut 0.5s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.two {
  transform: scale(1);
}
#modal-container.two .modal-background {
  background: rgba(0, 0, 0, 0);
  animation: fadeIn 0.5s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.two .modal-background .modal {
  opacity: 0;
  animation: scaleUp 0.5s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.two + .content {
  animation: scaleBack 0.5s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.two.out {
  animation: quickScaleDown 0s .5s linear forwards;
}
#modal-container.two.out .modal-background {
  animation: fadeOut 0.5s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.two.out .modal-background .modal {
  animation: scaleDown 0.5s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.two.out + .content {
  animation: scaleForward 0.5s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.three {
  z-index: 0;
  transform: scale(1);
}
#modal-container.three .modal-background {
  background: rgba(0, 0, 0, 0.6);
}
#modal-container.three .modal-background .modal {
  animation: moveUp 0.5s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.three + .content {
  z-index: 1;
  animation: slideUpLarge 0.5s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.three.out .modal-background .modal {
  animation: moveDown 0.5s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.three.out + .content {
  animation: slideDownLarge 0.5s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.four {
  z-index: 0;
  transform: scale(1);
}
#modal-container.four .modal-background {
  background: rgba(0, 0, 0, 0.7);
}
#modal-container.four .modal-background .modal {
  animation: blowUpModal 0.5s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.four + .content {
  z-index: 1;
  animation: blowUpContent 0.5s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.four.out .modal-background .modal {
  animation: blowUpModalTwo 0.5s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.four.out + .content {
  animation: blowUpContentTwo 0.5s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.five {
  transform: scale(1);
}
#modal-container.five .modal-background {
  background: rgba(0, 0, 0, 0);
  animation: fadeIn 0.5s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.five .modal-background .modal {
  transform: translateX(-1500px);
  animation: roadRunnerIn 0.3s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.five.out {
  animation: quickScaleDown 0s .5s linear forwards;
}
#modal-container.five.out .modal-background {
  animation: fadeOut 0.5s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.five.out .modal-background .modal {
  animation: roadRunnerOut 0.5s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.six {
  transform: scale(1);
}
#modal-container.six .modal-background {
  background: rgba(0, 0, 0, 0);
  animation: fadeIn 0.5s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.six .modal-background .modal {
  background-color: transparent;
  animation: modalFadeIn 0.5s 0.8s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.six .modal-background .modal h2, #modal-container.six .modal-background .modal p {
  opacity: 0;
  position: relative;
  animation: modalContentFadeIn 0.5s 1s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.six .modal-background .modal .modal-svg rect {
  animation: sketchIn 0.5s 0.3s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.six.out {
  animation: quickScaleDown 0s .5s linear forwards;
}
#modal-container.six.out .modal-background {
  animation: fadeOut 0.5s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.six.out .modal-background .modal {
  animation: modalFadeOut 0.5s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.six.out .modal-background .modal h2, #modal-container.six.out .modal-background .modal p {
  animation: modalContentFadeOut 0.5s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.six.out .modal-background .modal .modal-svg rect {
  animation: sketchOut 0.5s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.seven {
  transform: scale(1);
}
#modal-container.seven .modal-background {
  background: rgba(0, 0, 0, 0);
  animation: fadeIn 0.5s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.seven .modal-background .modal {
  height: 75px;
  width: 75px;
  border-radius: 75px;
  overflow: hidden;
  animation: bondJamesBond 1.5s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.seven .modal-background .modal h2, #modal-container.seven .modal-background .modal p {
  opacity: 0;
  position: relative;
  animation: modalContentFadeIn .5s 1.4s linear forwards;
}
#modal-container.seven.out {
  animation: slowFade .5s 1.5s linear forwards;
}
#modal-container.seven.out .modal-background {
  background-color: rgba(0, 0, 0, 0.7);
  animation: fadeToRed 2s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.seven.out .modal-background .modal {
  border-radius: 3px;
  height: 162px;
  width: 227px;
  animation: killShot 1s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.seven.out .modal-background .modal h2, #modal-container.seven.out .modal-background .modal p {
  animation: modalContentFadeOut 0.5s 0.5 cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container .modal-background {
  display: table-cell;
  background: rgba(0, 0, 0, 0.8);
  text-align: center;
  vertical-align: middle;
}
#modal-container .modal-background .modal {
  background: white;
  padding: 50px;
  display: inline-block;
  border-radius: 3px;
  font-weight: 300;
  position: relative;
}
#modal-container .modal-background .modal h2 {
  font-size: 25px;
  line-height: 25px;
  margin-bottom: 15px;
}
#modal-container .modal-background .modal p {
  font-size: 18px;
  line-height: 22px;
}
#modal-container .modal-background .modal .modal-svg {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  border-radius: 3px;
}
#modal-container .modal-background .modal .modal-svg rect {
  stroke: #fff;
  stroke-width: 2px;
  stroke-dasharray: 778;
  stroke-dashoffset: 778;
}

.content {
  height: 300px;
  
  background: white;
  position: relative;
  z-index: 0;
}
.content h1 {
  padding: 75px 0 30px 0;
  text-align: center;
  font-size: 30px;
  line-height: 30px;
}
.content .buttons {
  max-width: 800px;
  margin: 0 auto;
  padding: 0;
  text-align: center;
}
.content .buttons .button {
  display: inline-block;
  text-align: center;
  padding: 10px 15px;
  margin: 10px;
  background: red;
  font-size: 18px;
  background-color: #efefef;
  border-radius: 3px;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
  cursor: pointer;
}
.content .buttons .button:hover {
  color: white;
  background: #009bd5;
}

@keyframes unfoldIn {
  0% {
    transform: scaleY(0.005) scaleX(0);
  }
  50% {
    transform: scaleY(0.005) scaleX(1);
  }
  100% {
    transform: scaleY(1) scaleX(1);
  }
}
@keyframes unfoldOut {
  0% {
    transform: scaleY(1) scaleX(1);
  }
  50% {
    transform: scaleY(0.005) scaleX(1);
  }
  100% {
    transform: scaleY(0.005) scaleX(0);
  }
}
@keyframes zoomIn {
  0% {
    transform: scale(0);
  }
  100% {
    transform: scale(1);
  }
}
@keyframes zoomOut {
  0% {
    transform: scale(1);
  }
  100% {
    transform: scale(0);
  }
}
@keyframes fadeIn {
  0% {
    background: rgba(0, 0, 0, 0);
  }
  100% {
    background: rgba(0, 0, 0, 0.7);
  }
}
@keyframes fadeOut {
  0% {
    background: rgba(0, 0, 0, 0.7);
  }
  100% {
    background: rgba(0, 0, 0, 0);
  }
}
@keyframes scaleUp {
  0% {
    transform: scale(0.8) translateY(1000px);
    opacity: 0;
  }
  100% {
    transform: scale(1) translateY(0px);
    opacity: 1;
  }
}
@keyframes scaleDown {
  0% {
    transform: scale(1) translateY(0px);
    opacity: 1;
  }
  100% {
    transform: scale(0.8) translateY(1000px);
    opacity: 0;
  }
}
@keyframes scaleBack {
  0% {
    transform: scale(1);
  }
  100% {
    transform: scale(0.85);
  }
}
@keyframes scaleForward {
  0% {
    transform: scale(0.85);
  }
  100% {
    transform: scale(1);
  }
}
@keyframes quickScaleDown {
  0% {
    transform: scale(1);
  }
  99.9% {
    transform: scale(1);
  }
  100% {
    transform: scale(0);
  }
}
@keyframes slideUpLarge {
  0% {
    transform: translateY(0%);
  }
  100% {
    transform: translateY(-100%);
  }
}
@keyframes slideDownLarge {
  0% {
    transform: translateY(-100%);
  }
  100% {
    transform: translateY(0%);
  }
}
@keyframes moveUp {
  0% {
    transform: translateY(150px);
  }
  100% {
    transform: translateY(0);
  }
}
@keyframes moveDown {
  0% {
    transform: translateY(0px);
  }
  100% {
    transform: translateY(150px);
  }
}
@keyframes blowUpContent {
  0% {
    transform: scale(1);
    opacity: 1;
  }
  99.9% {
    transform: scale(2);
    opacity: 0;
  }
  100% {
    transform: scale(0);
  }
}
@keyframes blowUpContentTwo {
  0% {
    transform: scale(2);
    opacity: 0;
  }
  100% {
    transform: scale(1);
    opacity: 1;
  }
}
@keyframes blowUpModal {
  0% {
    transform: scale(0);
  }
  100% {
    transform: scale(1);
  }
}
@keyframes blowUpModalTwo {
  0% {
    transform: scale(1);
    opacity: 1;
  }
  100% {
    transform: scale(0);
    opacity: 0;
  }
}
@keyframes roadRunnerIn {
  0% {
    transform: translateX(-1500px) skewX(30deg) scaleX(1.3);
  }
  70% {
    transform: translateX(30px) skewX(0deg) scaleX(0.9);
  }
  100% {
    transform: translateX(0px) skewX(0deg) scaleX(1);
  }
}
@keyframes roadRunnerOut {
  0% {
    transform: translateX(0px) skewX(0deg) scaleX(1);
  }
  30% {
    transform: translateX(-30px) skewX(-5deg) scaleX(0.9);
  }
  100% {
    transform: translateX(1500px) skewX(30deg) scaleX(1.3);
  }
}
@keyframes sketchIn {
  0% {
    stroke-dashoffset: 778;
  }
  100% {
    stroke-dashoffset: 0;
  }
}
@keyframes sketchOut {
  0% {
    stroke-dashoffset: 0;
  }
  100% {
    stroke-dashoffset: 778;
  }
}
@keyframes modalFadeIn {
  0% {
    background-color: transparent;
  }
  100% {
    background-color: white;
  }
}
@keyframes modalFadeOut {
  0% {
    background-color: white;
  }
  100% {
    background-color: transparent;
  }
}
@keyframes modalContentFadeIn {
  0% {
    opacity: 0;
    top: -20px;
  }
  100% {
    opacity: 1;
    top: 0;
  }
}
@keyframes modalContentFadeOut {
  0% {
    opacity: 1;
    top: 0px;
  }
  100% {
    opacity: 0;
    top: -20px;
  }
}
@keyframes bondJamesBond {
  0% {
    transform: translateX(1000px);
  }
  80% {
    transform: translateX(0px);
    border-radius: 75px;
    height: 75px;
    width: 75px;
  }
  90% {
    border-radius: 3px;
    height: 182px;
    width: 247px;
  }
  100% {
    border-radius: 3px;
    height: 162px;
    width: 227px;
  }
}
@keyframes killShot {
  0% {
    transform: translateY(0) rotate(0deg);
    opacity: 1;
  }
  100% {
    transform: translateY(300px) rotate(45deg);
    opacity: 0;
  }
}
@keyframes fadeToRed {
  0% {
    box-shadow: inset 0 0 0 rgba(201, 24, 24, 0.8);
  }
  100% {
    box-shadow: inset 0 2000px 0 rgba(201, 24, 24, 0.8);
  }
}
@keyframes slowFade {
  0% {
    opacity: 1;
  }
  99.9% {
    opacity: 0;
    transform: scale(1);
  }
  100% {
    transform: scale(0);
  } 
}
.gi-2x{font-size: 2em;}
.gi-3x{font-size: 3em;}
.gi-4x{font-size: 4em;}
.gi-5x{font-size: 5em;}

/*.modal {
  overflow-y:auto;
}*/
</style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
<div class="">
  <div id="modal-container" style=" z-index: 99">
    <div class="modal-background row">
      <div class="modal col-md-10">

              <div>

                <div class="row">
                
                <div class="map col-md-3" style="background: white; position: relative; top: -20px;">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.8684890719574!2d121.02169231441623!3d14.549512182228277!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c91a5b680457%3A0x1c14b68e860b0cba!2sBagaholic!5e0!3m2!1sen!2sph!4v1518751403724" width="150px" height="150px" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>

                <div class="col-md-9">
                <h5 style="text-align: left;">Bagaholic– </h5>
                <h6 style="text-align: left;">Address: 99nd Floor 999 Almeda Arcade Bldg., Arnaiz Ave., Makati City<br>
                Operating Hours: 10:00A.M. – 8:00P.M. (Monday to Sunday)<br>
                Telephone Numbers: (+632) 000-000 / (+632) 000-0000<br>
                Mobile Number: +63917-000-0000<br>
                Email Address: gabaholic@yahoo.com</h6>
                </div>

                <div class="col-md-12" style="width: 100%; height: 10px"> </div>
                <div class="col-md-12" style="width: 100%; height: 25px; border-top:1px solid black;"> </div>

                <div class="col-md-8 offset-md-1">
                <h5 style="text-align: left;">Watch E Metro Main – </h5>
                <h6 style="text-align: left;">Address: Ground Floor Greenbelt 9, Paseo de Roxas Cor. Legaspi St., Makati City<br>
                Operating Hours: 10:00A.M. – 8:00P.M. (Monday to Sunday)<br>
                Telephone Numbers: (+632) 000-000 / (+632) 000-0000<br>
                Mobile Number: +63917-000-0000<br>
                Email Address: WEM@yahoo.com</h6>
                </div>

                <div class="map col-md-3" style="background: white;">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.8022375630803!2d121.018792414336!3d14.553298889832586!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c90fe3d93cd5%3A0xec0ae9e80a5bd0e0!2sManila+Watch+Emporium!5e0!3m2!1sen!2sph!4v1518765063898" width="150px" height="150px" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>

                
                <div class="col-md-12" style="width: 100%; height: 10px"> </div>
                <div class="col-md-12" style="width: 100%; height: 25px; border-top:1px solid black;"> </div>

                <div class="map col-md-3" style=" background: white;">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3860.9415063770175!2d121.04761981433663!3d14.60240798980128!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b7d8c4afe7d3%3A0xc2e1ea06e5323ca!2sV-Mall!5e0!3m2!1sen!2sph!4v1518765774562" width="150px" height="150px" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>

                <div class="col-md-9">
                <h5 style="text-align: left;">Watch E Metro (Vmall Branch) - </h5>
                <h6 style="text-align: left;">Address: 2nd Floor Vmall (near bridge way to parking), Greenhills Shopping Center, San Juan<br>
                Operating Hours: 10:00A.M. – 8:00P.M. (Monday to Sunday)<br>
                Telephone Numbers: (+632) 000-000 / (+632) 000-0000<br>
                Mobile Number: +63917-000-0000<br>
                Email Address: WEM@yahoo.com</h6>
                
                </div>

                </div> <!-- for row -->
              </div>
      
      <svg class="modal-svg" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" preserveAspectRatio="none">
								<rect x="0" y="0" fill="none" width="226" height="162" rx="3" ry="3"></rect>
							</svg>
    </div>
  </div>
</div>


<div class="container-fluid">
  <div class="row" style="padding: 0 0 10px 0;">
    <div class="col" >
      <div class="content">
        <h1 style="text-align: center">Visit Us</h1>
        <div class="buttons float-left">
          <div id="one" class="button gabaholic">GABAHOLIC</div>
          <div id="two" class="button wem">WEM</div>
          <div id="five" class="button vmall">V-MALL</div>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="content">
        <h1 style="text-align: center">Social Media</h1>
        <div class="footer-icons">
          <div class="row">
          <div class="col col-md-1 col offset-md-2">
          <a href="https://www.facebook.com/" class="gi-3x"><i class="fa fa-facebook-square"></i></a>
          </div>
          <div class="col col-md-1 offset-md-1">
          <a href="https://twitter.com/?lang=en" class="gi-3x"><i class="fa fa-twitter"></i></a>
          </div>
          <div class="col col-md-1 offset-md-1">
          <a href="https://www.tumblr.com/login" class="gi-3x"><i class="fa fa-tumblr-square"></i></a>
          </div>
          <div class="col col-md-1 offset-md-1">
          <a href="https://www.instagram.com/accounts/login/" class="gi-3x"><i class="fa fa-instagram "></i></a>
          </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="content">

        <h5 style="text-align: center; margin-top: 40%;"> &copy; COPYRIGHTS RICC. ALL RIGHTS RESERVED.</h5>
      </div>
    </div>
    </div>
</div>



<div style="background-image: url(http://theartmad.com/wp-content/uploads/Dark-Grey-Texture-Wallpaper-5.jpg); height: 200px; z-index: -10">

    
</div>
</div>

  <!-- Bootsrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

  <script  src="{{ URL::asset('js/footer.js') }}"></script>




</body>

</html>