<script src=" https://kit.fontawesome.com/d3336582c4.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>


<script>
    $(function() {
        $("#sidebarResize").on('click', function() {

            let content = $('#content')
            if ($('#sidebar').hasClass('w-64')) {

                $('#sidebar').removeClass('w-64');
                $('#sidebar').addClass('w-24');
                content.animate({
                    marginLeft: '6rem'
                }, 300);

                $('.title-menu').hide();

                // Change the icon to point right
                $(this).find('i').removeClass('fa-chevron-left').addClass('fa-chevron-right');
            } else {
                // If it doesn't, add the class and show the menu titles

                $('#sidebar').removeClass('w-24');
                $('#sidebar').addClass('w-64');
                content.animate({
                    marginLeft: '16rem'
                }, 300);
                $('.title-menu').show();

                // Change the icon to point left
                $(this).find('i').removeClass('fa-chevron-right').addClass('fa-chevron-left');
            }
        })
    })
</script>


<script>
    document.getElementById('splash-screen').addEventListener('animationend', () => {
        console.log('Animation ended');
        document.body.classList.remove('overflow-hidden');
    });
</script>
