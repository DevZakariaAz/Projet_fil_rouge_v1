<script setup>
import { Link } from '@inertiajs/vue3';
import {
    Breadcrumb,
    BreadcrumbItem,
    BreadcrumbLink,
    BreadcrumbList,
} from '@/Components/ui/breadcrumb';
import { Button } from '@/Components/ui/button';
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuLabel,
    DropdownMenuSeparator,
    DropdownMenuTrigger,
} from '@/Components/ui/dropdown-menu';
import { Sheet, SheetContent, SheetTrigger } from '@/Components/ui/sheet';
import {
    Tooltip,
    TooltipProvider,
    TooltipContent,
    TooltipTrigger,
} from '@/Components/ui/tooltip';
import {
    CircleUser,
    Home,
    Package2,
    PanelLeft,
    Settings,
} from 'lucide-vue-next';
</script>

<template>
    <div class="flex min-h-screen w-full flex-col bg-gray-100">
        <aside
            class="fixed inset-y-0 left-0 z-10 hidden w-14 flex-col border-r bg-background sm:flex"
        >
            <nav class="flex flex-col items-center gap-4 px-2 sm:py-5">
                <a
                    href="#"
                    class="group flex h-9 w-9 shrink-0 items-center justify-center gap-2 rounded-full bg-primary text-lg font-semibold text-primary-foreground md:h-8 md:w-8 md:text-base"
                >
                    <Package2
                        class="h-4 w-4 transition-all group-hover:scale-110"
                    />
                    <span class="sr-only">Soli-LMS</span>
                </a>
                <TooltipProvider>
                    <Tooltip>
                        <TooltipTrigger as-child>
                            <a
                                href="#"
                                class="flex h-9 w-9 items-center justify-center rounded-lg bg-accent text-accent-foreground transition-colors hover:text-foreground md:h-8 md:w-8"
                            >
                                <Home class="h-5 w-5" />
                                <span class="sr-only">Dashboard</span>
                            </a>
                        </TooltipTrigger>
                        <TooltipContent side="right">
                            Dashboard
                        </TooltipContent>
                    </Tooltip>
                </TooltipProvider>
            </nav>
            <nav class="mt-auto flex flex-col items-center gap-4 px-2 sm:py-5">
                <TooltipProvider>
                    <Tooltip>
                        <TooltipTrigger as-child>
                            <a
                                href="#"
                                class="flex h-9 w-9 items-center justify-center rounded-lg text-muted-foreground transition-colors hover:text-foreground md:h-8 md:w-8"
                            >
                                <Settings class="h-5 w-5" />
                                <span class="sr-only">Settings</span>
                            </a>
                        </TooltipTrigger>
                        <TooltipContent side="right"> Settings </TooltipContent>
                    </Tooltip>
                </TooltipProvider>
            </nav>
        </aside>
        <div class="flex flex-col sm:gap-4 sm:py-4 sm:pl-14">
            <header
                class="sticky top-0 z-30 flex h-14 items-center gap-4 border-b bg-background px-4 sm:static sm:h-auto sm:border-0 sm:bg-transparent sm:px-6"
            >
                <Sheet>
                    <SheetTrigger as-child>
                        <Button size="icon" variant="outline" class="sm:hidden">
                            <PanelLeft class="h-5 w-5" />
                            <span class="sr-only">Toggle Menu</span>
                        </Button>
                    </SheetTrigger>
                    <SheetContent side="left" class="sm:max-w-xs">
                        <nav class="grid gap-6 text-lg font-medium">
                            <a
                                href="#"
                                class="group flex h-10 w-10 shrink-0 items-center justify-center gap-2 rounded-full bg-primary text-lg font-semibold text-primary-foreground md:text-base"
                            >
                                <Package2
                                    class="h-5 w-5 transition-all group-hover:scale-110"
                                />
                                <span class="sr-only">Soli-LMS</span>
                            </a>
                            <a
                                href="#"
                                class="flex items-center gap-4 px-2.5 text-foreground"
                            >
                                <Home class="h-5 w-5" />
                                Tableau De Bord
                            </a>
                            <a
                                href="#"
                                class="flex items-center gap-4 px-2.5 text-muted-foreground hover:text-foreground"
                            >
                                <Settings class="h-5 w-5" />
                                Settings
                            </a>
                        </nav>
                    </SheetContent>
                </Sheet>
                <Breadcrumb class="hidden md:flex">
                    <BreadcrumbList>
                        <BreadcrumbItem>
                            <BreadcrumbLink as-child>
                                <a href="#">Tableau De Bord</a>
                            </BreadcrumbLink>
                        </BreadcrumbItem>
                    </BreadcrumbList>
                </Breadcrumb>
                <div class="relative ml-auto flex-1 md:grow-0"></div>
                <DropdownMenu>
                    <DropdownMenuTrigger as-child>
                        <Button
                            variant="secondary"
                            size="icon"
                            class="rounded-full bg-white shadow-sm"
                        >
                            <CircleUser class="h-5 w-5" />
                            <span class="sr-only">Toggle user menu</span>
                        </Button>
                    </DropdownMenuTrigger>
                    <DropdownMenuContent align="end">
                        <DropdownMenuLabel class="text-lg font-medium">
                            {{ $page.props.auth.user.name }}
                        </DropdownMenuLabel>
                        <DropdownMenuSeparator />
                        <DropdownMenuItem>
                            <Link :href="route('profile.edit')"> Profile </Link>
                        </DropdownMenuItem>
                        <DropdownMenuSeparator />
                        <DropdownMenuItem>
                            <Link :href="route('logout')" method="post">
                                Logout
                            </Link>
                        </DropdownMenuItem>
                    </DropdownMenuContent>
                </DropdownMenu>
            </header>
            <main class="flex flex-1 flex-col gap-4 p-4 md:gap-8 md:p-8">
                <slot />
            </main>
        </div>
    </div>
</template>
