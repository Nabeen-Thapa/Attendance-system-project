<link rel="stylesheet" href="teacher_search_bar.css">
<div class="search_bar">
    <form action="" method="post">
        <input type="text" placeholder="search student name/rollno" class="search-box" name="searchBox" value="<?php echo isset($search)?$search:''; ?>"/>
        <button type="submit" class="search-button" name="searchBtn">Search</button>
    </form>
</div>