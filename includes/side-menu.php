<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Genre</div>        
    <nav class="yamm megamenu-horizontal" role="navigation">
        <ul class="nav">
            <?php
            try {
                $stmt = $pdo->prepare("SELECT id, genreName FROM genre");
                $stmt->execute();
                $genres = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                echo "Error retrieving genres: " . $e->getMessage();
            }
            ?>

            <?php if (!empty($genres)) : ?>
                <?php foreach ($genres as $genre) : ?>
                    <li class="dropdown menu-item">
                        <a href="genre.php?id=<?php echo $genre['id']; ?>">
                            <?php echo htmlspecialchars($genre['genreName']); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </nav>
</div>