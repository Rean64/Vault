document.addEventListener('DOMContentLoaded', () => {
    const enhancedPopup = document.getElementById('enhancedPopup');
    const popupCloseBtn = enhancedPopup.querySelector('.popup-close-btn');
    const popupImage = enhancedPopup.querySelector('#popupImage');
    const popupCategory = enhancedPopup.querySelector('#popupCategory');
    const popupDate = enhancedPopup.querySelector('#popupDate');
    const popupReadTime = enhancedPopup.querySelector('#popupReadTime');
    const popupTitle = enhancedPopup.querySelector('#popupTitle');
    const popupDescription = enhancedPopup.querySelector('#popupDescription');
    const popupTags = enhancedPopup.querySelector('#popupTags');
    const openCommentsBtn = enhancedPopup.querySelector('#openCommentsBtn');
    const articlesContainer = document.getElementById('articlesContainer');
    let popupLike = document.querySelector('#popupLikes');

    let currentArticleId = null; // To store the ID of the currently displayed article

    enhancedPopup.addEventListener('click', async (articleData, lang) => {
        currentArticleId = articleData.id; // Store the article ID
        enhancedPopup.classList.add('active');

            if (articleData) {
                popupImage.src = `app/control/assets/images/activities/${articleData.image}`;
                popupCategory.textContent = articleData.category || 'General';
                popupDate.textContent = new Date(articleData.date).toLocaleDateString();
                // Calculate read time based on full content
                const fullText = lang === 'en' ? articleData.descEnglish : articleData.descFrench;
                popupReadTime.textContent = `${Math.ceil(fullText.length / 1000) * 2} min read`; 
                popupTitle.textContent = lang === 'en' ? articleData.titleEnglish : articleData.titleFrench;
                popupDescription.innerHTML = fullText;
                popupLike.textContent = articleData.likes;

                popupTags.innerHTML = '';
                if (articleData.tags) {
                    let tagsToProcess = articleData.tags;
                    if (typeof articleData.tags === 'string') {
                        tagsToProcess = articleData.tags.split(',').map(tag => tag.trim());
                    }
                    tagsToProcess.forEach(tag => {
                        const span = document.createElement('span');
                        span.className = 'tag';
                        span.textContent = `#${tag}`;
                        popupTags.appendChild(span);
                    });
                }
            } else {
                console.error('Failed to fetch full article details.');
            }
    });

    popupCloseBtn.addEventListener('click', () => {
        enhancedPopup.classList.remove('active');
    });

    enhancedPopup.addEventListener('click', (event) => {
        if (event.target === enhancedPopup) {
            enhancedPopup.classList.remove('active');
        }
    });

    openCommentsBtn.addEventListener('click', () => {
        if (currentArticleId) {
            enhancedPopup.classList.remove('active'); // Hide article popup
            window.openCommentModal(currentArticleId); // Open comment modal
        }
    });

    // Event delegation for "Read More" buttons
    if (articlesContainer) {
        articlesContainer.addEventListener('click', (event) => {
            const readMoreBtn = event.target.closest('.read-more-btn');
            if (readMoreBtn) {
                try {
                    // console.log('Raw data-article:', readMoreBtn.dataset.article);
                    const articleData = JSON.parse(readMoreBtn.dataset.article);
                    const lang = readMoreBtn.dataset.lang;
                    window.openEnhancedPopup(articleData, lang);
                } catch (e) {
                    console.error('Error parsing article data:', e);
                }
            }
        });
    }
});