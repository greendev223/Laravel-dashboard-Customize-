<?php
$user = Auth::user();
if ($user) {
    $currantLang = $user->lang;
    $languages = \App\Models\Utility::languages();
}

?>


<?php if((isset($setting['cust_theme_bg']) && $setting['cust_theme_bg'] == 'on') || env('SITE_RTL') == 'on'): ?>
    <header class="dash-header transprent-bg">
    <?php else: ?>
        <header class="dash-header">
<?php endif; ?>

<div class="header-wrapper">
    <div class="me-auto dash-mob-drp">
        <ul class="list-unstyled">
            <li class="dash-h-item mob-hamburger">
                <a href="#!" class="dash-head-link" id="mobile-collapse">
                    <div class="hamburger hamburger--arrowturn">
                        <div class="hamburger-box">
                            <div class="hamburger-inner"></div>
                        </div>
                    </div>
                </a>
            </li>
           
            <li class="dropdown dash-h-item drp-company">
                <a class="dash-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#"
                    role="button" aria-haspopup="false" aria-expanded="false">
                    <?php
                        $image_url = !empty($user->avatar) && asset(Storage::exists($user->avatar)) ? $user->avatar : 'logo/avatar.png';
                    ?>
                    <!-- <span class="theme-avtar rounded-circle"> <img src="<?php echo e(asset(Storage::url($image_url))); ?>" class="wid-35 rounded-circle" onerror="this.onerror=null;this.src='<?php echo e(asset('public/img/theme/avatar.png')); ?>';"></span>   -->
                    <span class="theme-avtar rounded-circle"> <img src="<?php echo e(asset('assets/img/theme/avatar.png')); ?>"  class="wid-35 rounded-circle"></span>  
                    <span class="hide-mob ms-2"><?php echo e(ucfirst(Auth::user()->name)); ?></span>
                    <i class="ti ti-chevron-down drp-arrow nocolor hide-mob"></i>
                </a>



                <div class="dropdown-menu dash-h-dropdown">
                    
                    <a href="<?php echo e(route('profile.display')); ?>" class="dropdown-item">
                        <i class="ti ti-user"></i>
                        <span><?php echo e(__('Profile')); ?></span>
                    </a>


                    <a href="<?php echo e(route('logout')); ?>" class="dropdown-item"
                        onclick="event.preventDefault(); document.getElementById('logout-form1').submit();">
                        <i class="ti ti-power"></i>
                        <span><?php echo e(__('Logout')); ?></span>
                        <?php echo Form::open(['method' => 'POST', 'id' => 'logout-form1', 'route' => ['logout'], 'style' => 'display:none']); ?>

                        <?php echo Form::close(); ?>

                    </a>
                </div>
            </li>

        </ul>
    </div>
    <div class="ms-auto">
        <ul class="list-unstyled">

            <li class="dropdown dash-h-item drp-language">
                <a class="dash-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#"
                    role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="ti ti-world nocolor"></i>
                    <span class="drp-text hide-mob"><?php echo e(Str::upper($currantLang)); ?></span>
                    <i class="ti ti-chevron-down drp-arrow nocolor"></i>
                </a>
                <div class="dropdown-menu dash-h-dropdown dropdown-menu-end">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Language')): ?>
                        <a class="dropdown-item"
                            href="<?php echo e(route('manage.language', [isset($currantLang) ? $currantLang : 'en'])); ?>"><?php echo e(__('Create & Customize')); ?></a>
                    <?php endif; ?>
                    <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('change.language', $language)); ?>"
                            class="dropdown-item <?php if($language == $currantLang): ?> active-language <?php endif; ?>">
                            <span> <?php echo e(Str::upper($language)); ?></span>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </li>

        </ul>
    </div>
</div>
</header>
<?php /**PATH D:\My task\Germany\Laravel-dashboard-Customize-\resources\views/header.blade.php ENDPATH**/ ?>