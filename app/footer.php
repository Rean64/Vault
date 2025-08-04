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
                        <button type="submit" style="padding: 8px 12px; border-radius: 0 4px 4px 0; background: #297559; color: white; border: none;">
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
            &copy; Copyright <strong><span>2025</span></strong>. Tous droits réservés
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

<script>
function openPopUp(data, lang) {
// Assuming 'data' is the object passed from PHP
const popup = document.getElementById('popup');

// Setting image source
const img = popup.querySelector('.popup-img');
img.src = `assets/images/activities/${data.image}`;
img.alt = data.titleEnglish; // Or titleFrench, depending on the session language

// Setting title
const title = popup.querySelector('.popup-right .right-content h1');
title.textContent = lang == 'en' ? data.titleEnglish : data.titleFrench; // Or titleFrench

// Setting description
const desc = popup.querySelector('.popup-right .right-content p');
desc.textContent = lang == 'en' ? data.descEnglish : data.descFrench; // Or descFrench

// Show the popup
popup.classList.remove("hide-popup");
popup.classList.add("show-popup");
}


window.addEventListener("load", () => {
const sentMsg = document.getElementById('sentMsg');
const errorMsg = document.getElementById('errorMsg');

if (sentMsg) {
    let sent = sentMsg.getAttribute('style');
    setTimeout(() => {
        sentMsg.style.display = 'none';
    }, 5000);
}

if (errorMsg) {
    setTimeout(() => {
        errorMsg.style.display = 'none';
    }, 5000);
}
});

// Popup
// const popup = document.querySelector(".popup");
// const action = document.querySelector(".action");
// const closePopup = document.querySelector(".popup-close");

// if (popup) {
//   closePopup.addEventListener("click", () => {
//     popup.classList.add("hide-popup");
//   });

//   action.addEventListener("click", () => {
//     popup.classList.remove("hide-popup");
//   });
// }
</script>

<script>
    

    document.addEventListener('DOMContentLoaded', function() {
      console.log('JavaScript loaded and DOM content loaded.');
      const rotatingTextElement = document.getElementById('rotating-text');
      console.log('rotatingTextElement:', rotatingTextElement);

      const messages = [
        {
          en: 'Unlock the <span>Power</span> of Curated Research',
          fr: 'Libérez la <span>puissance</span> de la recherche organisée'
        },
        {
          en: 'Explore Diverse <span>Topics</span> with Expert Insights',
          fr: 'Explorez des <span>sujets</span> variés avec des analyses d\'experts'
        },
        {
          en: 'Stay Informed, <span>Stay Ahead</span>, Stay Connected',
          fr: 'Restez informé, <span>gardez une longueur d\'avance</span>'
        }
      ];
      let currentMessageIndex = 0;

      function updateMessage() {
        const lang = "<?php echo $_SESSION['language']; ?>"; // Get current language from PHP session
        if (rotatingTextElement && messages[currentMessageIndex] && messages[currentMessageIndex][lang]) {
          rotatingTextElement.innerHTML = messages[currentMessageIndex][lang];
        } else {
          console.error('Error updating message. Element or message not found.', {rotatingTextElement, currentMessageIndex, lang, messages});
        }
        currentMessageIndex = (currentMessageIndex + 1) % messages.length;
      }

      if (rotatingTextElement) { // Only run if the element exists
        // Initial message display
        updateMessage();

        // Change message every 5 seconds
        setInterval(updateMessage, 5000);
      }
    });
  </script>
  <script>
