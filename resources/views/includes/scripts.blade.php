<script>
    $(document).ready(function() {
        $('.menu-toggle').click(function() {
            $(this).addClass('active');
            $(this).siblings('.menu-sub').slideToggle('fast');
        });

        var current_url = window.location.href;
        // var dynamic_url = $('.current-dynamic-url').val() + '/authenticate';

        $('.menu-item').each(function() {
            var menu_url = $(this).find('.menu-link').attr('href');

            if (current_url.includes(menu_url)) {
                $(this).addClass('active');
            }
        });

        $('.menu-sub .menu-item').removeClass('active');

        $('.menu-sub .menu-item').each(function() {
            var menu_url = $(this).find('.menu-link').attr('href');

            if (current_url.includes(menu_url)) {
                $(this).addClass('active');
                $(this).parents('.menu-item').addClass('active').toggleClass('open');
                $(this).parents('.menu-sub').css('display', 'block');
            }
        });

        $('.menu-item').click(function() {
            $(this).toggleClass('open');
        });

        // Custom menu toggle 
        // Retrieve the initial state of the menu bar from localStorage
        var isCollapsed = localStorage.getItem('menuCollapsed');

        // If the menu state is collapsed, apply the corresponding classes
        if (isCollapsed === 'true') {
            $('.main-page').addClass('collapse-mainpage');
            $('.text-truncate').addClass('hide-text');
            $('.menu-toggle').addClass('small');
            $('#layout-menu').addClass('collapse-sidebar');
            $('#collapse-nav-chevron-left-icon').addClass('rotate-right');
            $('.menu-link').addClass('small-menu-link');
            // Update the state of the menu bar in localStorage
            if ($('#layout-menu').hasClass('collapse-sidebar')) {
                localStorage.setItem('menuCollapsed', 'true');
                $('.menu-toggle').siblings('.menu-sub').slideUp('fast');
            } else {
                localStorage.setItem('menuCollapsed', 'false');
                var menu_item_with_active = $('.menu-item.active');
                var menu_link_a_tag = menu_item_with_active.find('.menu-link.menu-toggle');
                var menu_sub = menu_link_a_tag.siblings('.menu-sub');
                menu_sub.slideToggle('fast');
            }
        }

        // Toggle function for the menu bar
        $('#toggle-nav').click(function() {
            // Toggle classes for menu elements
            $('.main-page').toggleClass('collapse-mainpage');
            $('.text-truncate').toggleClass('hide-text');
            $('.menu-toggle').toggleClass('small');
            $('#layout-menu').toggleClass('collapse-sidebar');
            $('#collapse-nav-chevron-left-icon').toggleClass('rotate-right');
            $('.menu-link').toggleClass('small-menu-link');
            // Update the state of the menu bar in localStorage
            if ($('#layout-menu').hasClass('collapse-sidebar')) {
                localStorage.setItem('menuCollapsed', 'true');
                $('.menu-toggle').siblings('.menu-sub').slideUp('fast');
            } else {
                localStorage.setItem('menuCollapsed', 'false');
                var menu_item_with_active = $('.menu-item.active');
                var menu_link_a_tag = menu_item_with_active.find('.menu-link.menu-toggle');
                var menu_sub = menu_link_a_tag.siblings('.menu-sub');
                menu_sub.slideToggle('fast');
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        // CSRF Token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
</script>
