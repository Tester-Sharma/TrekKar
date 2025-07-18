<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Trekkar</title>
    <link rel="stylesheet" href="admin.css"> <!-- Link to your CSS -->
</head>
<body>
    <div class="admin-panel">
        <header>
            <h1>Admin Panel</h1>
            <img class="banner" src="banner.png">
            
        </header>

        <nav> <!--nav baar-->
            <ul>
            <li><a href="http://localhost/trek-kar/admin/admin_camp.php" target="_self"> CAMP </a></li>
              <li><a href="http://localhost/trek-kar/admin/admin_activity.php" target="_self"> ACTIVITY</a></li>
              <li><a href="#" target="_self"> EXPLORER</a></li>
            </ul>
          </nav>


        <div class="dashboard">
            <h2>Dashboard</h2>
            <div class="stats">
                <p>Total Treks: <span id="total-treks">0</span></p>
                <p>Total Camps: <span id="total-camps">0</span></p>
                <p>Total Explorers: <span id="total-explorers">0</span></p>
            </div>
        </div>

        <div class="create-section">
            <h2>Create Explorer</h2>
            <form id="create-explorer-form">
                <label for="place-name">place-Name:</label>
                <input type="text" id="place-name" required>

                
                    <label class="location-selector" for="location">Select Location:</label>
                    <select id="location" class="location-selector">
                        <option value="location1">Jaipur</option>
                        <option value="location2">Jodhpur</option>
                        <option value="location3">Udaipur</option>
                        <!-- Add more locations as needed -->
                    </select>
            

                <label for="place-bio">Bio:</label>
                <textarea id="place-bio" required></textarea>

                <label for="explorer-image">Upload Location Image:</label>
                <input type="file" id="explorer-image" required>

                <button type="submit">CREATE EXPLORER</button>
            </form>
        </div>


</div>