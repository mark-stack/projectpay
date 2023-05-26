<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head } from '@inertiajs/vue3';
    import { Link } from '@inertiajs/vue3';
    import { router } from '@inertiajs/vue3';
    import { computed } from 'vue';
    import { usePage } from '@inertiajs/vue3';

    //Component imports
    import TableHeader from '@/Components/Table Components/TableHeader.vue';
    import TableDataType1 from '@/Components/Table Components/TableDataType1.vue';
    import TableDataType2 from '@/Components/Table Components/TableDataType2.vue';
    import TableDataType3 from '@/Components/Table Components/TableDataType3.vue';
    import Pagination from '@/Components/Pagination.vue';
    
    //Props
    defineProps({ projects: Object });

    //Shared data (https://inertiajs.com/shared-data#sharing-data)
    const roles = computed(() => usePage().props.rolesAndPermissions.roles)
    const isProjectOwner = Boolean(roles.value.includes('project_owner'));
    const isAdmin = Boolean(roles.value.includes('admin'));

    //Methods
    const destroy = (id) => {
        if(confirm("Are you sure?")){
            router.delete(route('projects.destroy',id), {
                preserveScroll: true
            })
        }
    }

</script>

<template>
    <Head title="Projects" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Projects</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
  
                    <div class="container mx-auto px-4 sm:px-8">
                        <div class="py-8">
                            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                                <div class="pt-2 pb-2">
                                    <Link v-if="isProjectOwner" :href="route('projects.create')" class="rounded-lg px-4 py-2 bg-blue-500 text-blue-100 hover:bg-blue-600 duration-300">
                                        New Project
                                    </Link>
                                </div>
                                <div class="mt-3 inline-block min-w-full shadow-md rounded-lg overflow-hidden">
                                    <table class="min-w-full leading-normal">
                                        <thead>
                                            <tr>
                                                <TableHeader text1="Project"/>
                                                <TableHeader text1="Description"/>
                                                <TableHeader text1="Contractor"/>
                                                <TableHeader text1="Date added"/>
                                                <TableHeader text1="Status"/>
                                                <TableHeader 
                                                    v-if="isAdmin || isProjectOwner"
                                                    text1="Actions"
                                                />
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <template v-for="project in projects.data" :key="project.id">
                                                <tr>
                                                    <TableDataType1 
                                                        :text1="project.project_name"
                                                        :text2="project.project_value_aud_dollars"
                                                    />
                                                    <TableDataType2 
                                                        :text1="project.description"
                                                    />
                                                    <TableDataType3 
                                                        v-if="project.contractor == null"
                                                        text1="None yet"
                                                        :success="false"
                                                    />
                                                    <TableDataType3 
                                                        v-else
                                                        :text1="project.contractor"
                                                        :success="null"
                                                    />
                                                    <TableDataType2 
                                                        :text1="project.created_at"
                                                    />
                                                    <TableDataType3 
                                                        text1="Incomplete"
                                                        :success="false"
                                                    />
                                                    <td 
                                                        v-if="isAdmin || isProjectOwner"
                                                        class="px-5 py-5 border-b border-gray-200 bg-white text-sm"
                                                    >
                                                        <Link :href="route('projects.edit',project)" as="button" type="button" class="rounded-lg px-2 py-1 bg-yellow-500 text-yellow-100 hover:bg-yellow-600 duration-300 mr-1">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </Link>
                                                        <button v-if="isAdmin" @click="destroy(project.id)" class="rounded-lg px-2 py-1 bg-red-600 text-red-100 hover:bg-red-700 duration-300">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </template>
                                        </tbody>
                                    </table>
                                    <pagination class="mt-6" :links="Object.entries(projects.links)"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>