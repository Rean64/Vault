<?php
require_once "control/config.php";

$lang = $_SESSION['language'] ?? 'en';
require_once "header.php";
?>

<section class="activities mt-5">
    <div class="section-header">
        <h1 class="main-title">
            <?php echo htmlspecialchars($lang == 'en' ? 'Latest ' : 'Derniers '); ?>
            <span class="highlight"><?php echo htmlspecialchars($lang == 'en' ? 'Articles' : 'Articles'); ?></span>
        </h1>
        <p class="section-subtitle">
            <?php echo htmlspecialchars($lang == 'en' ? 'Discover our most recent activities and insights' : 'Découvrez nos activités et perspectives les plus récentes'); ?>
        </p>
    </div>

    <div class="container">
        <!-- Filter and Sort Options -->
        <div class="article-controls">
            <div class="filter-tabs">
                <button class="filter-btn active" data-filter="all"><?php echo htmlspecialchars($lang == 'en' ? 'All' : 'Tous'); ?></button>
                <button class="filter-btn" data-filter="recent"><?php echo htmlspecialchars($lang == 'en' ? 'Recent' : 'Récents'); ?></button>
                <button class="filter-btn" data-filter="popular"><?php echo htmlspecialchars($lang == 'en' ? 'Popular' : 'Populaires'); ?></button>
            </div>
            <div class="view-options">
                <button class="view-btn active" data-view="grid" title="Grid View"><i class="fas fa-th"></i></button>
                <button class="view-btn" data-view="list" title="List View"><i class="fas fa-list"></i></button>
            </div>
        </div>

        <div class="articles-grid" id="articlesContainer">
            <?php
            $articles_per_page = 6;
            $page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
            $offset = ($page - 1) * $articles_per_page;

            // Get total number of articles
            $total_articles_sql = "SELECT COUNT(*) as total FROM Posts WHERE status = 'PUBLISHED'";
            $total_result = mysqli_query($conn, $total_articles_sql);
            $total_articles = mysqli_fetch_assoc($total_result)['total'];
            $total_pages = ceil($total_articles / $articles_per_page);

            // Fetch articles for the current page
            $sql = "SELECT id, titleEnglish, titleFrench, descEnglish, descFrench, category, image, created_at, tags, status, views, likes, comment FROM Posts WHERE status = 'PUBLISHED' ORDER BY created_at DESC LIMIT $offset, $articles_per_page";
            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($article = mysqli_fetch_assoc($result)) {
                    $title = $lang === 'en' ? $article['titleEnglish'] : $article['titleFrench'];
                    $description = $lang === 'en' ? $article['descEnglish'] : $article['descFrench'];
                    $strippedDescription = strip_tags($description);
                    $truncatedDescription = strlen($strippedDescription) > 120 ? substr($strippedDescription, 0, 120) . '...' : $strippedDescription;
                    $readTime = ceil(strlen($strippedDescription) / 200) ?: 3;
                    $viewCount = (int)($article['views'] ?? 0);
                    $publishDate = date_format(date_create($article['created_at']), $lang === 'en' ? 'M d, Y' : 'd M Y');
                    $tags = $article['tags'] ? implode(' ', array_map(fn($tag) => '#' . trim($tag), array_slice(explode(',', $article['tags']), 0, 2))) : '';
                    $likeCount = (int)($article['likes'] ?? 0);
                    $commentCount = isset($article['comment']) && is_array($article['comment']) ? count($article['comment']) : 0;

            ?>
            <article class="article-card" data-category="<?php echo htmlspecialchars(strtolower($article['category'] ?? 'general')); ?>" data-id="article-<?php echo htmlspecialchars($article['id']); ?>">
                <div class="article-image">
                    <img src="model/assets/images/activities/<?php echo htmlspecialchars($article['image'] ?? 'default.jpg'); ?>" alt="<?php echo htmlspecialchars($title); ?>" loading="lazy">
                    <div class="article-overlay">
                        <div class="article-category"><?php echo htmlspecialchars($article['category'] ?? 'General'); ?></div>
                        <div class="article-actions">
                            <button class="action-btn bookmark-btn" title="<?php echo $lang === 'en' ? 'Bookmark' : 'Marquer'; ?>">
                                <i class="far fa-bookmark"></i>
                            </button>
                            <button class="action-btn share-btn" title="<?php echo $lang === 'en' ? 'Share' : 'Partager'; ?>">
                                <i class="fas fa-share-alt"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="article-content">
                    <div class="article-meta">
                        <span class="meta-item"><i class="far fa-clock"></i> <?php echo $readTime; ?> <?php echo $lang === 'en' ? 'min read' : 'min de lecture'; ?></span>
                        <span class="meta-item"><i class="far fa-eye"></i> <?php echo number_format($viewCount); ?> <?php echo $lang === 'en' ? 'views' : 'vues'; ?></span>
                        <span class="meta-item"><i class="far fa-calendar"></i> <?php echo htmlspecialchars($publishDate); ?></span>
                    </div>
                    <h3 class="article-title"><?php echo htmlspecialchars($title); ?></h3>
                    <p class="article-excerpt"><?php echo htmlspecialchars($truncatedDescription); ?></p>
                    <div class="article-footer">
                        <div class="article-tags"><?php echo htmlspecialchars($tags); ?></div>
                        <div class="article-cta">
                            <button class="read-more-btn" data-article='<?php echo json_encode($article); ?>' data-lang="<?php echo $lang; ?>" data-id="<?php echo htmlspecialchars($article['id']); ?>">
                                <?php echo $lang === 'en' ? 'Read More' : 'Lire Plus'; ?> <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                    <div class="engagement-bar">
                        <button class="engagement-btn like-btn" data-count="<?php echo $likeCount; ?>">
                            <i class="far fa-heart"></i> <span class="count"><?php echo $likeCount; ?></span>
                        </button>
                        <button class="engagement-btn comment-btn" data-id="<?php echo htmlspecialchars($article['id']); ?>" data-count="<?php echo $commentCount; ?>">
                            <i class="far fa-comment"></i> <span class="count"><?php echo $commentCount; ?></span>
                        </button>
                    </div>
                </div>
            </article>
            <?php
                }
            } else {
                echo '<div class="no-articles">' . htmlspecialchars($lang === 'en' ? 'No articles found.' : 'Aucun article trouvé.') . '</div>';
            }
            ?>
        </div>

        <!-- Pagination Controls -->
        <div class="pagination-controls text-center mt-5" id="paginationControls">
            <?php
            if ($total_pages > 1) {
                if ($page > 1) {
                    echo '<a href="?page=' . ($page - 1) . '" class="btn btn-primary" data-page="' . ($page - 1) . '">' . htmlspecialchars($lang === 'en' ? 'Previous' : 'Précédent') . '</a>';
                }
                for ($i = 1; $i <= $total_pages; $i++) {
                    echo '<a href="?page=' . $i . '" class="btn ' . ($i === $page ? 'btn-primary' : 'btn-outline-primary') . ' mx-1" data-page="' . $i . '">' . $i . '</a>';
                }
                if ($page < $total_pages) {
                    echo '<a href="?page=' . ($page + 1) . '" class="btn btn-primary" data-page="' . ($page + 1) . '">' . htmlspecialchars($lang === 'en' ? 'Next' : 'Suivant') . '</a>';
                }
            }
            ?>
        </div>
    </div>
