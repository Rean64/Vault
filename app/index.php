<?php
// session_start();
ini_set('display_errors', 0);
error_reporting(0);

// Language : fr $ en
if (!isset($_SESSION['language'])) {
  $_SESSION['language'] = "fr";
}
if ($_GET) {
  // var_dump($_GET);
  // die();
  switch ($_GET['lang']) {
    case 'fr': 
      $_SESSION['language'] = 'fr';
      break;
    case 'en':
      $_SESSION['language'] = 'en';
      break;
    default:
      $_SESSION['language'] = 'fr';
  }
}
// Define the phone number in international format (without spaces or special characters)
$phoneNumber = '670844193'; // Example number

// URL Encode the message you want to send
$message = urlencode("Hello, I'm interested in your services.");

// Create the WhatsApp link
$whatsAppLink = "https://wa.me/{$phoneNumber}?text={$message}";


?>
<?php require_once "header.php";?>

  <!-- ======= Hero Section ======= -->
 <section id="hero" class="hero d-flex align-items-center section-bg">
    <div class="container p-0">
      <div class="row justify-content-between gy-5">
        <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-start align-items-lg-start text-start text-lg-start ms-1 mt-5 mt-sm-0 ms-sm-0">
          <h2 data-aos="fade-up" id="rotating-text">
            <?php
              if ($_SESSION['language'] == 'en') {
                echo 'Unlock the <span>Power</span> of Curated Research';
              } else {
                echo 'Libérez la <span>puissance</span> de la recherche organisée';
              }
            ?>
          </h2>
          <p data-aos="fade-up" data-aos-delay="100" style="font-weight: 300">
            <?php echo htmlspecialchars(
              $_SESSION['language'] == 'en'
                ? 'Discover curated knowledge on science, technology, culture, politics, environment, education, and more. MindVault delivers reliable research and thought-provoking perspectives to fuel your curiosity.'
                : 'Découvrez un savoir sélectionné sur la science, la technologie, la culture, la politique, l’environnement, l’éducation et bien plus encore. MindVault offre des recherches fiables et des perspectives stimulantes pour nourrir votre curiosité.'
            ); ?>
          </p>
          <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
            <a href="/articles" class="btn-book-a-table"><?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'Start Exploring' : 'Commencer à explorer'); ?></a>
            <a href="https://www.youtube.com/watch?v=RDkx4J__-QY" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span><?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'Watch Video' : 'Regarder la vidéo'); ?></span></a>
          </div>
        </div>
        <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
          <section id="gallery" class="gallery section-bg">
            <div class="container p-0" data-aos="fade">
              <div class="gallery-slider swiper">
                <div class="swiper-wrapper align-items-center">
                  <div class="swiper-slide">
                    <img src="model/assets/img/Online article-bro.png" class="img-fluid" alt="">
                  </div>
                  <div class="swiper-slide">
                    <img src="model/assets/img/Sharing articles-amico.png" class="img-fluid" alt="">
                  </div>
                  <div class="swiper-slide">
                    <img src="model/assets/img/Sharing articles-bro.png" class="img-fluid" alt="">
                  </div>
                  <div class="swiper-slide">
                    <img src="model/assets/img/Sharing articles-pana.png" class="img-fluid" alt="">
                  </div>
                </div>
                <div class="swiper-pagination"></div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
