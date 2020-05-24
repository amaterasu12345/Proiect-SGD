<?php require("header-template.html") ?>
  
  <!-- Database column names and textbox section -->
  <table class="container">
    <thead>
      <tr>
        <form action="" method="POST">
        
        <!-- Hidden submit button -->
          <input type="submit" name="submitbutton" value="Submit" style="display: none;"/>
        
        <!-- Column names and textboxes -->
        <th><h1>ID</h1><input type="text" name="climateID"></th>
        <th><h1>Planet Climate</h1><input type="text" name="planetClimate"></th>

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
    $sql = "SELECT planetclimateID, planet_climate FROM climate";
    $sql4 = "SELECT COUNT(*) FROM climate";

    // Fetch SQL Query and assign to variable
    $result = $conn->query($sql);
    $result4 = $conn->query($sql4);

    // If submit button is pressed, do this: 
    if (isset($_POST['submitbutton'])) {

      // Declare SQL Query variables
      $sql2 = "SELECT COUNT(*) FROM climate WHERE 
        planetclimateID='" . $_POST['climateID'] . "' OR 
        planet_climate='" . $_POST['planetClimate'] . "'";

      $sql3 = "SELECT * FROM climate WHERE 
        planetclimateID='" . $_POST['climateID'] . "' OR  
        planet_climate='" . $_POST['planetClimate'] . "'";

      // Fetch SQL Query and assign to variable
      $result2 = $conn->query($sql2);
      $result3 = $conn->query($sql3);

      // Write data to table for each row
      while($row = $result3->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["planetclimateID"] . "</td>";
        echo "<td>" . $row["planet_climate"] . "</td>";
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

    elseif (isset($_POST['submitbutton']) == False AND $result->num_rows > 0) {
        
      // Write data to table for each row
      while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["planetclimateID"] . "</td>";
        echo "<td>" . $row["planet_climate"] . "</td>";
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