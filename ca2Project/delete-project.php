<?php
// delete-project.php
session_start();

// Redirect to login if not authenticated
if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
    header('Location: signin.php');
    exit;
}

// Check if project ID is provided
if (!isset($_GET['id']) || empty($_GET['id'])) {
    $_SESSION['error_message'] = "No project specified for deletion.";
    header('Location: projects.php');
    exit;
}

$project_id = (int)$_GET['id'];
$user_id = $_SESSION['user_id'];

// Database connection
require_once 'includes/dbconnect.php';

// First check if the project exists and belongs to the current user
$check_stmt = $conn->prepare("SELECT id, project_name FROM projects WHERE id = ? AND user_id = ?");
$check_stmt->bind_param("ii", $project_id, $user_id);
$check_stmt->execute();
$result = $check_stmt->get_result();

if ($result->num_rows === 0) {
    $_SESSION['error_message'] = "Project not found or you don't have permission to delete it.";
    header('Location: projects.php');
    $check_stmt->close();
    $conn->close();
    exit;
}

$project = $result->fetch_assoc();
$check_stmt->close();



//Delete project tasks
$delete_tasks_stmt = $conn->prepare("DELETE FROM project_tasks WHERE project_id = ?");
if ($delete_tasks_stmt) {
    $delete_tasks_stmt->bind_param("i", $project_id);
    $delete_tasks_stmt->execute();
    $delete_tasks_stmt->close();
}

// Now delete the project
$delete_project_stmt = $conn->prepare("DELETE FROM projects WHERE id = ? AND user_id = ?");
$delete_project_stmt->bind_param("ii", $project_id, $user_id);
$delete_project_stmt->execute();

if ($delete_project_stmt->affected_rows > 0) {
    $_SESSION['success_message'] = "Project '{$project['project_name']}' has been deleted successfully.";
} else {
    $_SESSION['error_message'] = "Failed to delete the project. Please try again.";
}

$delete_project_stmt->close();
$conn->close();

// Redirect back to projects page
header('Location: projects.php');
exit;
?>