</section>
  <!-- End Hero Section -->


  <section class="why-choose-us" id="about">
    <div class="container">
        <!-- Section Header -->
        <div class="section-header text-center mb-0">
            <div class="breadcrumb-indicator">
                <span class="breadcrumb-item"><?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'Home' : 'Accueil'); ?></span>
                <i class="fas fa-chevron-right"></i>
                <span class="breadcrumb-item active"><?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'About Us' : 'À Propos'); ?></span>
            </div>
            
            <h1 class="main-title mb-2">
                <?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'Why Choose ' : 'Pourquoi choisir '); ?>
                <span class="highlight-text"><?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'Our Articles' : 'nos articles ?'); ?></span>
            </h1>
            
            <p class="section-subtitle">
                <?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'Discover what makes our platform the premier destination for in-depth, curated research articles.' : 'Découvrez ce qui fait de notre plateforme la destination incontournable pour des articles de recherche approfondis et organisés.'); ?>
            </p>
        </div>

        <!-- Main Content Area -->
        <div class="content-wrapper">
            <!-- Hero Content -->
            <div class="hero-section">
                <div class="hero-image">
                    <img src="model/assets/img/Sharing articles-rafiki.png" alt="Article Platform" class="main-image">
                    <div class="image-overlay">
                        <div class="overlay-stats">
                            <div class="stat-item">
                                <div class="stat-number">5000+</div>
                                <div class="stat-label"><?php echo $_SESSION['language'] == 'en' ? 'Articles' : 'Articles'; ?></div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number">98%</div>
                                <div class="stat-label"><?php echo $_SESSION['language'] == 'en' ? 'Reader Satisfaction' : 'Satisfaction des lecteurs'; ?></div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number" data-target="20" data-suffix="+">20</div>
                                <div class="stat-label"><?php echo $_SESSION['language'] == 'en' ? 'Topics Covered' : 'Sujets couverts'; ?></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="hero-content">
                    <div class="content-badge">
                        <i class="fas fa-star"></i>
                        <span><?php echo $_SESSION['language'] == 'en' ? 'Premium Research Content' : 'Contenu de recherche premium'; ?></span>
                    </div>
                    
                    <h2 class="hero-title">
                        <?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'Your Gateway to Expert-Curated Articles' : 'Votre portail vers des articles organisés par des experts'); ?>
                    </h2>
                    
                    <p class="hero-description">
                        <?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'Explore a vast collection of well-researched articles crafted by experts, designed to inform, inspire, and engage readers across diverse topics like science, technology, and society.' : 'Explorez une vaste collection d\'articles bien documentés, rédigés par des experts, conçus pour informer, inspirer et engager les lecteurs sur des sujets variés comme la science, la technologie et la société.'); ?>
                    </p>
                    
                    <!-- CTA Buttons -->
                    <div class="hero-actions">
                        <a href="#articles" class="cta-button primary">
                            <i class="fas fa-book-open"></i>
                            <?php echo $_SESSION['language'] == 'en' ? 'Explore Articles' : 'Explorer les articles'; ?>
                        </a>
                        <a href="#newsletter-cta" class="cta-button secondary">
                            <i class="fas fa-envelope"></i>
                            <?php echo $_SESSION['language'] == 'en' ? 'Subscribe to Newsletter' : 'S\'abonner à la newsletter'; ?>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Features Grid -->
            <div class="features-section">
                <h3 class="features-title">
                    <?php echo $_SESSION['language'] == 'en' ? 'What Sets Our Articles Apart' : 'Ce Qui Distingue Nos Articles'; ?>
                </h3>
                
                <div class="features-grid">
                    <!-- Curated Content Feature -->
                    <div class="feature-card" data-feature="content">
                        <div class="feature-icon">
                            <div class="icon-wrapper content-icon">
                                <i class="fas fa-book-open"></i>
                            </div>
                            <div class="feature-number">01</div>
                        </div>
                        
                        <div class="feature-content">
                            <h4 class="feature-title">
                                <?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'Curated Content' : 'Contenu Organisé'); ?>
                            </h4>
                            
                            <p class="feature-description">
                                <?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'Discover carefully selected articles across science, technology, society, and more, crafted to provide in-depth insights and spark curiosity.' : 'Découvrez des articles soigneusement sélectionnés dans les domaines de la science, de la technologie, de la société et plus encore, conçus pour offrir des perspectives approfondies et susciter la curiosité.'); ?>
                            </p>
                            
                            <div class="feature-highlights">
                                <div class="highlight-item">
                                    <i class="fas fa-check"></i>
                                    <span><?php echo $_SESSION['language'] == 'en' ? 'High-quality research' : 'Recherche de haute qualité'; ?></span>
                                </div>
                                <div class="highlight-item">
                                    <i class="fas fa-check"></i>
                                    <span><?php echo $_SESSION['language'] == 'en' ? 'Diverse topics' : 'Sujets variés'; ?></span>
                                </div>
                                <div class="highlight-item">
                                    <i class="fas fa-check"></i>
                                    <span><?php echo $_SESSION['language'] == 'en' ? 'Regular updates' : 'Mises à jour régulières'; ?></span>
                                </div>
                            </div>
                            
                            <button class="feature-action-btn">
                                <?php echo $_SESSION['language'] == 'en' ? 'Learn More' : 'En Savoir Plus'; ?>
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Expert Insights Feature -->
                    <div class="feature-card" data-feature="insights">
                        <div class="feature-icon">
                            <div class="icon-wrapper insights-icon">
                                <i class="fas fa-lightbulb"></i>
                            </div>
                            <div class="feature-number">02</div>
                        </div>
                        
                        <div class="feature-content">
                            <h4 class="feature-title">
                                <?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'Expert Insights' : 'Perspectives d\'Experts'); ?>
                            </h4>
                            
                            <p class="feature-description">
                                <?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'Gain knowledge from industry leaders and researchers who provide authoritative, well-researched perspectives on complex topics.' : 'Acquérez des connaissances auprès de leaders de l\'industrie et de chercheurs qui offrent des perspectives fiables et bien documentées sur des sujets complexes.'); ?>
                            </p>
                            
                            <div class="feature-highlights">
                                <div class="highlight-item">
                                    <i class="fas fa-check"></i>
                                    <span><?php echo $_SESSION['language'] == 'en' ? 'Authoritative sources' : 'Sources fiables'; ?></span>
                                </div>
                                <div class="highlight-item">
                                    <i class="fas fa-check"></i>
                                    <span><?php echo $_SESSION['language'] == 'en' ? 'In-depth analysis' : 'Analyse approfondie'; ?></span>
                                </div>
                                <div class="highlight-item">
                                    <i class="fas fa-check"></i>
                                    <span><?php echo $_SESSION['language'] == 'en' ? 'Expert contributions' : 'Contributions d\'experts'; ?></span>
                                </div>
                            </div>
                            
                            <button class="feature-action-btn">
                                <?php echo $_SESSION['language'] == 'en' ? 'Learn More' : 'En Savoir Plus'; ?>
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>

                    <!-- User Engagement Feature -->
                    <div class="feature-card" data-feature="engagement">
                        <div class="feature-icon">
                            <div class="icon-wrapper engagement-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="feature-number">03</div>
                        </div>
                        
                        <div class="feature-content">
                            <h4 class="feature-title">
                                <?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'User Engagement' : 'Engagement des Utilisateurs'); ?>
                            </h4>
                            
                            <p class="feature-description">
                                <?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'Interact with articles through likes, bookmarks, and sharing options, and join a community of curious readers to discuss and explore ideas.' : 'Interagissez avec les articles grâce aux options de like, de favoris et de partage, et rejoignez une communauté de lecteurs curieux pour discuter et explorer des idées.'); ?>
                            </p>
                            
                            <div class="feature-highlights">
                                <div class="highlight-item">
                                    <i class="fas fa-check"></i>
                                    <span><?php echo $_SESSION['language'] == 'en' ? 'Interactive features' : 'Fonctionnalités interactives'; ?></span>
                                </div>
                                <div class="highlight-item">
                                    <i class="fas fa-check"></i>
                                    <span><?php echo $_SESSION['language'] == 'en' ? 'Community discussions' : 'Discussions communautaires'; ?></span>
                                </div>
                                <div class="highlight-item">
                                    <i class="fas fa-check"></i>
                                    <span><?php echo $_SESSION['language'] == 'en' ? 'Social sharing' : 'Partage social'; ?></span>
                                </div>
                            </div>
                            
                            <button class="feature-action-btn">
                                <?php echo $_SESSION['language'] == 'en' ? 'Learn More' : 'En Savoir Plus'; ?>
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Research Accessibility Feature -->
                    <div class="feature-card" data-feature="accessibility">
                        <div class="feature-icon">
                            <div class="icon-wrapper accessibility-icon">
                                <i class="fas fa-universal-access"></i>
                            </div>
                            <div class="feature-number">04</div>
                        </div>
                        
                        <div class="feature-content">
                            <h4 class="feature-title">
                                <?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'Research Accessibility' : 'Accessibilité de la Recherche'); ?>
                            </h4>
                            
                            <p class="feature-description">
                                <?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'Access our extensive library of articles anytime, anywhere, with a user-friendly interface designed for seamless navigation and reading.' : 'Accédez à notre vaste bibliothèque d\'articles à tout moment, n\'importe où, avec une interface conviviale conçue pour une navigation et une lecture fluides.'); ?>
                            </p>
                            
                            <div class="feature-highlights">
                                <div class="highlight-item">
                                    <i class="fas fa-check"></i>
                                    <span><?php echo $_SESSION['language'] == 'en' ? 'Mobile-friendly design' : 'Design adapté aux mobiles'; ?></span>
                                </div>
                                <div class="highlight-item">
                                    <i class="fas fa-check"></i>
                                    <span><?php echo $_SESSION['language'] == 'en' ? 'Searchable archives' : 'Archives consultables'; ?></span>
                                </div>
                                <div class="highlight-item">
                                    <i class="fas fa-check"></i>
                                    <span><?php echo $_SESSION['language'] == 'en' ? 'Offline reading' : 'Lecture hors ligne'; ?></span>
                                </div>
                            </div>
                            
                            <button class="feature-action-btn">
                                <?php echo $_SESSION['language'] == 'en' ? 'Learn More' : 'En Savoir Plus'; ?>
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ======= Featured Article Section ======= -->
    <div class="section-header mt-5" id="articles">
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
    include_once 'control/config.php';
    $sql = "SELECT id, titleEnglish, titleFrench, descEnglish, descFrench, category, image, created_at, tags, status, views, likes, comment FROM Posts WHERE status = 'PUBLISHED' ORDER BY created_at DESC LIMIT 6";
    $result = mysqli_query($conn, $sql);
    $lang = $_SESSION['language'] ?? 'en';
    
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
            $commentCount = (int)($article['comment'] ?? 0);
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
                        <button class="engagement-btn comment-btn" data-count="<?php echo $commentCount; ?>">
                            <i class="far fa-comment"></i> <span class="count"><?php echo $commentCount; ?></span>
                        </button>
                    </div>
                </div>
            </article>
            <?php
        }
        mysqli_close($conn);
    } else {
        echo '<div class="no-articles">' . htmlspecialchars($lang === 'en' ? 'No articles found.' : 'Aucun article trouvé.') . '</div>';
    }
    ?>
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
        <a href="articles.php" class="view-all-btn">
            <span><?php echo $_SESSION['language'] == 'en' ? 'View All Articles' : 'Voir Tous les Articles'; ?></span>
            <i class="fas fa-arrow-right"></i>
        </a>
    </div>
