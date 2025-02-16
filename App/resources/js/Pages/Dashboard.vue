<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

import { Avatar, AvatarFallback, AvatarImage } from '@/Components/ui/avatar';
import { Badge } from '@/Components/ui/badge';
import { Button } from '@/Components/ui/button';
import {
    Card,
    CardContent,
    CardDescription,
    CardHeader,
    CardTitle,
} from '@/Components/ui/card';
import {
    Table,
    TableBody,
    TableCell,
    TableHead,
    TableHeader,
    TableRow,
} from '@/Components/ui/table';
import { ArrowUpRight, Users } from 'lucide-vue-next';
</script>

<template>
    <AuthenticatedLayout>
        <div class="grid gap-4 md:grid-cols-2 md:gap-8 lg:grid-cols-4">
            <Card
                class="bg-blue-500 text-white shadow-md hover:bg-blue-600 hover:text-gray-200 hover:shadow-lg"
            >
                <CardHeader
                    class="flex flex-row items-center justify-between space-y-0 pb-2"
                >
                    <CardTitle class="text-5xl font-bold"> 400 </CardTitle>
                    <Users class="h-20 w-20" />
                </CardHeader>
                <CardContent>
                    <span class="text-2xl font-bold"> Les Inscrits </span>
                </CardContent>
            </Card>
            <Card
                class="bg-green-500 text-white shadow-md hover:bg-green-600 hover:text-gray-300 hover:shadow-lg"
            >
                <CardHeader
                    class="flex flex-row items-center justify-between space-y-0 pb-2"
                >
                    <CardTitle class="text-5xl font-bold"> 75 </CardTitle>
                    <Users class="h-20 w-20" />
                </CardHeader>
                <CardContent>
                    <span class="text-2xl font-bold"> Acceptés </span>
                </CardContent>
            </Card>
            <Card
                class="bg-orange-400 text-white shadow-md hover:bg-orange-500 hover:text-gray-300 hover:shadow-lg"
            >
                <CardHeader
                    class="flex flex-row items-center justify-between space-y-0 pb-2"
                >
                    <CardTitle class="text-5xl font-bold"> 200 </CardTitle>
                    <Users class="h-20 w-20" />
                </CardHeader>
                <CardContent>
                    <span class="text-2xl font-bold"> En Attente </span>
                </CardContent>
            </Card>
            <Card
                class="bg-red-500 text-white shadow-md hover:bg-red-600 hover:text-gray-300 hover:shadow-lg"
            >
                <CardHeader
                    class="flex flex-row items-center justify-between space-y-0 pb-2"
                >
                    <CardTitle class="text-5xl font-bold"> 100 </CardTitle>
                    <Users class="h-20 w-20" />
                </CardHeader>
                <CardContent>
                    <span class="text-2xl font-bold"> Refusés </span>
                </CardContent>
            </Card>
        </div>
        <div class="grid gap-4 md:gap-8 lg:grid-cols-2 xl:grid-cols-3">
            <Card class="xl:col-span-2">
                <CardHeader class="flex flex-row items-center">
                    <div class="grid gap-2">
                        <CardTitle>Transactions</CardTitle>
                        <CardDescription>
                            Recent transactions from your store.
                        </CardDescription>
                    </div>
                    <Button as-child size="sm" class="ml-auto gap-1">
                        <a href="#">
                            View All
                            <ArrowUpRight class="h-4 w-4" />
                        </a>
                    </Button>
                </CardHeader>
                <CardContent>
                    <Table>
                        <TableHeader>
                            <TableRow>
                                <TableHead>Customer</TableHead>
                                <TableHead class="hidden xl:table-column">
                                    Type
                                </TableHead>
                                <TableHead class="hidden xl:table-column">
                                    Status
                                </TableHead>
                                <TableHead class="hidden xl:table-column">
                                    Date
                                </TableHead>
                                <TableHead class="text-right">
                                    Amount
                                </TableHead>
                            </TableRow>
                        </TableHeader>
                        <TableBody>
                            <TableRow>
                                <TableCell>
                                    <div class="font-medium">Liam Johnson</div>
                                    <div
                                        class="hidden text-sm text-muted-foreground md:inline"
                                    >
                                        liam@example.com
                                    </div>
                                </TableCell>
                                <TableCell class="hidden xl:table-column">
                                    Sale
                                </TableCell>
                                <TableCell class="hidden xl:table-column">
                                    <Badge class="text-xs" variant="outline">
                                        Approved
                                    </Badge>
                                </TableCell>
                                <TableCell
                                    class="hidden md:table-cell lg:hidden xl:table-column"
                                >
                                    2023-06-23
                                </TableCell>
                                <TableCell class="text-right">
                                    $250.00
                                </TableCell>
                            </TableRow>
                            <TableRow>
                                <TableCell>
                                    <div class="font-medium">Olivia Smith</div>
                                    <div
                                        class="hidden text-sm text-muted-foreground md:inline"
                                    >
                                        olivia@example.com
                                    </div>
                                </TableCell>
                                <TableCell class="hidden xl:table-column">
                                    Refund
                                </TableCell>
                                <TableCell class="hidden xl:table-column">
                                    <Badge class="text-xs" variant="outline">
                                        Declined
                                    </Badge>
                                </TableCell>
                                <TableCell
                                    class="hidden md:table-cell lg:hidden xl:table-column"
                                >
                                    2023-06-24
                                </TableCell>
                                <TableCell class="text-right">
                                    $150.00
                                </TableCell>
                            </TableRow>
                            <TableRow>
                                <TableCell>
                                    <div class="font-medium">Noah Williams</div>
                                    <div
                                        class="hidden text-sm text-muted-foreground md:inline"
                                    >
                                        noah@example.com
                                    </div>
                                </TableCell>
                                <TableCell class="hidden xl:table-column">
                                    Subscription
                                </TableCell>
                                <TableCell class="hidden xl:table-column">
                                    <Badge class="text-xs" variant="outline">
                                        Approved
                                    </Badge>
                                </TableCell>
                                <TableCell
                                    class="hidden md:table-cell lg:hidden xl:table-column"
                                >
                                    2023-06-25
                                </TableCell>
                                <TableCell class="text-right">
                                    $350.00
                                </TableCell>
                            </TableRow>
                            <TableRow>
                                <TableCell>
                                    <div class="font-medium">Emma Brown</div>
                                    <div
                                        class="hidden text-sm text-muted-foreground md:inline"
                                    >
                                        emma@example.com
                                    </div>
                                </TableCell>
                                <TableCell class="hidden xl:table-column">
                                    Sale
                                </TableCell>
                                <TableCell class="hidden xl:table-column">
                                    <Badge class="text-xs" variant="outline">
                                        Approved
                                    </Badge>
                                </TableCell>
                                <TableCell
                                    class="hidden md:table-cell lg:hidden xl:table-column"
                                >
                                    2023-06-26
                                </TableCell>
                                <TableCell class="text-right">
                                    $450.00
                                </TableCell>
                            </TableRow>
                            <TableRow>
                                <TableCell>
                                    <div class="font-medium">Liam Johnson</div>
                                    <div
                                        class="hidden text-sm text-muted-foreground md:inline"
                                    >
                                        liam@example.com
                                    </div>
                                </TableCell>
                                <TableCell class="hidden xl:table-column">
                                    Sale
                                </TableCell>
                                <TableCell class="hidden xl:table-column">
                                    <Badge class="text-xs" variant="outline">
                                        Approved
                                    </Badge>
                                </TableCell>
                                <TableCell
                                    class="hidden md:table-cell lg:hidden xl:table-column"
                                >
                                    2023-06-27
                                </TableCell>
                                <TableCell class="text-right">
                                    $550.00
                                </TableCell>
                            </TableRow>
                        </TableBody>
                    </Table>
                </CardContent>
            </Card>
            <Card>
                <CardHeader>
                    <CardTitle>Recent Sales</CardTitle>
                </CardHeader>
                <CardContent class="grid gap-8">
                    <div class="flex items-center gap-4">
                        <Avatar class="hidden h-9 w-9 sm:flex">
                            <AvatarImage src="/avatars/01.png" alt="Avatar" />
                            <AvatarFallback>OM</AvatarFallback>
                        </Avatar>
                        <div class="grid gap-1">
                            <p class="text-sm font-medium leading-none">
                                Olivia Martin
                            </p>
                            <p class="text-sm text-muted-foreground">
                                olivia.martin@email.com
                            </p>
                        </div>
                        <div class="ml-auto font-medium">+$1,999.00</div>
                    </div>
                    <div class="flex items-center gap-4">
                        <Avatar class="hidden h-9 w-9 sm:flex">
                            <AvatarImage src="/avatars/02.png" alt="Avatar" />
                            <AvatarFallback>JL</AvatarFallback>
                        </Avatar>
                        <div class="grid gap-1">
                            <p class="text-sm font-medium leading-none">
                                Jackson Lee
                            </p>
                            <p class="text-sm text-muted-foreground">
                                jackson.lee@email.com
                            </p>
                        </div>
                        <div class="ml-auto font-medium">+$39.00</div>
                    </div>
                    <div class="flex items-center gap-4">
                        <Avatar class="hidden h-9 w-9 sm:flex">
                            <AvatarImage src="/avatars/03.png" alt="Avatar" />
                            <AvatarFallback>IN</AvatarFallback>
                        </Avatar>
                        <div class="grid gap-1">
                            <p class="text-sm font-medium leading-none">
                                Isabella Nguyen
                            </p>
                            <p class="text-sm text-muted-foreground">
                                isabella.nguyen@email.com
                            </p>
                        </div>
                        <div class="ml-auto font-medium">+$299.00</div>
                    </div>
                    <div class="flex items-center gap-4">
                        <Avatar class="hidden h-9 w-9 sm:flex">
                            <AvatarImage src="/avatars/04.png" alt="Avatar" />
                            <AvatarFallback>WK</AvatarFallback>
                        </Avatar>
                        <div class="grid gap-1">
                            <p class="text-sm font-medium leading-none">
                                William Kim
                            </p>
                            <p class="text-sm text-muted-foreground">
                                will@email.com
                            </p>
                        </div>
                        <div class="ml-auto font-medium">+$99.00</div>
                    </div>
                    <div class="flex items-center gap-4">
                        <Avatar class="hidden h-9 w-9 sm:flex">
                            <AvatarImage src="/avatars/05.png" alt="Avatar" />
                            <AvatarFallback>SD</AvatarFallback>
                        </Avatar>
                        <div class="grid gap-1">
                            <p class="text-sm font-medium leading-none">
                                Sofia Davis
                            </p>
                            <p class="text-sm text-muted-foreground">
                                sofia.davis@email.com
                            </p>
                        </div>
                        <div class="ml-auto font-medium">+$39.00</div>
                    </div>
                </CardContent>
            </Card>
        </div>
    </AuthenticatedLayout>
</template>
