document.addEventListener('DOMContentLoaded', () => {
    const commentModal = document.getElementById('commentModal');
    const commentModalCloseBtn = document.getElementById('commentModalClose');
    const commentForm = document.getElementById('commentForm');
    const commentArticleId = document.getElementById('commentArticleId');
    const commentParentId = document.getElementById('commentParentId');
    const commentAuthor = document.getElementById('commentAuthor');
    const commentText = document.getElementById('commentText');
    const commentsList = document.getElementById('commentsList');

    let currentArticleId = null;

    window.openCommentModal = async (articleId) => {
        currentArticleId = articleId;
        commentArticleId.value = articleId;
        commentParentId.value = 0; // Reset for new top-level comments
        commentAuthor.value = '';
        commentText.value = '';
        commentsList.innerHTML = ''; // Clear previous comments
        commentModal.classList.add('active');
        await fetchComments(articleId);
    };

    commentModalCloseBtn.addEventListener('click', () => {
        commentModal.classList.remove('active');
    });

    commentModal.addEventListener('click', (event) => {
        if (event.target === commentModal) {
            commentModal.classList.remove('active');
        }
    });

    commentForm.addEventListener('submit', async (e) => {
        e.preventDefault();

        const formData = new FormData(commentForm);
        const response = await fetch('/addComment', {
            method: 'POST',
            body: formData
        });

        const result = await response.json();
        if (result.success) {
            alert('Comment added successfully!');
            commentText.value = '';
            commentParentId.value = 0; // Reset parent ID after submission
            await fetchComments(currentArticleId); // Refresh comments
        } else {
            alert('Failed to add comment: ' + result.message);
        }
    });

    async function fetchComments(articleId) {
        const response = await fetch(`/getComments?article_id=${articleId}`);
        const comments = await response.json();
        commentsList.innerHTML = '';
        comments.forEach(comment => {
            const commentItem = document.createElement('div');
            commentItem.className = 'comment-item';
            commentItem.innerHTML = `
                <div class="comment-author">${comment.author} <span class="comment-date">${new Date(comment.created_at).toLocaleString()}</span></div>
                <p class="comment-text">${comment.comment}</p>
                <button class="reply-btn" data-comment-id="${comment.id}">Reply</button>
                <div class="replies-list" id="replies-to-${comment.id}"></div>
            `;
            commentsList.appendChild(commentItem);

            // Add event listener for reply button
            commentItem.querySelector('.reply-btn').addEventListener('click', (e) => {
                commentParentId.value = e.target.dataset.commentId;
                commentAuthor.focus();
            });

            // Fetch and display replies
            if (comment.replies && comment.replies.length > 0) {
                const repliesList = commentItem.querySelector(`#replies-to-${comment.id}`);
                comment.replies.forEach(reply => {
                    const replyItem = document.createElement('div');
                    replyItem.className = 'comment-item'; // Use same style for replies
                    replyItem.innerHTML = `
                        <div class="comment-author">${reply.author} <span class="comment-date">${new Date(reply.created_at).toLocaleString()}</span></div>
                        <p class="comment-text">${reply.comment}</p>
                    `;
                    repliesList.appendChild(replyItem);
                });
            }
        });
    }
});
