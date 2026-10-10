<?php
$page_title = "Member List";
include __DIR__ . '/../includes/header.php';
require __DIR__ . '/../includes/connection.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);

$perPage = 10;
$page = max(1, (int) ($_GET['page'] ?? 1));
$offset = ($page - 1) * $perPage;
$keyword = trim($_GET['keyword'] ?? '');

if ($keyword !== '') {
    $countStmt = $pdo->prepare("SELECT COUNT(*) FROM members WHERE name ILIKE :keyword OR member_id ILIKE :keyword");
    $countStmt->execute(['keyword' => '%' . $keyword . '%']);
    $totalRows = $countStmt->fetchColumn();

    $stmt = $pdo->prepare("SELECT * FROM members WHERE name ILIKE :keyword OR member_id ILIKE :keyword ORDER BY id DESC LIMIT :limit OFFSET :offset");
    $stmt->bindValue('keyword', '%' . $keyword . '%');
} else {
    $totalRows = $pdo->query("SELECT COUNT(*) FROM members")->fetchColumn();
    $stmt = $pdo->prepare("SELECT * FROM members ORDER BY id DESC LIMIT :limit OFFSET :offset");
}

$stmt->bindValue('limit', $perPage, PDO::PARAM_INT);
$stmt->bindValue('offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$members = $stmt->fetchAll(PDO::FETCH_ASSOC);
$totalPages = max(1, (int) ceil($totalRows / $perPage));
?>
        <section>
            <h2>Member List</h2>

            <?php if ($flash): ?>
                <p class="flash flash-<?php echo $flash['type']; ?>"><?php echo $flash['pesan']; ?></p>
            <?php endif; ?>

            <form method="get" action="list.php" class="search-box">
                <label for="search-input">Search Member Name</label>
                <input 
                    type="text" 
                    id="search-input" 
                    name="keyword" 
                    placeholder="Type member name..." 
                    value="<?php echo htmlspecialchars($keyword); ?>"
                >
                <button type="submit">Search</button>
                <?php if ($keyword !== ''): ?>
                    <a href="list.php">Clear</a>
                <?php endif; ?>
            </form>

            <?php if ($keyword !== ''): ?>
                <p>Showing results for: <strong><?php echo htmlspecialchars($keyword); ?></strong></p>
            <?php endif; ?>

            <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Member ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($members)): ?>
                    <tr>
                        <td colspan="5">No member data yet. Please add one via the "Add Member" menu.</td>
                    </tr>
                    <?php else: ?>
                        <?php foreach ($members as $member): ?>
                        <tr>
                            <td><?php echo $member['member_id']; ?></td>
                            <td><?php echo $member['name']; ?></td>
                            <td><?php echo $member['address']; ?></td>
                            <td><?php echo $member['phone']; ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $member['id']; ?>" class="btn-edit">Edit</a>
                                <form class="form-hapus" method="post" action="delete.php">
                                    <input type="hidden" name="id" value="<?php echo $member['id']; ?>">
                                    <button type="submit" class="btn-hapus">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
            </div>

            <nav class="pagination">
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <a href="list.php?page=<?php echo $i; ?><?php echo $keyword !== '' ? '&keyword=' . urlencode($keyword) : ''; ?>" class="<?php echo $i === $page ? 'active' : ''; ?>">
                        <?php echo $i; ?>
                    </a>
                <?php endfor; ?>
            </nav>
        </section>
<?php include __DIR__ . '/../includes/footer.php'; ?>