</section>

<!-- ======= Author Spotlight Section ======= -->
<section id="author-spotlight" class="author-spotlight">
  <div class="container" data-aos="fade-up">

    <div class="section-header text-center">
      <h1 class="main-title">
        <?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'Meet Our ' : 'Rencontrez Nos '); ?>
        <span class="highlight"><?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'Experts' : 'Experts'); ?></span>
      </h1>
      <p class="section-subtitle">
        <?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'The brilliant minds behind our insightful articles.' : 'Les esprits brillants derrière nos articles perspicaces.'); ?>
      </p>
    </div>

    <div class="row gy-4">

      <div class="col-lg-4 col-md-6">
        <div class="author-card">
          <div class="author-image">
            <img src="model/assets/img/team/team-1.jpg" alt="Author 1">
          </div>
          <h4>Jane Doe</h4>
          <p class="author-role"><?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'Lead Science Editor' : 'Rédactrice scientifique en chef'); ?></p>
          <p class="author-bio">
            Jane holds a Ph.D. in Astrophysics and has a passion for making complex scientific topics accessible to everyone.
          </p>
          <div class="social-links">
            <a href="#"><i class="bi bi-twitter"></i></a>
            <a href="#"><i class="bi bi-linkedin"></i></a>
            <a href="#"><i class="bi bi-globe"></i></a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="author-card">
          <div class="author-image">
            <img src="model/assets/img/team/team-2.jpg" alt="Author 2">
          </div>
          <h4>John Smith</h4>
          <p class="author-role"><?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'Technology Analyst' : 'Analyste technologique'); ?></p>
          <p class="author-bio">
            With over a decade in the tech industry, John breaks down the latest trends in AI, software, and cybersecurity.
          </p>
          <div class="social-links">
            <a href="#"><i class="bi bi-twitter"></i></a>
            <a href="#"><i class="bi bi-linkedin"></i></a>
            <a href="#"><i class="bi bi-github"></i></a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="author-card">
          <div class="author-image">
            <img src="model/assets/img/team/team-3.jpg" alt="Author 3">
          </div>
          <h4>Emily White</h4>
          <p class="author-role"><?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'Cultural Correspondent' : 'Correspondante culturelle'); ?></p>
          <p class="author-bio">
            Emily travels the world to explore and write about the rich tapestry of human cultures, traditions, and societies.
          </p>
          <div class="social-links">
            <a href="#"><i class="bi bi-instagram"></i></a>
            <a href="#"><i class="bi bi-linkedin"></i></a>
            <a href="#"><i class="bi bi-globe"></i></a>
          </div>
        </div>
      </div>

    </div>

  </div>
