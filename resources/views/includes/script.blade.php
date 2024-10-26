<script src=" https://kit.fontawesome.com/d3336582c4.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
    integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>


<script>
    $(function() {
        $("#sidebarResize").on('click', function() {
            if ($('#sidebar').hasClass('w-64')) {
                // If it does, remove the class and hide the menu titles
                $(this).find('')
                $('#sidebar').removeClass('w-64');
                $('#sidebar').addClass('w-24');
                $('#content').removeClass('ml-64');
                $('#content').addClass('ml-24');
                $('.title-menu').hide();

                // Change the icon to point right
                $(this).find('i').removeClass('fa-chevron-left').addClass('fa-chevron-right');
            } else {
                // If it doesn't, add the class and show the menu titles
                $('#content').removeClass('ml-24');
                $('#sidebar').removeClass('w-24');
                $('#sidebar').addClass('w-64');
                $('#content').addClass('ml-64');
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
