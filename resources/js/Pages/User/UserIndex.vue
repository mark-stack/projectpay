<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head } from '@inertiajs/vue3';
    import { Link } from '@inertiajs/vue3';
    import { computed } from 'vue';
    import { usePage } from '@inertiajs/vue3';

    //Component imports
    import TableHeader from '@/Components/Table Components/TableHeader.vue';
    import TableDataType1 from '@/Components/Table Components/TableDataType1.vue';
    import TableDataType2 from '@/Components/Table Components/TableDataType2.vue';
    import Pagination from '@/Components/Pagination.vue';

    //Props
    const props = defineProps({ 
        users: Object
    })

    //Shared data (https://inertiajs.com/shared-data#sharing-data)
    const thisUser = computed(() => usePage().props.user)

</script>

<template>
    <Head title="Users" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Users</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="container mx-auto px-4 sm:px-8">
                        <div class="py-8">
                            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                                <div class="mt-3 inline-block min-w-full shadow-md rounded-lg overflow-hidden">
                                    <table class="min-w-full leading-normal">
                                        <thead>
                                            <tr>
                                                <TableHeader text1="Name"/>
                                                <TableHeader text1="Date added"/>
                                                <TableHeader text1="Login"/>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <template v-for="user in users.data" :key="user.id">
                                                <tr>
                                                    <TableDataType1 
                                                        :text1="user.name"
                                                        :text2="user.email"
                                                    />
                                                    <TableDataType2 
                                                        :text1="user.created_at"
                                                    />
                                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                        <Link v-if="user.id != thisUser.id" :href="route('admin.login.as.user',user.id)" as="button" type="button" class="rounded-lg px-2 py-1 bg-green-500 text-green-100 hover:bg-green-600 duration-300 mr-1">
                                                            Login
                                                        </Link>
                                                    </td>
                                                </tr>
                                            </template>
                                        </tbody>
                                    </table>
                                    <pagination class="mt-6" :links="Object.entries(users.links)" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>