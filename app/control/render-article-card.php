<?php
function renderArticleCard($article, $lang) {
    $title = $lang === 'en' ? $article['titleEnglish'] : $article['titleFrench'];
    $description = $lang === 'en' ? $article['descEnglish'] : $article['descFrench'];
    $strippedDescription = strip_tags($description);
    $truncatedDescription = strlen($strippedDescription) > 120 ? substr($strippedDescription, 0, 120) . '...' : $strippedDescription;
    $readTime = ceil(strlen($strippedDescription) / 200) ?: 3;
    $viewCount = (int)($article['views'] ?? 0);
    $publishDate = date_format(date_create($article['created_at']), $lang === 'en' ? 'M d, Y' : 'd M Y');
    $tags = $article['tags'] ? implode(' ', array_map(fn($tag) => '#' . trim($tag), array_slice(explode(',', $article['tags']), 0, 2))) : '';
    $likeCount = (int)($article['likes'] ?? 0);
    $commentCount = (int)($article['comment_count'] ?? 0);

    return <<<HTML
    <article class="article-card" data-category="{htmlspecialchars(strtolower($article['category'] ?? 'general'))}" data-id="{htmlspecialchars($article['id'])}" data-article='{json_encode($article)}'>
        <div class="article-image">
            <img src="model/assets/images/activities/{htmlspecialchars($article['image'] ?? 'default.jpg')}" alt="{htmlspecialchars($title)}" loading="lazy">
            <div class="article-overlay">
                <div class="article-category">{htmlspecialchars($article['category'] ?? 'General')}</div>
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
                <span class="meta-item"><i class="far fa-clock"></i> {$readTime} min read</span>
                <span class="meta-item"><i class="far fa-eye"></i> {number_format($viewCount)} views</span>
                <span class="meta-item"><i class="far fa-calendar"></i> {htmlspecialchars($publishDate)}</span>
            </div>
            <h3 class="article-title">{htmlspecialchars($title)}</h3>
            <p class="article-excerpt">{htmlspecialchars($truncatedDescription)}</p>
            <div class="article-footer">
                <div class="article-tags">{htmlspecialchars($tags)}</div>
                <div class="article-cta">
                    <button class="read-more-btn">
                        Read More <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>
            <div class="engagement-bar">
                <button class="engagement-btn like-btn" data-count="{$likeCount}">
                    <i class="far fa-heart"></i> <span class="count">{$likeCount}</span>
                </button>
                <button class="engagement-btn comment-btn" data-id="{htmlspecialchars($article['id'])}" data-count="{$commentCount}">
                    <i class="far fa-comment"></i> <span class="count">{$commentCount}</span>
                </button>
            </div>
        </div>
    </article>
HTML;
}
?>