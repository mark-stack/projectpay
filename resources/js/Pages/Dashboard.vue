<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head } from '@inertiajs/vue3';
    import { computed } from 'vue';
    import { usePage } from '@inertiajs/vue3';
    import { Link } from '@inertiajs/vue3';

    //Props
    const props = defineProps({
        company: Object,
        clientProjects: Object,
        myProjectsCount: Number
    })

    //Shared data (https://inertiajs.com/shared-data#sharing-data)
    const user = computed(() => usePage().props.user)
    const roles = computed(() => usePage().props.rolesAndPermissions.roles)
    const isAdmin = Boolean(roles.value.includes('admin'));
    const isProjectOwner = Boolean(roles.value.includes('project_owner'));
    const isContractor = Boolean(roles.value.includes('contractor'));

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div v-if="isAdmin">
                        <div class="p-6 text-gray-900">Admin Dashboard</div>
                    </div>
                    <div v-if="isProjectOwner">
                        <div v-if="props.myProjectsCount === 0" class="p-6 text-gray-900">
                            You have no projects.
                            <br><br>
                            <Link :href="route('projects.create')" class="rounded-lg px-4 py-2 bg-blue-500 text-blue-100 hover:bg-blue-600 duration-300">
                                Create project
                            </Link>
                        </div>
                        <div v-else class="p-6 text-gray-900">
                            You have {{ props.myProjectsCount }} projects.
                            <br><br>
                            <Link :href="route('projects.index')" class="rounded-lg px-4 py-2 bg-blue-500 text-blue-100 hover:bg-blue-600 duration-300">
                                See Projects
                            </Link>
                        </div>
                    </div>
                    <div v-if="isContractor">
                        <div v-if="props.company == null" class="p-6 text-gray-900">
                            You have no company setup yet.
                            <br><br>
                            <Link :href="route('companies.create')" class="rounded-lg px-4 py-2 bg-blue-500 text-blue-100 hover:bg-blue-600 duration-300">
                                Create Company
                            </Link>
                        </div>
                        <div v-else class="p-6 text-gray-900">
                            <h2 class="text-xl font-bold">{{ props.company.company_name }}</h2>
                            <b>Email: </b>{{ props.company.company_name }}.<br>
                            <b>Address: </b>{{ props.company.address }}.<br>
                            <b>Website: </b>{{ props.company.website }}.<br>
                            <br>
                            <Link :href="route('companies.edit',company)" class="rounded-lg px-4 py-2 bg-blue-500 text-blue-100 hover:bg-blue-600 duration-300">
                                Edit Company
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