</section>
<!-- End Author Spotlight Section -->

<!-- ======= Testimonials Section ======= -->
<section id="testimonials" class="testimonials section-bg">
  <div class="container" data-aos="fade-up">

    <div class="section-header text-center arragne">
      <h1 class="main-title mb-0">
        <?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'What Our Readers' : 'Ce que nos lecteurs'); ?>
        <span class="highlight"><?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'Are Saying' : 'disent'); ?></span>
      </h1>
      <p class="section-subtitle">
        <?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'Real feedback from our engaged community.' : 'Les retours authentiques de notre communauté engagée.'); ?>
      </p>
    </div>

    <div class="slides-3 swiper" data-aos="fade-up" data-aos-delay="100">
      <div class="swiper-wrapper">

        <div class="swiper-slide">
          <div class="testimonial-item">
            <div class="testimonial-content">
              <div class="stars">
                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
              </div>
              <p>
                MindVault has become my go-to source for reliable and in-depth articles. The quality of the research is consistently outstanding.
              </p>
              <div class="profile mt-auto">
                <img src="model/assets/img/testimonials/test.png" class="testimonial-img" alt="">
                <h3>Sarah Johnson</h3>
                <h4>University Professor</h4>
              </div>
            </div>
          </div>
        </div><!-- End testimonial item -->

        <div class="swiper-slide featured-testimonial">
          <div class="testimonial-item">
            <div class="testimonial-content">
              <div class="stars">
                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
              </div>
              <p>
                <?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'MindVault has transformed the way I approach research. The diverse range of topics and the depth of analysis are truly impressive. A must-have for any curious mind!' : 'MindVault a transformé ma façon d\'aborder la recherche. La diversité des sujets et la profondeur de l\'analyse sont vraiment impressionnantes. Un incontournable pour tout esprit curieux !'); ?>
              </p>
              <div class="profile mt-auto">
                <img src="model/assets/img/testimonials/test3.png" class="testimonial-img" alt="">
                <h3>David Lee</h3>
                <h4><?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'Researcher' : 'Chercheur'); ?></h4>
              </div>
            </div>
          </div>
        </div><!-- End testimonial item -->

        <div class="swiper-slide">
          <div class="testimonial-item">
            <div class="testimonial-content">
              <div class="stars">
                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i>
              </div>
              <p>
                <?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'As an educator, I highly recommend MindVault to my students. It\'s an invaluable resource for staying updated on current affairs and academic insights.' : 'En tant qu\'éducatrice, je recommande vivement MindVault à mes étudiants. C\'est une ressource inestimable pour rester informé sur l\'actualité et les connaissances académiques.'); ?>
              </p>
              <div class="profile mt-auto">
                <img src="model/assets/img/testimonials/test2.png" class="testimonial-img" alt="">
                <h3>Maria Garcia</h3>
                <h4><?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'Educator' : 'Éducatrice'); ?></h4>
              </div>
            </div>
          </div>
        </div><!-- End testimonial item -->

      </div>
      <div class="swiper-pagination"></div>
    </div>

  </div>
