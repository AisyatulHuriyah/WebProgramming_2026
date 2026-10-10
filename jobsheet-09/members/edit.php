<?php
$page_title = "Edit Member";
include __DIR__ . '/../includes/header.php';
require __DIR__ . '/../includes/connection.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: list.php');
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM members WHERE id = :id");
$stmt->execute(['id' => $id]);
$member = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$member) {
    header('Location: list.php');
    exit;
}
?>

<section>
    <h2>Edit Member</h2>

    <form id="form-tambah" method="post" action="process_edit.php">

        <input type="hidden" name="id" value="<?php echo $member['id']; ?>">

        <p>
            <label for="name">Name</label><br>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($member['name']); ?>" required>
        </p>

        <p>
            <label for="member_id">Member ID</label><br>
            <input type="text" id="member_id" name="member_id" value="<?php echo htmlspecialchars($member['member_id'] ?? ''); ?>" required>
        </p>

        <p>
            <label for="phone">Phone</label><br>
            <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($member['phone']); ?>" required>
        </p>

        <p>
            <label for="address">Address</label><br>
            <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($member['address']); ?>" required>
        </p>

        <button type="submit">Save Changes</button>
        <a href="list.php">Cancel</a>
    </form>
</section>

<?php include __DIR__ . '/../includes/footer.php'; ?>