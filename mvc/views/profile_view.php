<?php 
session_start();
require_once '../models/registration_model.php';

// Redirect if not logged in
if (!isset($_SESSION['username'])) {
    header("Location: loginView.php");
    exit();
}

$userData = getUserData($_SESSION['username']); 

// STICKY ADMIN CHECK: Identify the fixed admin by username
$isAdmin = ($_SESSION['username'] === 'admin'); 
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Profile</title>
    <link rel="stylesheet" href="../views/css/registration_page.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="form-container">
        <form id="profileForm" action="../controllers/profileController.php" method="post">
            <h2><?php echo $isAdmin ? "Admin: Update Password" : "Edit Profile"; ?></h2>

            <?php if (!$isAdmin): ?>
                <label>First Name</label>
                <input type="text" name="fname" value="<?php echo htmlspecialchars($userData['First_name']); ?>">

                <label>Last Name</label>
                <input type="text" name="lname" value="<?php echo htmlspecialchars($userData['Last_name']); ?>">

                <label>Username <span id="uname-status" class="ajax-status"></span></label>
                <input type="text" name="uname" id="uname" value="<?php echo htmlspecialchars($userData['Username']); ?>">
                
                <label>Email <span id="email-status" class="ajax-status"></span></label>
                <input type="text" name="email" id="email" value="<?php echo htmlspecialchars($userData['Email']); ?>">
            <?php else: ?>
                <div style="background: #f4f4f4; padding: 10px; border-radius: 5px; margin-bottom: 20px;">
                    <p><strong>Name:</strong> Admin Admin</p>
                    <p><strong>Email:</strong> admin@gmail.com</p>
                    <p><strong>Username:</strong> admin</p>
                </div>
                <input type="hidden" name="fname" value="admin">
                <input type="hidden" name="lname" value="admin">
                <input type="hidden" name="uname" value="admin">
                <input type="hidden" name="email" value="admin@gmail.com">
            <?php endif; ?>

            <hr>
            <label>New Password</label>
            <input type="password" name="password" id="password" placeholder="Leave blank to keep current">

            <label>Confirm Password</label>
            <input type="password" name="con-pass" id="con-pass" placeholder="Re-type new password">

            <input class="btn" type="submit" name="update" value="Update Profile">
        </form>
    </div>

    <?php include 'footer.php'; ?>
    <script src="../views/js/registrationValidation.js"></script>
</body>
</html>