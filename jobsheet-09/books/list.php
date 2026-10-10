<?php
$page_title = "Book List";
include __DIR__ . '/../includes/header.php';
require __DIR__ . '/../includes/connection.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);

$keyword = $_GET['keyword'] ?? '';

if ($keyword !== '') {
    $stmt = $pdo->prepare("
        SELECT * FROM books 
        WHERE title ILIKE :keyword 
        ORDER BY id DESC
    ");
    $stmt->execute(['keyword' => '%' . $keyword . '%']);
    $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    $books = $pdo->query("SELECT * FROM books ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
}
?>
        <section>
            <h2>Book List</h2>

            <?php if ($flash): ?>
                <p class="flash flash-<?php echo $flash['type']; ?>"><?php echo $flash['message']; ?></p>
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
                                <button type="button">Edit</button>
                                <button type="button" class="btn-delete">Delete</button>
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
        </section>
<?php include __DIR__ . '/../includes/footer.php'; ?>