<?php include "header.php"; ?>

<h2>Welcome to Perfect Plate!</h2>

<p>
PerfectPlate is a meal planner and grocery manager designed to make meal planning simple and stress-free. Our website helps users organize weekly meals, save their favorite recipes, and automatically create grocery lists based on their meal plans.
</p>

<p>
Whether you are planning meals for your family, looking for recipes that fit your dietary restrictions, or simply trying to stay organized, PerfectPlate provides the tools you need in one convenient place.
</p>

<p>
Explore our website to create personalized meal plans, discover delicious recipes, manage your pantry, and keep track of your grocery shopping with ease.
</p>

<?php include "slides.php"; ?>
<script>
$(function() {
    $(".rslides").responsiveSlides({
        auto: true,            
        speed: 500,            
        timeout: 4000,          
        pager: false,          
        nav: false, 
    });
});
</script>

<?php include "footer.php"; ?>