</section>

<!-- Enhanced Popup Modal -->
<div id="enhancedPopup" class="enhanced-popup">
    <div class="popup-backdrop"></div>
    <div class="popup-container">
        <div class="popup-header">
            <button class="popup-close-btn"><i class="fas fa-times"></i></button>
            <div class="popup-actions">
                <button class="popup-action-btn" id="popupBookmark"><i class="far fa-bookmark"></i></button>
                <button class="popup-action-btn" id="popupShare"><i class="fas fa-share-alt"></i></button>
                <button class="popup-action-btn" id="popupPrint"><i class="fas fa-print"></i></button>
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
                    <button class="popup-engage-btn" id="popupLike"><i class="far fa-heart"></i> <span id="popupLikes">0</span></button>
                    <button class="popup-engage-btn" id="popupCommentBtn"><i class="far fa-comment"></i> <span id="popupCommentCount">0</span></button>
                </div>
                <div id="popupDescription" class="popup-main-content"></div>
                <div class="popup-tags" id="popupTags"></div>
            </div>
        </div>
    </div>
</div>

<!-- Comment Modal -->
<div id="commentModal" class="enhanced-popup">
    <div class="popup-backdrop"></div>
    <div class="popup-container">
        <div class="popup-header">
            <h3 class="modal-title">Comments</h3>
            <button class="popup-close-btn" id="commentModalClose"><i class="fas fa-times"></i></button>
        </div>
        <div class="popup-body">
            <div class="comments-section">
                <h4>Leave a Comment</h4>
                <form id="commentForm" class="comment-form">
                    <input type="hidden" id="commentArticleId" name="article_id">
                    <input type="hidden" id="commentParentId" name="parent_id" value="0">
                    <div class="form-group mb-3"><input type="text" class="form-control" id="commentAuthor" name="author" placeholder="Your Name" required></div>
                    <div class="form-group mb-3"><textarea class="form-control" id="commentText" name="comment" rows="3" placeholder="Your Comment" required></textarea></div>
                    <button type="submit" class="btn btn-primary">Submit Comment</button>
                </form>
                <h4 class="mt-4">All Comments</h4>
                <div id="commentsList" class="comments-list"></div>
            </div>
        </div>
    </div>
