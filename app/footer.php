  <!-- ======= Footer ======= -->
<footer id="footer" class="footer">
    <?php echo $_SESSION['language'] == 'en' ? '
    <div class="container">
        <div class="row gy-3">
            <div class="col-lg-3 col-md-6 d-flex">
                <i class="bi bi-geo-alt icon"></i>
                <div>
                    <h4>Our Location</h4>
                    <p>
                        Awea Escalier<br>
                        Yaounde, Cameroon<br>
                    </p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 footer-links d-flex">
                <i class="bi bi-envelope icon"></i>
                <div>
                    <h4>Contact Us</h4>
                    <p>
                        <strong>Email:</strong> info@curatedresearch.org<br>
                        <strong>Phone:</strong> +237 620-58-46-91<br>
                    </p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 footer-links d-flex">
                <i class="bi bi-newspaper icon"></i>
                <div>
                    <h4>Newsletter</h4>
                    <p>Subscribe for the latest articles and updates</p>
                    <form action="/subscribe" method="post" class="d-flex">
                        <input type="email" name="email" placeholder="Your Email" style="padding: 8px; border-radius: 4px 0 0 4px; border: 1px solid #ccc;">
                        <button type="submit" style="padding: 8櫃px 12px; border-radius: 0 4px 4px 0; background: #297559; color: white; border: none;">
                            <i class="bi bi-arrow-right"></i>
                        </button>
                    </form>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 footer-links">
                <h4>Follow Us</h4>
                <div class="social-links d-flex">
                    <a href="https://twitter.com/curatedresearch" class="twitter"><i class="bi bi-twitter"></i></a>
                    <a href="https://facebook.com/curatedresearch" class="facebook"><i class="bi bi-facebook"></i></a>
                    <a href="https://instagram.com/curatedresearch" class="instagram"><i class="bi bi-instagram"></i></a>
                    <a href="https://linkedin.com/company/curatedresearch" class="linkedin"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span>2025</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            Designed by <span class="text-primary">TECH<span class="text-warning">TEAM</span></span>
        </div>
    </div>
    ' : '
    <div class="container">
        <div class="row gy-3">
            <div class="col-lg-3 col-md-6 d-flex">
                <i class="bi bi-geo-alt icon"></i>
                <div>
                    <h4>Notre Emplacement</h4>
                    <p>
                        Awea Escalier<br>
                        Yaoundé, Cameroun<br>
                    </p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 footer-links d-flex">
                <i class="bi bi-envelope icon"></i>
                <div>
                    <h4>Contactez-Nous</h4>
                    <p>
                        <strong>Email:</strong> info@curatedresearch.org<br>
                        <strong>Téléphone:</strong> +237 620-58-46-91<br>
                    </p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 footer-links d-flex">
                <i class="bi bi-newspaper icon"></i>
                <div>
                    <h4>Newsletter</h4>
                    <p>Abonnez-vous pour les derniers articles et mises à jour</p>
                    <form action="/subscribe" method="post" class="d-flex">
                        <input type="email" name="email" placeholder="Votre Email" style="padding: 8px; border-radius: 4px 0 0 4px; border: 1px solid #ccc;">
                        <button type="submit" style="padding: 8px 12px; border-radius: 0 4px 4px 0; background: #297559; color: white; border: none;">
                            <i class="bi bi-arrow-right"></i>
                        </button>
                    </form>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 footer-links">
                <h4>Suivez-Nous</h4>
                <div class="social-links d-flex">
                    <a href="https://twitter.com/curatedresearch" class="twitter"><i class="bi bi-twitter"></i></a>
                    <a href="https://facebook.com/curatedresearch" class="facebook"><i class="bi bi-facebook"></i></a>
                    <a href="https://instagram.com/curatedresearch" class="instagram"><i class="bi bi-instagram"></i></a>
                    <a href="https://linkedin.com/company/curatedresearch" class="linkedin"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span>2025</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            Conçu par <span class="text-primary">TECH<span class="text-warning">TEAM</span></span>
        </div>
    </div>
    ' ?>
</footer>
<!-- End Footer -->

<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
    class="bi bi-arrow-up-short"></i></a>

<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="model/dist/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="model/dist/vendor/aos/aos.js"></script>
<script src="model/dist/vendor/glightbox/js/glightbox.min.js"></script>
<script src="model/dist/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="model/dist/vendor/swiper/swiper-bundle.min.js"></script>

