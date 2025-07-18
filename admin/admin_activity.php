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
              <li><a href="#" target="_self"> ACTIVITY</a></li>
              <li><a href="http://localhost/trek-kar/admin/admin_explore.php" target="_self"> EXPLORER</a></li>
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
    <h2>Create Activity</h2>
    <form id="create-activity-form">
        
        <label for="host-name">Host Name:</label>
        <input type="text" id="host-name" required>

        <label for="user-name">User Name:</label>
        <input type="text" id="user-name" required>

        <label for="activity-name">activity Name:</label>
        <input type="text" id="activity-name" required>

        
            <label for="location">Select Location:</label>
            <select id="location">
                <option value="location1">Jodhpur</option>
                <option value="location2">Jaipur</option>
                <option value="location3">Udaipur</option>
                <!-- Add more locations as needed -->
            </select>
            

        <label for="intensity">Intensity:</label>
        <input type="text" id="intensity" required>

        <label for="essential">Essential:</label>
        <input type="text" id="essential" required>

        <label for="gender">Gender:</label>
        <input type="text" id="gender" required>

        <label for="age_group">Age Group:</label>
        <input type="number" id="min_age" placeholder="min-age" required>
        <input type="number" id="max_age" placeholder="max-age" required>

        <label for="member">Maximum Member:</label>
        <input type="number" id="member" required>

        <label for="date">Date:</label>
        <input type="date" id="date" required>

        <label for="price">Price:</label>
        <input type="number" id="price" required>
        
        <label for="camp-images">Upload Profile Image:</label>
        <input type="file" id="profile-image">
        
        <label for="activity-images">Upload Activity Images:</label>
        <input type="file" id="activity-images">

        <label for="camp-description">Description:</label>
        <textarea id="camp-description" required></textarea>

        <button type="submit">CREATE ACTIVITY</button>
    </form>
</div>