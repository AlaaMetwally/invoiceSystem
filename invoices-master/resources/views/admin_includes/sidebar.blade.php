@if(Auth::user() && !session()->has('external_agency_quiz_token'))


    {{--@@START@@--}}


    <li class="m-menu__item <?php if(isset($i) && $i == '1' ){?>m-menu__item--active <?php ;}?>" aria-haspopup="true">
        <a href="/project" class="m-menu__link">
            <i class="m-menu__link-icon fa fa-database"></i>
            <span class="m-menu__link-title">
				<span class="m-menu__link-wrap">
					<span class="m-menu__link-text">
						Projects
					</span>
					<span class="hide m-menu__link-badge">
						<span class="m-badge m-badge--danger">
							2
						</span>
					</span>
				</span>
			</span>
        </a>
    </li>

    <li class="m-menu__item  <?php if(isset($i) && $i == '1' ){?>m-menu__item--active <?php ;}?>" aria-haspopup="true">
        <a href="{{route('user.index')}}" class="m-menu__link">
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
        <a href="/client" class="m-menu__link">
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
        <a href="/contact" class="m-menu__link">
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
        <a href="/service" class="m-menu__link">
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
        <a href="/invoice" class="m-menu__link">
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
        <a href="/unit" class="m-menu__link">
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
        <a href="/currency" class="m-menu__link">
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
		<a href="/task" class="m-menu__link">
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
        <a href="{{route('payment.index')}}" class="m-menu__link">
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
        <a href="{{route('adjustment.index')}}" class="m-menu__link">
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

    {{--@@END@@--}}

@endif


