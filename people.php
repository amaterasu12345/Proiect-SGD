<?php require("header-template.html") ?>
  
  <!-- Database column names and textbox section -->
  <table class="container">
    <thead>
      <tr>
        <form action="" method="POST">

          <!-- Hidden submit button -->
          <input type="submit" name="submitbutton" value="Submit" style="display: none;"/>

          <!-- Column names and textboxes -->
          <th><h1>ID</h1><input type="text" name="peopleID"></th>
          <th><h1>People Name</h1><input type="text" name="peopleName"></th>
          <th><h1>People Height</h1><input type="text" name="peopleHeight"></th>
          <th><h1>People Mass</h1><input type="text" name="peopleMass"></th>
          <th><h1>People Hair Color</h1><input type="text" name="peopleHair"></th>
          <th><h1>People Skin Color</h1><input type="text" name="peopleSkin"></th>
          <th><h1>People Eye Color</h1><input type="text" name="peopleEye"></th>
          <th><h1>People Birth Year</h1><input type="text" name="peopleBirth"></th>
          <th><h1>People Gender</h1><input type="text" name="peopleGender"></th>
          <th><h1>People Home ID</h1><input type="text" name="peopleHomeworld"></th>
          <th><h1>People Species ID</h1><input type="text" name="peopleSpecies"></th>

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
    $sql = "SELECT peopleID, people_name, people_height, people_mass, people_hair_color, people_skin_color, people_eye_color, people_birth_year, people_gender, people_homeworld_id, people_species_id FROM people";
    $sql4 = "SELECT COUNT(*) FROM people";

    // Fetch SQL Query and assign to variable
    $result = $conn->query($sql);
    $result4 = $conn->query($sql4);

    // If submit button is pressed, do this:
    if (isset($_POST['submitbutton'])) {

      // Declare SQL Query variables
      $sql2 = "SELECT COUNT(*) FROM people WHERE 
        peopleID='" . $_POST['peopleID'] . "' OR 
        people_name='" . $_POST['peopleName'] . "' OR 
        people_height='" . $_POST['peopleHeight'] . "' OR 
        people_mass='" . $_POST['peopleMass'] . "' OR 
        people_hair_color='" . $_POST['peopleHair'] . "' OR 
        people_skin_color='" . $_POST['peopleSkin'] . "' OR 
        people_eye_color='" . $_POST['peopleEye'] . "' OR
        people_birth_year='" . $_POST['peopleBirth'] . "' OR
        people_gender='" . $_POST['peopleGender'] . "' OR
        people_homeworld_id='" . $_POST['peopleHomeworld'] . "' OR
        people_species_id='" . $_POST['peopleSpecies'] . "'";

      $sql3 = "SELECT * FROM people WHERE 
        peopleID='" . $_POST['peopleID'] . "' OR 
        people_name='" . $_POST['peopleName'] . "' OR 
        people_height='" . $_POST['peopleHeight'] . "' OR 
        people_mass='" . $_POST['peopleMass'] . "' OR 
        people_hair_color='" . $_POST['peopleHair'] . "' OR 
        people_skin_color='" . $_POST['peopleSkin'] . "' OR 
        people_eye_color='" . $_POST['peopleEye'] . "' OR
        people_birth_year='" . $_POST['peopleBirth'] . "' OR
        people_gender='" . $_POST['peopleGender'] . "' OR
        people_homeworld_id='" . $_POST['peopleHomeworld'] . "' OR
        people_species_id='" . $_POST['peopleSpecies'] . "'";

      // Fetch SQL Query and assign to variable
      $result2 = $conn->query($sql2);
      $result3 = $conn->query($sql3);

      // Write data to table for each row
      while($row = $result3->fetch_assoc()) {
          echo "<tr>";
            echo "<td>" . $row["peopleID"] . "</td>";
            echo "<td>" . $row["people_name"] . "</td>";
            echo "<td>" . $row["people_height"] . "</td>";
            echo "<td>" . $row["people_mass"] . "</td>";
            echo "<td>" . $row["people_hair_color"] . "</td>";
            echo "<td>" . $row["people_skin_color"] . "</td>";
            echo "<td>" . $row["people_eye_color"] . "</td>";
            echo "<td>" . $row["people_birth_year"] . "</td>";
            echo "<td>" . $row["people_gender"] . "</td>";
            echo "<td>" . $row["people_homeworld_id"] . "</td>";
            echo "<td>" . $row["people_species_id"] . "</td>";
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
        echo "<td>" . $row["peopleID"] . "</td>";
        echo "<td>" . $row["people_name"] . "</td>";
        echo "<td>" . $row["people_height"] . "</td>";
        echo "<td>" . $row["people_mass"] . "</td>";
        echo "<td>" . $row["people_hair_color"] . "</td>";
        echo "<td>" . $row["people_skin_color"] . "</td>";
        echo "<td>" . $row["people_eye_color"] . "</td>";
        echo "<td>" . $row["people_birth_year"] . "</td>";
        echo "<td>" . $row["people_gender"] . "</td>";
        echo "<td>" . $row["people_homeworld_id"] . "</td>";
        echo "<td>" . $row["people_species_id"] . "</td>";
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