</div>

<style>
/* Engagement Bar and Buttons */
.engagement-bar {
    display: flex;
    gap: 12px;
    margin-top: 12px;
    padding: 8px 0;
    border-top: 1px solid #e5e7eb;
}

.engagement-btn {
    display: flex;
    align-items: center;
    gap: 6px;
    padding: 8px 12px;
    background-color: #f3f4f6;
    border: 1px solid #d1d5db;
    border-radius: 8px;
    color: #374151;
    font-size: 14px;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.2s ease;
}

.engagement-btn:hover {
    background-color: #10b981;
    color: #ffffff;
    transform: translateY(-1px);
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.engagement-btn i {
    font-size: 16px;
}

.engagement-btn .count {
    font-size: 14px;
}

.engagement-btn.active {
    background-color: #10b981;
    color: #ffffff;
}

/* Popup Engagement Buttons */
.popup-engage-btn {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 10px 14px;
    background-color: #ffffff;
    border: 1px solid #d1d5db;
    border-radius: 8px;
    color: #374151;
    font-size: 16px;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.2s ease;
}

.popup-engage-btn:hover {
    background-color: #10b981;
    color: #ffffff;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
}

.popup-engage-btn i {
    font-size: 18px;
}

.popup-engage-btn span {
    font-size: 16px;
}

/* Enhanced Popup Modal Styling */
.enhanced-popup {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1000;
}

.enhanced-popup.active {
    display: block;
}

.popup-backdrop {
    background: rgba(0, 0, 0, 0.5);
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

.popup-container {
    background: #ffffff;
    border-radius: 12px;
    max-width: 1200px; /* Increased from 600px */
    max-height: 95vh; /* Limit height to 85% of viewport */
    margin: 3% auto;
    padding: 20px;
    position: relative;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    overflow: hidden; /* Prevent inner content from overflowing */
}

.popup-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-bottom: 10px;
    border-bottom: 1px solid #e5e7eb;
}

.popup-close-btn {
    background: none;
    border: none;
    font-size: 1.5rem;
    cursor: pointer;
    color: #374151;
}

.popup-actions {
    display: flex;
    gap: 10px;
}

.popup-action-btn {
    background: none;
    border: none;
    font-size: 1.2rem;
    cursor: pointer;
    color: #374151;
    transition: color 0.2s ease;
}

.popup-action-btn:hover {
    color: #10b981;
}

.popup-body {
    display: flex;
    /* flex-direction: column; */
    gap: 15px;
    max-height: 75vh; /* Ensure body fits within modal */
    /* overflow-y: auto;  */
    scrollbar-width: thin;
}

.popup-body::-webkit-scrollbar {
    width: 6px;
}

.popup-body::-webkit-scrollbar-thumb {
    background-color: rgba(0, 0, 0, 0.2);
    border-radius: 3px;
}

.popup-image-section {
    flex-shrink: 0; /* Prevent image from shrinking */
}

.popup-main-image {
    width: 100%;
    height: 300px; /* Fixed height for consistency */
    object-fit: cover;
    border-radius: 8px;
}

.popup-image-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    align-items: flex-start;
    padding: 10px;
}

.popup-category {
    background: #10b981;
    color: #ffffff;
    padding: 5px 10px;
    border-radius: 4px;
    font-size: 0.9rem;
}