</section><!-- End Testimonials Section -->

  <!-- ======= Newsletter CTA Section ======= -->
<section id="newsletter-cta" class="newsletter-cta">
  <div class="container" data-aos="zoom-in">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <div class="newsletter-content">
          <img src="model/assets/img/Publish article-amico.png" class="img-fluid bounceInUp" alt="Newsletter Illustration">
        </div>
      </div>
      <div class="col-lg-6">
        <div class="newsletter-form-container">
          <h3><?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'Unlock Deeper Understanding of What Counts' : 'Débloquez une compréhension plus approfondie de ce qui compte'); ?></h3>
          <p>
            <?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'Join our community and get the best articles, research, and insights delivered straight to your inbox.' : 'Rejoignez notre communauté et recevez les meilleurs articles, recherches et informations directement dans votre boîte de réception.'); ?>
          </p>
          <form action="/subscribe" method="post" class="newsletter-form">
            <div class="input-group">
              <input type="email" name="email" class="form-control" placeholder="<?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'Enter your email address' : 'Entrez votre adresse e-mail'); ?>" required>
              <button type="submit" class="btn btn-primary"><?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'Subscribe' : 'S\'abonner'); ?></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section><!-- End Newsletter CTA Section -->

  <main id="main">

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-header1">
          <?php echo $_SESSION['language'] == 'en' ?
            " <h2>Contact</h2>
          <p>Need Help? <span>Contact Us</span></p>"
            :
            "
          <h2>Contact</h2>
          <p>Besoin d'aide? <span>Contactez nous</span></p>"
          ?>

        </div>

        <div class="mb-3">
          <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3978.2279207539023!2d11.55155!3d3.83042!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2scm!4v1711764890025!5m2!1sen!2scm" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div><!-- End Google Maps -->


        <div class="row gy-4">

          <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
              <i class="icon bg1 bi bi-map flex-shrink-0"></i>
              <div>
                <?php echo $_SESSION['language'] == 'en' ?
                  "  <h3>Our Address</h3>
                <p>Awae Escalier, Yaounde, Cameroon</p>"
                  :
                  "  <h3>Notre Address</h3>
                <p>Awae Escalier, Yaounde, Cameroun</p>"
                ?>

              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item d-flex align-items-center">
              <i class="icon bg1 bi bi-envelope flex-shrink-0"></i>
              <div>
                <h3><?php echo $_SESSION['language'] == 'en' ? 'Email Us' : "Notre email" ?></h3>
                <p>contact@instituteinstein.org</p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
              <i class="icon bg1 bi bi-telephone flex-shrink-0"></i>
              <div>
                <h3><?php echo $_SESSION['language'] == 'en' ? "Call Us" : "Appelez nous" ?></h3>
                <p>+237 690-88-09-45</p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
              <i class="icon bg1 bi bi-share flex-shrink-0"></i>
              <div>
                <?php
                echo $_SESSION['language'] == 'en' ?
                  "    <h3>Opening Hours</h3>
                  <div><strong>Mon-Sat:</strong> 11AM - 11PM;
                    <strong>Sunday:</strong> Closed
                  </div>"
                  :
                  "    <h3>Heure d'ouverture</h3>
                  <div><strong>Lun-Sam:</strong> 11hr - 23hr;
                    <strong>Dimanche:</strong> Closed
                  </div>"
                ?>

              </div>
            </div>
          </div><!-- End Info Item -->

        </div>

        <form id="mail" method="POST" role="form" class="php-email-form p-3 p-md-4">
          <div class="row">
            <div class="col-xl-6 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
            </div>
            <div class="col-xl-6 form-group">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
            </div>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
          </div>
          <div class="form-group">
            <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
          </div>
          <div class="my-3">
            <?php
            if (isset($mailMessage)) {
              $msg = $mailMessage;
              if ($msg[0]) {
                echo '<div id="sentMsg" class="sent-message" style="display:block">' . $msg[1] . '</div>';
                unset($mailMessage);
              } else {
                echo '<div id="errorMsg" class="error-message" style="display:block">' . $msg[1] . '</div>';
                unset($mailMessage);
              }
            }
            ?>
          </div>
          <div class="text-center"><button type="submit"><?php echo $_SESSION['language'] == 'en' ? 'Send Message' : 'Envoyer un message' ?></button></div>
        </form><!--End Contact Form -->

      </div>
    </section><!-- End Contact Section -->

    

  </main><!-- End #main -->



  <!-- FAQ's SECTION -->
 <div class="container faq my-5">
  <h1 class="text-center mb-3">FA<span class="color">Q's</span></h1>
  <p class="text-center">
    <?php echo htmlspecialchars($_SESSION['language'] == 'en' 
      ? 'Have questions about how MindVault works? Find answers below or reach out to our support team.' 
      : "Vous avez des questions sur le fonctionnement de MindVault ? Trouvez des réponses ci-dessous ou contactez notre équipe d'assistance."); ?>  
  </p>

  <div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="row">
      <div class="col-lg-6">
        <!-- FAQ 1 -->
        <div class="accordion-item border mb-3">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq1" aria-expanded="false">
              <?php echo htmlspecialchars($_SESSION['language'] == 'en' 
                ? '1. What is MindVault?' 
                : "1. Qu'est-ce que MindVault ?"); ?>
            </button>
          </h2>
          <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
              <?php echo htmlspecialchars($_SESSION['language'] == 'en' 
                ? 'MindVault is a digital platform for exploring research-driven articles across various disciplines including science, technology, culture, politics, health, and more.' 
                : 'MindVault est une plateforme numérique permettant d’explorer des articles fondés sur la recherche dans divers domaines tels que la science, la technologie, la culture, la politique, la santé, etc.'); ?>
            </div>
          </div>
        </div>

        <!-- FAQ 2 -->
        <div class="accordion-item border mb-3">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2" aria-expanded="false">
              <?php echo htmlspecialchars($_SESSION['language'] == 'en' 
                ? '2. Who writes the articles on MindVault?' 
                : "2. Qui rédige les articles sur MindVault ?"); ?>
            </button>
          </h2>
          <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
              <?php echo htmlspecialchars($_SESSION['language'] == 'en' 
                ? 'Articles are written by subject matter experts, researchers, and verified contributors passionate about knowledge sharing.' 
                : 'Les articles sont rédigés par des experts, des chercheurs et des contributeurs vérifiés passionnés par le partage des connaissances.'); ?>
            </div>
          </div>
        </div>

        <!-- FAQ 3 -->
        <div class="accordion-item border mb-3">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3" aria-expanded="false">
              <?php echo htmlspecialchars($_SESSION['language'] == 'en' 
                ? '3. Can I contribute an article to MindVault?' 
                : "3. Puis-je contribuer à MindVault avec un article ?"); ?>
            </button>
          </h2>
          <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
              <?php echo htmlspecialchars($_SESSION['language'] == 'en' 
                ? 'Yes! If you have research-backed content to share, you can apply to become a contributor by contacting our editorial team.' 
                : 'Oui ! Si vous avez du contenu basé sur la recherche à partager, vous pouvez postuler pour devenir contributeur en contactant notre équipe éditoriale.'); ?>
            </div>
          </div>
        </div>

        <!-- FAQ 4 -->
        <div class="accordion-item border mb-3">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4" aria-expanded="false">
              <?php echo htmlspecialchars($_SESSION['language'] == 'en' 
                ? '4. Is MindVault free to use?' 
                : "4. L'utilisation de MindVault est-elle gratuite ?"); ?>
            </button>
          </h2>
          <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
              <?php echo htmlspecialchars($_SESSION['language'] == 'en' 
                ? 'Yes, all users can access articles for free. Some premium content and tools may be available in the future for subscribers.' 
                : "Oui, tous les utilisateurs peuvent accéder aux articles gratuitement. Certains contenus premium et outils pourraient être proposés aux abonnés à l'avenir."); ?>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <!-- FAQ 5 -->
        <div class="accordion-item border mb-3">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5" aria-expanded="false">
              <?php echo htmlspecialchars($_SESSION['language'] == 'en' 
                ? '5. How often are new articles published?' 
                : "5. À quelle fréquence les articles sont-ils publiés ?"); ?>
            </button>
          </h2>
          <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
              <?php echo htmlspecialchars($_SESSION['language'] == 'en' 
                ? 'New articles are published weekly across different categories, with highlights featured on the homepage.' 
                : "De nouveaux articles sont publiés chaque semaine dans différentes catégories, avec une sélection mise en avant sur la page d’accueil."); ?>
            </div>
          </div>
        </div>

        <!-- FAQ 6 -->
        <div class="accordion-item border mb-3">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq6" aria-expanded="false">
              <?php echo htmlspecialchars($_SESSION['language'] == 'en' 
                ? '6. How can I search for specific articles?' 
                : "6. Comment puis-je rechercher des articles spécifiques ?"); ?>
            </button>
          </h2>
          <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
              <?php echo htmlspecialchars($_SESSION['language'] == 'en' 
                ? 'Use the search bar at the top of the page to find articles by keywords, authors, or categories. You can also use filters on the articles page.' 
                : "Utilisez la barre de recherche en haut de la page pour trouver des articles par mots-clés, auteurs ou catégories. Vous pouvez également utiliser les filtres sur la page des articles."); ?>
            </div>
          </div>
        </div>

        <!-- FAQ 7 -->
        <div class="accordion-item border mb-3">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq7" aria-expanded="false">
              <?php echo htmlspecialchars($_SESSION['language'] == 'en' 
                ? '7. Can I save articles to read later?' 
                : "7. Puis-je enregistrer des articles pour les lire plus tard ?"); ?>
            </button>
          </h2>
          <div id="faq7" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
              <?php echo htmlspecialchars($_SESSION['language'] == 'en' 
                ? 'Yes, you can bookmark articles by clicking the bookmark icon on each article card. These will be saved to your profile for easy access.' 
                : "Oui, vous pouvez marquer des articles en cliquant sur l'icône de signet sur chaque carte d'article. Ceux-ci seront enregistrés dans votre profil pour un accès facile."); ?>
            </div>
          </div>
        </div>

        <!-- FAQ 8 -->
        <div class="accordion-item border mb-3">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq8" aria-expanded="false">
              <?php echo htmlspecialchars($_SESSION['language'] == 'en' 
                ? '8. How do I report an issue or provide feedback?' 
                : "8. Comment puis-je signaler un problème ou donner mon avis ?"); ?>
            </button>
          </h2>
          <div id="faq8" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
              <?php echo htmlspecialchars($_SESSION['language'] == 'en' 
                ? 'You can contact our support team through the "Contact Us" section on our website, or by emailing support@mindvault.com.' 
                : "Vous pouvez contacter notre équipe de support via la section \"Contactez-nous\" de notre site web, ou en envoyant un e-mail à support@mindvault.com."); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

  <!-- End of Faq's -->
 


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


  <?php require_once "footer.php";?>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const rotatingTexts = [
      "Unlock the <span>Power</span> of Curated Research",
      "Explore <span>Insights</span> from Leading Experts",
      "Fuel Your <span>Curiosity</span> with In-Depth Articles"
    ];

    const rotatingTextsFr = [
      "Libérez la <span>puissance</span> de la recherche organisée",
      "Découvrez les <span>perspectives</span> des meilleurs experts",
      "Nourrissez votre <span>curiosité</span> avec des articles approfondis"
    ];

    const rotatingTextElement = document.getElementById('rotating-text');
    const currentLang = '<?php echo $_SESSION['language']; ?>';
    const texts = currentLang === 'en' ? rotatingTexts : rotatingTextsFr;
    let currentIndex = 0;

    function updateRotatingText() {
      // Add fade-out animation
      rotatingTextElement.style.opacity = 0;

      setTimeout(() => {
        // Update text and add fade-in animation
        currentIndex = (currentIndex + 1) % texts.length;
        rotatingTextElement.innerHTML = texts[currentIndex];
        rotatingTextElement.style.opacity = 1;
      }, 500); // Match this with CSS transition duration
    }

    // Set initial text
    rotatingTextElement.innerHTML = texts[0];

    // Change text every 5 seconds
    setInterval(updateRotatingText, 5000);
  });
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const readMoreButtons = document.querySelectorAll('.read-more-btn');
    const popup = document.getElementById('enhancedPopup');
    const popupBackdrop = popup.querySelector('.popup-backdrop');
    const closeBtn = popup.querySelector('.popup-close-btn');
    const lang = '<?php echo $_SESSION['language']; ?>';

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
        commentBtn: document.getElementById('popupComment'),
        openCommentsBtn: document.getElementById('openCommentsBtn'),
        commentModal: document.getElementById('commentModal'),
        commentModalClose: document.getElementById('commentModalClose'),
        commentForm: document.getElementById('commentForm'),
        commentsList: document.getElementById('commentsList'),
        commentArticleId: document.getElementById('commentArticleId')
    };

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
        popupElements.category.textContent = article.category || 'General';
        popupElements.date.textContent = publishDate;
        popupElements.readTime.textContent = `${readTime} ${lang === 'en' ? 'min read' : 'min de lecture'}`;
        popupElements.title.innerHTML = title;
        popupElements.likes.textContent = article.likes || 0;
        popupElements.description.innerHTML = description;
        popupElements.tags.innerHTML = tagsHTML;

        popup.classList.add('active');
        document.body.style.overflow = 'hidden';

        // Setup event listeners for popup actions
        popupElements.printBtn.onclick = () => window.print();
        popupElements.likeBtn.onclick = () => console.log('Liked article:', article.id);
        
        // Handle comments
        if (popupElements.commentArticleId) {
            popupElements.commentArticleId.value = article.id;
        }
        if (popupElements.openCommentsBtn) {
            popupElements.openCommentsBtn.onclick = () => openCommentModal(article.id);
        }
        if (popupElements.commentBtn) {
            popupElements.commentBtn.onclick = () => openCommentModal(article.id);
        }
    }

    function closePopup() {
        popup.classList.remove('active');
        document.body.style.overflow = 'auto';
    }

    function openCommentModal(articleId) {
        if (popupElements.commentModal) {
            popupElements.commentModal.classList.add('active');
            loadComments(articleId);
        }
    }

    function closeCommentModal() {
        if (popupElements.commentModal) {
            popupElements.commentModal.classList.remove('active');
        }
    }

    async function loadComments(articleId) {
        try {
            const response = await fetch(`control/get-comments.php?article_id=${articleId}`);
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

    readMoreButtons.forEach(button => {
        button.addEventListener('click', function() {
            openPopup(this.dataset.article);
        });
    });

    if (closeBtn) closeBtn.addEventListener('click', closePopup);
    if (popupBackdrop) popupBackdrop.addEventListener('click', closePopup);
    if (popupElements.commentModalClose) popupElements.commentModalClose.addEventListener('click', closeCommentModal);
    
    const commentBackdrop = document.querySelector('#commentModal .popup-backdrop');
    if (commentBackdrop) {
        commentBackdrop.addEventListener('click', closeCommentModal);
    }

    function htmlspecialchars(str) {
        const map = { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#039;' };
        return str.replace(/[&<>"']/g, m => map[m]);
    }
});
</script>

