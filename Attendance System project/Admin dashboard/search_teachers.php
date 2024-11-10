<link rel="stylesheet" href="search_bar.css">
<div class="search_bar">
    <form action="view_teachers.php" method="post">
        <input type="text" placeholder="search teachers by name" class="search-box" name="searchBox" value="<?php echo isset($search)?$search:''; ?>"/>
        <button type="submit" class="search-button" name="searchBtn">Search</button>
    </form>
</div>