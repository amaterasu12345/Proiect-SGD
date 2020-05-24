<?php require("header-template.html") ?>
  
  <!-- Database column names and textbox section -->
  <table class="container">
    <thead>
      <tr>
        <form action="" method="POST">

          <!-- Hidden submit button -->
          <input type="submit" name="submitbutton" value="Submit" style="display: none;"/>

          <!-- Column names and textboxes -->
          <th><h1>ID</h1><input type="text" name="planetID"></th>
          <th><h1>Planet Name</h1><input type="text" name="planetName"></th>
          <th><h1>Planet Rotation Period</h1><input type="text" name="rotationPeriod"></th>
          <th><h1>Planet Orbital Period</h1><input type="text" name="orbitalPeriod"></th>
          <th><h1>Planet Diameter</h1><input type="text" name="planetDiameter"></th>
          <th><h1>Planet Gravity</h1><input type="text" name="planetGravity"></th>
          <th><h1>Planet Surface Water</h1><input type="text" name="planetSurface"></th>
          <th><h1>Planet Population</h1><input type="text" name="planetPopulation"></th>

        </form>
      </tr>
    </thead>
    <tbody>


    <?php

    // Declare database connection variables
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "starwars";


    // Create database connection
    $conn = new mysqli($servername, $username, $password, $dbname);


    // Check database connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    // Declare SQL Query variables
    $sql = "SELECT planetID, planet_name, planet_rotation_period, planet_orbital_period, planet_diameter, planet_gravity, planet_surface_water, planet_population FROM planet";
    $sql4 = "SELECT COUNT(*) FROM planet";

    // Fetch SQL Query and assign to variable
    $result = $conn->query($sql);
    $result4 = $conn->query($sql4);

      
    // If submit button is pressed, do this: 
    if (isset($_POST['submitbutton'])) {

      // Declare SQL Query variables
      $sql2 = "SELECT COUNT(*) FROM planet WHERE 
        planetID='" . $_POST['planetID'] . "' OR 
        planet_name='" . $_POST['planetName'] . "' OR 
        planet_rotation_period='" . $_POST['rotationPeriod'] . "' OR 
        planet_orbital_period='" . $_POST['orbitalPeriod'] . "' OR 
        planet_diameter='" . $_POST['planetDiameter'] . "' OR 
        planet_gravity='" . $_POST['planetGravity'] . "' OR 
        planet_surface_water='" . $_POST['planetSurface'] . "' OR 
        planet_population='" . $_POST['planetPopulation'] . "'";

      $sql3 = "SELECT * FROM planet WHERE 
          planetID='" . $_POST['planetID'] . "' OR 
          planet_name='" . $_POST['planetName'] . "' OR 
          planet_rotation_period='" . $_POST['rotationPeriod'] . "' OR 
          planet_orbital_period='" . $_POST['orbitalPeriod'] . "' OR 
          planet_diameter='" . $_POST['planetDiameter'] . "' OR 
          planet_gravity='" . $_POST['planetGravity'] . "' OR 
          planet_surface_water='" . $_POST['planetSurface'] . "' OR 
          planet_population='" . $_POST['planetPopulation'] . "'";

      // Fetch SQL Query and assign to variable
      $result2 = $conn->query($sql2);
      $result3 = $conn->query($sql3);

      // Write data to table for each row
      while($row = $result3->fetch_assoc()) {
        echo "<tr>";
          echo "<td>" . $row["planetID"] . "</td>";
          echo "<td>" . $row["planet_name"] . "</td>";
          echo "<td>" . $row["planet_rotation_period"] . "</td>";
          echo "<td>" . $row["planet_orbital_period"] . "</td>";
          echo "<td>" . $row["planet_diameter"] . "</td>";
          echo "<td>" . $row["planet_gravity"] . "</td>";
          echo "<td>" . $row["planet_surface_water"] . "</td>";
          echo "<td>" . $row["planet_population"] . "</td>";
        echo "</tr>";
      }

      // Close table after SQL fetchcall finishes appending data to table
      echo '</tbody>
            </table>';

      // Create new table for counting all table elements
      echo '<table class="container">
            <thead>
            <tr>
              <th>
                <h1>Total elements count</h1>
              </th>
            </tr>
            </thead>
            <tbody>';

      // Fetchcall SQL after filtered query
      $sumarizare = $result2->fetch_assoc();
      echo "<tr><td>" . $sumarizare["COUNT(*)"] . "</td></tr>";

      // Close the new created table
      echo '</tbody>
            </table>';
    }

    // If submit button is not pressed do this:
    elseif (isset($_POST['submitbutton']) == False AND $result->num_rows > 0) {
      
      // Write data to table for each row
      while($row = $result->fetch_assoc()) { 
        echo "<tr>";
        echo "<td>" . $row["planetID"] . "</td>";
        echo "<td>" . $row["planet_name"] . "</td>";
        echo "<td>" . $row["planet_rotation_period"] . "</td>";
        echo "<td>" . $row["planet_orbital_period"] . "</td>";
        echo "<td>" . $row["planet_diameter"] . "</td>";
        echo "<td>" . $row["planet_gravity"] . "</td>";
        echo "<td>" . $row["planet_surface_water"] . "</td>";
        echo "<td>" . $row["planet_population"] . "</td>";
        echo "</tr>";
      }

      // Close table after SQL fetchcall finishes appending data to table
      echo '</tbody>
      </table>';

      // Create new table for counting all table elements
      echo '<table class="container">
            <thead>
            <tr>
              <th>
                <h1>Total elements count</h1>
              </th>
            </tr>
            </thead>
            <tbody>';

      // Fetchcall SQL after filtered query
      $sumarizare = $result4->fetch_assoc();
      echo "<tr><td>" . $sumarizare["COUNT(*)"] . "</td></tr>";

      // Close the new created table
      echo '</tbody>
      </table>';
    }

    // If no data can be found in the database
    else {
      echo "0 results";
    }

    // Close database session
    $conn->close();
    ?>

</body>
</html>


<!-- 

DELIMITER //
CREATE PROCEDURE GetClimate()
BEGIN
  SELECT * FROM cliamte;
END //
DELIMITER ;

-->