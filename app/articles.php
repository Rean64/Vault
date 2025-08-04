
<?php
// The $activities, $currentPage, and $totalPages variables are expected to be passed from the controller.

// Define contact information (these are static and can remain here)
$phoneNumber = '670844193'; // Example number
$message = urlencode("Hello, I'm interested in your services.");
$whatsAppLink = "https://wa.me/{$phoneNumber}?text={$message}";

$lang = $_SESSION['language'] == 'en' ? 'en' : 'fr';

?>

<?php require_once "header.php"?>
<section class="activities mt-5">
    <div class="section-header">
        <h1 class="main-title">
            <?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'Latest ' : 'Derniers '); ?>
            <span class="highlight"><?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'Articles' : 'Articles'); ?></span>
        </h1>
        <p class="section-subtitle">
            <?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'Discover our most recent activities and insights' : 'Découvrez nos activités et perspectives les plus récentes'); ?>
        </p>
    </div>

    <div class="container">
        <!-- Filter and Sort Options -->
        <div class="article-controls">
            <div class="filter-tabs">
                <button class="filter-btn active" data-filter="all">
                    <?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'All' : 'Tous'); ?>
                </button>
                <button class="filter-btn" data-filter="recent">
                    <?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'Recent' : 'Récents'); ?>
                </button>
                <button class="filter-btn" data-filter="popular">
                    <?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'Popular' : 'Populaires'); ?>
                </button>
            </div>
            <div class="view-options">
                <button class="view-btn active" data-view="grid" title="Grid View">
                    <i class="fas fa-th"></i>
                </button>
                <button class="view-btn" data-view="list" title="List View">
                    <i class="fas fa-list"></i>
                </button>
            </div>
        </div>

        <div class="articles-grid" id="articlesContainer">
            <?php
            $lang = $_SESSION['language'] == 'en' ? 'en' : 'fr';
            
            foreach (($activities ?? []) as $data) {
                $jsonData = json_encode($data);
                $readTime = rand(3, 8); // Simulate read time
                $category = $data['category'] ?? 'General';
                $publishDate = $data['date'] ?? date('Y-m-d');
                $viewCount = $data['views'] ?? rand(100, 1000);
            ?>
            
            <article class="article-card" data-category="<?php echo strtolower($category); ?>" data-id="<?php echo $data['id']; ?>">
                <div class="article-image">
                    <img src="assets/images/activities/<?php echo htmlspecialchars($data['image']); ?>" 
                         alt="<?php echo htmlspecialchars($_SESSION['language'] == 'en' ? $data['titleEnglish'] : $data['titleFrench']); ?>"
                         loading="lazy">
                    <div class="article-overlay">
                        <div class="article-category"><?php echo htmlspecialchars($category); ?></div>
                        <div class="article-actions">
                            <button class="action-btn bookmark-btn" title="<?php echo $_SESSION['language'] == 'en' ? 'Bookmark' : 'Marquer'; ?>">
                                <i class="far fa-bookmark"></i>
                            </button>
                            <button class="action-btn share-btn" title="<?php echo $_SESSION['language'] == 'en' ? 'Share' : 'Partager'; ?>">
                                <i class="fas fa-share-alt"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="article-content">
                    <div class="article-meta">
                        <span class="meta-item">
                            <i class="far fa-clock"></i>
                            <?php echo $readTime . ($_SESSION['language'] == 'en' ? ' min read' : ' min de lecture'); ?>
                        </span>
                        <span class="meta-item">
                            <i class="far fa-eye"></i>
                            <?php echo number_format($viewCount) . ($_SESSION['language'] == 'en' ? ' views' : ' vues'); ?>
                        </span>
                        <span class="meta-item">
                            <i class="far fa-calendar"></i>
                            <?php echo date('M d, Y', strtotime($publishDate)); ?>
                        </span>
                    </div>

                    <h3 class="article-title">
                        <?php echo htmlspecialchars($_SESSION['language'] == 'en' ? $data['titleEnglish'] : $data['titleFrench']); ?>
                    </h3>

                    <p class="article-excerpt">
                        <?php 
                        $description = $_SESSION['language'] == 'en' ? $data['descEnglish'] : $data['descFrench'];
                        echo htmlspecialchars(strlen($description) > 120 ? substr($description, 0, 120) . '...' : $description); 
                        ?>
                    </p>

                    <div class="article-footer">
                        <div class="article-tags">
                            <?php 
                            $tags = $data['tags'] ?? [];
                            if (is_string($tags)) { // Fallback for old data or if not processed by controller
                                $tags = array_map('trim', explode(',', $tags));
                            }
                            foreach (array_slice($tags, 0, 2) as $tag): 
                                if (!empty($tag)): // Only display non-empty tags
                            ?>
                            <span class="tag">#<?php echo htmlspecialchars($tag); ?></span>
                            <?php 
                                endif;
                            endforeach; 
                            ?>
                        </div>
                        
                        <div class="article-cta">
                            <button class="read-more-btn" data-article='<?php echo json_encode($data); ?>' data-lang="<?php echo $lang; ?>" data-id="<?php echo $data['id']; ?>">
                                <?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'Read More' : 'Lire Plus'); ?>
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Engagement Bar -->
                    <div class="engagement-bar">
                        <button class="engagement-btn like-btn" data-count="<?php echo rand(10, 100); ?>">
                            <i class="far fa-heart"></i>
                            <span class="count"><?php echo rand(10, 100); ?></span>
                        </button>
                        <button class="engagement-btn comment-btn" data-count="<?php echo rand(5, 50); ?>">
                            <i class="far fa-comment"></i>
                            <span class="count"><?php echo rand(5, 50); ?></span>
                        </button>
                    </div>
                </div>
            </article>

            <?php
            }
            ?>
        </div>

        <!-- Pagination Controls -->
        <div class="pagination-controls text-center mt-5">
            <?php if ($currentPage > 1): ?>
                <a href="?page=<?php echo $currentPage - 1; ?>" class="btn btn-primary"><?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'Previous' : 'Précédent'); ?></a>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <a href="?page=<?php echo $i; ?>" class="btn <?php echo ($i == $currentPage) ? 'btn-primary' : 'btn-outline-primary'; ?> mx-1"><?php echo $i; ?></a>
            <?php endfor; ?>

            <?php if ($currentPage < $totalPages): ?>
                <a href="?page=<?php echo $currentPage + 1; ?>" class="btn btn-primary"><?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'Next' : 'Suivant'); ?></a>
            <?php endif; ?>
        </div>

    </div> 

    <!-- Enhanced Popup Modal -->
    <div id="enhancedPopup" class="enhanced-popup">
        <div class="popup-backdrop"></div>
        <div class="popup-container">
            <div class="popup-header">
                <button class="popup-close-btn">
                    <i class="fas fa-times"></i>
                </button>
                <div class="popup-actions">
                    <button class="popup-action-btn" id="popupBookmark">
                        <i class="far fa-bookmark"></i>
                    </button>
                    <button class="popup-action-btn" id="popupShare">
                        <i class="fas fa-share-alt"></i>
                    </button>
                    <button class="popup-action-btn" id="popupPrint">
                        <i class="fas fa-print"></i>
                    </button>
                </div>
            </div>

            <div class="popup-body">
                <div class="popup-image-section">
                    <img id="popupImage" src="" alt="" class="popup-main-image">
                    <div class="popup-image-overlay">
                        <div class="popup-category" id="popupCategory"></div>
                    </div>
                </div>

                <div class="popup-content-section">
                    <div class="popup-meta">
                        <span id="popupDate"></span>
                        <span id="popupReadTime"></span>
                    </div>
                    
                    <h1 id="popupTitle" class="popup-main-title"></h1>
                    
                    <div class="popup-engagement">
                        <button class="popup-engage-btn" id="popupLike">
                            <i class="far fa-heart"></i>
                            <spann id="popupLikes">0</spann>
                        </button>
                        <button class="popup-engage-btn" id="popupComment">
                            <i class="far fa-comment"></i>
                            <span>0</span>
                        </button>
                    </div>

                    <div id="popupDescription" class="popup-main-content"></div>
                    
                    <div class="popup-tags" id="popupTags"></div>
                    
                    <div class="popup-footer-actions">
                        <button class="popup-cta-btn primary">
                            <?php echo $_SESSION['language'] == 'en' ? 'Learn More' : 'En Savoir Plus'; ?>
                        </button>
                        <button class="popup-cta-btn secondary" id="openCommentsBtn">
                            <?php echo $_SESSION['language'] == 'en' ? 'Comments' : 'Commentaires'; ?>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation to All Articles -->
    <div class="section-footer">
        <a href="activities" class="view-all-btn">
            <span><?php echo $_SESSION['language'] == 'en' ? 'View All Articles' : 'Voir Tous les Articles'; ?></span>
            <i class="fas fa-arrow-right"></i>
        </a>
    </div>
</section>

 <?php require_once "$footer"?>

<!-- Comment Modal -->
<div id="commentModal" class="enhanced-popup">
    <div class="popup-backdrop"></div>
    <div class="popup-container">
        <div class="popup-header">
            <h3 class="modal-title">Comments</h3>
            <button class="popup-close-btn" id="commentModalClose">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="popup-body">
            <div class="comments-section">
                <h4>Leave a Comment</h4>
                <form id="commentForm" class="comment-form">
                    <input type="hidden" id="commentArticleId" name="article_id">
                    <input type="hidden" id="commentParentId" name="parent_id" value="0">
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" id="commentAuthor" name="author" placeholder="Your Name" required>
                    </div>
                    <div class="form-group mb-3">
                        <textarea class="form-control" id="commentText" name="comment" rows="3" placeholder="Your Comment" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Comment</button>
                </form>

                <h4 class="mt-4">All Comments</h4>
                <div id="commentsList" class="comments-list">
                    <!-- Comments will be loaded here dynamically -->
                </div>
            </div>
        </div>
    </div>
</div>


  <script src="assets/js/popupHandler.js"></script>
  <script src="assets/js/commentHandler.js"></script>
 <?php require_once "footer.php"?>