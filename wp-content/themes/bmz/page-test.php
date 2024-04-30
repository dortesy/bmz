<?php get_header(); ?>

<div class="container page-container">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@uvarov.frontend/vanilla-calendar@2.2.5/build/vanilla-calendar.min.css">
<script  src="https://cdn.jsdelivr.net/npm/@uvarov.frontend/vanilla-calendar@2.2.5/build/vanilla-calendar.min.js"></script>
		<style>

			.vanilla-calendar {
				border: 1px solid #efefef;
				box-shadow: 0 0 10px -10px #000;
				margin: 30px auto 10px;
			}

			.vanilla-calendar-header__content {
				justify-content: flex-start;
				padding-left: 5px;
			}

			.vanilla-calendar-info {
				display: grid;
				grid-auto-flow: column;
				justify-content: start;
				gap: 5px;
				margin: 20px auto;
				width: 280px;
				border: 1px solid #efefef;
				box-shadow: 0 0 10px -10px #000;
				background-color: white;
				border-radius: 4px;
				padding: 10px 15px;
				font-size: 14px;
				color: black;
			}

			.bg-red {
				background-color: orangered;
				color: white;
			}

			.bg-red:hover {
				background-color: orangered;
				color: white;
			}

			.bg-orange {
				background-color: orange;
			}

			.bg-orange:hover {
				background-color: orange;
			}
		</style>

	<body>
	<div class="container col-sm-4 col-md-7 col-lg-4 mt-5">


    <div class="calendar">

		<div class="calendar-header">
		<div class="calendar-header-arrow prev-month"><img src="<?=get_template_directory_uri()?>/images/icons/red-arrow.svg" alt="Prev month"></div>
        	<h3 class="calendar-header-title" id="monthAndYear"></h3>
		<div class="calendar-header-arrow next-month"><img src="<?=get_template_directory_uri()?>/images/icons/red-arrow.svg" alt="Prev month"></div>
		</div>

        <table class="calendar-table" id="calendar" data-lang="<?=pll_current_language()?>">
            <thead>
            <tr>
                <th>Sun</th>
                <th>Mon</th>
                <th>Tue</th>
                <th>Wed</th>
                <th>Thu</th>
                <th>Fri</th>
                <th>Sat</th>
            </tr>
            </thead>

            <tbody class="calendar-tbody" id="calendar-body">

            </tbody>
        </table>
      

		<div class="calendar-events" data-time-icon="<?=get_template_directory_uri()?>/images/icons/time.svg">
			
		</div>

    </div>


</div>

    <?php the_content();?>


<?php endwhile; endif; ?>    
</div>

<?php get_footer(); ?>