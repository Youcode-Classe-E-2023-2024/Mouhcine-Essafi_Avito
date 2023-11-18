<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Avito.ma</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="font-sans bg-gray-100">

  <div class="bg-blue-800 p-4 fixed w-full animate-pulse flex justify-end z-10">
    <a href="add.php" class="text-white ">Ajouter une annonce</a>
  </div>

  <div class="p-16">
    <h2 class="text-3xl font-bold mb-8 text-green-500">La liste des Annonces</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
      <?php
          include("connection.php");
          $selectSql = "SELECT * FROM $table_name";
          $result = $conn->query($selectSql);

          if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                    /**
                     * Display each announcement as a card with relevant details
                     */
                  echo "<div class='bg-white shadow-md p-6 rounded-md transition-transform transform hover:scale-105'>";
                  echo "<p class='text-xl font-bold mb-2 text-gray-800'>" . $row["title"] . "</p>";
                  echo "<p class='text-gray-600 mb-4'>" . $row["about"] . "</p>";
                  echo "<p class='text-lg font-bold text-green-500 mb-4'>" . $row["price"] . "$" . "</p>";
                  echo "<img src='images/" . $row["img"] . "' alt='Image' class='w-full h-48 object-cover mb-4 rounded-md'>";
                  echo "<p class='text-xl font-bold mb-2 text-gray-800'>" . $row["fullname"] . "</p>";
                  echo "<p class='text-gray-600 mb-4'>" . $row["phonenumber"] . "</p>";
                  echo "<div class='flex justify-between items-center'>";
                  /**
                   * link to delete the announce
                   */
                  echo "<a href='supprimer.php?id=" . $row["id"] . "' class='text-red-500 hover:underline'>Supprimer</a>";
                  echo "</div>";
                  echo "</div>";
              }
          } else {
            /**
             * Display a message if no announcements are found
             */
              echo "<p class='text-gray-600'>Aucune annonce trouvée</p>";
          }
          $conn->close();
      ?>
    </div>
  </div>
</body>
</html>
