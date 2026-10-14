<?php
$articles = [
    ["title" => "Technology", "category" => "Technology", "icon" => "💻", "description" => "Explore computers, inventions, and the digital world.", "content" => "Technology is the use of scientific knowledge to create tools, systems, and solutions. It influences communication, education, transportation, and everyday life."],
    ["title" => "Science", "category" => "Science", "icon" => "🔬", "description" => "Discover ideas that help explain how the world works.", "content" => "Science is a systematic way of learning about the natural world through observation, questions, and experiments. Major fields include biology, chemistry, physics, and astronomy."],
    ["title" => "World History", "category" => "History", "icon" => "🏛️", "description" => "Learn about people, events, and civilizations of the past.", "content" => "History studies past events and human societies using evidence such as documents, artifacts, buildings, and oral accounts. It helps us understand how the present developed."],
    ["title" => "Nature", "category" => "Nature", "icon" => "🌿", "description" => "Meet the plants, animals, and ecosystems of Earth.", "content" => "Nature includes living organisms, landscapes, weather, and ecosystems. Biodiversity supports healthy ecosystems and provides food, clean water, and other resources."],
    ["title" => "Space", "category" => "Science", "icon" => "🪐", "description" => "Travel through planets, stars, and the universe.", "content" => "Space is the vast region beyond Earth's atmosphere. It contains planets, moons, stars, galaxies, gas, and dust. Astronomers study it using telescopes and spacecraft."],
    ["title" => "The Philippines", "category" => "Geography", "icon" => "🇵🇭", "description" => "Discover the islands, culture, and history of the Philippines.", "content" => "The Philippines is an archipelago in Southeast Asia made up of thousands of islands. Its capital is Manila, and Filipino and English are its official languages."]
];
$query = trim($_GET["q"] ?? "");
$filtered = array_filter($articles, function ($article) use ($query) {
    return $query === "" || stripos($article["title"], $query) !== false ||
        stripos($article["category"], $query) !== false ||
        stripos($article["description"], $query) !== false;
});
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SimpleWiki — Explore and Learn</title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<header class="site-header">
  <a class="brand" href="index.php"><span class="brand-mark">W</span><span>Simple<span class="brand-light">Wiki</span><small>The free learning guide</small></span></a>
  <nav><a class="active" href="index.php">Home</a><a href="#articles">Articles</a><a href="about.php">About</a></nav>
</header>
<main>
  <section class="hero">
    <span class="eyebrow">A WORLD OF KNOWLEDGE</span>
    <h1>Learn something <span>new.</span></h1>
    <p>Explore simple articles about the world, science, history, and more.</p>
    <form class="search-form" action="index.php" method="GET" role="search">
      <span aria-hidden="true">⌕</span>
      <input id="searchInput" type="search" name="q" value="<?= htmlspecialchars($query, ENT_QUOTES, 'UTF-8') ?>" placeholder="Search articles..." aria-label="Search articles">
      <button type="submit">Search</button>
    </form>
    <div class="hero-note">Free to explore · Easy to understand · Made for curious minds</div>
  </section>
  <section class="section" id="articles">
    <div class="section-heading"><div><span class="eyebrow">BROWSE THE LIBRARY</span><h2><?= $query ? 'Search results' : 'Explore articles' ?></h2></div><span class="result-count"><?= count($filtered) ?> article<?= count($filtered) === 1 ? '' : 's' ?></span></div>
    <?php if (!$filtered): ?>
      <div class="empty-state"><span>🔎</span><h3>No articles found</h3><p>Try a different keyword, like science or nature.</p><a class="text-link" href="index.php">Show all articles →</a></div>
    <?php else: ?>
      <div class="article-grid">
      <?php foreach ($filtered as $article): ?>
        <article class="article-card">
          <div class="card-top"><span class="article-icon"><?= $article["icon"] ?></span><span class="category"><?= htmlspecialchars($article["category"], ENT_QUOTES, 'UTF-8') ?></span></div>
          <h3><?= htmlspecialchars($article["title"], ENT_QUOTES, 'UTF-8') ?></h3>
          <p><?= htmlspecialchars($article["description"], ENT_QUOTES, 'UTF-8') ?></p>
          <a class="text-link" href="article.php?title=<?= urlencode($article["title"]) ?>">Read article <span aria-hidden="true">→</span></a>
        </article>
      <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </section>
  <section class="info-banner"><div class="info-icon">✦</div><div><h2>Curiosity starts here.</h2><p>Pick a topic, follow your questions, and keep discovering.</p></div><a href="#articles" class="banner-link">Browse topics →</a></section>
</main>
<footer><a class="footer-brand" href="index.php">SimpleWiki</a><span>A simple educational demo built with PHP, HTML, CSS, and JavaScript.</span><span>© <span id="year">2026</span> SimpleWiki</span></footer>
<script src="assets/script.js"></script>
</body>
</html>