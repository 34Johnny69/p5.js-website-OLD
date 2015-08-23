<!DOCTYPE html>
<head>
  <!-- this line removes any default padding and style. you might only need one of these values set. -->
  <style> body {padding: 0; margin: 0;} </style>
</head>
<?php include('../../header.php'); ?>
<body id="get-started-page">

  <?php include('../../sidebar.php'); ?>
  <?php include('../../download/version.php'); ?>

  <!-- content sections -->
  <div class="column-span">

    <section>

      <h2>Trigonometry Primer</h2>
      <p>(learning to love triangles)</p>
      <div class="attribution">
        This tutorial was written during the first p5.js developers conference by Tega Brain.
      </div>
      <a class="anchor" href="#file-setup">
        <h3 class = "start-element tutorial-btn" id = "pythagoras">Pythagoras Theorum</h3></a>
        <div class="info" id="pythagoras">
          <p>
            Trigonometry is a branch of geometry that is fundamental to all graphics programming.  It provides equations for how curves and circles are related to Cartesian coordinates, (remember Cartesian coordinates are positions described in two dimensions, x and y values). This sort of math enables you to do things like move a shape in circular motion or oscillate values smoothly back and forth between two extremes.
          </p>


          <p>The right angled triangle is one of the most important parts of trigonometry and Pythagoras was a guy who got pretty famous for figuring out a theorem that relates the length of each side. Pythagora's theorem says that says if you square each of the two shortest sides, their sum equals the square of the longest side. <p>
          </p>
          <img class="iamge" img src="assets/images/pythagoras.jpg" />


          <p>Right angled triangles are special because their angles have a specific relationship to the ratio of their sides. This is what sine, cosine and tangent functions describe - they are functions that give us the relationship between an angle and ratio of the sides of the triangle. You might remember the acronym: SOH-CAH-TOA that helps you remember how sinθ, cosθ and tanθ relate to the ratio of the triangle sides.   </p>
          <img class="image" img src="assets/images/sohcahtoa.jpg" />
          <p>These triangles are helpful as they help us to map and understand the coordinates of points along curves and circles. A point on a circle can be understood in two ways. It can be described using polar coordinates which is an angle and the distance from the center of the circle, and it can be decribed by Cartesian coordinate which are of course, an x and y co-ordinate.   </p>

          <a name="1" class="anchor"><h3 class = "start-element tutorial-btn" id = "Polar Coordinates">Polar Coordinates</h3></a>
          <div class="info" id = "Polar Coordinates">
            <p>
              Polar coordinates describe a point using an angle and a distance from the origin. This is useful when you are coding something like an analog clock. When drawing a clock, you would want each hand at a particular angle and distance from the center, however when coding this onto a screen, you would need to describe these hands with lines which require the x,y coordinates of two points. Putting anything on a screen always requires you to describe it in terms of x and y.
            </p>
            <p>
              So how do we convert between polar coordinates and x-y coordinates?</p>
              <p>
              The relationship between polar coordinates and x,y coordinates can be calculated using a unit circle. This is a circle that has a radius of 1 unit which is useful because it means the hypotenuse is always 1.
            </p>

            <iframe src="assets/unitCircle/embed.html" width="600px" height="400px"></iframe>


          </div>
          <a name="2" class="anchor"><h3 class = "start-element tutorial-btn" id = "sin">Using Sin and Cosine </h3></a>
          <div class = "info" id = "Sin Cos Curves">

            <p>

              <iframe src="assets/sincoscurves/embed.html" width="800px" height="750px"></iframe>
            </p>
          </div>


          <?php include('../footer.php'); ?>
          <!-- outside of column for footer to go across both -->

          <p class="clearfix"> &nbsp; </p>

        </div><!-- end id="container"  -->

        <object type="image/svg+xml" data="../img/thick-asterisk-alone.svg" id="asterisk-design-element">
          *<!-- to do: add fallback image in CSS -->
        </object>


        <?php include('../end.php'); ?>
      </body>
      </html>