.popup-content-section {
    padding: 15px;
    flex-grow: 1;
    font-weight: 300;
}

.popup-meta {
    display: flex;
    gap: 15px;
    font-size: 0.9rem;
    color: #777;
    margin-bottom: 10px;
}

.popup-main-title {
    font-size: 1.8rem;
    color: #333;
    margin-bottom: 10px;
}

.popup-engagement {
    display: flex;
    gap: 10px;
    margin-bottom: 15px;
}

.popup-main-content {
    font-size: 1rem;
    line-height: 1.6;
    color: #444;
    margin-bottom: 15px;
    max-height: 400px; /* Limit content height */
    overflow-y: auto; 
    scrollbar-width: thin;
}

.popup-main-content::-webkit-scrollbar {
    width: 6px;
}

.popup-main-content::-webkit-scrollbar-thumb {
    background-color: rgba(0, 0, 0, 0.2);
    border-radius: 3px;
}

.popup-tags {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
    padding-bottom:20px;
    font-weight: 500;
}

.tag-item {
    background: #f3f4f6;
    color: #374151;
    padding: 5px 10px;
    border-radius: 4px;
    font-size: 0.9rem;
}

/* Comment Modal Styles */
.comments-section {
    padding: 20px 10px 80px 0px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    max-width: 800px;
    margin: auto;
    font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    max-height: 600px;
    overflow-y: auto;
    scrollbar-width: thin;
}

.comments-section::-webkit-scrollbar {
    width: 6px;
}

.comments-section::-webkit-scrollbar-thumb {
    background-color: rgba(0, 0, 0, 0.2);
    border-radius: 3px;
}

.comments-section h4 {
    font-size: 1.8rem;
    margin-bottom: 20px;
    color: #333;
    border-bottom: 2px solid #00175de8;
    padding-bottom: 5px;
}

.comment-form .form-group {
    margin-bottom: 15px;
}

.comment-form .form-control {
    width: 100%;
    padding: 12px 14px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 1rem;
    transition: border-color 0.3s ease;
}

.comment-form .form-control:focus {
    border-color: #00175de8;
    outline: none;
}

