<?php
$page_title = "Book List";
include __DIR__ . '/../includes/header.php';
require __DIR__ . '/../includes/connection.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);

$perPage = 10;
$page = max(1, (int) ($_GET['page'] ?? 1));
$offset = ($page - 1) * $perPage;
$keyword = trim($_GET['keyword'] ?? '');

if ($keyword !== '') {
    $countStmt = $pdo->prepare("SELECT COUNT(*) FROM books WHERE title ILIKE :keyword");
    $countStmt->execute(['keyword' => '%' . $keyword . '%']);
    $totalRows = $countStmt->fetchColumn();

    $stmt = $pdo->prepare("SELECT * FROM books WHERE title ILIKE :keyword ORDER BY id DESC LIMIT :limit OFFSET :offset");
    $stmt->bindValue('keyword', '%' . $keyword . '%');
} else {
    $totalRows = $pdo->query("SELECT COUNT(*) FROM books")->fetchColumn();
    $stmt = $pdo->prepare("SELECT * FROM books ORDER BY id DESC LIMIT :limit OFFSET :offset");
}

$stmt->bindValue('limit', $perPage, PDO::PARAM_INT);
$stmt->bindValue('offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$books = $stmt->fetchAll(PDO::FETCH_ASSOC);
$totalPages = max(1, (int) ceil($totalRows / $perPage));
?>
        <section>
            <h2>Book List</h2>

            <?php if ($flash): ?>
                <p class="flash flash-<?php echo $flash['type']; ?>"><?php echo $flash['pesan']; ?></p>
            <?php endif; ?>

            <form method="get" action="list.php" class="search-box">
                <label for="search-input">Search Book Title</label>
                <input 
                    type="text" 
                    id="search-input" 
                    name="keyword" 
                    placeholder="Type book title..." 
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
                        <th>Title</th>
                        <th>Author</th>
                        <th>Year</th>
                        <th>Stock</th>
                        <th>Action</th>
                        <th>Date Added</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($books)): ?>
                    <tr>
                        <td colspan="6">No book data yet. Please add one via the "Add Book" menu.</td>
                    </tr>
                    <?php else: ?>
                        <?php foreach ($books as $book): ?>
                        <tr>
                            <td><?php echo $book['title']; ?></td>
                            <td><?php echo $book['author']; ?></td>
                            <td><?php echo $book['year']; ?></td>
                            <td><?php echo $book['stock']; ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $book['id']; ?>" class="btn-edit">Edit</a>
                                <form class="form-hapus" method="post" action="delete.php">
                                    <input type="hidden" name="id" value="<?php echo $book['id']; ?>">
                                    <button type="submit" class="btn-hapus">Delete</button>
                                </form>
                            </td>
                            <td>
                                <?php echo !empty($book['date_added']) 
                                    ? date('M d, Y H:i', strtotime($book['date_added'])) 
                                    : '-'; ?>
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