<script src="model/dist/js/main.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const articlesContainer = document.getElementById('articlesContainer');
    const favoritesContainer = document.getElementById('favorites-container');
    const favoritesSection = document.getElementById('favorites-section');
    const popup = document.getElementById('enhancedPopup');
    const lang = '<?php echo $_SESSION['language'] ?? 'en'; ?>';

    const popupElements = {
        image: document.getElementById('popupImage'),
        category: document.getElementById('popupCategory'),
        date: document.getElementById('popupDate'),
        readTime: document.getElementById('popupReadTime'),
        title: document.getElementById('popupTitle'),
        likes: document.getElementById('popupLikes'),
        commentCount: document.getElementById('popupCommentCount'),
        description: document.getElementById('popupDescription'),
        tags: document.getElementById('popupTags'),
        likeBtn: document.getElementById('popupLike'),
        bookmarkBtn: document.getElementById('popupBookmark'),
        commentBtn: document.getElementById('popupCommentBtn'),
        commentModal: document.getElementById('commentModal'),
        commentModalClose: document.getElementById('commentModalClose'),
        commentForm: document.getElementById('commentForm'),
        commentsList: document.getElementById('commentsList'),
        commentArticleId: document.getElementById('commentArticleId')
    };

    let readTimeInterval;
    let secondsElapsed = 0;

    function htmlspecialchars(str) {
        if (typeof str !== 'string') return '';
        const map = { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#039;' };
        return str.replace(/[&<>"']/g, m => map[m]);
    }

    function renderArticle(article) {
        const title = lang === 'en' ? article.titleEnglish : article.titleFrench;
        const description = lang === 'en' ? article.descEnglish : article.descFrench;
        const strippedDescription = description.replace(/<[^>]+>/g, '');
        const truncatedDescription = strippedDescription.length > 120 ? strippedDescription.substring(0, 120) + '...' : strippedDescription;
        const readTime = Math.ceil(strippedDescription.length / 200) || 3;
        const viewCount = parseInt(article.views || 0).toLocaleString();
        const publishDate = new Date(article.created_at).toLocaleDateString(lang === 'en' ? 'en-US' : 'fr-FR', { year: 'numeric', month: 'short', day: 'numeric' });
        const tags = article.tags ? article.tags.split(',').slice(0, 2).map(tag => `#${tag.trim()}`).join(' ') : '';
        const likeCount = parseInt(article.likes || 0);
        const commentCount = parseInt(article.comment_count || 0);
        const isLiked = localStorage.getItem(`liked_${article.id}`) === 'true';
        const isBookmarked = localStorage.getItem(`bookmarked_${article.id}`) === 'true';

        return `
            <article class="article-card" data-id="article-${article.id}" data-article='${JSON.stringify(article)}'>
                <div class="article-image">
                    <img src="model/assets/images/activities/${article.image || 'default.jpg'}" alt="${htmlspecialchars(title)}" loading="lazy">
                    <div class="article-overlay">
                        <div class="article-category">${htmlspecialchars(article.category || 'General')}</div>
                        <div class="article-actions">
                            <button class="action-btn bookmark-btn ${isBookmarked ? 'active' : ''}" title="${lang === 'en' ? 'Bookmark' : 'Marquer'}">
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
                            <button class="read-more-btn">
                                ${lang === 'en' ? 'Read More' : 'Lire Plus'} <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                    <div class="engagement-bar">
                        <button class="engagement-btn like-btn ${isLiked ? 'active' : ''}" data-count="${likeCount}">
                            <i class="far fa-heart"></i> <span class="count">${likeCount}</span>
                        </button>
                        <button class="engagement-btn comment-btn" data-count="${commentCount}">
                            <i class="far fa-comment"></i> <span class="count">${commentCount}</span>
                        </button>
                    </div>
                </div>
            </article>
        `;
    }

    function openPopup(article) {
        const title = lang === 'en' ? article.titleEnglish : article.titleFrench;
        const description = lang === 'en' ? article.descEnglish : article.descFrench;
        const strippedDescription = description.replace(/<[^>]+>/g, '');
        let readTime = Math.ceil(strippedDescription.length / 200) || 3;
        const publishDate = new Date(article.created_at).toLocaleDateString(lang === 'en' ? 'en-US' : 'fr-FR', { year: 'numeric', month: 'short', day: 'numeric' });
        const tagsHTML = article.tags ? article.tags.split(',').map(tag => `<span class="tag-item">#${tag.trim()}</span>`).join('') : '';
        const isLiked = localStorage.getItem(`liked_${article.id}`) === 'true';
        const isBookmarked = localStorage.getItem(`bookmarked_${article.id}`) === 'true';

        popupElements.image.src = `model/assets/images/activities/${article.image || 'default.jpg'}`;
        popupElements.image.alt = htmlspecialchars(title);
        popupElements.category.textContent = article.category || 'General';
        popupElements.date.textContent = publishDate;
        popupElements.readTime.textContent = `${readTime} ${lang === 'en' ? 'min read' : 'min de lecture'}`;
        popupElements.title.textContent = title;
        popupElements.likes.textContent = parseInt(article.likes || 0);
        popupElements.commentCount.textContent = parseInt(article.comment_count || 0);
        popupElements.description.innerHTML = description;
        popupElements.tags.innerHTML = tagsHTML;
        popupElements.likeBtn.classList.toggle('active', isLiked);
        popupElements.bookmarkBtn.classList.toggle('active', isBookmarked);
        popupElements.commentArticleId.value = article.id;

        popup.classList.add('active');
        document.body.style.overflow = 'hidden';

        secondsElapsed = 0;
        readTimeInterval = setInterval(() => {
            secondsElapsed++;
            const minutes = Math.floor(secondsElapsed / 60);
            const remainingSeconds = secondsElapsed % 60;
            const timeString = `${minutes}m ${remainingSeconds}s`;
            popupElements.readTime.textContent = timeString;
        }, 1000);
    }

    function closePopup() {
        popup.classList.remove('active');
        document.body.style.overflow = 'auto';
        clearInterval(readTimeInterval);

        const articleId = popupElements.commentArticleId.value;

        if (secondsElapsed > 0) {
            fetch('control/save-read-time.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: `article_id=${articleId}&read_time=${secondsElapsed}`
            });
        }
    }

    function handleLike(articleId, likeButton) {
        // Ensure articleId is a number
        const numericArticleId = articleId.replace('article-', '');

        const likeCountSpan = likeButton.querySelector('.count');
        const currentLikes = parseInt(likeCountSpan.textContent);
        // Determine the *initial* state before the click
        const wasLiked = likeButton.classList.contains('active');
        const action = wasLiked ? 'unlike' : 'like';

        console.log(`[Like] Article ID: ${numericArticleId}, Action: ${action}, Was Liked: ${wasLiked}, Current Likes (UI): ${currentLikes}`);

        // Optimistic UI Update
        likeButton.classList.toggle('active', !wasLiked); // Toggle to the new state
        likeCountSpan.textContent = wasLiked ? currentLikes - 1 : currentLikes + 1;
        console.log(`[Like] Optimistic UI update: New likes (UI): ${likeCountSpan.textContent}`);

        fetch(`control/like.php`, { // Use relative path
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `article_id=${numericArticleId}&action=${action}`
        })
        .then(response => {
            console.log(`[Like] Server response status: ${response.status}`);
            if (!response.ok) {
                // If server response is not OK, throw error to trigger catch block
                return response.json().then(err => { throw new Error(`Server error: ${err.message || response.statusText}`); });
            }
            return response.json();
        })
        .then(data => {
            console.log('[Like] Server response data:', data);
            if (data.status === `${action}d`) { // Check for expected status (e.g., 'liked', 'unliked')
                // Success: Update localStorage to reflect the *new* state
                if (action === 'like') {
                    localStorage.setItem(`liked_${numericArticleId}`, 'true');
                    console.log(`[Like] Successfully liked. localStorage updated: liked_${numericArticleId}=true`);
                } else {
                    localStorage.removeItem(`liked_${numericArticleId}`);
                    console.log(`[Like] Successfully unliked. localStorage updated: liked_${numericArticleId} removed`);
                }
            } else {
                // Server returned OK but unexpected status, revert UI
                console.error(`[Like] Server returned unexpected status: ${data.status}. Reverting UI.`);
                throw new Error(`Unexpected server response: ${data.message || data.status}`);
            }
        })
        .catch(error => {
            console.error('[Like] Error during like operation:', error);
            // Revert UI to original state
            likeButton.classList.toggle('active', wasLiked); // Revert to original state
            likeCountSpan.textContent = currentLikes; // Revert count
            // Revert localStorage to original state
            if (wasLiked) {
                localStorage.setItem(`liked_${numericArticleId}`, 'true');
            } else {
                localStorage.removeItem(`liked_${numericArticleId}`);
            }
            alert('Failed to update like status. Please try again. Check console for details.');
        });
    }

    function handleBookmark(articleId, bookmarkButton) {
        // Ensure articleId is a number
        const numericArticleId = articleId.replace('article-', '');

        const isBookmarked = bookmarkButton.classList.contains('active');
        bookmarkButton.classList.toggle('active');

        if (isBookmarked) {
            localStorage.removeItem(`bookmarked_${numericArticleId}`);
            console.log(`Removed bookmarked_${numericArticleId} from localStorage`);
        } else {
            localStorage.setItem(`bookmarked_${numericArticleId}`, 'true');
            console.log(`Set bookmarked_${numericArticleId} to true in localStorage`);
        }
        if (favoritesSection) {
            loadFavorites();
        }
    }

    function loadFavorites() {
        const favoriteIds = Object.keys(localStorage)
            .filter(key => key.startsWith('bookmarked_') && localStorage.getItem(key) === 'true')
            .map(key => key.replace('bookmarked_', ''));

        console.log('Loading favorites. IDs:', favoriteIds);

        if (favoriteIds.length > 0) {
            favoritesSection.style.display = 'block';
            fetch(`control/get-articles-by-ids.php?ids=${JSON.stringify(favoriteIds)}`)
                .then(response => {
                    console.log('Fetch favorites response status:', response.status);
                    if (!response.ok) {
                        throw new Error('Server error fetching favorites');
                    }
                    return response.json();
                })
                .then(articles => {
                    console.log('Fetched favorite articles:', articles);
                    favoritesContainer.innerHTML = articles.map(renderArticle).join('');
                })
                .catch(error => {
                    console.error('Error loading favorites:', error);
                    favoritesSection.style.display = 'none'; // Hide section on error
                });
        } else {
            favoritesSection.style.display = 'none';
            console.log('No bookmarked articles found.');
        }
    }

    document.addEventListener('click', function(e) {
        const readMoreBtn = e.target.closest('.read-more-btn');
        if (readMoreBtn) {
            const articleCard = readMoreBtn.closest('.article-card');
            const article = JSON.parse(articleCard.dataset.article);
            openPopup(article);
            return; // Prevent further propagation
        }

        const likeBtn = e.target.closest('.engagement-btn.like-btn');
        if (likeBtn) {
            const articleCard = likeBtn.closest('.article-card');
            handleLike(articleCard.dataset.id, likeBtn);
            return; // Prevent further propagation
        }

        const bookmarkBtn = e.target.closest('.action-btn.bookmark-btn');
        if (bookmarkBtn) {
            const articleCard = bookmarkBtn.closest('.article-card');
            handleBookmark(articleCard.dataset.id, bookmarkBtn);
            return; // Prevent further propagation
        }

        if (e.target.closest('#popupLike')) {
            handleLike(popupElements.commentArticleId.value, popupElements.likeBtn);
            return; // Prevent further propagation
        }

        if (e.target.closest('#popupBookmark')) {
            handleBookmark(popupElements.commentArticleId.value, popupElements.bookmarkBtn);
            return; // Prevent further propagation
        }

        if (e.target.closest('.popup-close-btn') || e.target.classList.contains('popup-backdrop')) {
            closePopup();
            return; // Prevent further propagation
        }

        const commentBtn = e.target.closest('.engagement-btn.comment-btn');
        if (commentBtn) {
            const articleCard = commentBtn.closest('.article-card');
            openCommentModal(articleCard.dataset.id);
            return; // Prevent further propagation
        }

        if (e.target.closest('#popupCommentBtn')) {
            openCommentModal(popupElements.commentArticleId.value);
            return; // Prevent further propagation
        }

        if (e.target.closest('#commentModalClose') || e.target.classList.contains('popup-backdrop')) {
            closeCommentModal();
            return; // Prevent further propagation
        }
    });

    function openCommentModal(articleId) {
        // Ensure articleId is a number
        const numericArticleId = articleId.replace('article-', '');

        if (popupElements.commentModal) {
            popupElements.commentModal.classList.add('active');
            popupElements.commentArticleId.value = numericArticleId;
            console.log(`Loading comments for article ${numericArticleId}`);
            loadComments(numericArticleId);
        }
    }

    function closeCommentModal() {
        if (popupElements.commentModal) {
            popupElements.commentModal.classList.remove('active');
            console.log('Comment modal closed.');
        }
    }

    async function loadComments(articleId) {
        try {
            const response = await fetch(`control/get-comments.php?article_id=${articleId}`, {
                headers: { 'Accept': 'application/json' }
            });
            console.log('Comments fetch response status:', response.status);
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            const comments = await response.json();
            console.log('Fetched comments:', comments);
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
            console.log('Submitting comment form.');
            try {
                const response = await fetch('control/add-comment.php', {
                    method: 'POST',
                    body: formData
                });
                console.log('Add comment response status:', response.status);
                const result = await response.json();
                console.log('Add comment response data:', result);
                if (result.success) {
                    this.reset();
                    console.log('Comment submitted successfully. Reloading comments.');
                    loadComments(formData.get('article_id'));
                } else {
                    alert('Error: ' + result.message);
                    console.error('Comment submission failed:', result.message);
                }
            } catch (error) {
                console.error('Failed to submit comment:', error);
                alert('An error occurred while submitting your comment.');
            }
        });
    }

    if (favoritesSection) {
        loadFavorites();
    }
});
</script>

</body>

</html>
