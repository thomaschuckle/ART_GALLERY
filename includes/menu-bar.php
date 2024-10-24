<div class="header-nav animate-dropdown">
    <div class="container">
        <div class="yamm navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="nav-bg-class">
                <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                    <div class="nav-outer">
                        <ul class="nav navbar-nav">
                            <li class="active dropdown yamm-fw"> 
                                <a href="index.php" data-hover="dropdown" class="dropdown-toggle">Home</a>
                            </li>

                            <?php
                            // Database access code to retrieve genres from the database
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
                                    <li class="dropdown yamm">
                                        <a href="genre.php?id=<?php echo $genre['id']; ?>" class="dropdown-toggle">
                                            <?php echo htmlspecialchars($genre['genreName']); ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            <?php endif; ?>

                        </ul><!-- /.navbar-nav -->
                        <div class="clearfix"></div>                
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>