<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head } from '@inertiajs/vue3';
    import { Link } from '@inertiajs/vue3';
    import { router } from '@inertiajs/vue3';

    //Component imports
    import TableHeader from '@/Components/Table Components/TableHeader.vue';
    import TableDataType1 from '@/Components/Table Components/TableDataType1.vue';
    import TableDataType2 from '@/Components/Table Components/TableDataType2.vue';
    import TableDataType3 from '@/Components/Table Components/TableDataType3.vue';
    import Pagination from '@/Components/Pagination.vue';

    //Props
    defineProps({ 
        companies: Object
    })

    //Methods
    const destroy = (id) => {
        if(confirm("Are you sure?")){
            router.delete(route('companies.destroy',id), {
                preserveScroll: true
            })
        }
    }

</script>

<template>
    <Head title="Companies" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Companies</h2>
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
                                                <TableHeader text1="Company"/>
                                                <TableHeader text1="Website"/>
                                                <TableHeader text1="Date added"/>
                                                <TableHeader text1="Project Qty"/>
                                                <TableHeader text1="Actions"/>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <template v-for="company in companies.data" :key="company.id">
                                                <tr>
                                                    <TableDataType1 
                                                        :text1="company.company_name"
                                                        :text2="company.company_email"
                                                    />
                                                    <TableDataType2 
                                                        :text1="company.website"
                                                    />
                                                    <TableDataType2 
                                                        :text1="company.created_at"
                                                    />
                                                    <TableDataType3 
                                                        v-if="company.active_projects_qty == 0"
                                                        text1="None"
                                                        :success="false"
                                                    />
                                                    <TableDataType3 
                                                        v-else
                                                        :text1="company.active_projects_qty.toString()"
                                                        :success="true"
                                                    />
                                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                        <Link :href="route('companies.edit',company)" as="button" type="button" class="rounded-lg px-2 py-1 bg-yellow-500 text-yellow-100 hover:bg-yellow-600 duration-300 mr-1">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </Link>
                                                        <button @click="destroy(company.id)" class="rounded-lg px-2 py-1 bg-red-600 text-red-100 hover:bg-red-700 duration-300">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </template>
                                        </tbody>
                                    </table>
                                    <pagination class="mt-6" :links="Object.entries(companies.links)"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>