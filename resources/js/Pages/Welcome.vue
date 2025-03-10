<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}
</script>

<template>
    <Head title="Welcome" />
    <div class="bg-gradient-to-r from-purple-400 via-pink-500 to-red-500 text-white">

        <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                    <div class="flex lg:justify-center lg:col-start-2">
                        <!-- Updated SVG Logo -->
                        <svg width="250" height="100" viewBox="0 0 250 100" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <!-- Circle Background -->
                            <circle cx="50" cy="50" r="40" fill="none" stroke="purple" stroke-width="4" />
                            <!-- M Shape -->
                            <polygon points="30,70 30,30 45,50 60,30 60,70" fill="pink" stroke="purple" stroke-width="4" />
                            <!-- J Shape -->
                            <line x1="70" y1="30" x2="70" y2="65" stroke="lightgreen" stroke-width="4" />
                            <path d="M70,65 Q70,80 55,80 Q40,80 40,65" stroke="lightgreen" stroke-width="4" fill="none" />
                            <!-- Text "Mishrajee" Styled Like Laravel -->
                            <text x="100" y="60" font-family="'Montserrat', sans-serif" font-size="28" fill="purple" font-weight="bold" letter-spacing="1">
                                Mishrajee
                            </text>
                        </svg>
                    </div>
                    <nav v-if="canLogin" class="-mx-3 flex flex-1 justify-end">
                        <Link
                            v-if="$page.props.auth.user"
                            :href="route('dashboard')"
                            class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-white/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Dashboard
                        </Link>

                        <template v-else>
                            <Link
                                :href="route('login')"
                                class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-white/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Log in
                            </Link>

                            <Link
                                v-if="canRegister"
                                :href="route('register')"
                                class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-white/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Register
                            </Link>
                        </template>
                    </nav>
                </header>

                <!-- Updated Content Section -->
                <main class="mt-10 flex flex-col items-center text-center">
                    <h1 class="text-4xl font-bold mb-4">Welcome to Mishrajee Life Management</h1>
                    <p class="text-lg mb-8">Your one-stop solution for managing daily life tasks, finances, learning, and more. Organize your life in the simplest way possible!</p>
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 text-white">
                        <div class="bg-blue-500 p-6 rounded-lg shadow-lg">
                            <h3 class="text-xl font-semibold mb-4">Manage Finances</h3>
                            <p>Track your income, expenses, loans, and bank details.</p>
                        </div>
                        <div class="bg-green-500 p-6 rounded-lg shadow-lg">
                            <h3 class="text-xl font-semibold mb-4">Personal Growth</h3>
                            <p>Learn new skills, explore knowledge, and track your progress.</p>
                        </div>
                        <div class="bg-yellow-500 p-6 rounded-lg shadow-lg">
                            <h3 class="text-xl font-semibold mb-4">Family & Birthdays</h3>
                            <p>Keep track of important dates and family information.</p>
                        </div>
                    </div>
                </main>

                <footer class="py-16 text-center text-sm text-white/70">
                    Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
                </footer>
            </div>
        </div>
    </div>
</template>