.comment-form .btn-primary {
    background-color: #00175de8;
    color: #fff;
    padding: 10px 22px;
    border-radius: 6px;
    border: none;
    font-size: 1rem;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.comment-form .btn-primary:hover {
    background-color: #00175de8;
}

.comments-list {
    margin-top: 30px;
    padding-bottom: 60px;
}

.comment-item {
    background-color: #f8f8f8;
    padding: 18px;
    border-radius: 10px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
}

.comment-item p {
    margin: 0;
    color: #444;
    line-height: 1.5;
}

.comment-item p strong {
    color: #00175de8;
    font-weight: 600;
}

.comment-item small {
    font-size: 0.85rem;
    color: #777;
    margin-left: 12px;
}

.comment-item .reply-btn {
    background: none;
    border: none;
    color: #00175de8;
    cursor: pointer;
    font-size: 0.9rem;
    padding: 4px 8px;
    transition: color 0.3s ease;
}

.comment-item .reply-btn:hover {
    color: #00175de8;
    text-decoration: underline;
}

.comment-item .replies-list {
    margin-left: 25px;
    margin-top: 12px;
    border-left: 2px solid #ddd;
    padding-left: 15px;
}

/* Mobile Optimizations */
@media (max-width: 768px) {
    .engagement-btn {
        padding: 6px 10px;
        font-size: 12px;
    }
    .engagement-btn i {
        font-size: 14px;
    }
    .engagement-btn .count {
        font-size: 12px;
    }
    .popup-container {
        margin: 10px;
        max-width: 95vw; /* Nearly full width on mobile */
        max-height: 90vh;
    }
    .popup-body {
        max-height: 80vh;
    }
    .popup-main-image {
        height: 200px; /* Smaller image on mobile */
    }
    .popup-main-title {
        font-size: 1.5rem;
    }
    .popup-main-content {
        max-height: 300px; /* Adjust content height for mobile */
    }
    .comments-section {
        padding: 15px 5px;
        max-height: 500px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const articlesContainer = document.getElementById('articlesContainer');
    const paginationControls = document.getElementById('paginationControls');
    const popup = document.getElementById('enhancedPopup');
    const popupBackdrop = popup.querySelector('.popup-backdrop');
    const closeBtn = popup.querySelector('.popup-close-btn');
    const lang = '<?php echo $lang; ?>';

    const popupElements = {
        image: document.getElementById('popupImage'),
        category: document.getElementById('popupCategory'),
        date: document.getElementById('popupDate'),
        readTime: document.getElementById('popupReadTime'),
        title: document.getElementById('popupTitle'),
        likes: document.getElementById('popupLikes'),
        description: document.getElementById('popupDescription'),
        tags: document.getElementById('popupTags'),
        printBtn: document.getElementById('popupPrint'),
        likeBtn: document.getElementById('popupLike'),
        commentBtn: document.getElementById('popupCommentBtn'),
        commentModal: document.getElementById('commentModal'),
        commentModalClose: document.getElementById('commentModalClose'),
        commentForm: document.getElementById('commentForm'),
        commentsList: document.getElementById('commentsList'),
        commentArticleId: document.getElementById('commentArticleId')
    };

    function htmlspecialchars(str) {
        if (typeof str !== 'string') return '';
        const map = { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#039;' };
        return str.replace(/[&<>"']/g, m => map[m]);
    }

    function renderArticles(articles) {
        articlesContainer.innerHTML = '';
        if (!articles || articles.length === 0) {
            articlesContainer.innerHTML = '<div class="no-articles"><?php echo htmlspecialchars($lang == 'en' ? 'No articles found.' : 'Aucun article trouvé.'); ?></div>';
            return;
        }

        articles.forEach(article => {
            const title = lang === 'en' ? article.titleEnglish : article.titleFrench;
            const description = lang === 'en' ? article.descEnglish : article.descFrench;
            const strippedDescription = description.replace(/<[^>]+>/g, '');
            const truncatedDescription = strippedDescription.length > 120 ? strippedDescription.substring(0, 120) + '...' : strippedDescription;
            const readTime = Math.ceil(strippedDescription.length / 200) || 3;
            const viewCount = parseInt(article.views || 0).toLocaleString();
            const publishDate = new Date(article.created_at).toLocaleDateString(lang === 'en' ? 'en-US' : 'fr-FR', { year: 'numeric', month: 'short', day: 'numeric' });
            const tags = article.tags ? article.tags.split(',').slice(0, 2).map(tag => `#${tag.trim()}`).join(' ') : '';
            const likeCount = parseInt(article.likes || 0);
            const commentCount = Array.isArray(article.comment) ? article.comment.length : 0;

            const articleCard = `
                <article class="article-card" data-category="${(article.category || 'general').toLowerCase()}" data-id="article-${article.id}">
                    <div class="article-image">
                        <img src="model/assets/images/activities/${article.image || 'default.jpg'}" alt="${htmlspecialchars(title)}" loading="lazy">
                        <div class="article-overlay">
                            <div class="article-category">${htmlspecialchars(article.category || 'General')}</div>
                            <div class="article-actions">
                                <button class="action-btn bookmark-btn" title="${lang === 'en' ? 'Bookmark' : 'Marquer'}">
                                    <i class="far fa-bookmark"></i>
                                </button>
                                <button class="action-btn share-btn" title="${lang === 'en' ? 'Share' : 'Partager'}">
                                    <i class="fas fa-share-alt"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="article-content">
                        <div class="article-meta">
                            <span class="meta-item"><i class="far fa-clock"></i> ${readTime} ${lang === 'en' ? 'min read' : 'min de lecture'}</span>
                            <span class="meta-item"><i class="far fa-eye"></i> ${viewCount} ${lang === 'en' ? 'views' : 'vues'}</span>
                            <span class="meta-item"><i class="far fa-calendar"></i> ${publishDate}</span>
                        </div>
                        <h3 class="article-title">${htmlspecialchars(title)}</h3>
                        <p class="article-excerpt">${htmlspecialchars(truncatedDescription)}</p>
                        <div class="article-footer">
                            <div class="article-tags">${htmlspecialchars(tags)}</div>
                            <div class="article-cta">
                                <button class="read-more-btn" data-article='${JSON.stringify(article)}' data-lang="${lang}" data-id="${article.id}">
                                    ${lang === 'en' ? 'Read More' : 'Lire Plus'} <i class="fas fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                        <div class="engagement-bar">
                            <button class="engagement-btn like-btn" data-count="${likeCount}">
                                <i class="far fa-heart"></i> <span class="count">${likeCount}</span>
                            </button>
                            <button class="engagement-btn comment-btn" data-id="${article.id}" data-count="${commentCount}">
                                <i class="far fa-comment"></i> <span class="count">${commentCount}</span>
                            </button>
                        </div>
                    </div>
                </article>`;
            articlesContainer.insertAdjacentHTML('beforeend', articleCard);
        });

        // Reattach event listeners for read-more and comment buttons
        document.querySelectorAll('.read-more-btn').forEach(button => {
            button.addEventListener('click', function () {
                openPopup(this.dataset.article);
            });
        });
        document.querySelectorAll('.comment-btn').forEach(button => {
            button.addEventListener('click', function () {
                openCommentModal(this.dataset.id);
            });
        });
    }

    function renderPagination(currentPage, totalPages) {
        paginationControls.innerHTML = '';
        if (totalPages <= 1) return;

        let paginationHTML = '';
        if (currentPage > 1) {
            paginationHTML += `<a href="?page=${currentPage - 1}" class="btn btn-primary" data-page="${currentPage - 1}">${lang === 'en' ? 'Previous' : 'Précédent'}</a>`;
        }
        for (let i = 1; i <= totalPages; i++) {
            paginationHTML += `<a href="?page=${i}" class="btn ${i === currentPage ? 'btn-primary' : 'btn-outline-primary'} mx-1" data-page="${i}">${i}</a>`;
        }
        if (currentPage < totalPages) {
            paginationHTML += `<a href="?page=${currentPage + 1}" class="btn btn-primary" data-page="${currentPage + 1}">${lang === 'en' ? 'Next' : 'Suivant'}</a>`;
        }
        paginationControls.innerHTML = paginationHTML;
    }

    let isLoading = false;
    async function loadArticles(page = 1) {
        if (isLoading) return;
        isLoading = true;
        articlesContainer.innerHTML = '<div class="loading-spinner">Loading...</div>';

        try {
            const response = await fetch(`control/get-paginated-articles.php?page=${page}`, {
                headers: { 'Accept': 'application/json' }
            });
            if (!response.ok) {
                const errorText = await response.text();
                throw new Error(`HTTP error! status: ${response.status}, response: ${errorText}`);
            }
            const data = await response.json();
            if (data.error) {
                throw new Error(`Server error: ${data.message}`);
            }
            renderArticles(data.articles);
            renderPagination(data.currentPage, data.totalPages);
        } catch (error) {
            console.error('Failed to load articles:', error);
            articlesContainer.innerHTML = `<div class="no-articles error"><strong>Error:</strong> ${error.message}</div>`;
        } finally {
            isLoading = false;
        }
    }

    // Handle pagination clicks
    paginationControls.addEventListener('click', function (e) {
        e.preventDefault();
        const target = e.target.closest('a');
        if (target && target.dataset.page) {
            const page = parseInt(target.dataset.page);
            loadArticles(page);
            history.pushState({ page }, '', `?page=${page}`);
        }
    });

    // Handle filter buttons
    document.querySelectorAll('.filter-btn').forEach(button => {
        button.addEventListener('click', function () {
            document.querySelector('.filter-btn.active').classList.remove('active');
            this.classList.add('active');
            const filter = this.dataset.filter;
            const articles = document.querySelectorAll('.article-card');
            articles.forEach(article => {
                if (filter === 'all' || article.dataset.category === filter) {
                    article.style.display = 'block';
                } else {
                    article.style.display = 'none';
                }
            });
        });
    });

    // Handle view buttons
    document.querySelectorAll('.view-btn').forEach(button => {
        button.addEventListener('click', function () {
            document.querySelector('.view-btn.active').classList.remove('active');
            this.classList.add('active');
            const view = this.dataset.view;
            articlesContainer.className = `articles-grid ${view}-view`;
        });
    });

    // Handle popstate for browser back/forward navigation
    window.addEventListener('popstate', (event) => {
        if (event.state && event.state.page) {
            loadArticles(event.state.page);
        }
    });

    function openPopup(articleData) {
        const article = JSON.parse(articleData);
        console.log('Opening popup for article:', article);
        const title = lang === 'en' ? article.titleEnglish : article.titleFrench;
        const description = lang === 'en' ? article.descEnglish : article.descFrench;
        const strippedDescription = description.replace(/<[^>]+>/g, '');
        const readTime = Math.ceil(strippedDescription.length / 200) || 3;
        const publishDate = new Date(article.created_at).toLocaleDateString(lang === 'en' ? 'en-US' : 'fr-FR', { year: 'numeric', month: 'short', day: 'numeric' });
        const tagsHTML = article.tags ? article.tags.split(',').map(tag => `<span class="tag-item">#${tag.trim()}</span>`).join('') : '';

        popupElements.image.src = `model/assets/images/activities/${article.image || 'default.jpg'}`;
        popupElements.image.alt = htmlspecialchars(title);
        popupElements.category.textContent = article.category || 'General';
        popupElements.date.textContent = publishDate;
        popupElements.readTime.textContent = `${readTime} ${lang === 'en' ? 'min read' : 'min de lecture'}`;
        popupElements.title.textContent = title;
        popupElements.likes.textContent = parseInt(article.likes || 0);
        popupElements.description.innerHTML = description;
        popupElements.tags.innerHTML = tagsHTML;

        popup.classList.add('active');
        document.body.style.overflow = 'hidden';

        popupElements.printBtn.onclick = () => window.print();
        popupElements.likeBtn.onclick = () => {
            console.log('Liked article:', article.id);
            // Implement like functionality (e.g., AJAX to update likes)
        };
        popupElements.commentBtn.onclick = () => openCommentModal(article.id);
    }

    function closePopup() {
        popup.classList.remove('active');
        document.body.style.overflow = 'auto';
    }

    async function openCommentModal(articleId) {
        if (popupElements.commentModal) {
            popupElements.commentModal.classList.add('active');
            popupElements.commentArticleId.value = articleId;
            await loadComments(articleId);
        }
    }

    function closeCommentModal() {
        if (popupElements.commentModal) {
            popupElements.commentModal.classList.remove('active');
        }
    }

    async function loadComments(articleId) {
        try {
            const response = await fetch(`control/get-comments.php?article_id=${articleId}`, {
                headers: { 'Accept': 'application/json' }
            });
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            const comments = await response.json();
            renderComments(comments);
        } catch (error) {
            console.error('Failed to load comments:', error);
            if (popupElements.commentsList) {
                popupElements.commentsList.innerHTML = '<p>Error loading comments.</p>';
            }
        }
    }

    function renderComments(comments) {
        if (popupElements.commentsList) {
            popupElements.commentsList.innerHTML = '';
            if (comments.length === 0) {
                popupElements.commentsList.innerHTML = '<p>No comments yet. Be the first to comment!</p>';
                return;
            }
            comments.forEach(comment => {
                const commentElement = document.createElement('div');
                commentElement.className = 'comment-item';
                commentElement.innerHTML = `
                    <p><strong>${htmlspecialchars(comment.author)}:</strong> ${htmlspecialchars(comment.comment)}</p>
                    <small>${new Date(comment.created_at).toLocaleString()}</small>
                `;
                popupElements.commentsList.appendChild(commentElement);
            });
        }
    }

    if (popupElements.commentForm) {
        popupElements.commentForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            try {
                const response = await fetch('control/add-comment.php', {
                    method: 'POST',
                    body: formData
                });
                const result = await response.json();
                if (result.success) {
                    this.reset();
                    loadComments(formData.get('article_id'));
                } else {
                    alert('Error: ' + result.message);
                }
            } catch (error) {
                console.error('Failed to submit comment:', error);
                alert('An error occurred while submitting your comment.');
            }
        });
    }

    // Initial event listeners for read-more and comment buttons
    document.querySelectorAll('.read-more-btn').forEach(button => {
        button.addEventListener('click', function () {
            openPopup(this.dataset.article);
        });
    });
    document.querySelectorAll('.comment-btn').forEach(button => {
        button.addEventListener('click', function () {
            openCommentModal(this.dataset.id);
        });
    });

    if (closeBtn) closeBtn.addEventListener('click', closePopup);
    if (popupBackdrop) popupBackdrop.addEventListener('click', closePopup);
    if (popupElements.commentModalClose) popupElements.commentModalClose.addEventListener('click', closeCommentModal);
    const commentBackdrop = document.querySelector('#commentModal .popup-backdrop');
    if (commentBackdrop) commentBackdrop.addEventListener('click', closeCommentModal);
});
</script>

<?php require_once "footer.php"; ?>
