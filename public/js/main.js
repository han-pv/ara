// Like button functionality
document.addEventListener("DOMContentLoaded", function () {
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
