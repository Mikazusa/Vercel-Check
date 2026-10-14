<?php
$articles = [
 "Technology" => ["category"=>"Technology","icon"=>"💻","description"=>"Explore computers, inventions, and the digital world.","content"=>"Technology is the use of scientific knowledge to create tools, systems, and solutions. It influences communication, education, transportation, and everyday life."],
 "Science" => ["category"=>"Science","icon"=>"🔬","description"=>"Discover ideas that help explain how the world works.","content"=>"Science is a systematic way of learning about the natural world through observation, questions, and experiments. Major fields include biology, chemistry, physics, and astronomy."],
 "World History" => ["category"=>"History","icon"=>"🏛️","description"=>"Learn about people, events, and civilizations of the past.","content"=>"History studies past events and human societies using evidence such as documents, artifacts, buildings, and oral accounts. It helps us understand how the present developed."],
 "Nature" => ["category"=>"Nature","icon"=>"🌿","description"=>"Meet the plants, animals, and ecosystems of Earth.","content"=>"Nature includes living organisms, landscapes, weather, and ecosystems. Biodiversity supports healthy ecosystems and provides food, clean water, and other resources."],
 "Space" => ["category"=>"Science","icon"=>"🪐","description"=>"Travel through planets, stars, and the universe.","content"=>"Space is the vast region beyond Earth's atmosphere. It contains planets, moons, stars, galaxies, gas, and dust. Astronomers study it using telescopes and spacecraft."],
 "The Philippines" => ["category"=>"Geography","icon"=>"🇵🇭","description"=>"Discover the islands, culture, and history of the Philippines.","content"=>"The Philippines is an archipelago in Southeast Asia made up of thousands of islands. Its capital is Manila, and Filipino and English are its official languages."]
];
$title = $_GET["title"] ?? "";
$article = $articles[$title] ?? null;
function e($value) { return htmlspecialchars($value, ENT_QUOTES, "UTF-8"); }
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title><?= $article ? e($title) . " — SimpleWiki" : "Article not found — SimpleWiki" ?></title><link rel="stylesheet" href="assets/style.css"></head>
<body>
<header class="site-header"><a class="brand" href="index.php"><span class="brand-mark">W</span><span>Simple<span class="brand-light">Wiki</span><small>The free learning guide</small></span></a><nav><a href="index.php">Home</a><a class="active" href="index.php#articles">Articles</a><a href="about.php">About</a></nav></header>
<main class="page-main">
<?php if ($article): ?>
  <a class="back-link" href="index.php#articles">← Back to articles</a>
  <article class="article-detail"><span class="article-icon detail-icon"><?= $article["icon"] ?></span><span class="category"><?= e($article["category"]) ?></span><h1><?= e($title) ?></h1><p class="lead"><?= e($article["description"]) ?></p><div class="detail-rule"></div><h2>Overview</h2><p><?= e($article["content"]) ?></p><div class="article-note"><strong>Keep exploring</strong><p>Use the home page to discover another topic in the SimpleWiki library.</p><a class="text-link" href="index.php#articles">Explore more articles →</a></div></article>
<?php else: ?>
  <div class="empty-state"><span>📄</span><h1>Article not found</h1><p>This article may not be in our demo library.</p><a class="text-link" href="index.php">Return home →</a></div>
<?php endif; ?>
</main>
<footer><a class="footer-brand" href="index.php">SimpleWiki</a><span>A simple educational demo built with PHP, HTML, CSS, and JavaScript.</span><span>© <span id="year">2026</span> SimpleWiki</span></footer><script src="assets/script.js"></script></body></html>