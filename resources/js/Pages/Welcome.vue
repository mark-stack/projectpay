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
</script>

<template>
    <Head title="Welcome" />

    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white"
    >
        <div v-if="canLogin" class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
            <Link
                v-if="$page.props.user"
                :href="route('dashboard')"
                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                >Dashboard</Link
            >

            <template v-else>
                <Link
                    :href="route('login')"
                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                >
                  Log in
                </Link>

                <Link
                    v-if="canRegister"
                    :href="route('register')"
                    class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                >
                  Register
                </Link>
            </template>
        </div>

        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="text-center">
                <h2 class="mt-6 text-2xl font-semibold text-gray-900 dark:text-white">
                    Live Laravel+Vue3 Demo
                </h2>
            </div>
            <div class="mt-16">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                    <div class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                        <div>
                            <div class="grid grid-cols-1 md:grid-cols-1">
                              <div>
                                <h3 class="font-bold">What is it?</h3>
                                <p class="leading-relaxed">
                                  A live demo to show the essentials of a Laravel + Vue application.
                                </p>
                              </div>
                              <div class="mt-3">
                                <h3 class="font-bold">What does it do?</h3>
                                <p class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                    <ul class="ml-3">
                                        <li>
                                            <i class="fa-regular fa-hand-point-right"></i> 
                                            It has Users who can be <b>Project Owners</b> or <b>Contractors</b>. 
                                            Project Owners add projects, and Contractors add a company. 
                                        </li>
                                        <li>
                                            <i class="fa-regular fa-hand-point-right"></i> 
                                            3 Roles are already generated (Admin, Project Owner, Contractor), but you can register new people.
                                        </li>
                                        <li>
                                            <i class="fa-regular fa-hand-point-right"></i> 
                                            Admin can see all <b>Users</b>, <b>Projects</b>, and <b>Companies</b>. Admin can edit, delete, and login as a user.
                                        </li>
                                    </ul>
                                </p>
                              </div>
                              <div class="mt-3">
                                <h3 class="font-bold">Screen recording walkthroughs</h3>
                                <p class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                  <ul class="ml-3">
                                    <span class="text-gray-500">
                                        Note my screen recording software makes the app run slower than actual.
                                    </span>
                                    <li>
                                        <i class="fa-regular fa-hand-point-right"></i>
                                        <a href="https://watch.screencastify.com/v/kNvTE6KyRIfXtngb4w2O" target="_blank" class="text-blue-500 underline font-bold">
                                            Admin login
                                        </a>
                                    </li>
                                    <li><i class="fa-regular fa-hand-point-right"></i>
                                        <a href="https://watch.screencastify.com/v/OVSUvpzdXb96JVcbUcq3" target="_blank" class="text-blue-500 underline font-bold">
                                            Logins
                                        </a>
                                    </li>
                                    <li><i class="fa-regular fa-hand-point-right"></i>
                                        <a href="https://watch.screencastify.com/v/TUy2OnvM3J0U8vvzVJLm" target="_blank" class="text-blue-500 underline font-bold">
                                            Registrations
                                        </a>       
                                    </li>
                                  </ul>
                                </p>
                              </div>
                            </div>
                        </div>
                    </div>

                    <div class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                        <div>
                            <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">
                                Stack
                            </h2>

                            <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                <ul class="ml-3">
                                    <li>
                                        <i class="fa-regular fa-hand-point-right"></i> 
                                        Backend: <b>Laravel 10</b>
                                    </li>
                                    <li>
                                        <i class="fa-regular fa-hand-point-right"></i> 
                                        CSS: <b>Tailwind</b>
                                    </li>
                                    <li>
                                        <i class="fa-regular fa-hand-point-right"></i> 
                                        Frontend: <b>Vue 3</b> (with Inertia)
                                    </li>
                                    <li>
                                        <i class="fa-regular fa-hand-point-right"></i> 
                                        Asset bundler: <b>Vite</b>
                                    </li>
                                    <li>
                                        <i class="fa-regular fa-hand-point-right"></i> 
                                        Database: <b>Mysql</b>
                                    </li>
                                    <li>
                                        <i class="fa-regular fa-hand-point-right"></i> 
                                        Server: <b>nginx</b>
                                    </li>
                                    <li>
                                        <i class="fa-regular fa-hand-point-right"></i> 
                                        Host: <b>AWS EC2</b>
                                    </li>
                                    <li>
                                        <i class="fa-regular fa-hand-point-right"></i> 
                                        Deployment: <b>Forge</b>
                                    </li>
                                </ul>
                            </p>
                            <div class="mt-10">
                                <h2 class="mt-6 mb-3 text-xl font-semibold text-gray-900 dark:text-white">
                                    Source Files
                                </h2>
                                <a href="https://github.com/mark-stack/projectpay" class="rounded-lg px-4 py-2 border-2 border-green-700 text-green-700 hover:bg-green-700 hover:text-green-100 duration-300">
                                    <i class="fa-brands fa-github"></i> Github Repo
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                        <div>

                            <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Features/Design standards</h2>

                            <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                <ul class="ml-3">
                                    <li>
                                        <i class="fa-regular fa-hand-point-right"></i> 
                                        CRUD (Create, Read, Update, Delete). 
                                    </li>
                                    <li>
                                        <i class="fa-regular fa-hand-point-right"></i> 
                                        Roles & Permissions (guarded at Model, View & Controller level)
                                    </li>
                                    <li>
                                        <i class="fa-regular fa-hand-point-right"></i> 
                                        Api Resources.
                                    </li>
                                    <li>
                                        <i class="fa-regular fa-hand-point-right"></i> 
                                        Form Requests.
                                    </li>
                                    <li>
                                        <i class="fa-regular fa-hand-point-right"></i> 
                                        Typed functions
                                    </li>
                                    <li>
                                        <i class="fa-regular fa-hand-point-right"></i> 
                                        Pagination
                                    </li>
                                    <li>
                                        <i class="fa-regular fa-hand-point-right"></i> 
                                        Relationships
                                    </li>
                                </ul>
                            </p>
                        </div>
                    </div>

                    <div class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                        <div>
                            <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">What a full app would feature:</h2>
                            <p class="mt-4 leading-relaxed">
                                This simplified demo skips a lot of things that go into a commerical web app:
                                <ul class="ml-3">
                                    <li>
                                        <i class="fa-regular fa-hand-point-right"></i> 
                                        LOTS of automatic tests (100s, sometimes 1000s)
                                    </li>
                                    <li>
                                        <i class="fa-regular fa-hand-point-right"></i> 
                                        User onboarding
                                    </li>
                                    <li>
                                        <i class="fa-regular fa-hand-point-right"></i> 
                                        More UI feedback:
                                        <ul class="ml-3">
                                            <li>
                                                <i class="fa-regular fa-hand-point-right"></i> 
                                                Processing buttons that lock until complete
                                            </li>
                                            <li>
                                                <i class="fa-regular fa-hand-point-right"></i> 
                                                Bread crumbs
                                            </li>
                                            <li>
                                                <i class="fa-regular fa-hand-point-right"></i> 
                                                Toast notifications
                                            </li>
                                            <li>
                                                <i class="fa-regular fa-hand-point-right"></i> 
                                                Placeholder UI whilst loading actual content
                                            </li>
                                            <li>
                                                <i class="fa-regular fa-hand-point-right"></i> 
                                                Progress bars for image uploads etc
                                            </li>
                                            <li>
                                                <i class="fa-regular fa-hand-point-right"></i> 
                                                Flashed success messages
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <i class="fa-regular fa-hand-point-right"></i> 
                                        SEO built into frontend:
                                        <ul class="ml-3">
                                            <li>
                                                <i class="fa-regular fa-hand-point-right"></i> 
                                                Mindful headings (H1,H2,H3)
                                            </li>
                                            <li>
                                                <i class="fa-regular fa-hand-point-right"></i> 
                                                Meta tags
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <i class="fa-regular fa-hand-point-right"></i> 
                                        Performance enhancement:
                                        <ul class="ml-3">
                                            <li>
                                                <i class="fa-regular fa-hand-point-right"></i> 
                                                Optimizing CSS
                                            </li>
                                            <li>
                                                <i class="fa-regular fa-hand-point-right"></i> 
                                                'Tree shaking'
                                            </li>
                                            <li>
                                                <i class="fa-regular fa-hand-point-right"></i> 
                                                Lazy loading
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}
@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
</style>
