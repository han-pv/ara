// Function to attach like button event listeners
function attachLikeButtonListeners() {
    document.querySelectorAll('.like-btn').forEach(function (btn) {
        const newBtn = btn.cloneNode(true);
        btn.parentNode.replaceChild(newBtn, btn);

        newBtn.addEventListener('click', function (e) {
            e.preventDefault();
            const postId = this.getAttribute('data-post-id');
            const likeCountSpan = document.getElementById('like-count-' + postId);
            const btnEl = this;
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch('/like/' + postId, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                },
            })
                .then(response => response.json())
                .then(data => {
                    if (data.liked !== undefined) {
                        let current = parseInt(likeCountSpan.textContent);
                        if (data.liked) {
                            likeCountSpan.textContent = current + 1;
                            btnEl.classList.add('liked');
                            btnEl.setAttribute('data-liked', '1');
                            btnEl.querySelector('i').className = 'bi bi-heart-fill';
                        } else {
                            likeCountSpan.textContent = Math.max(current - 1, 0);
                            btnEl.classList.remove('liked');
                            btnEl.setAttribute('data-liked', '0');
                            btnEl.querySelector('i').className = 'bi bi-heart';
                        }
                    } else {
                        $.toast({
                            title: 'Error',
                            message: data.message,
                            type: 'error',
                            duration: 3000
                        });
                    }
                })
                .catch(error => {
                    $.toast({
                        title: 'Error',
                        message: 'Unknown error',
                        type: 'error',
                        duration: 3000
                    });
                });
        });
    });
}

// Like button
document.addEventListener("DOMContentLoaded", function () {
    attachLikeButtonListeners();

    document.querySelectorAll('.interaction-btn').forEach(btn => {
        if (btn.querySelector('.bi-heart')) {
            btn.addEventListener('click', function () {
                const icon = this.querySelector('i');
                if (icon.classList.contains('bi-heart')) {
                    icon.classList.remove('bi-heart');
                    icon.classList.add('bi-heart-fill');
                    this.classList.add('liked');
                } else {
                    icon.classList.remove('bi-heart-fill');
                    icon.classList.add('bi-heart');
                    this.classList.remove('liked');
                }
            });
        }
    });

    // Expand post content
    document.querySelectorAll('.post-content:not(.short-content)').forEach(content => {
        content.addEventListener('click', function (e) {
            if (e.target.classList.contains('read-more') || e.target.classList.contains('content-text')) {
                this.classList.toggle('expanded');
            }
        });
    });
})
