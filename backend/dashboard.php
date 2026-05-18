<?php
session_start();

if (!isset($_SESSION['admin_email'])) {
    header("Location: login.php");
    exit();
}

include 'db.php';


$total_sql = "SELECT COUNT(*) AS total FROM contact_messages";
$total_result = mysqli_query($conn, $total_sql);
$total_row = mysqli_fetch_assoc($total_result);
$total_inquiries = $total_row['total'];

$new_sql = "SELECT COUNT(*) AS today_total FROM contact_messages WHERE DATE(created_at) = CURDATE()";
$new_result = mysqli_query($conn, $new_sql);
$new_row = mysqli_fetch_assoc($new_result);
$new_messages = $new_row['today_total'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Studio Luxe</title>
    <style>
        /* 1. Global Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Roboto, sans-serif;
        }

        body {
            background-color: #f4f7f6;
            color: #333;
        }

        /* 2. Top Navigation Bar - Simple & Clean */
        .top-nav {
            background-color: #1d99a6;
            /* Teal Theme */
            padding: 0 40px;
            height: 70px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .logo-area h2 {
            font-size: 20px;
            letter-spacing: 1px;
            border-left: 4px solid #9b8241de;
            /* Gold Accent */
            padding-left: 12px;
        }

        .nav-links {
            display: flex;
            gap: 30px;
            align-items: center;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-size: 15px;
            font-weight: 500;
            transition: 0.3s;
        }

        .nav-links a:hover {
            color: #9b8241de;
        }

        .logout-link {
            background: #000;
            padding: 8px 22px;
            border-radius: 4px;
            border: 1px solid #9b8241de;
            font-weight: 600;
            transition: 0.3s;
        }

        .logout-link:hover {
            background: #9b8241de;
            color: #fff !important;
            border-color: #fff;
        }

        /* 3. Main Content Container */
        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }

        /* 4. Welcome Header */
        .welcome-box {
            background: white;
            padding: 25px 30px;
            border-radius: 12px;
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
        }

        .welcome-box h1 {
            font-size: 24px;
            color: #222;
        }

        .status-tag {
            background: #e8f5e9;
            color: #2e7d32;
            padding: 6px 15px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
        }

        /* 5. Stats Grid (2 Cards) */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        .stat-card {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            border-left: 6px solid #1d99a6;
            transition: 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-card h3 {
            font-size: 14px;
            color: #777;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 10px;
        }

        .stat-card .count {
            font-size: 38px;
            font-weight: 800;
            color: #1d99a6;
        }

        /* 6. Table Box */
        .table-box {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .table-box h2 {
            margin-bottom: 25px;
            font-size: 19px;
            color: #222;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }

        .custom-table {
            width: 100%;
            border-collapse: collapse;
        }

        .custom-table th {
            background: #f8fbfb;
            padding: 15px;
            text-align: left;
            color: #1d99a6;
            font-size: 13px;
            text-transform: uppercase;
            border-bottom: 2px solid #eee;
        }

        .custom-table td {
            padding: 15px;
            border-bottom: 1px solid #f1f1f1;
            font-size: 14px;
            color: #555;
        }

        .custom-table tr:hover {
            background: #fafafa;
        }

        /* Action Buttons */
        .btn-action {
            text-decoration: none;
            padding: 6px 12px;
            border-radius: 4px;
            font-size: 12px;
            color: white;
            transition: 0.3s;
        }

        .btn-view {
            background: #1d99a6;
            margin-right: 5px;
        }

        .btn-delete {
            background: #e74c3c;
        }

        .btn-action:hover {
            opacity: 0.8;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .top-nav {
                flex-direction: column;
                height: auto;
                padding: 20px;
                gap: 15px;
            }

            .nav-links {
                flex-wrap: wrap;
                justify-content: center;
                gap: 15px;
            }

            .welcome-box {
                flex-direction: column;
                text-align: center;
                gap: 15px;
            }
        }
    </style>
</head>

<body>

    <nav class="top-nav">
        <div class="logo-area">
            <h2>LUMINOR MANSION <span style="font-weight: 300; font-size: 14px;">ADMIN</span></h2>
        </div>
        <div class="nav-links">
            <a href="admin_homepage.php">🏠 Homepage</a>
<a href="admin_bedroom.php">🛏️ Bedroom</a>
<a href="admin_kitchen.php">🍳 Kitchen</a>
<a href="admin_furniture.php">🪑 Furniture</a>
<a href="admin_designtips.php">📝 Design Tips</a>
<a href="admin_working.php">⚙️ Working</a>
            <a href="dashboard.php">Dashboard</a>
            <a href="logout.php" class="logout-link">Logout</a>
        </div>
    </nav>

    <div class="container">

        <div class="welcome-box">
            <div>
                <h1>Welcome Back, Admin</h1>
                <p style="color: #888; font-size: 14px;">Manage all customer inquiries from this panel.</p>
            </div>
            <div class="status-tag">
                ● System Online
            </div>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <h3>Total Inquiries</h3>
                <p class="count"><?php echo $total_inquiries; ?></p>
            </div>

            <div class="stat-card">
                <h3>New Messages (Today)</h3>
                <p class="count"><?php echo $new_messages; ?></p>
            </div>
        </div>

        <div class="table-box">
            <h2>Recent Inquiries</h2>

            <?php
            $sql = "SELECT * FROM contact_messages ORDER BY id DESC";
            $result = mysqli_query($conn, $sql);
            ?>
            <div style="overflow-x: auto;">

                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>
                  <td>" . $row['id'] . "</td>
                  <td>" . $row['name'] . "</td>
                  <td>" . $row['email'] . "</td>
                  <td>" . $row['phone'] . "</td>
                  <td>" . $row['message'] . "</td>
                  <td>" . $row['created_at'] . "</td>
                </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6'>No messages found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</body>

</html>