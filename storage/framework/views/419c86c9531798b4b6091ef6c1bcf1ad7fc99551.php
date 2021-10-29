<?php $__env->startSection('content'); ?>
	<section class="breadcrumbs-custom">
		<div class="parallax-container" data-parallax-img="<?php echo e(asset('images/backgrounds/bg-about_us.jpg')); ?>">
			<div class="breadcrumbs-custom-body parallax-content context-dark">
				<div class="container">
					<h2 class="breadcrumbs-custom-title"><?php echo e(__('common.our_company')); ?></h2>
					<h5 class="breadcrumbs-custom-text">
						Саратовский Молочный Комбинат - лидер среди перерабатывающих предприятий пищевой индустрии Саратовской области.
						<br class="d-none d-md-block">
						Наша продукция вырабатывается из натурального молока по традиционным технологиям на современном высокотехнологичном оборудовании.
					</h5>
				</div>
			</div>
		</div>
		<?php echo $__env->make( 'layouts.common.breadcrumbs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</section>
	<section class="section section-xl bg-default text-md-left">
		<div class="container">
			<div class="row row-40 row-md-60 justify-content-center align-items-xl-center">
				<div class="col-md-11 col-lg-6 col-xl-5">
					<article class="quote-classic-big inset-xl-right-30">
						<div class="heading-3 quote-classic-big-text">
							<div class="q">Преимущества</div>
						</div>
					</article>
					<div class="tabs-custom tabs-horizontal tabs-line" id="tabs-1">
						<div class="nav-tabs-wrap">
							<ul class="nav nav-tabs">
								<li class="nav-item" role="presentation"><a class="nav-link active" href="#tabs-1-1" data-toggle="tab">Продукция</a></li>
								<li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-2" data-toggle="tab">Партнеры</a></li>
								<li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-3" data-toggle="tab">Достижения</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade show active" id="tabs-1-1">
								<p>Cum nomen prarere, omnes peses amor pius, rusticus racanaes. Ubi est mirabilis gemna? Cum gabalium velum, omnes fugaes</p>
								<p>Ubi est peritus devatio? A falsis, adelphis peritus apolloniates. Est raptus clabulare, cesaris. Cum pulchritudine manducare, omnes genetrixes captis bassus</p>
							</div>
							<div class="tab-pane fade" id="tabs-1-2">
								<p>Vae. Dexter fiscina aliquando vitares animalis est. Nunquam convertam bulla. Cum pars prarere, omnes seculaes</p>
								<p>Navis dexter historia est. Luba, homo, et indictio. Emeritis eposs ducunt ad animalis. Cum solem assimilant, omnes byssuses vitare clemens, secundus nixuses.</p>
							</div>
							<div class="tab-pane fade" id="tabs-1-3">
								<p>A falsis, historia primus gallus. Est bassus tabes, cesaris. Gallus de mirabilis agripeta, locus mens! Primus ratione</p>
								<p>Cur eleates accelerare? Heu. Ecce, superbus onus! Demolitione secundus homo est. Cum cacula congregabo, omnes coordinataees acquirere dexter, flavum galataees.</p>
							</div>
						</div>
					</div><a class="button button-lg button-shadow-2 button-primary button-zakaria" href="<?php echo e(route('common.info','about-products')); ?>"><?php echo e(__( 'common.details' )); ?></a>
				</div>
				<div class="col-md-11 col-lg-6 col-xl-7">
					<div class="slick-slider-1 inset-xl-left-35">
						<div class="slick-slider carousel-parent slick-nav-1 slick-nav-2" id="carousel-parent" data-items="1" data-autoplay="true" data-slide-effect="true" data-child="#child-carousel" data-for="#child-carousel" data-arrows="true">
							<div class="item"><img src="<?php echo e(asset('images/media/about-1-634x373.jpg')); ?>" alt="" width="634" height="373"/></div>
							<div class="item"><img src="<?php echo e(asset('images/media/about-2-634x373.jpg')); ?>" alt="" width="634" height="373"/></div>
							<div class="item"><img src="<?php echo e(asset('images/media/about-3-634x373.jpg')); ?>" alt="" width="634" height="373"/></div>
							<div class="item"><img src="<?php echo e(asset('images/media/about-4-634x373.jpg')); ?>" alt="" width="634" height="373"/></div>
						</div>
						<div class="slick-slider child-carousel" id="child-carousel" data-items="3" data-sm-items="4" data-md-items="4" data-lg-items="4" data-xl-items="4" data-xxl-items="4" data-for="#carousel-parent">
							<div class="item"><img src="<?php echo e(asset('images/media/about-1-143x114.jpg')); ?>" alt="" width="143" height="114"/></div>
							<div class="item"><img src="<?php echo e(asset('images/media/about-2-143x114.jpg')); ?>" alt="" width="143" height="114"/></div>
							<div class="item"><img src="<?php echo e(asset('images/media/about-3-143x114.jpg')); ?>" alt="" width="143" height="114"/></div>
							<div class="item"><img src="<?php echo e(asset('images/media/about-4-143x114.jpg')); ?>" alt="" width="143" height="114"/></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="section section-fluid section-xl section-bottom-0 bg-image-2 section-relative context-dark">
		<div class="container-fluid">
			<h2>История</h2>
			<div class="slick-history">
				<div class="slick-slider carousel-parent" id="carousel-parent-2" data-items="1" data-sm-items="2" data-md-items="2" data-lg-items="3" data-xl-items="3" data-xxl-items="4" data-autoplay="false" data-loop="false">
					<div class="item">
						<div class="box-info-classic">
							<h4 class="box-info-classic-title">Начало</h4>
							<p class="box-info-classic-text">Саратовский молочный комбинат начал свою историю. Силами 100 человек комбинат успевал производить до 150 тонн молока в сутки.</p>
						</div>
					</div>
					<div class="item">
						<div class="box-info-classic">
							<h4 class="box-info-classic-title">Первые шаги</h4>
							<p class="box-info-classic-text">Создан маслодельный цех с установкой новейшего оборудования, позволяющего в кратчайшие сроки автоматизировать технологические процессы.</p>
						</div>
					</div>
					<div class="item">
						<div class="box-info-classic">
							<h4 class="box-info-classic-title">Расширение производства</h4>
							<p class="box-info-classic-text">Впервые в стране был освоен выпуск разных сортов сливочного масла. Саратовское масло отгружается во все районы страны, закладывается в Госрезерв.</p>
						</div>
					</div>
					<div class="item">
						<div class="box-info-classic">
							<h4 class="box-info-classic-title">Обновление</h4>
							<p class="box-info-classic-text">Техническое переоборудование и реконструкция всех производственных цехов, создаются новые структурные подразделения – транспортный цех, служба маркетинга, собственная торговая сеть комбината. </p>
						</div>
					</div>
					<div class="item">
						<div class="box-info-classic">
							<h4 class="box-info-classic-title">Реконструкция</h4>
							<p class="box-info-classic-text">Принят план реконструкции. Установлены новые холодильные камеры, введены в эксплуатацию автомат для упаковки творожной продукции «Линипак-Ф» и автомат «ТУРБО-ПАК» для упаковки кисломолочной продукции</p>
						</div>
					</div>
					<div class="item">
						<div class="box-info-classic">
							<h4 class="box-info-classic-title">«Добрая Бурёнка»</h4>
							<p class="box-info-classic-text">Начат выпуск продукции под ТМ «Добрая Бурёнка».</p>
						</div>
					</div>
					<div class="item">
						<div class="box-info-classic">
							<h4 class="box-info-classic-title">Творожный цех</h4>
							<p class="box-info-classic-text">Введена в эксплуатацию технологическая линия нового творожного цеха и установлен новый фасовочный автомат розлива молока и кисломолочной продукции в упаковку «пюр пак» с крышкой.</p>
						</div>
					</div>
					<div class="item">
						<div class="box-info-classic">
							<h4 class="box-info-classic-title">Расфасовочные автоматы Trepko</h4>
							<p class="box-info-classic-text">В октябре 2016 года установлены и запущены автомат для фасовки сметаны в стакан и автомат для расфасовки сливочного масла и творога в брикеты. Автоматы польской компании Trepko.</p>
						</div>
					</div>
				</div>
				<div class="slick-slider child-carousel" data-items="1" data-sm-items="2" data-md-items="2" data-lg-items="3" data-xl-items="3" data-xxl-items="4" data-arrows="true" data-for="#carousel-parent-2" data-loop="false" data-focus-select="false">
					<div class="item"><div class="heading-5 box-info-classic-year">1963</div></div>
					<div class="item"><div class="heading-5 box-info-classic-year">1972</div></div>
					<div class="item"><div class="heading-5 box-info-classic-year">1977</div></div>
					<div class="item"><div class="heading-5 box-info-classic-year">1995</div></div>
					<div class="item"><div class="heading-5 box-info-classic-year">2006</div></div>
					<div class="item"><div class="heading-5 box-info-classic-year">2007</div></div>
					<div class="item"><div class="heading-5 box-info-classic-year">2012</div></div>
					<div class="item"><div class="heading-5 box-info-classic-year">2016</div></div>
				</div>
			</div>
		</div>
	</section>
	<section class="section section-xxl bg-default">
		<div class="container">
			<div class="card-group-custom card-group-corporate" id="accordion1" role="tablist" aria-multiselectable="false">
				<div class="row">
					<div class="col-lg-6">
						<article class="card card-custom card-corporate">
							<div class="card-header" role="tab">
								<div class="card-title">
									<a id="accordion1-card-head-1" data-toggle="collapse" data-parent="#accordion1" href="#accordion1-card-body-1" aria-controls="accordion1-card-body-1" aria-expanded="true" role="button">
										Миссия и стратегия<div class="card-arrow"><div class="icon"></div></div>
									</a>
								</div>
							</div>
							<div class="collapse show" id="accordion1-card-body-1" aria-labelledby="accordion1-card-head-1" data-parent="#accordion1" role="tabpanel">
								<div class="card-body">
									<p>Разнообразный и богатый опыт укрепление и развитие структуры позволяет выполнять важные задания по разработке существенных финансовых и административных условий. Равным образом сложившаяся структура организации в значительной степени обуславливает создание соответствующий условий активизации.</p>
								</div>
							</div>
						</article>
						<article class="card card-custom card-corporate">
							<div class="card-header" role="tab">
								<div class="card-title">
									<a class="collapsed" id="accordion1-card-head-4" data-toggle="collapse" data-parent="#accordion1" href="#accordion1-card-body-4" aria-controls="accordion1-card-body-4" aria-expanded="false" role="button">
										Контакты<div class="card-arrow"><div class="icon"></div></div>
									</a>
								</div>
							</div>
							<div class="collapse" id="accordion1-card-body-4" aria-labelledby="accordion1-card-head-4" data-parent="#accordion1" role="tabpanel">
								<div class="card-body">
									<p>Разнообразный и богатый опыт укрепление и развитие структуры позволяет выполнять важные задания по разработке существенных финансовых и административных условий. Равным образом сложившаяся структура организации в значительной степени обуславливает создание соответствующий условий активизации.</p>
								</div>
							</div>
						</article>
					</div>
					<div class="col-lg-6">
						<article class="card card-custom card-corporate">
							<div class="card-header" role="tab">
								<div class="card-title">
									<a class="collapsed" id="accordion1-card-head-2" data-toggle="collapse" data-parent="#accordion1" href="#accordion1-card-body-2" aria-controls="accordion1-card-body-2" aria-expanded="false" role="button">
										Б/У оборудование, Услуги<div class="card-arrow"><div class="icon"></div></div>
									</a>
								</div>
							</div>
							<div class="collapse" id="accordion1-card-body-2" aria-labelledby="accordion1-card-head-2" data-parent="#accordion1" role="tabpanel">
								<div class="card-body">
									<p>Разнообразный и богатый опыт укрепление и развитие структуры позволяет выполнять важные задания по разработке существенных финансовых и административных условий. Равным образом сложившаяся структура организации в значительной степени обуславливает создание соответствующий условий активизации.</p>
								</div>
							</div>
						</article>
						<article class="card card-custom card-corporate">
							<div class="card-header" role="tab">
								<div class="card-title">
									<a class="collapsed" id="accordion1-card-head-3" data-toggle="collapse" data-parent="#accordion1" href="#accordion1-card-body-3" aria-controls="accordion1-card-body-3" aria-expanded="false" role="button">
										Отсчеты<div class="card-arrow"><div class="icon"></div></div>
									</a>
								</div>
							</div>
							<div class="collapse" id="accordion1-card-body-3" aria-labelledby="accordion1-card-head-3" data-parent="#accordion1" role="tabpanel">
								<div class="card-body">
									<p>Разнообразный и богатый опыт укрепление и развитие структуры позволяет выполнять важные задания по разработке существенных финансовых и административных условий. Равным образом сложившаяся структура организации в значительной степени обуславливает создание соответствующий условий активизации.</p>
								</div>
							</div>
						</article>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php if (isset($component)) { $__componentOriginal4af19a1b69b7abeccc873447911ecf0111ffbb3a = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Common\AboutUs\Counter::class, []); ?>
<?php $component->withName('common.about-us.counter'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal4af19a1b69b7abeccc873447911ecf0111ffbb3a)): ?>
<?php $component = $__componentOriginal4af19a1b69b7abeccc873447911ecf0111ffbb3a; ?>
<?php unset($__componentOriginal4af19a1b69b7abeccc873447911ecf0111ffbb3a); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
	<?php if (isset($component)) { $__componentOriginale4fb51f00e39db9cbeb6aac3b7a36d121ddb7c64 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Common\AboutUs\OurTeam::class, []); ?>
<?php $component->withName('common.about-us.our-team'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginale4fb51f00e39db9cbeb6aac3b7a36d121ddb7c64)): ?>
<?php $component = $__componentOriginale4fb51f00e39db9cbeb6aac3b7a36d121ddb7c64; ?>
<?php unset($__componentOriginale4fb51f00e39db9cbeb6aac3b7a36d121ddb7c64); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('pages.common.main-frame', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\saratov\resources\views/pages/common/about-us/content.blade.php ENDPATH**/ ?>