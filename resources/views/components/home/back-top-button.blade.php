<!-- Implement the Back Top Top Button -->
<button id="to-top-button" onclick="goToTop()" title="Go To Top"
        class="hidden fixed z-[1000] bottom-8 right-8 border-0 w-16 h-16 rounded-full drop-shadow-md bg-green-700 text-white text-3xl font-bold">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
         class="w-6 h-6 mx-auto font-bold">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l7.5-7.5 7.5 7.5m-15 6l7.5-7.5 7.5 7.5" />
    </svg>
    <!-- Javascript code -->
    <script>
        var toTopButton = document.getElementById("to-top-button");

        // When the user scrolls down 200px from the top of the document, show the button
        window.onscroll = function () {
            if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
                toTopButton.classList.remove("hidden");
            } else {
                toTopButton.classList.add("hidden");
            }
        }
        // When the user clicks on the button, smoothy scroll to the top of the document
        function goToTop() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    </script>
</button>