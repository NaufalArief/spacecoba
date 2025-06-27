// Create animated stars
function createStars() {
    const starsContainer = document.querySelector('.stars');
    const numberOfStars = 50;

    for (let i = 0; i < numberOfStars; i++) {
        const star = document.createElement('div');
        star.className = 'star';
        star.style.left = Math.random() * 100 + '%';
        star.style.top = Math.random() * 100 + '%';
        star.style.animationDelay = Math.random() * 3 + 's';
        starsContainer.appendChild(star);
    }
}

// Navigation functionality
function setActiveNav(clickedItem) {
    document.querySelectorAll('.nav-link').forEach(link => {
        link.classList.remove('active');
    });
    clickedItem.classList.add('active');
}

// Modal functionality
function openModal(imageSrc) {
    const modal = document.getElementById('imageModal');
    const modalImage = document.getElementById('modalImage');
    modal.style.display = 'block';
    modalImage.src = imageSrc;
    document.body.style.overflow = 'hidden';
}

function closeModal() {
    const modal = document.getElementById('imageModal');
    modal.style.display = 'none';
    document.body.style.overflow = 'auto';
}

// Add hover effects and interactions
document.addEventListener('DOMContentLoaded', function() {
    createStars();

    // Add click handlers for navigation
    document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            setActiveNav(this);
        });
    });

    // Close modal when clicking outside
    document.getElementById('imageModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal();
        }
    });

    // Escape key to close modal
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeModal();
        }
    });

    // Add smooth scroll behavior
    document.documentElement.style.scrollBehavior = 'smooth';

    // Gallery item entrance animation
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    // Initially hide gallery items for animation
    document.querySelectorAll('.gallery-item').forEach((item, index) => {
        item.style.opacity = '0';
        item.style.transform = 'translateY(30px)';
        item.style.transition = `opacity 0.6s ease ${index * 0.1}s, transform 0.6s ease ${index * 0.1}s`;
        observer.observe(item);
    });
});

// Add parallax effect to header
window.addEventListener('scroll', function() {
    const scrolled = window.pageYOffset;
    const header = document.querySelector('.header');
    if (header) {
        header.style.transform = `translateY(${scrolled * 0.1}px)`;
    }
});

// Add dynamic background color change based on scroll
window.addEventListener('scroll', function() {
    const scrollPercentage = (window.scrollY / (document.body.scrollHeight - window.innerHeight)) * 100;
    const hue = 230 + (scrollPercentage * 0.5); // Changes from blue to purple
    document.body.style.background = `linear-gradient(135deg, hsl(${hue}, 70%, 15%) 0%, hsl(${hue + 20}, 60%, 20%) 50%, hsl(${hue + 10}, 65%, 25%) 100%)`;
});