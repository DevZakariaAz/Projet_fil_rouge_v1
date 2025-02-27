<script setup lang="ts">
import DefaultLayout from '@/Layouts/AuthenticatedLayout2.vue';
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from '@/Components/ui/card'
</script>

<template>
    <DefaultLayout>
            <div class="grid gap-4 md:gap-8 lg:grid-cols-2 xl:grid-cols-3">
                <Card
                    class="bg-teal-500 text-white shadow-md hover:bg-teal-600 hover:text-gray-200 hover:shadow-lg"
                >
                    <CardHeader
                        class="flex flex-row items-center justify-between space-y-0 pb-2"
                    >
                        <CardTitle class="text-5xl font-bold"> 80 </CardTitle>
                        <Users class="h-20 w-20" />
                    </CardHeader>
                    <CardContent>
                        <span class="text-2xl font-bold"> Presents </span>
                    </CardContent>
                </Card>
                <Card
                    class="bg-yellow-500 text-white shadow-md hover:bg-yellow-600 hover:text-gray-200 hover:shadow-lg"
                >
                    <CardHeader
                        class="flex flex-row items-center justify-between space-y-0 pb-2"
                    >
                        <CardTitle class="text-5xl font-bold"> 9 </CardTitle>
                        <Users class="h-20 w-20" />
                    </CardHeader>
                    <CardContent>
                        <span class="text-2xl font-bold"> Retards </span>
                    </CardContent>
                </Card>
                <Card
                    class="bg-purple-500 text-white shadow-md hover:bg-purple-600 hover:text-gray-200 hover:shadow-lg"
                >
                    <CardHeader
                        class="flex flex-row items-center justify-between space-y-0 pb-2"
                    >
                        <CardTitle class="text-5xl font-bold"> 11 </CardTitle>
                        <Users class="h-20 w-20" />
                    </CardHeader>
                    <CardContent>
                        <span class="text-2xl font-bold"> Absents </span>
                    </CardContent>
                </Card>
            </div>
    </DefaultLayout>
</template>