// Consolidated and robust script for all article interactions.
document.addEventListener('DOMContentLoaded', function() {

    const articlesContainer = document.getElementById('articlesContainer');
    const controlsContainer = document.querySelector('.article-controls');

    // If the main containers don't exist, don't run any of the scripts.
    if (!articlesContainer || !controlsContainer) {
        return;
    }

    // 1. Initialize Advanced Search Bar
    // Check if search bar already exists to prevent duplicates
    if (!controlsContainer.querySelector('.search-input')) {
        const searchInput = document.createElement('input');
        searchInput.type = 'text';
        searchInput.placeholder = "<?php echo $_SESSION['language'] == 'en' ? 'Search articles...' : 'Rechercher des articles...'; ?>";
        searchInput.className = 'search-input';
        searchInput.style.cssText = `
            width: 300px;
            padding: 12px 20px;
            border: 2px solid #e9ecef;
            border-radius: 25px;
            font-size: 1rem;
            transition: all 0.3s ease;
            margin-left: auto;
        `;

        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const articles = document.querySelectorAll('.article-card');
            articles.forEach(article => {
                const title = article.querySelector('.article-title').textContent.toLowerCase();
                const excerpt = article.querySelector('.article-excerpt').textContent.toLowerCase();
                const isVisible = title.includes(searchTerm) || excerpt.includes(searchTerm);
                article.style.display = isVisible ? 'block' : 'none';
            });
        });
        controlsContainer.appendChild(searchInput);
    }

    // 2. Initialize Filter Buttons
    const filterButtons = document.querySelectorAll('.filter-btn');
    const articles = document.querySelectorAll('.article-card');
    filterButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            filterButtons.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            const filter = this.dataset.filter;
            articles.forEach(article => {
                const isVisible = (filter === 'all' || article.dataset.category === filter);
                article.style.display = isVisible ? 'block' : 'none';
            });
        });
    });

    // 3. Initialize View Toggle Buttons
    const viewButtons = document.querySelectorAll('.view-btn');
    viewButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            viewButtons.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            articlesContainer.classList.toggle('list-view', this.dataset.view === 'list');
        });
    });

});
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize progress bars animation
    function initProgressBars() {
        const progressBars = document.querySelectorAll('.progress-fill');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const progressBar = entry.target;
                    const progress = progressBar.dataset.progress;
                    progressBar.style.setProperty('--progress-width', progress + '%');
                    progressBar.style.width = progress + '%';
                }
            });
        }, { threshold: 0.5 });
        
        progressBars.forEach(bar => observer.observe(bar));
    }
    
    // Feature card interactions
    function initFeatureCards() {
        const featureCards = document.querySelectorAll('.feature-card');
        
        featureCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-15px) scale(1.02)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(-10px) scale(1)';
            });
        });
    }
    
    
    
    // Feature action buttons
    function initFeatureActions() {
        const featureActionBtns = document.querySelectorAll('.feature-action-btn');
        
        featureActionBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const featureCard = this.closest('.feature-card');
                const feature = featureCard.dataset.feature;
                const title = featureCard.querySelector('.feature-title').textContent;
                const description = featureCard.querySelector('.feature-description').textContent;
                
                showFeatureModal(title, description, feature);
            });
        });
    }
    
    // Modal functions
    function showModal(title, content) {
        const modal = createModal(title, content);
        document.body.appendChild(modal);
        setTimeout(() => modal.classList.add('active'), 10);
    }
    
    function showFeatureModal(title, description, feature) {
        const additionalContent = getFeatureDetails(feature);
        const modal = createModal(title, description + additionalContent);
        document.body.appendChild(modal);
        setTimeout(() => modal.classList.add('active'), 10);
    }
    
    function createModal(title, content) {
        const modal = document.createElement('div');
        modal.className = 'custom-modal';
        modal.innerHTML = `
            <div class="modal-backdrop"></div>
            <div class="modal-container">
                <div class="modal-header">
                    <h3>${title}</h3>
                    <button class="modal-close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <p>${content}</p>
                </div>
                <div class="modal-footer">
                    <button class="modal-btn primary">
                        <?php echo $_SESSION['language'] == 'en' ? 'Get Started' : 'Commencer'; ?>
                    </button>
                    <button class="modal-btn secondary">
                        <?php echo $_SESSION['language'] == 'en' ? 'Contact Us' : 'Nous Contacter'; ?>
                    </button>
                </div>
            </div>
        `;
        
        // Modal styles
        modal.style.cssText = `
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 10000;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        `;
        
        const backdrop = modal.querySelector('.modal-backdrop');
        backdrop.style.cssText = `
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.8);
            backdrop-filter: blur(5px);
        `;
        
        const container = modal.querySelector('.modal-container');
        container.style.cssText = `
            position: relative;
            background: white;
            border-radius: 20px;
            max-width: 500px;
            width: 90%;
            box-shadow: 0 20px 80px rgba(0,0,0,0.3);
            transform: scale(0.9);
            transition: transform 0.3s ease;
        `;
        
        const header = modal.querySelector('.modal-header');
        header.style.cssText = `
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 25px 30px 15px;
            border-bottom: 1px solid #e9ecef;
        `;
        
        const body = modal.querySelector('.modal-body');
        body.style.cssText = `
            padding: 25px 30px;
            line-height: 1.6;
            color: #6c757d;
        `;
        
        const footer = modal.querySelector('.modal-footer');
        footer.style.cssText = `
            padding: 15px 30px 25px;
            display: flex;
            gap: 15px;
            justify-content: flex-end;
        `;
        
        // Close functionality
        const closeBtn = modal.querySelector('.modal-close');
        const closeModal = () => {
            modal.style.opacity = '0';
            container.style.transform = 'scale(0.9)';
            setTimeout(() => document.body.removeChild(modal), 300);
        };
        
        closeBtn.addEventListener('click', closeModal);
        backdrop.addEventListener('click', closeModal);
        
        // Active state
        modal.classList.add = function(className) {
            if (className === 'active') {
                this.style.opacity = '1';
                container.style.transform = 'scale(1)';
            }
        };
        
        return modal;
    }
    
    function getFeatureDetails(feature) {
        const details = {
            time: `
                <br><br><strong><?php echo $_SESSION['language'] == 'en' ? 'Time Management Benefits:' : 'Avantages de la Gestion du Temps:'; ?></strong>
                <ul style="margin-top: 10px; padding-left: 20px;">
                    <li><?php echo $_SESSION['language'] == 'en' ? 'Flexible class schedules' : 'Horaires de cours flexibles'; ?></li>
                    <li><?php echo $_SESSION['language'] == 'en' ? 'Self-paced learning options' : 'Options d\'apprentissage à votre rythme'; ?></li>
                    <li><?php echo $_SESSION['language'] == 'en' ? 'Online and offline classes' : 'Cours en ligne et hors ligne'; ?></li>
                </ul>
            `,
            production: `
                <br><br><strong><?php echo $_SESSION['language'] == 'en' ? 'Production Skills Enhancement:' : 'Amélioration des Compétences de Production:'; ?></strong>
                <ul style="margin-top: 10px; padding-left: 20px;">
                    <li><?php echo $_SESSION['language'] == 'en' ? 'Speaking confidence building' : 'Renforcement de la confiance en expression orale'; ?></li>
                    <li><?php echo $_SESSION['language'] == 'en' ? 'Writing skills development' : 'Développement des compétences rédactionnelles'; ?></li>
                    <li><?php echo $_SESSION['language'] == 'en' ? 'Creative expression exercises' : 'Exercices d\'expression créative'; ?></li>
                </ul>
            `,
            management: `
                <br><br><strong><?php echo $_SESSION['language'] == 'en' ? 'Professional Management:' : 'Gestion Professionnelle:'; ?></strong>
                <ul style="margin-top: 10px; padding-left: 20px;">
                    <li><?php echo $_SESSION['language'] == 'en' ? 'Progress tracking system' : 'Système de suivi des progrès'; ?></li>
                    <li><?php echo $_SESSION['language'] == 'en' ? 'Regular performance assessments' : 'Évaluations régulières des performances'; ?></li>
                    <li><?php echo $_SESSION['language'] == 'en' ? 'Personalized learning paths' : 'Parcours d\'apprentissage personnalisés'; ?></li>
                </ul>
            `
        };
        
        return details[feature] || '';
    }
    
    function downloadBrochure() {
        // Simulate brochure download
        const link = document.createElement('a');
        link.href = '#'; // Replace with actual brochure URL
        link.download = 'language-center-brochure.pdf';
        
        // Show download notification
        showNotification('<?php echo $_SESSION['language'] == 'en' ? 'Brochure download started!' : 'Téléchargement de la brochure commencé!'; ?>');
    }
    
    function showNotification(message) {
        const notification = document.createElement('div');
        notification.textContent = message;
        notification.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            background: linear-gradient(135deg, #2ecc71, #27ae60);
            color: white;
            padding: 15px 25px;
            border-radius: 25px;
            z-index: 10001;
            font-weight: 600;
            box-shadow: 0 5px 20px rgba(46, 204, 113, 0.3);
            transform: translateX(100%);
            transition: transform 0.3s ease;
        `;
        
        document.body.appendChild(notification);
        setTimeout(() => notification.style.transform = 'translateX(0)', 100);
        
        setTimeout(() => {
            notification.style.transform = 'translateX(100%)';
            setTimeout(() => document.body.removeChild(notification), 300);
        }, 3000);
    }
    
    // Smooth scroll for internal links
    function initSmoothScroll() {
        document.querySelectorAll('a[href^="#"]:not(.scroll-top)').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    }
    
    // Parallax effect for floating shapes
    function initParallax() {
        const shapes = document.querySelectorAll('.floating-shape');
        
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const rate = scrolled * -0.5;
            
            shapes.forEach((shape, index) => {
                const speed = (index + 1) * 0.3;
                shape.style.transform = `translateY(${rate * speed}px) rotate(${scrolled * 0.1}deg)`;
            });
        });
    }
    
    // Initialize all functions
    initProgressBars();
    initFeatureCards();
    initFeatureActions();
    initSmoothScroll();
    initParallax();
    
    // Add loading animation for elements
    const animatedElements = document.querySelectorAll('.feature-card, .testimonial-card, .interactive-card');
    
    const animationObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, { threshold: 0.1 });
    
    animatedElements.forEach(el => {
        animationObserver.observe(el);
    });
});
</script>

<!-- Vendor JS Files -->
<script src="model/dist/js/jquery.js"></script>
<script src="model/dist/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="model/dist/vendor/aos/aos.js"></script>
<script src="model/dist/vendor/glightbox/js/glightbox.min.js"></script>
<script src="model/dist/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="model/dist/vendor/swiper/swiper-bundle.min.js"></script>
<!-- <script src="assets/js/mapelmaps.js"></script> -->

<!-- Template Main JS File -->
<script src="model/dist/js/main.js"></script>

</html>