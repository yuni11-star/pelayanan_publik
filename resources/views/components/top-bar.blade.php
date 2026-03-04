<!-- Top Bar Component -->
<div class="bg-navy text-white py-2">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center text-sm">
            <!-- Left Side: Real-time Date and Day -->
            <div class="flex items-center">
                <span id="currentDateTime" class="font-medium">
                    <!-- Date will be populated by JavaScript -->
                </span>
            </div>

            <!-- Right Side: Social Media Icons -->
            <div class="flex items-center space-x-3">
                <a href="#" class="w-8 h-8 bg-white bg-opacity-20 rounded-full flex items-center justify-center hover:bg-opacity-30 transition-all duration-200" aria-label="Facebook">
                    <i class="fab fa-facebook-f text-sm"></i>
                </a>
                <a href="#" class="w-8 h-8 bg-white bg-opacity-20 rounded-full flex items-center justify-center hover:bg-opacity-30 transition-all duration-200" aria-label="Instagram">
                    <i class="fab fa-instagram text-sm"></i>
                </a>
                <a href="#" class="w-8 h-8 bg-white bg-opacity-20 rounded-full flex items-center justify-center hover:bg-opacity-30 transition-all duration-200" aria-label="YouTube">
                    <i class="fab fa-youtube text-sm"></i>
                </a>
                <a href="#" class="w-8 h-8 bg-white bg-opacity-20 rounded-full flex items-center justify-center hover:bg-opacity-30 transition-all duration-200" aria-label="Twitter">
                    <i class="fab fa-twitter text-sm"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    function updateDateTime() {
        const now = new Date();
        const days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

        const dayName = days[now.getDay()];
        const day = now.getDate();
        const monthName = months[now.getMonth()];
        const year = now.getFullYear();

        const formattedDate = `${dayName}, ${day} ${monthName} ${year}`;
        document.getElementById('currentDateTime').textContent = formattedDate;
    }

    // Update immediately and then every second
    updateDateTime();
    setInterval(updateDateTime, 1000);
</script>
