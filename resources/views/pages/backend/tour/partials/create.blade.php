<x-backend-layout>
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-semibold text-slate-800">Create Tour</h1>

            <div class="text-sm sm:text-base">
                <ol class="list-none p-0 inline-flex space-x-2">
                    <li class="flex items-center">
                        <a href="/" class="text-gray-600 hover:text-blue-500 transition-colors duration-300">KAKA
                            TOUR</a>
                        <p class="ml-2">/</p>
                    </li>
                    <li class="flex items-center">
                        <a href="/tours"
                            class="text-gray-600 hover:text-blue-500 transition-colors duration-300">Tours</a>
                        <p class="ml-2">/</p>
                    </li>
                    <li class="flex items-center">
                        <p class="text-gray-800">Create</p>
                    </li>
                </ol>
            </div>
        </div>
    </div>

    <form action="{{ route('tour.store') }}" method="POST">
        @csrf
        <div class="flex flex-col gap-4">

            <div>
                <label for="name" class="label">Tour Name:</label>
                <input type="text" name="name" id="name" class="textInput" required>
            </div>

            <div>
                <label for="client" class="label">Client Name:</label>
                <input type="text" name="client" id="client" class="textInput" required>
            </div>

            <div>
                <label for="start_date" class="label">Start Date:</label>
                <input type="date" name="start_date" id="start_date" class="textInput" required>
            </div>

            <div>
                <label for="end_date" class="label">End Date:</label>
                <input type="date" name="end_date" id="end_date" class="textInput" required>
            </div>

            <div class="relative inline-block w-full text-gray-700">
                <label for="tata_tertib" class="label">Pilih Tata Tertib (Optional)</label>
                <div class="block bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5 cursor-pointer"
                    id="custom-tata-tertib-select">
                    <span id="selected-tata-tertib">-- Gunakan Tata Tertib Default --</span>
                </div>
                <div class="absolute z-10 w-full bg-white border border-gray-300 rounded-lg mt-1 hidden"
                    id="tata-tertib-options">
                    @foreach ($allTataTertib as $tataTertib)
                        <div class="p-2 hover:bg-gray-200 cursor-pointer" data-value="{{ $tataTertib->id }}">
                            {{ $tataTertib->title }}
                        </div>
                    @endforeach
                </div>
            </div>
            <input type="hidden" name="tata_tertib_id" id="tata_tertib_id">

            <div class="relative inline-block w-full text-gray-700">
                <label for="user" class="label">User:</label>
                <div class="block bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5 cursor-pointer"
                    id="custom-select">
                    <span id="selected-user">-- Select User --</span>
                </div>
                <div class="absolute z-10 w-full bg-white border border-gray-300 rounded-lg mt-1 hidden" id="options">
                    @foreach ($users as $user)
                        <div class="p-2 hover:bg-gray-200 cursor-pointer" data-value="{{ $user->id }}">
                            {{ $user->name }}
                        </div>
                    @endforeach
                </div>
            </div>
            <input type="hidden" name="user_id" id="user_id">
            <div>
                <label for="security_password" class="label">Pass Code:</label>
                <div class="relative">
                    <input type="password" name="security_password" id="security_password" class="textInput" required>
                    <span toggle="#security_password" class="absolute right-3 top-3 cursor-pointer" id="togglePassword">
                        👁️
                    </span>
                </div>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="button-primary w-[20%]">Create Tour</button>
            </div>
        </div>
    </form>


    @section('script')
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const togglePassword = document.getElementById("togglePassword");
                const passwordInput = document.getElementById("security_password");

                togglePassword.addEventListener("click", function() {
                    const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
                    passwordInput.setAttribute("type", type);

                    // Ubah ikon mata
                    this.innerText = type === "password" ? "👁️" : "🙈";
                });

                const customSelect = document.getElementById("custom-select");
                const optionsContainer = document.getElementById("options");
                const selectedUser = document.getElementById("selected-user");
                const hiddenInput = document.getElementById("user_id");

                // Toggle user options visibility
                customSelect.addEventListener("click", function() {
                    optionsContainer.classList.toggle("hidden");
                });

                // Select user
                optionsContainer.addEventListener("click", function(event) {
                    const value = event.target.dataset.value;
                    const name = event.target.innerText;

                    if (value) {
                        selectedUser.innerText = name;
                        hiddenInput.value = value;
                    }

                    optionsContainer.classList.add("hidden");
                });

                // Prevent form submit if user is not selected
                document.querySelector("form").addEventListener("submit", function(event) {
                    if (!hiddenInput.value) {
                        alert('Please select a user.');
                        event.preventDefault(); // Stop form from submitting
                    }
                });

                // Tata Tertib selection
                const customTataTertibSelect = document.getElementById("custom-tata-tertib-select");
                const tataTertibOptionsContainer = document.getElementById("tata-tertib-options");
                const selectedTataTertib = document.getElementById("selected-tata-tertib");
                const hiddenTataTertibInput = document.getElementById("tata_tertib_id");

                // Toggle tata tertib options visibility
                customTataTertibSelect.addEventListener("click", function() {
                    tataTertibOptionsContainer.classList.toggle("hidden");
                });

                // Select tata tertib
                tataTertibOptionsContainer.addEventListener("click", function(event) {
                    const value = event.target.dataset.value;
                    const name = event.target.innerText;

                    if (value) {
                        selectedTataTertib.innerText = name;
                        hiddenTataTertibInput.value = value;
                    }

                    tataTertibOptionsContainer.classList.add("hidden");
                });
            });
        </script>
    @endsection
</x-backend-layout>
