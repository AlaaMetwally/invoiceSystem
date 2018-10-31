<?php if(Auth::user() && !session()->has('external_agency_quiz_token')): ?>


    

    <li class="m-menu__item  <?php if(isset($i) && $i == '1' ){?>m-menu__item--active <?php ;}?>" aria-haspopup="true">
        <a href="<?php echo e(route('user.index')); ?>" class="m-menu__link">
            <i class="m-menu__link-icon fa fa-user"></i>
            <span class="m-menu__link-title">
				<span class="m-menu__link-wrap">
					<span class="m-menu__link-text">
						Profile
					</span>
				</span>
			</span>
        </a>
    </li>

    <li class="m-menu__item  <?php if(isset($i) && $i == '1' ){?>m-menu__item--active <?php ;}?>" aria-haspopup="true">
        <a href="<?php echo e(route('client.index')); ?>" class="m-menu__link">
            <i class="m-menu__link-icon fa fa-users"></i>
            <span class="m-menu__link-wrap">
				<span class="m-menu__link-title">
					<span class="m-menu__link-text">
						Clients
					</span>
				</span>
			</span>
        </a>
    </li>

    <li class="m-menu__item  <?php if(isset($i) && $i == '1' ){?>m-menu__item--active <?php ;}?>"
        aria-haspopup="true">
        <a href="<?php echo e(route('contact.index')); ?>" class="m-menu__link">
            <i class="m-menu__link-icon fa fa-users"></i>
            <span class="m-menu__link-title">
				<span class="m-menu__link-wrap">
					<span class="m-menu__link-text">
						Contacts
					</span>
			</span>
			</span>
        </a>
    </li>

    <li class="m-menu__item  <?php if(isset($i) && $i == '1' ){?>m-menu__item--active <?php ;}?>" aria-haspopup="true">
        <a href="<?php echo e(route('service.index')); ?>" class="m-menu__link">
			<i class="m-menu__link-icon fa fa-folder-o"></i>
            <span class="m-menu__link-title">
				<span class="m-menu__link-wrap">
					<span class="m-menu__link-text">
						Services
					</span>
				</span>
			</span>
        </a>
    </li>

    <li class="m-menu__item  active <?php if(isset($i) && $i == '1' ){?>m-menu__item--active <?php ;}?>"
        aria-haspopup="true">
        <a href="<?php echo e(route('invoice.index')); ?>" class="m-menu__link">
            <i class="m-menu__link-icon fa fa-credit-card"></i>
            <span class="m-menu__link-title">
				<span class="m-menu__link-wrap">
					<span class="m-menu__link-text">
						Invoices
					</span>
				</span>
			</span>
        </a>
    </li>

    <li class="m-menu__item  <?php if(isset($i) && $i == '1' ){?>m-menu__item--active <?php ;}?>" aria-haspopup="true">
        <a href="<?php echo e(route('unit.index')); ?>" class="m-menu__link">
            <i class="m-menu__link-icon fa fa-filter"></i>
            <span class="m-menu__link-title">
				<span class="m-menu__link-wrap">
					<span class="m-menu__link-text">
						Units
					</span>
				</span>
			</span>
        </a>
    </li>

    <li class="m-menu__item  <?php if(isset($i) && $i == '1' ){?>m-menu__item--active <?php ;}?>" aria-haspopup="true">
        <a href="<?php echo e(route('currency.index')); ?>" class="m-menu__link">
            <i class="m-menu__link-icon fa fa-usd"></i>
            <span class="m-menu__link-title">
				<span class="m-menu__link-wrap">
					<span class="m-menu__link-text">
						Currencies
					</span>
				</span>
			</span>
        </a>
    </li>

    <li class="m-menu__item  <?php if(isset($i) && $i == '1' ){?>m-menu__item--active <?php ;}?>" aria-haspopup="true">
		<a href="<?php echo e(route('task.index')); ?>" class="m-menu__link">
            <i class="m-menu__link-icon fa fa-tasks"></i>
            <span class="m-menu__link-title">
				<span class="m-menu__link-title">
					<span class="m-menu__link-wrap"><span class="m-menu__link-text">
						Tasks
					</span>
					</span>
				</span>
			</span>
        </a>
    </li>

    <li class="m-menu__item  <?php if(isset($i) && $i == '1' ){?>m-menu__item--active <?php ;}?>" aria-haspopup="true">
        <a href="<?php echo e(route('payment.index')); ?>" class="m-menu__link">
            <i class="m-menu__link-icon fa fa-money"></i>
            <span class="m-menu__link-title">
				<span class="m-menu__link-wrap">
					<span class="m-menu__link-text">
						Payments
					</span>
				</span>
			</span>
        </a>
    </li>

    <li class="m-menu__item  <?php if(isset($i) && $i == '1' ){?>m-menu__item--active <?php ;}?>" aria-haspopup="true">
        <a href="<?php echo e(route('adjustment.index')); ?>" class="m-menu__link">
            <i class="m-menu__link-icon fa fa-tags"></i>
            <span class="m-menu__link-title">
				<span class="m-menu__link-wrap">
					<span class="m-menu__link-text">
						Adjustments
					</span>
				</span>
			</span>
        </a>
    </li>

    

<?php endif; ?>


