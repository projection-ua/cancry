<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cancri
 */

get_header();
?>
    <style>
        .main_header{
            position: absolute;
            background: linear-gradient(0deg, rgba(0, 0, 0, 0.00) 10%, rgba(0, 0, 0, 0.5) 100%) !important;
            top: 0px;
            z-index: 9999;
            width: 100%;
        }
    </style>

    <div class="header-block" style="background-image: url('<?php echo get_template_directory_uri()?>/assets/img/main_img.jpg')">
        <div class="backgroung_linear"></div>
        <div class="offer-block"> 
            <div class="container">
                <h1 class="heading-1">
                    <span class="offer-span one_stroke">Ваша страсть к красоте</span>
                    <img src="<?php echo get_template_directory_uri()?>/assets/img/&.svg" alt="" class="end_symbol">
                    <span class="offer-span two_stroke">элегантности</span>
                    <span class="offer-span three_stroke">воплощается с Cancri</span>
                    <img src="<?php echo get_template_directory_uri()?>/assets/img/Work & travel.svg" alt="" class="work_travel">
                </h1>
                <p class="paragraph offer_p">Доступный роскошный бизнес. Особая привилегия для каждого — прикоснуться к масштабному ювелирному делу!</p>
                <a href="" class="main_button">Смотреть коллекцию</a>
            </div>
        </div>
    </div>

    <div class="container">
        <h2 class="heading-2">Новая коллекция</h2>
        <?php echo do_shortcode("[product_attribute attribute='collection' filter='new_collection']"); ?>
    </div>

    
    

<?php
get_footer();
