<?php $__env->startSection('article-info'); ?>
<dt class="heading-4">Работа в Саратовском молочном комбинате</dt>
<dd>
	<p>ООО «Саратовский молочный комбинат» - предприятие с устойчивыми добрыми традициями и 55-летней историей. Наша продукция покорила сердца уже многих потребителей, потому что создана профессионалами своего дела, людьми, которые любят свою работу и делают ее лучше других.</p>
	<p>Для нас важно создание комфортных условий труда, достойного уровня оплаты, возможности проявить свои сильные стороны и достичь высоких результатов в профессиональном росте, возможности для развития потенциала  каждого участника нашей команды.</p>
	<p>Наши сотрудники – лучшие в своей профессиональной сфере. Сохранение высокого уровня кадрового потенциала – важная часть нашей кадровой политики. Профессиональное обучение и карьерный рост доступны каждому работнику и приветствуются компанией. Привлечение молодых специалистов – вчерашних выпускников, активное сотрудничество с лучшими вузами – одно из значимых направлений нашей работы.</p>
</dd>
<div class="aside-achievements">
	<div class="unit-spacing-sm flex-column">
		<div><img src="<?php echo e(asset('images/media/best-employer-1.png')); ?>" alt="" width="163" height="163"/></div>
	</div>
	<div class="unit-spacing-sm flex-column">
		<div><img src="<?php echo e(asset('images/media/best-employer-2.png')); ?>" alt="" width="163" height="163"/></div>
	</div>
	<div class="unit-spacing-sm flex-column">
		<div><img src="<?php echo e(asset('images/media/best-employer-3.png')); ?>" alt="" width="163" height="163"/></div>
	</div>
</div>
<dt class="heading-4">Открытые вакансии</dt>
<dd>
	<ol class="rounded-list">
		<li><a href="">Главный бухгалтер</a></li>
		<li><a href="">Начальник отдела продаж</a></li>
		<li><a href="">Менеджер по региональным продажам</a></li>
		<li><a href="">Супервайзер отдела сетевых продаж</a></li>
		<li><a href="">Начальник отдела продаж СТМ</a></li>
		<li><a href="">Торговый представитель г. Ртищево</a></li>
		<li><a href="">Торговый представитель г. Саратов (Ленинский р-он)</a></li>
		<li><a href="">Менеджер по персоналу</a></li>
		<li><a href="">Программист (1С)</a></li>
		<li><a href="">Системный администратор</a></li>
		<li><a href="">Менеджер по логистике</a></li>
		<li><a href="">Водитель-экспедитор с личным автомобилем</a></li>
		<li><a href="">Главный энергетик</a></li>
		<li><a href="">Дежурный инженер-электроник (КИПиА)</a></li>
		<li><a href="">Наладчик оборудования</a></li>
		<li><a href="">Грузчик</a></li>
		<li><a href="">Оператор АСУТП</a></li>
		<li><a href="">Дежурный лаборант химического анализа</a></li>
	</ol>
</dd>
<dt class="heading-4">Отправить резюме</dt>
<dd>Ждём Ваших резюме по е-mail: <a href="mailto:<?php echo e(config('saratov.mail_main')); ?>"><?php echo e(config('saratov.mail_main')); ?></a></dd>
<dd>И готовы ответить на все интересующие вопросы по телефону:
	<a href="tel:8 (<?php echo e(config('saratov.contacts_phones.prefix')); ?>) <?php echo e(config('saratov.contacts_phones.list.work')); ?>">
		8 (<?php echo e(config('saratov.contacts_phones.prefix')); ?>) <?php echo e(config('saratov.contacts_phones.list.work')); ?>

	</a>
</dd>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('pages.common.info.main-frame', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\saratov\resources\views/pages/common/info/vacancies/content.blade.php ENDPATH**/ ?>